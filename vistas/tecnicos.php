<!-- HEADER -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0"> </h1>
      </div>
      <div class="col-sm-6 text-right">
        <button class="btn btn-primary btn-sm" id="btnNuevoTecnico">
          <i class="fas fa-plus"></i> Nuevo Técnico
        </button>
      </div>
    </div>
  </div>
</div>
<!-- CONTENT -->
<div class="content">
  <div class="container-fluid">

    <div class="card">
      <div class="card-body">

        <table id="tablaTecnicos" class="table table-bordered table-hover">
          <thead class="thead-light">
            <tr>
              <th style="width: 10%">#</th>
              <th>Nombre</th>
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


<!-- MODAL TÉCNICO -->
<div class="modal fade" id="modalTecnico" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Nuevo Técnico</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form id="formTecnico">

          <input type="hidden" id="idTecnico">

          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" id="nombreTecnico" maxlength="60" required >
            <small class="text-danger d-none" id="errorNombreTecnico"></small>
          </div>

        </form>

      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">
          Cancelar
        </button>
        <button class="btn btn-success" id="btnGuardarTecnico" type="submit" form="formTecnico">
          Guardar
        </button>
      </div>

    </div>
  </div>
</div>


<script>

  $(document).ready(function () {
      listarTecnicos();
  });

  /* ===============================
    EVENTOS
  =============================== */

  // Submit del formulario (CREAR y EDITAR)
  $("#formTecnico").on("submit", function (e) {
      e.preventDefault();
      guardarTecnico();
  });

  // Botón Nuevo
  $("#btnNuevoTecnico").on("click", function () {
      limpiarModalTecnico();
      $("#modalTecnico .modal-title").text("Nuevo Técnico");
      $("#modalTecnico").modal("show");
  });

  // Botón Editar (delegado)
  $(document).on("click", ".btnEditarTecnico", function () {
      cargarTecnicoParaEditar(this);
  });

  // Cuando se cierra el modal
  $("#modalTecnico").on("hidden.bs.modal", function () {
      limpiarModalTecnico();
      limpiarErrorTecnico();
  });

  // Limpia error cuando el usuario escribe
  $("#nombreTecnico").on("input", function () {
      limpiarErrorTecnico();
  });


  /* ===============================
    LISTAR
  =============================== */

  function listarTecnicos() {

      const datos = new FormData();
      datos.append("accion", "listar");

      $.ajax({
          url: "ajax/tecnicos.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function (respuesta) {

              let html = "";

              respuesta.forEach((tecnico) => {
                  html += `
                  <tr>
                      <td>${tecnico.idTecnico}</td>
                      <td>${tecnico.nombre}</td>
                      <td>
                          <button class="btn btn-sm btn-warning btnEditarTecnico"
                              data-id="${tecnico.idTecnico}"
                              data-nombre="${tecnico.nombre}">
                              <i class="fas fa-edit"></i>
                          </button>
                      </td>
                  </tr>`;
              });

              $("#tablaTecnicos tbody").html(html);
          }
      });
  }


  /* ===============================
    GUARDAR (CREAR / EDITAR)
  =============================== */

  function guardarTecnico() {

      const id = $("#idTecnico").val();
      const nombre = $("#nombreTecnico").val().trim();

      if (nombre === "") {
          mostrarErrorTecnico("El nombre es obligatorio");
          return;
      }

      let datos = new FormData();

      // Si id está vacío → crear
      // Si id tiene valor → editar (lo carga "function cargarTecnicoParaEditar(boton)")

      if (id === "") {
          datos.append("accion", "crear");
      } else {
          datos.append("accion", "editar");
          datos.append("idTecnico", id);
      }

      datos.append("nombre", nombre);

      $.ajax({
          url: "ajax/tecnicos.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          success: function (respuesta) {

            console.log(respuesta)

            if (respuesta === "ok") {

                $("#modalTecnico").modal("hide");
                listarTecnicos();
                toastr.success("Guardado correctamente");

            } else if (respuesta === "duplicado") {

                mostrarErrorTecnico("Ya existe un técnico con ese nombre");

            } else if (respuesta === "sin_cambios") {

                toastr.info("No se realizaron cambios");

            } else {

                toastr.error("Error al guardar técnico");
            }
          }
      });
  }


  /* ===============================
    EDITAR
  =============================== */

  function cargarTecnicoParaEditar(boton) {

      const id = $(boton).data("id");
      const nombre = $(boton).data("nombre");

      limpiarErrorTecnico();

      $("#idTecnico").val(id);
      $("#nombreTecnico").val(nombre);

      $("#modalTecnico .modal-title").text("Editar Técnico");
      $("#modalTecnico").modal("show");
  }


  /* ===============================
    LIMPIADORES
  =============================== */

  function limpiarModalTecnico() {
      $("#idTecnico").val("");
      $("#nombreTecnico").val("");
  }

  function mostrarErrorTecnico(mensaje) {
      $("#nombreTecnico")
          .addClass("is-invalid")
          .focus();

      $("#errorNombreTecnico")
          .text(mensaje)
          .removeClass("d-none");
  }

  function limpiarErrorTecnico() {
      $("#nombreTecnico").removeClass("is-invalid");

      $("#errorNombreTecnico")
          .addClass("d-none")
          .text("");
  }

</script>
