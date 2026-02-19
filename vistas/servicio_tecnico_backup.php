 <!-- Encabezado del Contenedor (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0 d-inline-flex align-items-center gap-2">Servivio Tecnico
                    <!-- ventana ? de ayuda a estado OT -->
                    <span 
                        data-bs-toggle="tooltip"
                        data-bs-html="true"
                        title="
                        <div class='text-start'>
                            <div><span class='badge bg-warning text-dark'>●</span> Ingresado</div>
                            <div><span class='badge bg-info text-dark'>●</span> Reparado</div>
                            <div><span class='badge bg-success'>●</span> Entregado</div>
                        </div>
                        "
                        style="cursor:pointer;"
                    >
                        <i class="fas fa-question-circle fs-5 text-secondary"></i>
                    </span>
                 </h1>
             </div><!-- /.col -->
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                     <li class="breadcrumb-item active">Servicio Tecnico</li>
                 </ol>
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content (contenedor principal) -->
<div class="content">
    <div class="container-fluid">
        <!-- row para criterio de busqueda -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">CRITERIOS DE BÚSQUEDA</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool text-warning" id="btnLimpiarBusqueda">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div> <!-- ./ end card-tools -->
                    </div> <!-- ./ end card-header -->
                    <div class="card-body">

                        <div class="row">

                                <div class="col-12 col-lg-2 mb-2">
                                    <label class="mb-0 ml-1 text-sm my-text-color"><i class="fas fa-barcode mr-1 my-text-color"></i>Nro. Orden de Trabajo</label>
                                    <input data-index="1" type="number" style="border-radius: 20px;" class="form-control form-control-sm" id="id_ot_busqueda" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="col-12 col-lg-2 mb-2">
                                    <label class="mb-0 ml-1 text-sm my-text-color"><i class="fas fa-layer-group mr-1 my-text-color"></i> Marca del Equipo</label>
                                    <select data-index="7" class="form-select" id="id_marca_busqueda" aria-label="Floating label select example" required>
                                    </select>
                                </div>

                                <div class="col-12 col-lg-2 mb-2">
                                    <label class="mb-0 ml-1 text-sm my-text-color"><i class="fas fa-layer-group mr-1 my-text-color"></i> Modelo del Equipo</label>
                                    <input data-index="9" type="text" style="border-radius: 20px;" class="form-control form-control-sm" id="id_modelo_busqueda" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="col-12 col-lg-2 mb-2">
                                    <label class="mb-0 ml-1 text-sm my-text-color"><i class="fas fa-gifts mr-1 my-text-color"></i>Nombre Cliente</label>
                                    <input data-index="4" type="text" style="border-radius: 20px;" class="form-control form-control-sm" id="id_nombrecliente_busqueda" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="col-12 col-lg-2 mb-2">
                                    <label class="mb-0 ml-1 text-sm my-text-color"><i class="fas fa-dollar-sign mr-1 my-text-color"></i> Fecha Ingreso Desde</label>
                                    <input  type="date" style="border-radius: 20px;" class="form-control form-control-sm" id="inputFechaIngresoDesde" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="col-12 col-lg-2 mb-2">
                                    <label class="mb-0 ml-1 text-sm my-text-color"><i class="fas fa-dollar-sign mr-1 my-text-color"></i> Fecha Ingreso Hasta</label>
                                    <input  type="date" style="border-radius: 20px;" class="form-control form-control-sm" id="inputFechaIngresoHasta" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>

                            </div>

                    </div> <!-- ./ end card-body -->
                </div>
            </div>
        </div><!-- fin primer row-->

        <!-- row para tabla -->
        <div class="row">
            <div class="col-lg-12">

                <table id="tbl_serviciotecnico" class="table w_100 shadow">
                    <thead class="bg-info">
                        <tr>
                            <th></th> <!-- espacio necesario para el primer icono cuando se hace responsivo -->
                            <th>O. Trabajo</th>
                            <th>F. Ingreso</th>
                            <th>Id Cli.</th>
                            <th white-space: nowrap >Nombre Cli.</th>
                            <th>Contacto</th>
                            <th>Id Marca</th>
                            <th>Marca</th>
                            <th>Id Modelo</th>
                            <th>Modelo</th>
                            <th>Id Tecnico</th>
                            <th>Tecnico/s</th>
                            <th>Falla </th>
                            <th>Observaciones</th>
                            <th>Presup.</th>
                            <th>F. Cierre</th>
                            <th>F. Entrega</th>
                            <th class="text-center">Opciones</th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div><!-- fin segundo  row-->

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


<!-- =============================================================================================================================
VENTANA MODAL PARA REGISTRAR O ACTUALIZAR UNA ORDEN DE TRABAJO
===============================================================================================================================-->
<div class="modal fade" id="mdlGestionarOT" role="dialog">

    <div class="modal-dialog modal-lg" role="document">

        <!-- contenido del modal -->
        <div class="modal-content">

            <!-- cabecera del modal -->
            <div class="modal-header bg-gray py-1">

                <h5 class="modal-title" id="tituloModalOT">Agregar Servicio</h5>

                <button type="button" class="btn  text-white border-0 fs-5" id="btnCerrarModal">
                    <i class="far fa-times-circle"></i>
                </button>

            </div>

            <!-- cuerpo del modal -->
            <div class="modal-body">
                <!--  funcion de boostrap para carteles de requerido (class="invalid-feedback") --> 
                <form id="frm-datos-OT" class="needs-validation" novalidate> 

                    <!-- Abrimos una fila -->
                    <div class="row">

                        <input type="hidden" name="impuesto_producto" id="impuesto_producto">

                        <!-- Nro. Orden de Trabajo -->
                        <div class="col-12 col-lg-6">

                            <div class="form-floating mb-2">  

                                <input type="text" class="form-control text-uppercase" id="modal_OT" name="modal_OT" readonly>
                                <label for="modal_OT">Nro. Orden de Trabajo </label>
                            
                            </div>

                        </div>
                        
                        <!-- Fecha Ingreso -->
                        <div class="col-12 col-lg-6">

                            <div class="form-floating mb-2">
                           
                                <input type="date" class="form-control" id="modal_fechaingreso" name="modal_fechaingreso" readonly required>
                                <label for="modal_fechaingreso">Fecha Ingreso </label>
                                <div class="invalid-feedback">Seleccione fecha se ingreso</div>

                            </div>

                        </div>

                        <!-- Marcas -->
                         
                        <div class="col-12 col-lg-4">

                            <div class="mb-2">
                                <label for="modal_marca" class="form-label">Marca</label>
                                <select class="form-select select2" id="modal_marca" name="modal_marca" required>
                                    <option value="">Seleccione marca</option>
                                </select>
                                <div class="invalid-feedback">Seleccione la marca</div>
                            </div>

                        </div>

                        <!-- Modelo -->
                        <div class="col-12 col-lg-4">
                            <div class="mb-2">
                                <label for="modal_modelo" class="form-label">Modelo</label>
                                <select class="form-select" id="modal_modelo" name="modal_modelo" disabled>
                                    <option value="">Seleccione modelo</option>
                                </select>
                                <div class="invalid-feedback">Seleccione el modelo</div>
                            </div>
                        </div>

                        <!-- Tecnicos -->
                        <div class="col-12 col-lg-4">
                            <div class="mb-2">
                                <label for="modal_nombretecnico" class="form-label">Técnico</label>
                                <select class="form-select" id="modal_nombretecnico" name="modal_nombretecnico" required>
                                    <option value="">Seleccione técnico</option>
                                </select>
                                <div class="invalid-feedback">Seleccione técnico válido</div>
                            </div>
                        </div>

                        <!-- Nombre Cliente-->
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                                                
                                <input type="hidden" id="modal_idcliente" name="modal_idcliente"> <!-- Guarda idcliente de manera hiddem (oculta) para poder trar el nombre correspondiente de BD-->
                                <input type="text" class="form-control text-uppercase" id="modal_nombrecliente">
                                <div id="lista_clientes" class="list-group position-absolute w-100"></div>                              

                                <label for="modal_nombrecliente">Nombre Cliente</label>

                                <div class="invalid-feedback">Seleccione un cliente válido de la lista</div>

                            </div>
                        </div>

                        <!-- Falla -->
                        <div class="col-12">

                            <div class="form-floating mb-2">

                                <input type="text" class="form-control text-uppercase" id="modal_falla" name="modal_falla" required>
                                <label for="modal_falla">Falla</label>

                                <div class="invalid-feedback">Ingrese descripción de la falla</div>

                            </div>

                        </div>

                        <!-- Observaciones -->
                        <div class="col-12">

                            <div class="form-floating mb-2">

                                <input type="text" class="form-control text-uppercase" id="modal_observaciones" name="modal_observaciones" required>
                                <label for="modal_observaciones">Observaciónes</label>                                

                            </div>

                        </div>

                        <!-- Presupuesto -->
                        <div class="col-12">

                            <div class="form-floating mb-2">

                                <input type="number" class="form-control" id="modal_presupuesto" name="modal_presupuesto" min="0" step="0.01" placeholder="0.00" required>
                                <label for="modal_presupuesto">Presupuesto</label>
                                <div class="invalid-feedback">Ingrese Presupuesto</div>

                            </div>

                        </div>

                        <!-- Fecha Cierre -->
                        <div class="col-12 col-lg-6">

                            <div class="form-floating mb-2">

                           
                                <input type="date" class="form-control" id="modal_fechacierre" name="modal_fechacierre" disabled>
                                <label for="modal_fechacierre">Fecha Cierre </label>
                            

                            </div>

                        </div>

                        <!-- Fecha Entrega -->
                        <div class="col-12 col-lg-6">

                            <div class="form-floating mb-2">

                           
                                <input type="date" class="form-control" id="modal_fechaentrega" name="modal_fechaentrega" disabled>
                                <label for="modal_fechaentrega">Fecha Entrega </label>
                            

                            </div>

                        </div>

                        

                            

                        <!-- BOTONERA -->
                        <div class="col-12 text-right">
                            
                            <a class="btn btn-danger  fw-bold " id="btnCancelarRegistro" style="position: relative; width: 160px;">
                                <span class="text-button">CANCELAR</span>
                                <span class="btn fw-bold icon-btn-danger ">
                                    <i class="fas fa-times fs-5 text-white m-0 p-0"></i>
                                </span>
                            </a>

                            <a class="btn btn-success  fw-bold " id="btnGuardarServicioTecnico" style="position: relative; width: 160px;">
                                <span class="text-button">GUARDAR</span>
                                <span class="btn fw-bold icon-btn-success ">
                                    <i class="fas fa-save fs-5 text-white m-0 p-0"></i>
                                </span>
                            </a>
                        </div>

                    </div>

                </form>

            </div>

        </div>
    </div>


</div>
<!-- /. End Modal--> 

<script>
    var accion;

    var selectedClienteIndex = -1; // Variable glabal utilizada principalemtne para el js de flechita y enter del listado de clientes en modal


    // corrije formato de datatable a dd/mm/yyyy solo en lo visual x detras se maneja en formato viejo para no romper buscador
    function formatearFechaDMY(fecha) {

        if (!fecha || fecha === "0000-00-00") {
            return "";
        }

        let partes = fecha.split("-");
        return `${partes[2]}/${partes[1]}/${partes[0]}`;
    }

    
    // cargar listado en tabla con el plugin datatable js (tabla principal OT)
    function fnc_cargar_tbl_serviciotecnico(){
        // 🔴 Si la tabla ya fue inicializada, destruirla antes de crearla nuevamente
        if ($.fn.DataTable.isDataTable('#tbl_serviciotecnico')) {
            $('#tbl_serviciotecnico').DataTable().destroy();
            //$('#tbl_serviciotecnico').empty();
        }

        // 🔹 variable LOCAL → evita conflictos globales
        const table = $("#tbl_serviciotecnico").DataTable({

            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Agregar Servicio',
                    className: 'addNewRecord',
                    action:function(e, dt, node, config){
                        // evento para levantar la ventana modal
                        $("#mdlGestionarOT").modal('show');
                        $("#tituloModalOT").text("Nueva Orden de Trabajo");
                        $("#btnGuardarServicioTecnico .text-button").text("GUARDAR");

                        accion = 2; // accion 2 = a registrar
                        fnc_cargarSelectMarcaModal();
                        fnc_cargarSelectTecnicoModal();
                    }
                },
                'excel', 'print', 'pageLength'
            ],
            pageLength: [5, 10, 15, 30, 50, 100],
            pageLength: 10,

            ajax:{
            url: "ajax/servicio_tecnico.ajax.php",
            dataSrc: '',
            type: "POST",
            data: {'accion' : 1}, // 1 : ejecuta IF = 1 de ajax
            },
            responsive: 
            {
                details: {
                    type: 'column'
                }
            },
            // cambia fila segun fecha -> indica estado 
            // table-warning → amarillito (ingresado)
            // table-info → celeste (cerrado)
            // table-success → verde (entregado)
            rowCallback: function(row, data) {

                let fechaCierre   = data[15];
                let fechaEntrega  = data[16];

                // Limpia clases previas (importantísimo)
                $(row).removeClass('table-warning table-success table-info');

                // OT Ingresada (solo fecha ingreso)
                if (!fechaCierre) {
                    $(row).addClass('table-warning');
                }

                // Cerrada pero no entregada (fecha ingreso + fecha cierre )
                else if (fechaCierre && !fechaEntrega) {
                    $(row).addClass('table-info');
                }

                // Entregada (todas las fechas)
                else if (fechaCierre && fechaEntrega) {
                    $(row).addClass('table-success');
                }
            },

            columnDefs:
            [{// utiliza la columna 0 para poner un + cuando se achica
                    targets: 0,
                    orderable: false,
                    className: 'control'
                },
                {
                    targets: [3, 6, 8, 10], // oculta dichas columnas
                    visible:false
                },
                { // Marca las columnas a las q hay q formatear la fecha y ejecuta funcion
                    targets: [2, 15, 16],
                    render: function (data, type, row) {

                        // Solo formatear cuando se muestra
                        if (type === "display" || type === "filter") {
                            return formatearFechaDMY(data);
                        }

                        // Para ordenamientos y otros usos, devolver crudo
                        return data;
                    }
                },

                /*{ // pinta fila segun gecha (no salio muy bien)
                    targets: 16, // define q cuando la columna 16 no tenga valor pinte del color la fila
                    createdCell: function(td, cellData, rowData, row, col) {
                        if (rowData[16] == undefined ) {
                            $(td).parent().css('background', '#F2D7D5')
                            $(td).parent().css('color', 'black')
                        }
                    }
                },
                */
                {
                    targets: 17, // Columna opciones
                    orderable: false,
                    render: function(datqa, type, full, meta) {
                        return "<center>" +
                                    "<span class='btnEditarServicioTecnico text-primary px-1' style='cursor:pointer;'>" +
                                        "<i class='fas fa-pencil-alt fs-5'></i>" +
                                    "</span>" +
                                    //"<span class='btnEliminarServicioTecnico text-danger px-1' style='cursor:pointer;'>" +
                                    //    "<i class='fas fa-trash fs-5'></i>" +
                                    //"</span>" +
                                "<center>"
                    }
                }
            ],
            language: 
            {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }

        
        });
    }

    // evento click de editar para pasar idOT y luego update
    $(document).on("click", ".btnEditarServicioTecnico", function(){

        let fila = $(this).closest("tr");

        // obtiene el valor de la fila en la q esta
        if (fila.hasClass("child")) {
            fila = fila.prev();
        }

        let data = table.row(fila).data();
        let idOT = data[1]; //  se utiliza la columna 1 xq la 0 es una columna vacia q pide el datatable
        console.log("ID OT seleccionado:", idOT);

        accion = 3;

        let datos = new FormData();
        datos.append("accion", accion);
        datos.append("idOT", idOT);

        $.ajax({
            url: "ajax/servicio_tecnico.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta){
                console.log("OT obtenida:", respuesta);
                accion = 4; // UPDATE

                //cambia titulo y boton de modal (para mas facha)
                $("#tituloModalOT").text("Editar Orden de Trabajo");
                $("#btnGuardarServicioTecnico .text-button").text("ACTUALIZAR");

                // muestro modal
                $("#mdlGestionarOT").modal("show");

                //cargo datos simples
                $("#modal_OT").val(respuesta.idOT).prop("disabled", true);
                $("#modal_fechaingreso").val(respuesta.fechaIngreso).prop("disabled", true);
                $("#modal_falla").val(respuesta.falla);
                $("#modal_observaciones").val(respuesta.observaciones);
                $("#modal_presupuesto").val(respuesta.presupuesto);
                
                // cargo input del listado + cambia estado del bloqueo
                $("#modal_idcliente").val(respuesta.idCliente);
                $("#modal_nombrecliente").val(respuesta.cliente).removeClass("is-invalid").addClass("is-valid");
                
                //muestra tecnico (el selec trae el id pero la funciona trae todo, se reutiliza)
                fnc_cargarSelectTecnicoModal();
                setTimeout(() => {
                    $("#modal_nombretecnico").val(respuesta.idTecnico).prop("disabled", false).addClass("is-valid");
                }, 300);
                
                //marca + modelo, dependiendo el modelo de la marca
                // carga marca -> selecciona marca -> carga modelo -> selecciona modelo
                fnc_cargarSelectMarcaModal();
                setTimeout(() => {

                    // Marca
                    $("#modal_marca").val(respuesta.idMarca).prop("disabled", true).addClass("is-valid");

                    // Habilitamos modelo
                    $("#modal_modelo").prop("disabled", false);

                    let datos = new FormData();
                    datos.append("idMarca", respuesta.idMarca);

                    $.ajax({
                        url: "ajax/modelos.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(modelos){

                            $("#modal_modelo").empty()
                                .append('<option value="">Seleccione modelo</option>');

                            modelos.forEach(m => {
                                $("#modal_modelo").append(
                                    `<option value="${m[0]}">${m[1]}</option>`
                                );
                            });

                            $("#modal_modelo")
                                .val(respuesta.idModelo)
                                .addClass("is-valid");
                        }
                    });

                }, 300);

                //fechas (?? "" funciona como una especie di if null entonces "" (vacio(q no es null)))
                $("#modal_fechacierre").val(respuesta.fechaCierre ?? "").prop("disabled", false);
                $("#modal_fechaentrega").val(respuesta.fechaEntrega ?? "").prop("disabled", false);
                
                //limpio validaciones viejas
                $(".needs-validation").removeClass("was-validated");
            
            }
        });
    });

    //funcion congruencia fechas
    function validarSecuenciaFechas(fechaIngreso, fechaCierre, fechaEntrega){

        if(!fechaIngreso){
            alert("Debe existir una fecha de ingreso");
            return false;
        }

        let fIngreso  = new Date(fechaIngreso);
        let fCierre   = fechaCierre ? new Date(fechaCierre) : null;
        let fEntrega  = fechaEntrega ? new Date(fechaEntrega) : null;

        //  Entrega sin cierre
        if(fEntrega && !fCierre){
            alert("No se puede asignar fecha de entrega sin fecha de cierre");
            return false;
        }

        //  Cierre menor que ingreso
        if(fCierre && fCierre < fIngreso){
            alert("La fecha de cierre no puede ser menor que la fecha de ingreso");
            return false;
        }

        //  Entrega menor que cierre
        if(fEntrega && fEntrega < fCierre){
            alert("La fecha de entrega no puede ser menor que la fecha de cierre");
            return false;
        }

        return true; // todo OK
    }

    
    // Cargar select Marca del buscador
    function fnc_cargarSelectMarcaBuscaqueda(){
          
        $.ajax({
            url: "ajax/marcas.ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {

                var options = '<option selected value="">Seleccione una marca</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][1] + '>' + respuesta[index][1] + '</option>';
                }

               
                $("#id_marca_busqueda").append(options);
                
            }
        });
    
    }

    // hace funcionar el ? de alado del titulo (guia de estado)
    $(document).ready(function () {

        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');

        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl, {
                html: true,
                placement: 'right'
            });
        });

    });



    //INICIALIZAMOS EL MENSAJE DE TIPO TOAST (EMERGENTE EN LA PARTE SUPERIOR)
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });
    
       
    //Al abrir modal se ejecuta + fecha hoy en alta
    $("#mdlGestionarOT").on("shown.bs.modal", function () {
        if (accion === 2) { // solo carga la fecha de hoy en modal si es un ingreso, no si es update
            fnc_cargarFechaIngresoHoy();
        }
    });


    //cargar fecha actual automáticamente
    function fnc_cargarFechaIngresoHoy() {

        const hoy = new Date();

        const yyyy = hoy.getFullYear();
        const mm = String(hoy.getMonth() + 1).padStart(2, '0');
        const dd = String(hoy.getDate()).padStart(2, '0');

        const fechaHoy = `${yyyy}-${mm}-${dd}`;

        $("#modal_fechaingreso").val(fechaHoy);
    }

    
    // Cargar select marca
    function fnc_cargarSelectMarcaModal(){
            
        $.ajax({
            url: "ajax/marcas.ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {

                // Limpiamos antes de cargar (evitar duplicados)
                $("#modal_marca").empty();

                //Opción inicial
                var options = '<option value="">Seleccione marca</option>';

                // Cargamos marcas
                for (var index = 0; index < respuesta.length; index++) {

                    options +=
                        '<option value="' + respuesta[index][0] + '">' + respuesta[index][1] + '</option>';
                }

                /*
                    Texto visible  → respuesta[index][1] (nombre marca)
                    Valor enviado  → respuesta[index][0] (ID marca)
                */

                // Insertamos opciones
                $("#modal_marca").append(options);

                // Al cargar marcas, modelo debe quedar bloqueado
                bloquearModelo();
            }
        });
    }

    // bloquea modelo hasta elejir marca
    function bloquearModelo() {
        $("#modal_modelo").empty();
        $("#modal_modelo").append('<option value="">Seleccione modelo</option>');
        $("#modal_modelo").prop("disabled", true);
        $("#modal_modelo").removeClass("is-valid is-invalid");
        console.log("Input modelos bloqueado");
    }

    // validacion marca
    function validarMarca() {

        const marca = $("#modal_marca");

        // Si no hay marca seleccionada, return
        if (marca.val() === "") {
            marca.addClass("is-invalid").removeClass("is-valid");
            console.log("Marca vacía, modelos bloqueados");
            bloquearModelo();
            return false;
        }

        marca.removeClass("is-invalid").addClass("is-valid");
        console.log("Marca válida seleccionada:", marca);
        return true;
    }

    // disparador validador marca + habilita modelo + carga celec modelos 
    $("#modal_marca").on("change", function () {

        //limpiamos y bloqueamos modelos al cambiar marca
        bloquearModelo();

        if (!validarMarca()) { //Si la marca NO es válida, corto la ejecución
            return;
        }

        var idMarca = $(this).val();
        console.log("Inicio validación idMarca:", idMarca);

        var datos = new FormData();
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

                if (!respuesta || respuesta.length === 0) { //Si no hay respuesta O la respuesta está vacía

                    Toast.fire({
                    icon: 'warning',
                    title: 'La marca seleccionada no tiene modelos cargados'
                    });
                    console.log("La marca NO tiene modelos cargados");
                    // Se mantiene bloqueado modelos
                    return;
                }

                // Si hay modelos → habilitamos
                $("#modal_modelo").prop("disabled", false);

                for (var i = 0; i < respuesta.length; i++) {
                    $("#modal_modelo").append(
                        '<option value="' + respuesta[i][0] + '">' + respuesta[i][1] + '</option>'
                    );
                }

                console.log("Modelos cargados para marca", idMarca);
            }
        });
    });

    //validar modelos
    function validarModelo() {

        var idModelo = $("#modal_modelo").val();

        if (idModelo === "" || $("#modal_modelo").prop("disabled")) {
            $("#modal_modelo").removeClass("is-valid")
            $("#modal_modelo").addClass("is-invalid");
            console.log("modelo NO pasa validacion",);

            return false;
        }

        $("#modal_modelo").removeClass("is-invalid")
        $("#modal_modelo").addClass("is-valid");
        console.log("modelo SI pasa validacion",);

        return true;
    }

    //disparador validador modelos modal
    $("#modal_modelo").on("change", function () {
        validarModelo();
    });
    

    // Cargar input select tecnicos
    function fnc_cargarSelectTecnicoModal(){
          
        $.ajax({
            url: "ajax/tecnicos.ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {

                // LIMPIA el select antes de cargar ya q sino vuelve a cargarlo cada vez q se abre el modal
                $("#modal_nombretecnico").empty();

                var options = '<option selected value="">Seleccione tecnico</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';
                }

                $("#modal_nombretecnico").append(options);  
                console.log(respuesta);      // borrar prueba para ver q responde el ajax       
                        
            }
        });      
    }
    //validar input tecnicos
    function validarTecnico() {

        const tecnico = $("#modal_nombretecnico");

        if (tecnico.val() === "") {
            tecnico.addClass("is-invalid").removeClass("is-valid");
            return false;
        }

        tecnico.removeClass("is-invalid").addClass("is-valid");
        return true;
    }
    //disparador validador tecnico
    $("#modal_nombretecnico").on("change", function () {
        validarTecnico();
    });


    // Evento para criterio de busqueda 
    $("#id_ot_busqueda").keyup(function(){
        $("#tbl_serviciotecnico").DataTable().column($(this).data('index')).search(this.value).draw();
        
    })

    $("#id_marca_busqueda").change(function() {

        if (this.value != 0) {
            $('#tbl_serviciotecnico').DataTable().column($(this).data('index')).search('^' + this.value + '$', true, false).draw();
        } else {
            $('#tbl_serviciotecnico').DataTable().column($(this).data('index')).search("").draw();
        }
    })

    $("#id_modelo_busqueda").keyup(function(){
        $("#tbl_serviciotecnico").DataTable().column($(this).data('index')).search(this.value).draw();
        
    })

    $("#id_nombrecliente_busqueda").keyup(function(){
        $("#tbl_serviciotecnico").DataTable().column($(this).data('index')).search(this.value).draw();
        
    })

    // BUSQUEDA POR RANGO DE FECHA    
    $("#inputFechaIngresoDesde, #inputFechaIngresoHasta").change(function () {
        table.draw();
    });

    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {

            let dateIni = $('#inputFechaIngresoDesde').val();
            let dateFin = $('#inputFechaIngresoHasta').val();

            let indexCol = 2; // fecha ingreso

            if (dateIni) dateIni = dateIni.replace(/-/g, "");
            if (dateFin) dateFin = dateFin.replace(/-/g, "");

            let dateCol = data[indexCol];

            if (!dateCol) return true;

            // DD/MM/YYYY → YYYYMMDD
            dateCol = dateCol.split("/").reverse().join("");

            if (!dateIni && !dateFin) return true;
            if (!dateIni) return dateCol <= dateFin;
            if (!dateFin) return dateCol >= dateIni;

            return dateCol >= dateIni && dateCol <= dateFin;
        }
    );

    // Boton limpieza buscador
    $("#btnLimpiarBusqueda").on('click', function() {

        $("#id_ot_busqueda").val('');
        $("#id_marca_busqueda").val('')
        $("#id_modelo_busqueda").val('');
        $("#id_nombrecliente_busqueda").val('');
        $("#inputFechaIngresoDesde").val('');
        $("#inputFechaIngresoHasta").val('');

        $("#tbl_serviciotecnico").DataTable().search('').columns().search('').draw();
    })


    // lista clientes segun nombre buscado + ignora flechita y enter + declara invalida x defecto)
    $("#modal_nombrecliente").on("keyup", function (e) {

        // Ignoramos flechas y enter
        if (["ArrowDown", "ArrowUp", "Enter"].includes(e.key)) {
            return;
        }

        clienteInvalido(); // ← CLAVE: escribir invalida el ID

        let termino = $(this).val();
        selectedClienteIndex = -1;

        if (termino.length < 2) {
            $("#lista_clientes").empty();
            return;
        }

        $.ajax({
            url: "ajax/clientes.ajax.php",
            type: "POST",
            data: {
                accion: 1,
                termino: termino
            },
            dataType: "json",
            success: function (respuesta) {

                let html = "";

                respuesta.forEach((cliente, index) => {
                    html += `
                        <a href="#"
                        class="list-group-item list-group-item-action"
                        data-id="${cliente.idCliente}"
                        data-index="${index}">
                        ${cliente.nombre}
                        </a>
                    `;
                });

                $("#lista_clientes").html(html);
            }
        });
    });

    // navega en listado con flechitas + acepta con enter + pinta seleccionado
    $("#modal_nombrecliente").on("keydown", function (e) {

        let items = $("#lista_clientes a");

        if (!items.length) return;

        if (e.key === "ArrowDown") {
            e.preventDefault();
            selectedClienteIndex = (selectedClienteIndex + 1) % items.length;
        }

        if (e.key === "ArrowUp") {
            e.preventDefault();
            selectedClienteIndex = (selectedClienteIndex - 1 + items.length) % items.length;
        }

        if (e.key === "Enter") {
            e.preventDefault();
            if (selectedClienteIndex >= 0) {
                $(items[selectedClienteIndex]).click();
            }
            return;
        }
        
        // Item activo se pinta (Bootstrap active)
        items.removeClass("active");

        if (selectedClienteIndex >= 0) {
            $(items[selectedClienteIndex]).addClass("active");
        }
    });

    // Carga de la lista de clientes al modal clientes
    $(document).on("click", "#lista_clientes a", function (e) {
        e.preventDefault();

        $("#modal_idcliente").val($(this).data("id"));
        $("#modal_nombrecliente").val($(this).text());

        clienteValido(); // cambia validacion a valido

        $("#lista_clientes").empty();
    });

    //cierra listado clientes al perder foco
    $("#modal_nombrecliente").on("blur", function () {
        setTimeout(function () { // se usa setTimeOut xq el evento blur se ejecuta antes que el click
            $("#lista_clientes").empty();
        }, 150);
    });

    // permite volver a cargar listado clientes si saliste del foco antes
    $("#modal_nombrecliente").on("focus", function () {
        $("#lista_clientes").empty();
    });

    // validacion de campos atravez de js (front)
    // se trabajaran los campos como valido o invalido dependiendo de las acciones consecuentes
    function clienteValido() {
        $("#modal_nombrecliente").removeClass("is-invalid")
        $("#modal_nombrecliente").addClass("is-valid");
    }
    function clienteInvalido() {
        $("#modal_nombrecliente").removeClass("is-valid")
        $("#modal_nombrecliente").addClass("is-invalid");
        $("#modal_idcliente").val("");
    }

    // validador de existencia de texto pensado para falla y observaciones
    function validarTexto(inputId) {

        var input = $("#" + inputId);
        var valor = input.val().trim();

        if (valor.length === 0) {
            input.addClass("is-invalid").removeClass("is-valid");
            return false;
        }

        input.addClass("is-valid").removeClass("is-invalid");
        return true;
    }

    // disparador validador de existencia texto falla y observaciones
    $("#modal_falla").on("blur", function () {
        validarTexto("modal_falla");
    });
    $("#modal_observaciones").on("blur", function () {
        validarTexto("modal_observaciones");
    });


    // validador campo presupuesto modal
    function validarPresupuesto() {

        var valor = $("#modal_presupuesto").val();

        if (valor === "" || parseFloat(valor) < 0) {
            $("#modal_presupuesto").addClass("is-invalid").removeClass("is-valid");
            return false;
        }

        $("#modal_presupuesto").addClass("is-valid").removeClass("is-invalid");
            return true;
    }

    //disparador validador presupuesto modal
    $("#modal_presupuesto").on("blur keyup", function () {
        validarPresupuesto();
    });


    //Edicion OT .btnEditarServicioTecnico
    $('#tbl_serviciotecnico tbody').on('click', '.btnEditarServicioTecnico', function(){
        fnc_actualizarServicioTecnicoModal()
    })

 
    /*===================================================================*/
    // R E G I S T R O   Y   A C T U A L I Z A C I O N   D E   OT        //
    /*===================================================================*/

    // EVENTO GUARDAR - VALIDACIONES + REGISTRO
    $("#btnGuardarServicioTecnico").on('click', function () {

        /* ========================= VALIDAR TÉCNICO ========================== */
        console.log("tecnico que se intento validar:", $("#modal_nombretecnico").val());

        if (!validarTecnico()) {
            Toast.fire({
                icon: "warning",
                title: "Debe seleccionar un técnico válido"
            });
            return;
        }

        /* ========================= VALIDAR CLIENTE ========================== */
        console.log("id cliente que se intento validar:", $("#modal_idcliente").val());

        if ($("#modal_idcliente").val() === "") {

            clienteInvalido();

            Toast.fire({
                icon: 'warning',
                title: 'Debe seleccionar un cliente válido'
            });

            return;
        }

        /* ========================= VALIDAR MARCA ========================== */
        console.log("id marca que se intento validar:", $("#modal_marca").val());

        if (!validarMarca()) {
            Toast.fire({
                icon: "warning",
                title: "Debe seleccionar una marca válida"
            });
            return;
        }

        /* ========================= VALIDAR MODELO ========================== */
        console.log("id modelo que se intento validar:", $("#modal_modelo").val());

        if (!validarModelo()) {
            Toast.fire({
                icon: "warning",
                title: "Debe seleccionar un modelo válido"
            });
            return;
        }

         /* ========================= VALIDAR FALLA ========================== */
        console.log("inicio validacion campo modal falla:", $("#modal_falla").val());

        if (!validarTexto("modal_falla")) {
            Toast.fire({
                icon: "warning",
                title: "El campo Falla no puede estar vacío"
            });
            return;
        }

        /* ========================= VALIDAR OBSERVACIONES ========================== */
        console.log("Inicio validacion campo modal observaciones:", $("#modal_observaciones").val());

        if (!validarTexto("modal_observaciones")) {
            Toast.fire({
                icon: "warning",
                title: "El campo Observaciones no puede estar vacío"
            });
            return;
        }


        /* ========================= VALIDAR PRESUPUESTO ========================== */
        console.log("Inicio validacoin campo modal presupuesto:", $("#modal_presupuesto").val());

        if (!validarPresupuesto()) {
            Toast.fire({
                icon: "warning",
                title: "El campo Presupuesto posee un valor incorrecto"
            });
            return;
        }

        /* ========================= VALIDAR CONGRUENCIAS DE FECHA (fechaIngreso ≤ fechaCierre ≤ fechaEntrega) ========================== */          
        let fechaIngreso  = $("#modal_fechaingreso").val();
        let fechaCierre   = $("#modal_fechacierre").val();
        let fechaEntrega  = $("#modal_fechaentrega").val();

        if(!validarSecuenciaFechas(fechaIngreso, fechaCierre, fechaEntrega)){
            return; // ⛔ corta el guardado
        }

        /* TODO OK -> REGISTRAR */
        fnc_registrarServicioTecnico();
    });

    function fnc_registrarServicioTecnico() {

        console.log("Validaciones superadas, listo para registrar OT");

        Swal.fire({
            title: '¿Está seguro de registrar Orden de Trabajo?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, continuar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {

            if (result.isConfirmed) {

                var datos = new FormData();

                datos.append("accion", accion);
                datos.append("idOT", $("#modal_OT").val());
                datos.append("fechaIngreso", $("#modal_fechaingreso").val());
                datos.append("idCliente", $("#modal_idcliente").val());
                datos.append("idTecnico", $("#modal_nombretecnico").val());
                datos.append("idModelo", $("#modal_modelo").val());
                datos.append("falla", $("#modal_falla").val());
                datos.append("observaciones", $("#modal_observaciones").val());
                datos.append("presupuesto", $("#modal_presupuesto").val());
                datos.append("fechaCierre", $("#modal_fechacierre").val());
                datos.append("fechaEntrega", $("#modal_fechaentrega").val());

                $.ajax({
                    url: "ajax/servicio_tecnico.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (respuesta) {

                        if (respuesta === "ok") {
                            Toast.fire({
                                icon: "success",
                                title: "Orden de Trabajo registrada correctamente"
                            });
                            fnc_cargar_tbl_serviciotecnico();
                            //table.ajax.reload();
                            fnc_limpiarFormularioModal();

                        } else {
                            Toast.fire({
                                icon: "error",
                                title: "No se pudo registrar la Orden de Trabajo"
                            });
                        }
                    }
                });
            }
        });
    }


    // Limpiar Imput y oculta Modal    
    $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() {
        fnc_limpiarFormularioModal();
    });

    function fnc_limpiarFormularioModal(){

        // Inputs
        $("#modal_OT").val("");
        //$("#modal_fechaingreso").val("");
        fnc_cargarFechaIngresoHoy();
        $("#modal_marca").val("");
        $("#modal_modelo").val("");
        $("#modal_nombretecnico").val("");
        $("#modal_idcliente").val("");
        $("#modal_nombrecliente").val("");
        $("#modal_falla").val("");
        $("#modal_observaciones").val("");
        $("#modal_presupuesto").val("");
        $("#modal_fechacierre").val("").prop("disabled", true);
        $("#modal_fechaentrega").val("").prop("disabled", true);

        // Quita validaciones Bootstrap
        $(".needs-validation").removeClass("was-validated");

        // Quita validaciones JS
        $("#modal_nombrecliente").removeClass("is-valid is-invalid");
        $("#modal_nombretecnico").removeClass("is-valid is-invalid");
        $("#modal_marca").removeClass("is-valid is-invalid");
        $("#modal_modelo").removeClass("is-valid is-invalid");
        $("#modal_presupuesto").removeClass("is-valid is-invalid");
        $("#modal_falla").removeClass("is-valid is-invalid");
        $("#modal_observaciones").removeClass("is-valid is-invalid");

        // Bloquea modelo (estado inicial)
        bloquearModelo();

        //declara accion a null para estar lista a cualquier accion
        accion = null;

        //vuelve a la normalidad titulo y boton modal
        $("#tituloModalOT").text("Nueva Orden de Trabajo");
        $("#btnGuardarServicioTecnico .text-button").text("GUARDAR");


        // Cierra modal
        $("#mdlGestionarOT").modal('hide');
    }

    // carga datatable al abrir, pero se deja al final xq requiere de otras funciones
    $(document).ready(function(){
        
      
        $.ajax({
            url: "ajax/servicio_tecnico.ajax.php",
            type: "POST",
            data: {'accion' : 1}, // 1 : ejecuta IF = 1 de ajax
            dataType: 'json',
            success:function(respuesta){
                console.log("respuesta",respuesta);
            }
        });

        //ejecuta funcion al iniicar
        fnc_cargarSelectMarcaBuscaqueda()
        fnc_cargar_tbl_serviciotecnico();
            
    });
    

 //tacho de basura (borrar cuando todo funcione)
     function funcionexperimental_registrarServicioTecnico(){

            var forms = document.getElementsByClassName('needs-validation');

            var validation = Array.prototype.filter.call(forms, function(form) {

                if (form.checkValidity() === true) {   

                    console.log("Validaciones superadas para proceder con el registro de Orden de Trabajo")

                    Swal.fire({
                        title: 'Está seguro de registrar Orden de Trabajo?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, continuar!',
                        cancelButtonText: 'Cancelar',
                    }).then((result) => {

                        if (result.isConfirmed) {

                            var datos = new FormData();    
                                                                
                            datos.append("accion", accion); 
                            datos.append("idOT", $("#modal_OT").val()); //idOT
                            datos.append("fechaIngreso", $("#modal_fechaingreso").val()); //fechaIngreso
                            datos.append("idCliente", $("#modal_idcliente").val()); //idCliente
                            datos.append("idTecnico", $("#modal_nombretecnico").val()); //idTecnico                           
                            datos.append("idModelo", $("#modal_modelo").val());//idModelo
                            // datos.append("", $("#modal_marca").val());
                            datos.append("falla", $("#modal_falla").val()); //falla
                            datos.append("observaciones", $("#modal_observaciones").val());  //observaciones
                            datos.append("presupuesto", $("#modal_presupuesto").val()); //presupuesto
                            datos.append("fechaCierre", $("#modal_fechacierre").val());  //fechaCierre
                            datos.append("fechaEntrega", $("#modal_fechaentrega").val());//fechaEntrega


                            if(accion == 2){
                                var titulo_msj = "El producto se registró correctamente"
                            }

                            if(accion == 4){
                                var titulo_msj = "El producto se actualizó correctamente"
                            }

                            $.ajax({
                                url: "ajax/servicio_tecnico.ajax.php",
                                method: "POST",
                                data: datos,
                                cache: false,
                                contentType: false,
                                processData: false,
                                dataType: 'json',
                                success: function(respuesta) {

                                    if (respuesta == "ok") {

                                        Toast.fire({
                                            icon: 'success',
                                            title: titulo_msj
                                        });

                                        table.ajax.reload();

                                        fnc_limpiarFormularioModal();

                                    } else {
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'El producto no se pudo registrar'
                                        });
                                    }

                                }
                            });

                        }
                    })
                }else {
                    console.log("No paso la validacion")
                }

                form.classList.add('was-validated');

            });
        

    }


</script>