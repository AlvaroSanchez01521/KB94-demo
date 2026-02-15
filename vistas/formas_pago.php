<!-- HEADER -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0"></h1>
      </div>
      <div class="col-sm-6 text-right">
        <button class="btn btn-primary btn-sm" id="btnNuevoTipoMovi">
          <i class="fas fa-plus"></i> Nueva Forma de Pago
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

        <table id="tablaTipoMovi" class="table table-bordered table-hover">
          <thead class="thead-light">
            <tr>
              <th style="width: 15%">ID</th>
              <th>Descripción</th>
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



<!-- MODAL TIPO MOVIMIENTO -->
<div class="modal fade" id="modalTipoMovi" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <form id="formTipoMovi">

        <div class="modal-header">
          <h5 class="modal-title">Nuevo Tipo de Movimiento</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <input type="hidden" id="idTipoMovi">

          <div class="form-group">
            <label>Descripción</label>
            <input type="text" class="form-control" id="descripcionMovi" maxlength="40" required>
            <small class="text-danger d-none" id="errorDescripcionMovi"></small>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
          </button>

          <button type="submit" class="btn btn-success">
            Guardar
          </button>
        </div>


      </form>

    </div>
  </div>
</div>


<script>

$(document).ready(function () {
  listarTipoMovimientos();
});


// =============================
// EVENTOS
// =============================

// Nuevo
$("#btnNuevoTipoMovi").on("click", function () {
  limpiarModalTipoMovi();
  $("#modalTipoMovi .modal-title")
    .text("Nuevo Tipo de Movimiento");
  $("#modalTipoMovi").modal("show");
});

// Submit (ENTER y botón)
$("#formTipoMovi").on("submit", function (e) {
  e.preventDefault();
  guardarTipoMovi();
});

// Editar
$(document).on("click", ".btnEditarTipoMovi", function () {
  cargarTipoMoviParaEditar(this);
});

// Limpiar al cerrar modal
$("#modalTipoMovi").on("hidden.bs.modal", function () {
  limpiarModalTipoMovi();
});

// Limpiar error al escribir
$("#descripcionMovi").on("input", function () {
  limpiarErrorTipoMovi();
});


// =============================
// LISTAR
// =============================

function listarTipoMovimientos() {

  let datos = new FormData();
  datos.append("accion", "listar");

  $.ajax({
    url: "ajax/tipomovimientos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {

      let tbody = $("#tablaTipoMovi tbody");
      tbody.empty();

      respuesta.forEach(function (item) {

        tbody.append(`
          <tr>
            <td>${item.idTipoMovi}</td>
            <td>${item.descripcionMovi}</td>
            <td>
              <button class="btn btn-warning btn-sm btnEditarTipoMovi"
                      data-id="${item.idTipoMovi}"
                      data-descripcion="${item.descripcionMovi}">
                <i class="fas fa-edit"></i>
              </button>
            </td>
          </tr>
        `);

      });
    }
  });
}


// =============================
// CARGAR PARA EDITAR
// =============================

function cargarTipoMoviParaEditar(boton) {

  const id = $(boton).data("id");
  const descripcion = $(boton).data("descripcion");

  limpiarErrorTipoMovi();

  $("#idTipoMovi").val(id);
  $("#descripcionMovi").val(descripcion);

  $("#modalTipoMovi .modal-title")
    .text("Editar Tipo de Movimiento");

  $("#modalTipoMovi").modal("show");
}


// =============================
// GUARDAR
// =============================

function guardarTipoMovi() {

  limpiarErrorTipoMovi();

  const id = $("#idTipoMovi").val();
  const descripcion = $("#descripcionMovi").val().trim();

  if (descripcion === "") {
    mostrarErrorTipoMovi("La descripción es obligatoria");
    return;
  }

  let datos = new FormData();

  if (id === "") {
    datos.append("accion", "crear");
  } else {
    datos.append("accion", "editar");
    datos.append("idTipoMovi", id);
  }

  datos.append("descripcionMovi", descripcion);

    $.ajax({
      url: "ajax/tipomovimientos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,

      success: function (respuesta) {

        console.log(respuesta)

        if (respuesta === "ok") {

          $("#modalTipoMovi").modal("hide");
          listarTipoMovimientos();
          toastr.success("Guardado correctamente");

        } else if (respuesta === "duplicado") {

          mostrarErrorTipoMovi("Ya existe un tipo con esa descripción");

        } else if (respuesta === "sin_cambios") {

          toastr.info("No se realizaron cambios");

        } else if (respuesta === "vacio") {

          mostrarErrorTipoMovi("La descripción es obligatoria");

        } else {

          toastr.error("Error al guardar");
        }
      }
    });
  }


  // =============================
  // LIMPIAR MODAL
  // =============================

  function limpiarModalTipoMovi() {

    $("#idTipoMovi").val("");
    $("#descripcionMovi").val("");

    limpiarErrorTipoMovi();
  }


  // =============================
  // MANEJO DE ERRORES
  // =============================

  function mostrarErrorTipoMovi(mensaje) {

    $("#descripcionMovi")
      .addClass("is-invalid")
      .focus();

    $("#errorDescripcionMovi")
      .text(mensaje)
      .removeClass("d-none");
  }

  function limpiarErrorTipoMovi() {

    $("#descripcionMovi").removeClass("is-invalid");

    $("#errorDescripcionMovi")
      .addClass("d-none")
      .text("");
  }

</script>
