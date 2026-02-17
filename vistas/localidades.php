<!-- HEADER -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0"> </h1>
      </div>
      <div class="col-sm-6 text-right">
        <button class="btn btn-primary btn-sm" id="loc_btnNueva">
          <i class="fas fa-plus"></i> Nueva Localidad
        </button>
      </div>
    </div>
  </div>
</div>
<!-- TABLA -->
<div class="content">
  <div class="container-fluid">

    <div class="card">
      <div class="card-body">

        <table id="loc_tabla" class="table table-bordered table-hover">
          <thead class="thead-light">
            <tr>
              <th style="width: 15%">CP</th>
              <th>Localidad</th>
              <th style="width: 15%">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- contenido dinámico -->
          </tbody>
        </table>

      </div>
    </div>

  </div>
</div>

<!-- MODAL LOCALIDAD -->
<div class="modal fade" id="loc_modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Nueva Localidad</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form id="loc_form">
          <div class="form-group">
            <label>Código Postal</label>
            <input type="number" class="form-control" id="loc_cp">
            <small class="text-danger d-none" id="loc_errorCp"></small>
          </div>

          <div class="form-group">
            <label>Localidad</label>
            <input type="text" class="form-control" id="loc_nombre">
            <small class="text-danger d-none" id="loc_errorNombre"></small>
          </div>

        </form>

      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">
          Cancelar
        </button>
        <button class="btn btn-success" id="loc_btnGuardar" type="submit" form="loc_form">
          Guardar
        </button>
      </div>

    </div>
  </div>
</div>

<script> // se utiliza IIFE para evitar conflico con los demas modulos abiertos
var ModLocalidades = (function(){

  // =============================
  // INIT
  // =============================
  function init(){
    eventos();
    listar();
  }

  // =============================
  // EVENTOS
  // =============================
  function eventos(){

    // Nuevo
    $("#loc_btnNueva").on("click", function(){
      limpiarModal();
      $("#loc_modal .modal-title").text("Nueva Localidad");
      $("#loc_modal").modal("show");
    });

    // Submit form
    $("#loc_form").on("submit", function(e){
      e.preventDefault();
      guardar();
    });

    // Editar
    $(document).on("click", ".btnEditarLocalidad", function(){
      cargarParaEditar(this);
    });

    // Limpiar al cerrar
    $("#loc_modal").on("hidden.bs.modal", limpiarModal);

    // Limpiar errores al escribir
    $("#loc_cp, #loc_nombre").on("input", limpiarErrores);
  }

  // =============================
  // LISTAR
  // =============================
  function listar(){

    let loc_datos = new FormData();
    loc_datos.append("accion", "listar");

    $.ajax({
      url: "ajax/localidades.ajax.php",
      method: "POST",
      data: loc_datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",

      success: function(respuesta){

        let filas = "";

        respuesta.forEach(function(loc){
          filas += `
            <tr>
              <td>${loc.cp}</td>
              <td>${loc.localidad}</td>
              <td>
                <button class="btn btn-warning btn-sm btnEditarLocalidad"
                  data-cp="${loc.cp}"
                  data-localidad="${loc.localidad}">
                  <i class="fas fa-edit"></i>
                </button>
              </td>
            </tr>`;
        });

        $("#loc_tabla tbody").html(filas);
      }
    });
  }

  // =============================
  // CARGAR PARA EDITAR
  // =============================
  function cargarParaEditar(boton){

    const loc_cp = $(boton).data("cp");
    const loc_nombre = $(boton).data("localidad");

    $("#loc_cp").val(loc_cp).prop("disabled", true);
    $("#loc_nombre").val(loc_nombre);

    $("#loc_modal .modal-title").text("Editar Localidad");
    $("#loc_modal").modal("show");
  }

  // =============================
  // GUARDAR
  // =============================
  function guardar(){

    limpiarErrores();

    const loc_cp = $("#loc_cp").val().trim();
    const loc_nombre = $("#loc_nombre").val().trim();

    if(loc_cp === ""){
      mostrarErrorCP("El CP es obligatorio");
      return;
    }

    if(loc_nombre === ""){
      mostrarErrorNombre("La localidad es obligatoria");
      return;
    }

    let loc_datos = new FormData();

    if($("#loc_cp").prop("disabled")){
      loc_datos.append("accion", "editar");
    }else{
      loc_datos.append("accion", "crear");
    }

    loc_datos.append("cp", loc_cp);
    loc_datos.append("localidad", loc_nombre);

    $.ajax({
      url: "ajax/localidades.ajax.php",
      method: "POST",
      data: loc_datos,
      cache: false,
      contentType: false,
      processData: false,

      success: function(respuesta){

        if(respuesta === "ok"){
          $("#loc_modal").modal("hide");
          listar();
          toastr.success("Guardado correctamente");

        }else if(respuesta === "duplicado"){
          mostrarErrorNombre("Ya existe una localidad con este nombre");

        }else if(respuesta === "sin_cambios"){
          toastr.info("No se realizaron cambios");

        }else if(respuesta === "vacio"){
          toastr.warning("Todos los campos son obligatorios");

        }else{
          toastr.error("Error al guardar localidad");
        }
      }
    });
  }

  // =============================
  // LIMPIAR MODAL
  // =============================
  function limpiarModal(){
    $("#loc_form")[0].reset();
    $("#loc_cp").prop("disabled", false);
    limpiarErrores();
  }

  // =============================
  // ERRORES
  // =============================
  function mostrarErrorCP(msg){
    $("#loc_cp").addClass("is-invalid").focus();
    $("#loc_errorCp").text(msg).removeClass("d-none");
  }

  function mostrarErrorNombre(msg){
    $("#loc_nombre").addClass("is-invalid").focus();
    $("#loc_errorNombre").text(msg).removeClass("d-none");
  }

  function limpiarErrores(){
    $("#loc_cp, #loc_nombre").removeClass("is-invalid");
    $("#loc_errorCp, #loc_errorNombre").addClass("d-none").text("");
  }

  // =============================
  // API pública
  // =============================
  return {
    init: init,
    listar: listar
  };

})();
$(document).ready(function(){
  ModLocalidades.init();
});
</script>