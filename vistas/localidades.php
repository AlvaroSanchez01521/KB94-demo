<!-- HEADER -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0"> </h1>
      </div>
      <div class="col-sm-6 text-right">
        <button class="btn btn-primary btn-sm" id="btnNuevaLocalidad">
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

        <table id="tablaLocalidades" class="table table-bordered table-hover">
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
<div class="modal fade" id="modalLocalidad" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Nueva Localidad</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form id="formLocalidad">
          
          <div class="form-group">
            <label>Código Postal</label>
            <input type="number" class="form-control" id="cpLocalidad"  maxlength="6" required>
            <small class="text-danger d-none" id="errorCpLocalidad"></small>
          </div>

          <div class="form-group">
            <label>Localidad</label>
            <input type="text" class="form-control" id="nombreLocalidad" maxlength="60" required>
            <small class="text-danger d-none" id="errorNombreLocalidad"></small>
          </div>

        </form>

      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">
          Cancelar
        </button>
        <button class="btn btn-success" id="btnGuardarLocalidad" type="submit" form="formLocalidad">
          Guardar
        </button>
      </div>

    </div>
  </div>
</div>

<script>

  $(document).ready(function () {
    listarLocalidades();
  });


  // =============================
  // EVENTOS
  // =============================

  // Nuevo
  $("#btnNuevaLocalidad").on("click", function () {
    limpiarModalLocalidad();
    $("#modalLocalidad .modal-title").text("Nueva Localidad");
    $("#modalLocalidad").modal("show");
  });

  // Submit del form (ENTER y botón)
  $("#formLocalidad").on("submit", function (e) {
    e.preventDefault();
    guardarLocalidad();
  });

  // Editar
  $(document).on("click", ".btnEditarLocalidad", function () {
    cargarLocalidadParaEditar(this);
  });

  // Limpiar al cerrar modal
  $("#modalLocalidad").on("hidden.bs.modal", function () {
    limpiarModalLocalidad();
  });

  // Limpiar error al escribir
  $("#cpLocalidad, #nombreLocalidad").on("input", function () {
    limpiarErroresLocalidad();
  });



  // =============================
  // LISTAR
  // =============================

  function listarLocalidades() {

    let datos = new FormData();
    datos.append("accion", "listar");

    $.ajax({
      url: "ajax/localidades.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",

      success: function (respuesta) {

        let filas = "";

        respuesta.forEach(function (loc) {

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
            </tr>
          `;
        });

        $("#tablaLocalidades tbody").html(filas);
      }
    });
  }


  // =============================
  // CARGAR PARA EDITAR
  // =============================

  function cargarLocalidadParaEditar(boton) {

    const cp = $(boton).data("cp");
    const localidad = $(boton).data("localidad");

    $("#cpLocalidad")
      .val(cp)
      .prop("disabled", false);

    $("#nombreLocalidad").val(localidad);

    $("#modalLocalidad .modal-title").text("Editar Localidad");

    $("#modalLocalidad").modal("show");
  }


  // =============================
  // GUARDAR
  // =============================

  function guardarLocalidad() {

    limpiarErroresLocalidad();

    const cp = $("#cpLocalidad").val().trim();
    const localidad = $("#nombreLocalidad").val().trim();

    if (cp === "") {
      mostrarErrorCP("El CP es obligatorio");
      return;
    }

    if (localidad === "") {
      mostrarErrorLocalidad("La localidad es obligatoria");
      return;
    }

    let datos = new FormData();

    if ($("#cpLocalidad").prop("disabled")) {
      datos.append("accion", "editar");
    } else {
      datos.append("accion", "crear");
    }

    datos.append("cp", cp);
    datos.append("localidad", localidad);

    $.ajax({
      url: "ajax/localidades.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,

      success: function (respuesta) {

        console.log(respuesta)

        if (respuesta === "ok") {

          $("#modalLocalidad").modal("hide");
          listarLocalidades();
          toastr.success("Guardado correctamente");

        } else if (respuesta === "duplicado") {

          mostrarErrorLocalidad("Ya existe una localidad con este nombre o Codigo Postal");

        } else if (respuesta === "sin_cambios") {

          toastr.info("No se realizaron cambios");

        } else if (respuesta === "vacio") {

          toastr.warning("Todos los campos son obligatorios");

        } else {

          toastr.error("Error al guardar localidad");
        }
      }
    });
  }


  // =============================
  // LIMPIAR MODAL
  // =============================

  function limpiarModalLocalidad() {

    $("#formLocalidad")[0].reset();

    $("#cpLocalidad").prop("disabled", false);

    limpiarErroresLocalidad();
  }


  // =============================
  // MANEJO DE ERRORES
  // =============================

  function mostrarErrorCP(mensaje) {

    $("#cpLocalidad")
      .addClass("is-invalid")
      .focus();

    $("#errorCpLocalidad")
      .text(mensaje)
      .removeClass("d-none");
  }

  function mostrarErrorLocalidad(mensaje) {

    $("#nombreLocalidad")
      .addClass("is-invalid")
      .focus();

    $("#errorNombreLocalidad")
      .text(mensaje)
      .removeClass("d-none");
  }

  function limpiarErroresLocalidad() {

    $("#cpLocalidad").removeClass("is-invalid");
    $("#nombreLocalidad").removeClass("is-invalid");

    $("#errorCpLocalidad")
      .addClass("d-none")
      .text("");

    $("#errorNombreLocalidad")
      .addClass("d-none")
      .text("");
  }


</script>
