<!-- HEADER -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0">Modelos</h1>
      </div>
      <div class="col-sm-6 text-right">
        <button class="btn btn-primary btn-sm" id="btnNuevoModelo">
          <i class="fas fa-plus"></i> Nuevo Modelo
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


        <div class="form-group">
        <label>Filtrar por Marca</label>
        <select id="filtroMarca" class="form-control">
            <option value="">Seleccione una marca</option>
        </select>
        </div>


        <table id="tablaModelos" class="table table-bordered table-hover">
            <thead class="thead-light">
            <tr>
                <th style="width: 10%">#</th>
                <th>Marca</th>
                <th>Modelo</th>
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

<!-- MODAL MODELO -->
<div class="modal fade" id="modalModelo" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Nuevo Modelo</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form id="formModelo">

          <input type="hidden" id="idModelo">

          <div class="form-group">
            <label>Modelo</label>
            <input type="text" class="form-control" id="nombreModelo" maxlength="60" required>
            <small class="text-danger d-none" id="errorModelo"></small>
          </div>

          <div class="form-group">
            <label>Marca</label>
            <select class="form-control" id="selectMarca" required>
              <option value="">Seleccione una marca</option>
            </select>
            <small class="text-danger d-none" id="errorMarca"></small>
          </div>

        </form>

      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">
          Cancelar
        </button>
        <button class="btn btn-success" id="btnGuardarModelo" type="submit" form="formModelo">
          Guardar
        </button>
      </div>

    </div>
  </div>
</div>


<script>
    $(document).ready(function () {
        cargarMarcas();    
        listarModelos();       
    });

    /* ===============================
    EVENTOS
    =============================== */

    // Filtrar por Modelo
    $("#filtroMarca").on("change", function () {
        const idMarca = $(this).val();

        if (idMarca === "") {
            $("#tablaModelos tbody").html("");
            return;
        }

        listarModelosPorMarca(idMarca);
    });


    // Submit del formulario
    $("#formModelo").on("submit", function (e) {
        e.preventDefault();
        guardarModelo();
    });

    // Botón Nuevo
    $("#btnNuevoModelo").on("click", function () {
        limpiarModalModelo();
        $("#modalModelo .modal-title").text("Nuevo Modelo");
        $("#modalModelo").modal("show");
    });

    // Botón Editar
    $(document).on("click", ".btnEditarModelo", function () {
        cargarModeloParaEditar(this);
    });

    // Reset al cerrar modal
    $("#modalModelo").on("hidden.bs.modal", function () {
        limpiarModalModelo();
        limpiarErroresModelo();
    });

    // Limpiar errores al escribir
    $("#nombreModelo, #selectMarca").on("input change", function () {
        limpiarErroresModelo();
    });


    /* ===============================
    LISTAR TODOS LOS MODELOS
    =============================== */

    function listarModelos() {

        const datos = new FormData();
        datos.append("accion", "listar");

        $.ajax({
            url: "ajax/modelos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {

                let html = "";

                respuesta.forEach((modelo) => {
                   html += `
                            <tr>
                                <td>${modelo.idModelo}</td>
                                <td>${modelo.marca}</td>
                                <td>${modelo.modelo}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning btnEditarModelo"
                                        data-id="${modelo.idModelo}"
                                        data-modelo="${modelo.modelo}"
                                        data-idmarca="${modelo.idMarca}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>`;

                });

                $("#tablaModelos tbody").html(html);
            }
        });
    }

    /* ===============================
    LISTAR MODELOS POR MARCA
    =============================== */
    function listarModelosPorMarca(idMarca) {

        const datos = new FormData();
        datos.append("idMarca", idMarca);

        $.ajax({
            url: "ajax/modelos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {

                let html = "";

                respuesta.forEach((modelo) => {
                    html += `
                    <tr>
                        <td>${modelo.idModelo}</td>
                        <td>${modelo.marca}</td>
                        <td>${modelo.modelo}</td>
                        <td>
                            <button class="btn btn-sm btn-warning btnEditarModelo"
                                data-id="${modelo.idModelo}"
                                data-modelo="${modelo.modelo}"
                                data-idmarca="${modelo.idMarca}">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>`;
                });

                $("#tablaModelos tbody").html(html);
            }
        });
    }


    /* ===============================
    CARGAR MARCAS EN SELECT
    =============================== */
    function cargarMarcas() {

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
            success: function (marcas) {

                let opciones = '<option value="">Seleccione una marca</option>';

                marcas.forEach((marca) => {
                    opciones += `<option value="${marca.idMarca}">${marca.marca}</option>`;
                });

                $("#selectMarca").html(opciones);   // modal
                $("#filtroMarca").html(opciones);   // filtro
            }
        });
    }


    /* ===============================
    GUARDAR (CREAR / EDITAR)
    =============================== */

    function guardarModelo() {

        const id = $("#idModelo").val();
        const modelo = $("#nombreModelo").val().trim();
        const idMarca = $("#selectMarca").val();

        if (modelo === "") {
            mostrarErrorModelo("El modelo es obligatorio");
            return;
        }

        if (idMarca === "") {
            mostrarErrorMarca("Debe seleccionar una marca");
            return;
        }

        let datos = new FormData();

        if (id === "") {
            datos.append("accion", "crear");
        } else {
            datos.append("accion", "editar");
            datos.append("idModelo", id);
        }

        datos.append("modelo", modelo);
        datos.append("idMarca", idMarca);

        $.ajax({
            url: "ajax/modelos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                console.log(respuesta)

                if (respuesta === "ok") {

                    $("#modalModelo").modal("hide");
                    const marcaActual = $("#filtroMarca").val();
                    if (marcaActual) listarModelosPorMarca(marcaActual);
                    toastr.success("Guardado correctamente");

                } else if (respuesta === "duplicado") {

                    mostrarErrorModelo("Ya existe un modelo con ese nombre");

                } else if (respuesta === "sin_cambios") {

                    toastr.info("No se realizaron cambios");

                } else {

                    toastr.error("Error al guardar modelo");
                }
            }
        });
    }


    /* ===============================
    EDITAR
    =============================== */

    function cargarModeloParaEditar(boton) {

        const id = $(boton).data("id");
        const modelo = $(boton).data("modelo");
        const idMarca = $(boton).data("idmarca");

        limpiarErroresModelo();

        $("#idModelo").val(id);
        $("#nombreModelo").val(modelo);
        $("#selectMarca").val(idMarca);

        $("#modalModelo .modal-title").text("Editar Modelo");
        $("#modalModelo").modal("show");
    }


    /* ===============================
    LIMPIADORES
    =============================== */

    function limpiarModalModelo() {
        $("#idModelo").val("");
        $("#nombreModelo").val("");
        $("#selectMarca").val("");
    }

    function mostrarErrorModelo(mensaje) {
        $("#nombreModelo").addClass("is-invalid").focus();
        $("#errorModelo").text(mensaje).removeClass("d-none");
    }

    function mostrarErrorMarca(mensaje) {
        $("#selectMarca").addClass("is-invalid");
        $("#errorMarca").text(mensaje).removeClass("d-none");
    }

    function limpiarErroresModelo() {
        $("#nombreModelo").removeClass("is-invalid");
        $("#selectMarca").removeClass("is-invalid");
        $("#errorModelo").addClass("d-none").text("");
        $("#errorMarca").addClass("d-none").text("");
    }
</script>
