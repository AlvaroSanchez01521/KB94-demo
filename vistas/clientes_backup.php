<!-- HEADER -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"></h1>
            </div>
            <div class="col-sm-6">
                
            </div>
        </div>
    </div>
</div>
<div class="content">
<div class="container-fluid">
<!-- BUSCADORES -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">CRITERIOS DE BÚSQUEDA</h3>
                <div class="card-tools">
                    <button class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button class="btn btn-tool text-warning" id="btnLimpiarBusqueda">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">

                    <div class="col-12 col-lg-4 mb-2">
                        <label class="text-sm">Nombre</label>
                        <input type="text" class="form-control form-control-sm" id="busquedaNombre">
                    </div>

                    <div class="col-12 col-lg-4 mb-2">
                        <label class="text-sm">Teléfono</label>
                        <input type="text" class="form-control form-control-sm" id="busquedaTelefono">
                    </div>

                    <div class="col-12 col-lg-4 mb-2">
                        <label class="text-sm">DNI</label>
                        <input type="text" class="form-control form-control-sm" id="busquedaDni">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEAD TABLA -->
<div class="row">
    <div class="col-lg-12">
        <table id="tablaClientes" class="table table-striped w-100 shadow">
            <thead class="bg-info">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Teléfono 1</th>
                    <th>Teléfono 2</th>
                    <th>Localidad</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

</div>
</div>

<!-- MODAL CLIENTE -->
<div class="modal fade" id="modalCliente" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header bg-gray py-1">
                <h5 class="modal-title" id="tituloModalCliente">Nuevo Cliente</h5>
                <button type="button" class="btn text-white border-0 fs-5" data-dismiss="modal">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>

            <!-- BODY -->
            <div class="modal-body">
                <form id="formCliente" novalidate>

                    <input type="hidden" id="idCliente">

                    <div class="row">

                        <!-- Nombre -->
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control text-uppercase" id="nombreCliente" required>
                                <label>Nombre y Apellido</label>
                                <div class="invalid-feedback" id="errorNombreCliente"></div>
                            </div>
                        </div>

                        <!-- DNI -->
                        <div class="col-12 col-lg-4">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control" id="dniCliente">
                                <label>DNI</label>
                            </div>
                        </div>

                        <!-- Teléfono 1 -->
                        <div class="col-12 col-lg-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="telefono1">
                                <label>Teléfono 1</label>
                            </div>
                        </div>

                        <!-- Teléfono 2 -->
                        <div class="col-12 col-lg-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="telefono2">
                                <label>Teléfono 2</label>
                            </div>
                        </div>

                        <!-- Localidad -->
                        <div class="col-12">
                            <div class="mb-2">
                                <select class="form-select" id="selectLocalidad" required>
                                    <option value="">Seleccione...</option>
                                </select>
                                
                                <div class="invalid-feedback" id="errorLocalidad"></div>
                            </div>
                        </div>

                        <!-- BOTONES -->
                        <div class="col-12 text-right mt-3">

                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fas fa-times"></i> Cancelar
                            </button>

                            <button type="submit" class="btn btn-success" id="btnGuardarCliente">
                                <i class="fas fa-save"></i> Guardar
                            </button>

                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        fnc_cargar_tbl_clientes();
    });

    /* ===============================
    BUSQUEDA POR NOMBRE
    =============================== */
    $("#busquedaNombre").keyup(function(){
        $("#tablaClientes").DataTable()
            .column(1)
            .search(this.value)
            .draw();
    });

    /* ===============================
    BUSQUEDA POR DNI
    =============================== */
    $("#busquedaDni").keyup(function(){
        $("#tablaClientes").DataTable()
            .column(2)
            .search(this.value)
            .draw();
    });

    /* ===============================
    FILTRO TELEFONO (TEL1 y TEL2)
    =============================== */
    $.fn.dataTable.ext.search.push(function(settings, data){
        let telefonoBuscado = $("#busquedaTelefono").val().toLowerCase();

        if(telefonoBuscado === ""){
            return true;
        }

        let tel1 = data[3].toLowerCase();
        let tel2 = data[4].toLowerCase();

        return tel1.includes(telefonoBuscado) || tel2.includes(telefonoBuscado);
    });

    $("#busquedaTelefono").keyup(function(){
        $("#tablaClientes").DataTable().draw();
    });

    /* ===============================
    LIMPIAR BUSQUEDA
    =============================== */
    $("#btnLimpiarBusqueda").click(function(){

        $("#busquedaNombre").val("");
        $("#busquedaTelefono").val("");
        $("#busquedaDni").val("");

        let tabla = $("#tablaClientes").DataTable();
        tabla.search("").columns().search("").draw();
    });

    /* ===============================
        EVENTOS
    =============================== */
    // evita que el modal se cierre // ejecuta tu función
    $("#formCliente").on("submit", function(e){
        e.preventDefault(); 
        guardarCliente();   
    });

    // BOTÓN GUARDAR CLIENTE
    $(document).on("click", "#btnGuardarCliente", function(e){
        e.preventDefault(); 
        guardarCliente();
    });

    // Boton editar
    $(document).on("click", ".btnEditarCliente", function(){
        cargarClienteParaEditar(this);
    });

    //limpia el error de localidad vacia al eleijir localidad
    $("#selectLocalidad").on("change", function(){
        limpiarErrorLocalidad();
    });

    /* ===============================
        FUNCIONES
    =============================== */

    /* ======================================================
    GUARDAR CLIENTE (Crear o Editar)
    ====================================================== */
    function guardarCliente(){

        const idCliente = $("#idCliente").val().trim();
        const nombre    = $("#nombreCliente").val().trim();
        const dni       = $("#dniCliente").val().trim();
        const tel1      = $("#telefono1").val().trim();
        const tel2      = $("#telefono2").val().trim();
        const cp        = $("#selectLocalidad").val();

        /* ===============================
        Limpiar errores previos
        =============================== */
        limpiarErrorNombreCliente();
        limpiarErrorLocalidad();

        /* ===============================
        VALIDACIONES BÁSICAS
        =============================== */
        
        if(nombre === ""){
            errorNombreCliente("El nombre es obligatorio");
            return;
        }

        if(cp === ""){
            errorLocalidad("Seleccione una localidad");
            return;
        }

        /* ===============================
        PREPARAR DATOS
        =============================== */

        const datos = new FormData();

        //  Determina acción automáticamente
        if(idCliente === ""){
            datos.append("accion", "crear");
        }else{
            datos.append("accion", "editar");
            datos.append("idCliente", idCliente);
        }

        datos.append("nombre", nombre);
        datos.append("dni", dni);
        datos.append("telefono1", tel1);
        datos.append("telefono2", tel2);
        datos.append("cp", cp);

        /* ===============================
        AJAX
        =============================== */

        $.ajax({
            url: "ajax/clientes.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){

                console.log("Respuesta servidor:", respuesta);

                if(respuesta === "ok"){

                    // cerrar modal
                    $("#modalCliente").modal("hide");
                    fnc_cargar_tbl_clientes();
                    // recargar tabla sin refrescar página
                    //table.ajax.reload(null, false);//null → mantiene página actual //false → no reinicia paginación
                    toastr.success("Cliente guardado correctamente");

                }else if(respuesta === "duplicado"){

                    errorNombreCliente("Ya existe un cliente con ese nombre");

                }else if(respuesta === "sin_cambios"){

                    toastr.error("No se realizaron cambios"); 

                }else{

                    toastr.error("Error al guardar el cliente");                     
                }
            },
            error: function(xhr){
                console.error("Error AJAX:", xhr.responseText);
                toastr.error("Error de comunicación con el servidor");
            }
        });
    }


    /* ======================================================
    CARGAR TABLA CLIENTES (DataTable)
    Versión mínima funcional
    ====================================================== */
    
    function fnc_cargar_tbl_clientes(){
        // 🔴 Destruir instancia previa si existe
        if ($.fn.DataTable.isDataTable('#tablaClientes')) {
            $('#tablaClientes').DataTable().destroy();
           // $('#tablaClientes').empty();
        }

        // 🔹 variable LOCAL
        const table = $("#tablaClientes").DataTable({

        

            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Nuevo Cliente',
                    className: 'addNewRecord',
                    action: function () {
                        $("#modalCliente").modal("show");
                        $("#tituloModalCliente").text("Nuevo Cliente");
                        $("#formCliente")[0].reset();
                        $("#idCliente").val("");
                        cargarLocalidadesSelect();
                    }
                },
                'excel', 'print', 'pageLength'
            ],

            pageLength: 10,

            ajax:{
                url: "ajax/clientes.ajax.php",
                type: "POST",
                data: { accion: "listar" },
                dataSrc: ''
            },

            responsive: {
                details: { type: 'column' }
            },

            
            columns: [
                { data: "idCliente" },
                { data: "nombre" },
                { data: "dni" },
                { data: "telefono1" },
                { data: "telefono2" },
                { data: "localidad" },
                {
                    data: null,
                    render: function(data, type, row){
                        return `
                            <center>
                                <span class="btnEditarCliente text-primary px-1" style="cursor:pointer;"
                                    data-id="${row.idCliente}"
                                    data-nombre="${row.nombre}"
                                    data-dni="${row.dni}"
                                    data-tel1="${row.telefono1}"
                                    data-tel2="${row.telefono2}"
                                    data-cp="${row.cp}">
                                    <i class="fas fa-pencil-alt fs-5"></i>
                                </span>
                            </center>
                        `;
                    }
                }
            ],

            language:{
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }

        });
    }

    /* ===============================
    CARGAR CLIENTE PARA EDITAR
    =============================== */
    function cargarClienteParaEditar(boton){

        const id   = $(boton).data("id");
        const nombre = $(boton).data("nombre");
        const dni  = $(boton).data("dni");
        const tel1 = $(boton).data("tel1");
        const tel2 = $(boton).data("tel2");
        const cp   = $(boton).data("cp");        

        // Cargar datos en el modal
        $("#idCliente").val(id);
        $("#nombreCliente").val(nombre);
        $("#dniCliente").val(dni);
        $("#telefono1").val(tel1);
        $("#telefono2").val(tel2);
        
        cargarLocalidadesSelect(cp);

        $("#tituloModalCliente").text("Editar Cliente");
        $("#modalCliente").modal("show");
    }

    /* ===============================
    CARGAR LOCALIDADES EN SELECT
    =============================== */
    function cargarLocalidadesSelect(selectedCp = null){

        const datos = new FormData();
        datos.append("accion", "listar");

        $.ajax({
            url: "ajax/localidades.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta){

                let opciones = '<option value="">Seleccione localidad</option>';

                respuesta.forEach(loc => {
                    opciones += `<option value="${loc.cp}">${loc.localidad}</option>`;
                });

                $("#selectLocalidad").html(opciones);

                // seleccionar localidad si viene una (auto completa si edita)
                if(selectedCp){
                    $("#selectLocalidad").val(selectedCp);
                }
            }
        });
    }

    /* ===============================
    VALIDACION ERROR NOMBRE CLIENTE
    =============================== */
    function errorNombreCliente(mensaje){
        $("#nombreCliente").addClass("is-invalid");
        $("#errorNombreCliente").text(mensaje).show();
    }

    function limpiarErrorNombreCliente(){
        $("#nombreCliente").removeClass("is-invalid");
        $("#errorNombreCliente").text("").hide();
    }

    /* ===============================
    VALIDACION ERROR LOCALIDAD CLIENTE
    =============================== */
    function errorLocalidad(mensaje){
        $("#selectLocalidad").addClass("is-invalid");
        $("#errorLocalidad").text(mensaje).show();
    }

    function limpiarErrorLocalidad(){
        $("#selectLocalidad").removeClass("is-invalid");
        $("#errorLocalidad").text("").hide();
    }



</script>