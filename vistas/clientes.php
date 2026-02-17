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
                    <button class="btn btn-tool text-warning" id="cli_btnLimpiarBusqueda">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">

                    <div class="col-12 col-lg-4 mb-2">
                        <label class="text-sm">Nombre</label>
                        <input type="text" class="form-control form-control-sm" id="cli_busquedaNombre">
                    </div>

                    <div class="col-12 col-lg-4 mb-2">
                        <label class="text-sm">Teléfono</label>
                        <input type="text" class="form-control form-control-sm" id="cli_busquedaTelefono">
                    </div>

                    <div class="col-12 col-lg-4 mb-2">
                        <label class="text-sm">DNI</label>
                        <input type="text" class="form-control form-control-sm" id="cli_busquedaDni">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEAD TABLA -->
<div class="row">
    <div class="col-lg-12">
        <table id="cli_tablaClientes" class="table table-striped w-100 shadow">
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
<div class="modal fade" id="cli_modalCliente" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header bg-gray py-1">
                <h5 class="modal-title" id="cli_tituloModalCliente">Nuevo Cliente</h5>
                <button type="button" class="btn text-white border-0 fs-5" data-dismiss="modal">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>

            <!-- BODY -->
            <div class="modal-body">
                <form id="cli_formCliente" novalidate>
                    <input type="hidden" id="cli_idCliente">
                    <div class="row">

                        <!-- Nombre -->
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control text-uppercase" id="cli_nombreCliente" required>
                                <label>Nombre y Apellido</label>
                                <div class="invalid-feedback" id="cli_errorNombreCliente"></div>
                            </div>
                        </div>

                        <!-- DNI -->
                        <div class="col-12 col-lg-4">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control" id="cli_dniCliente">
                                <label>DNI</label>
                            </div>
                        </div>

                        <!-- Teléfono 1 -->
                        <div class="col-12 col-lg-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="cli_telefono1">
                                <label>Teléfono 1</label>
                            </div>
                        </div>

                        <!-- Teléfono 2 -->
                        <div class="col-12 col-lg-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="cli_telefono2">
                                <label>Teléfono 2</label>
                            </div>
                        </div>

                        <!-- Localidad -->
                        <div class="col-12">
                            <div class="mb-2">
                                <select class="form-select" id="cli_selectLocalidad" required>
                                <option value="">Seleccione...</option>
                                </select>
                                <div class="invalid-feedback" id="cli_errorLocalidad"></div>
                            </div>
                        </div>

                        <!-- BOTONES -->
                        <div class="col-12 text-right mt-3">

                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fas fa-times"></i> Cancelar
                            </button>

                            <button type="submit" class="btn btn-success" id="cli_btnGuardarCliente">
                                <i class="fas fa-save"></i> Guardar
                            </button>

                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script> // se utiliza IIFE para evitar conflico con los demas modulos abiertos
    const ModClientes = (function(){

        /* ===============================
        VARIABLES PRIVADAS
        =============================== */
        let cli_tabla = null;

        /* ===============================
        INIT
        =============================== */
        function init(){
            cli_cargarTabla();
            cli_eventos();
        }

        /* ===============================
        EVENTOS
        =============================== */
        function cli_eventos(){

            // SUBMIT FORM
            $("#cli_formCliente").on("submit", function(e){
                e.preventDefault();
                cli_guardarCliente();
            });

            // EDITAR
            $(document).on("click", ".btnEditarCliente", function(){
                cli_cargarParaEditar(this);
            });

            // LIMPIAR ERROR LOCALIDAD
            $("#cli_selectLocalidad").on("change", cli_limpiarErrorLocalidad);

            // BUSQUEDA NOMBRE
            $("#cli_busquedaNombre").on("keyup", function(){
                cli_tabla.column(1).search(this.value).draw();
            });

            // BUSQUEDA DNI
            $("#cli_busquedaDni").on("keyup", function(){
                cli_tabla.column(2).search(this.value).draw();
            });

            // BUSQUEDA TELEFONO (TEL1 + TEL2)
            $.fn.dataTable.ext.search.push(function(settings, data){
                let buscado = $("#cli_busquedaTelefono").val().toLowerCase();
                if(buscado === "") return true;

                let tel1 = (data[3] || "").toLowerCase();
                let tel2 = (data[4] || "").toLowerCase();

                return tel1.includes(buscado) || tel2.includes(buscado);
            });

            $("#cli_busquedaTelefono").on("keyup", function(){
                cli_tabla.draw();
            });

            // LIMPIAR BUSQUEDA
            $("#cli_btnLimpiarBusqueda").on("click", function(){
                $("#cli_busquedaNombre, #cli_busquedaTelefono, #cli_busquedaDni").val("");
                cli_tabla.search("").columns().search("").draw();
            });
        }

        /* ===============================
        TABLA
        =============================== */
        function cli_cargarTabla(){

            if ($.fn.DataTable.isDataTable('#cli_tablaClientes')) {
                $('#cli_tablaClientes').DataTable().destroy();
            }

            cli_tabla = $("#cli_tablaClientes").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        text: 'Nuevo Cliente',
                        className: 'addNewRecord',
                        action: function () {
                            cli_abrirModalNuevo();
                        }
                    },
                    'excel','print','pageLength'
                ],
                pageLength: 10,
                ajax:{
                    url: "ajax/clientes.ajax.php",
                    type: "POST",
                    data: { accion: "listar" },
                    dataSrc: ''
                },
                responsive: { details: { type: 'column' } },
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
                            </center>`;
                        }
                    }
                ],
                language:{
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }
            });
        }

        /* ===============================
        MODAL
        =============================== */
        function cli_abrirModalNuevo(){
            $("#cli_formCliente")[0].reset();
            $("#cli_idCliente").val("");
            $("#cli_tituloModalCliente").text("Nuevo Cliente");
            cli_cargarLocalidades();
            $("#cli_modalCliente").modal("show");
        }

        function cli_cargarParaEditar(btn){
            const data = $(btn).data();

            $("#cli_idCliente").val(data.id);
            $("#cli_nombreCliente").val(data.nombre);
            $("#cli_dniCliente").val(data.dni);
            $("#cli_telefono1").val(data.tel1);
            $("#cli_telefono2").val(data.tel2);

            cli_cargarLocalidades(data.cp);

            $("#cli_tituloModalCliente").text("Editar Cliente");
            $("#cli_modalCliente").modal("show");
        }

        /* ===============================
        GUARDAR
        =============================== */
        function cli_guardarCliente(){

            const id   = $("#cli_idCliente").val().trim();
            const nombre = $("#cli_nombreCliente").val().trim();
            const dni  = $("#cli_dniCliente").val().trim();
            const tel1 = $("#cli_telefono1").val().trim();
            const tel2 = $("#cli_telefono2").val().trim();
            const cp   = $("#cli_selectLocalidad").val();

            cli_limpiarErrores();

            if(nombre === ""){
                cli_errorNombre("El nombre es obligatorio");
                return;
            }

            if(cp === ""){
                cli_errorLocalidad("Seleccione una localidad");
                return;
            }

            const datos = new FormData();

            datos.append("accion", id ? "editar" : "crear");
            if(id) datos.append("idCliente", id);

            datos.append("nombre", nombre);
            datos.append("dni", dni);
            datos.append("telefono1", tel1);
            datos.append("telefono2", tel2);
            datos.append("cp", cp);

            $.ajax({
                url: "ajax/clientes.ajax.php",
                method: "POST",
                data: datos,
                cache:false,
                contentType:false,
                processData:false,
                success: function(res){
                    if(res === "ok"){
                        $("#cli_modalCliente").modal("hide");
                        cli_tabla.ajax.reload(null,false);
                        toastr.success("Cliente guardado correctamente");
                    }else if(res === "duplicado"){
                        cli_errorNombre("Ya existe un cliente con ese nombre");
                    }else if(res === "sin_cambios"){
                        toastr.info("No se realizaron cambios");
                    }else{
                        toastr.error("Error al guardar el cliente");
                    }
                }
            });
        }

        /* ===============================
        LOCALIDADES
        =============================== */
        function cli_cargarLocalidades(selected = null){

            const datos = new FormData();
            datos.append("accion","listar");

            $.ajax({
                url:"ajax/localidades.ajax.php",
                method:"POST",
                data:datos,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success:function(res){
                    let opciones = '<option value="">Seleccione...</option>';
                    res.forEach(loc=>{
                        opciones += `<option value="${loc.cp}">${loc.localidad}</option>`;
                    });
                    $("#cli_selectLocalidad").html(opciones);
                    if(selected) $("#cli_selectLocalidad").val(selected);
                }
            });
        }

        /* ===============================
        ERRORES
        =============================== */
        function cli_errorNombre(msg){
            $("#cli_nombreCliente").addClass("is-invalid");
            $("#cli_errorNombreCliente").text(msg).show();
        }

        function cli_errorLocalidad(msg){
            $("#cli_selectLocalidad").addClass("is-invalid");
            $("#cli_errorLocalidad").text(msg).show();
        }

        function cli_limpiarErrores(){
            $("#cli_nombreCliente").removeClass("is-invalid");
            $("#cli_errorNombreCliente").hide();
            cli_limpiarErrorLocalidad();
        }

        function cli_limpiarErrorLocalidad(){
            $("#cli_selectLocalidad").removeClass("is-invalid");
            $("#cli_errorLocalidad").hide();
        }

        /* ===============================
        API PUBLICA
        =============================== */
        return { init };

    })();

    /* ===============================
    INICIALIZAR MODULO
    =============================== */
    $(document).ready(function(){
        ModClientes.init();
    });
</script>
