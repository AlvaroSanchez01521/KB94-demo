<!-- HEADER -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0"></h1>
      </div>
      <div class="col-sm-6 text-right">
        <button class="btn btn-primary btn-sm" id="btnNuevaMarca">
          <i class="fas fa-plus"></i> Nueva Marca
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

        <table id="tablaMarcas" class="table table-bordered table-hover">
          <thead class="thead-light">
            <tr>
              <th style="width: 10%">#</th>
              <th>Marca</th>
              <th style="width: 15%">Acciones</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>

      </div>
    </div>
  </div>
</div>

<!-- MODAL MARCA -->
<div class="modal fade" id="modalMarca" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Nueva Marca</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form id="formMarca">

          <input type="hidden" id="idMarca">

          <div class="form-group">
            <label>Marca</label>
            <input type="text" class="form-control" id="nombreMarca" maxlength="25" required>
            <small class="text-danger d-none" id="errorNombreMarca"></small>
          </div>

        </form>

      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">
          Cancelar
        </button>
        <button class="btn btn-success" id="btnGuardarMarca" type="submit" form="formMarca">
          Guardar
        </button>
      </div>

    </div>
  </div>
</div>


<script>
  $(document).ready(function () {
      listarMarcas();
  });

  /* ===============================
    EVENTOS
  =============================== */

  // Submit del formulario
  $("#formMarca").on("submit", function (e) {
      e.preventDefault();
      guardarMarca();
  });

  // Botón Nueva Marca
  $("#btnNuevaMarca").on("click", function () {
      limpiarModalMarca();
      $("#modalMarca .modal-title").text("Nueva Marca");
      $("#modalMarca").modal("show");
  });

  // Botón Editar (delegado)
  $(document).on("click", ".btnEditarMarca", function () {
      cargarMarcaParaEditar(this);
  });

  // Cuando se cierra el modal
  $("#modalMarca").on("hidden.bs.modal", function () {
      limpiarModalMarca();
      limpiarErrorMarca();
  });

  // Limpiar error al escribir
  $("#nombreMarca").on("input", function () {
      limpiarErrorMarca();
  });


  /* ===============================
    LISTAR
  =============================== */

  function listarMarcas() {

      const datos = new FormData();
      datos.append("accion", "listar");

      $.ajax({
          url: "ajax/marcas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function (respuesta) {

              let html = "";

              respuesta.forEach((marca) => {
                  html += `
                  <tr>
                      <td>${marca.idMarca}</td>
                      <td>${marca.marca}</td>
                      <td>
                          <button class="btn btn-sm btn-warning btnEditarMarca"
                              data-id="${marca.idMarca}"
                              data-marca="${marca.marca}">
                              <i class="fas fa-edit"></i>
                          </button>
                      </td>
                  </tr>`;
              });

              $("#tablaMarcas tbody").html(html);
          }
      });
  }


  /* ===============================
    GUARDAR (CREAR / EDITAR)
  =============================== */

  function guardarMarca() {

      const id = $("#idMarca").val();
      const marca = $("#nombreMarca").val().trim();

      if (marca === "") {
          mostrarErrorMarca("La marca es obligatoria");
          return;
      }

      let datos = new FormData();

      if (id === "") {
          datos.append("accion", "crear");
      } else {
          datos.append("accion", "editar");
          datos.append("idMarca", id);
      }

      datos.append("marca", marca);

      $.ajax({
          url: "ajax/marcas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          success: function (respuesta) {

            console.log(respuesta)

              if (respuesta === "ok") {

                  $("#modalMarca").modal("hide");
                  listarMarcas();
                  toastr.success("Guardado correctamente");

              } else if (respuesta === "duplicado") {

                  mostrarErrorMarca("Ya existe una marca con ese nombre");

              } else if (respuesta === "sin_cambios") {

                  toastr.info("No se realizaron cambios");

              } else {

                  toastr.error("Error al guardar marca");
              }
          }
      });
  }


  /* ===============================
    EDITAR
  =============================== */

  function cargarMarcaParaEditar(boton) {

      const id = $(boton).data("id");
      const marca = $(boton).data("marca");

      limpiarErrorMarca();

      $("#idMarca").val(id);
      $("#nombreMarca").val(marca);

      $("#modalMarca .modal-title").text("Editar Marca");
      $("#modalMarca").modal("show");
  }


  /* ===============================
    LIMPIADORES
  =============================== */

  function limpiarModalMarca() {
      $("#idMarca").val("");
      $("#nombreMarca").val("");
  }

  function mostrarErrorMarca(mensaje) {
      $("#nombreMarca")
          .addClass("is-invalid")
          .focus();

      $("#errorNombreMarca")
          .text(mensaje)
          .removeClass("d-none");
  }

  function limpiarErrorMarca() {
      $("#nombreMarca").removeClass("is-invalid");

      $("#errorNombreMarca")
          .addClass("d-none")
          .text("");
  }
</script>
