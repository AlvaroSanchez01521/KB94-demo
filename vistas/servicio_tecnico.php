 <!-- Encabezado del Contenedor (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0 d-inline-flex align-items-center gap-2">
                    <!-- ventana ? de ayuda a estado OT -->
                    <span 
                        data-bs-toggle="tooltip"
                        data-bs-html="true"
                        title="
                        <div class='text-start'>
                            <div><span class='badge bg-warning text-dark'>●</span> Ingresado</div>
                            <div><span class='badge bg-info text-dark'>●</span> Cerrado</div>
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
                                <button type="button" class="btn btn-tool text-warning" id="st_btn_limpiar_busqueda">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div> <!-- ./ end card-tools -->
                    </div> <!-- ./ end card-header -->
                    <div class="card-body">

                        <div class="row">

                                <div class="col-12 col-lg-2 mb-2">
                                    <label class="mb-0 ml-1 text-sm my-text-color"><i class="fas fa-barcode mr-1 my-text-color"></i>Nro. Orden de Trabajo</label>
                                    <input data-index="1" type="number" style="border-radius: 20px;" class="form-control form-control-sm" id="st_busqueda_ot" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="col-12 col-lg-2 mb-2">
                                    <label class="mb-0 ml-1 text-sm my-text-color"><i class="fas fa-layer-group mr-1 my-text-color"></i> Marca del Equipo</label>
                                    <select data-index="7" class="form-select" id="st_busqueda_marca" aria-label="Floating label select example" required>
                                    </select>
                                </div>

                                <div class="col-12 col-lg-2 mb-2">
                                    <label class="mb-0 ml-1 text-sm my-text-color"><i class="fas fa-layer-group mr-1 my-text-color"></i> Modelo del Equipo</label>
                                    <input data-index="9" type="text" style="border-radius: 20px;" class="form-control form-control-sm" id="st_busqueda_modelo" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="col-12 col-lg-2 mb-2">
                                    <label class="mb-0 ml-1 text-sm my-text-color"><i class="fas fa-gifts mr-1 my-text-color"></i>Nombre Cliente</label>
                                    <input data-index="4" type="text" style="border-radius: 20px;" class="form-control form-control-sm" id="st_busqueda_cliente" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="col-12 col-lg-2 mb-2">
                                    <label class="mb-0 ml-1 text-sm my-text-color"><i class="fas fa-dollar-sign mr-1 my-text-color"></i> Fecha Ingreso Desde</label>
                                    <input  type="date" style="border-radius: 20px;" class="form-control form-control-sm" id="st_fecha_desde" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="col-12 col-lg-2 mb-2">
                                    <label class="mb-0 ml-1 text-sm my-text-color"><i class="fas fa-dollar-sign mr-1 my-text-color"></i> Fecha Ingreso Hasta</label>
                                    <input  type="date" style="border-radius: 20px;" class="form-control form-control-sm" id="st_fecha_hasta" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>

                            </div>

                    </div> <!-- ./ end card-body -->
                </div>
            </div>
        </div><!-- fin primer row-->

        <!-- row para tabla -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Agregamos 'responsive' y cambiamos 'w_100' por 'display' o 'w-100' de Bootstrap -->
                <table id="st_tabla_ot" class="table  display responsive nowrap shadow w-100">
                    <thead class="bg-info">
                        <tr>
                            <th style="width: 20px;"></th> <!-- [0] "+" -->
                            <th>O. Trabajo</th> <!-- [1] -->
                            <th>F. Ingreso</th> <!-- [2] -->
                            <th>Id Cli.</th> <!-- [3] -->
                            <th>Nombre Cli.</th> <!-- [4] -->
                            <th>Contacto</th> <!-- [5] -->
                            <th>Id Marca</th> <!-- [6] -->
                            <th>Marca</th> <!-- [7] -->
                            <th>Id Modelo</th> <!-- [8] -->
                            <th>Modelo</th> <!-- [9] -->
                            <th>Id Tecnico</th> <!-- [10] -->
                            <th>Tecnico/s</th> <!-- [11] -->
                            <th>Falla </th> <!-- [12] -->
                            <th>Observaciones</th> <!-- [13] -->
                            <th>Presup.</th> <!-- [14] -->
                            <th>F. Cierre</th> <!-- [15] -->
                            <th>F. Entrega</th> <!-- [16] -->
                            <th class="text-center">Opciones</th> <!-- [17] -->
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
<!-- fin segundo  row-->

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


<!-- =============================================================================================================================
VENTANA MODAL PARA REGISTRAR O ACTUALIZAR UNA ORDEN DE TRABAJO
===============================================================================================================================-->
<div class="modal fade" id="st_modal_ot" role="dialog">

    <div class="modal-dialog modal-lg" role="document">

        <!-- contenido del modal -->
        <div class="modal-content">

            <!-- cabecera del modal -->
            <div class="modal-header bg-gray py-1">

                <h5 class="modal-title" id="st_titulo_modal_ot">Agregar Servicio</h5>

                <button type="button" class="btn  text-white border-0 fs-5" id="st_btn_cerrar_modal">
                    <i class="far fa-times-circle"></i>
                </button>

            </div>

            <!-- cuerpo del modal -->
            <div class="modal-body">
                <!--  funcion de boostrap para carteles de requerido (class="invalid-feedback") --> 
                <form id="st_form_ot" class="needs-validation" novalidate> 

                    <!-- Abrimos una fila -->
                    <div class="row">

                        <input type="hidden" name="impuesto_producto" id="impuesto_producto">

                        <!-- Nro. Orden de Trabajo -->
                        <div class="col-12 col-lg-6">

                            <div class="form-floating mb-2">  

                                <input type="text" class="form-control text-uppercase" id="st_ot" name="st_ot" readonly>
                                <label for="st_ot">Nro. Orden de Trabajo </label>
                            
                            </div>

                        </div>
                        
                        <!-- Fecha Ingreso -->
                        <div class="col-12 col-lg-6">

                            <div class="form-floating mb-2">
                           
                                <input type="date" class="form-control" id="st_fecha_ingreso" name="st_fecha_ingreso" readonly required>
                                <label for="st_fecha_ingreso">Fecha Ingreso </label>
                                <div class="invalid-feedback">Seleccione fecha se ingreso</div>

                            </div>

                        </div>

                        <!-- Marcas -->
                         
                        <div class="col-12 col-lg-4">

                            <div class="mb-2">
                                <label for="st_marca" class="form-label">Marca</label>
                                <select class="form-select select2" id="st_marca" name="st_marca" required>
                                    <option value="">Seleccione marca</option>
                                </select>
                                <div class="invalid-feedback">Seleccione la marca</div>
                            </div>

                        </div>

                        <!-- Modelo -->
                        <div class="col-12 col-lg-4">
                            <div class="mb-2">
                                <label for="st_modelo" class="form-label">Modelo</label>
                                <select class="form-select" id="st_modelo" name="st_modelo" disabled>
                                    <option value="">Seleccione modelo</option>
                                </select>
                                <div class="invalid-feedback">Seleccione el modelo</div>
                            </div>
                        </div>

                        <!-- Tecnicos -->
                        <div class="col-12 col-lg-4">
                            <div class="mb-2">
                                <label for="st_tecnico" class="form-label">Técnico</label>
                                <select class="form-select" id="st_tecnico" name="st_tecnico" required>
                                    <option value="">Seleccione técnico</option>
                                </select>
                                <div class="invalid-feedback">Seleccione técnico válido</div>
                            </div>
                        </div>

                        <!-- Nombre Cliente-- Utiliza css en id=st_lista_clientes {-->
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                                                
                                <input type="hidden" id="st_id_cliente" name="st_id_cliente"> <!-- Guarda idcliente de manera hiddem (oculta) para poder trar el nombre correspondiente de BD-->
                                <input type="text" class="form-control text-uppercase" id="st_nombre_cliente">
                                <div id="st_lista_clientes" class="list-group position-absolute w-100"></div>                              

                                <label for="st_nombre_cliente">Nombre Cliente</label>

                                <div class="invalid-feedback">Seleccione un cliente válido de la lista</div>

                            </div>
                        </div>

                        <!-- Falla -->
                        <div class="col-12">

                            <div class="form-floating mb-2">

                                <input type="text" class="form-control text-uppercase" id="st_falla" name="st_falla" required>
                                <label for="st_falla">Falla</label>

                                <div class="invalid-feedback">Ingrese descripción de la falla</div>

                            </div>

                        </div>

                        <!-- Observaciones -->
                        <div class="col-12">

                            <div class="form-floating mb-2">

                                <input type="text" class="form-control text-uppercase" id="st_observaciones" name="st_observaciones" required>
                                <label for="st_observaciones">Observaciónes</label>                                

                            </div>

                        </div>

                        <!-- Presupuesto -->
                        <div class="col-12">

                            <div class="form-floating mb-2">

                                <input type="number" class="form-control" id="st_presupuesto" name="st_presupuesto" min="0" step="0.01" placeholder="0.00" required>
                                <label for="st_presupuesto">Presupuesto</label>
                                <div class="invalid-feedback">Ingrese Presupuesto</div>

                            </div>

                        </div>

                        <!-- Fecha Cierre -->
                        <div class="col-12 col-lg-6">

                            <div class="form-floating mb-2">

                           
                                <input type="date" class="form-control" id="st_fecha_cierre" name="st_fecha_cierre" disabled>
                                <label for="st_fecha_cierre">Fecha Cierre </label>
                            

                            </div>

                        </div>

                        <!-- Fecha Entrega -->
                        <div class="col-12 col-lg-6">

                            <div class="form-floating mb-2">

                           
                                <input type="date" class="form-control" id="st_fecha_entrega" name="st_fecha_entrega" disabled>
                                <label for="st_fecha_entrega">Fecha Entrega </label>
                            

                            </div>

                        </div>

                        

                            

                        <!-- BOTONERA -->
                        <div class="col-12 text-right">
                            
                            <a class="btn btn-danger  fw-bold " id="st_btn_cancelar" style="position: relative; width: 160px;">
                                <span class="text-button">CANCELAR</span>
                                <span class="btn fw-bold icon-btn-danger ">
                                    <i class="fas fa-times fs-5 text-white m-0 p-0"></i>
                                </span>
                            </a>

                            <a class="btn btn-success  fw-bold " id="st_btn_guardar" style="position: relative; width: 160px;">
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
<!-- /. End Modal OT--> 

<!-- =============================================================================================================================
VENTANA MODAL MINIMALISTA PARA "INFO PAGO" (carga datos de tabla movimientos diltrada por esta idOT)
===============================================================================================================================-->

<div class="modal fade" id="st_modalPagos" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-white">Historial de Pagos - OT #<span id="st_txtIdOTPagos"></span></h5>
        <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body p-0">
        <table class="table table-sm table-striped mb-0" id="st_tablaPagosOT">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Caja/Forma</th>
              <th>Monto</th>
            </tr>
          </thead>
          <tbody><!-- Dinámico --></tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<script>
        /* Indice
    1. VARIABLES GLOBALES
    2. TABLA PRINCIPAL
    3. MODAL OT
    4. DATOS RELACIONADOS
    ├── Clientes
    ├── Marca / Modelo
    └── Técnicos
    5. VALIDACIONES
    6. REGISTRO Y ACTUALIZACIÓN
        */

    /* ====================================
    1- VARIABLES GLOBALES
    ===================================== */
    // variable donde carga el DataTable (se usa constante dentro de la funcion xq crea conflicto con las demas DataTable)
    var st_table;
        
    //  Acción global del módulo (2=crear, 3=obtener, 4=actualizar)
    var accion ;

    //  Índice seleccionado en el autocomplete de clientes (uso con flechas ↑ ↓ y Enter)
    var selectedClienteIndex = -1; 

    /* ====================================
    2- TABLA Y PANEL PRINCIPAL 
    (Listado y filtros)
    Responsabilidad: mostrar OT, permitir búsquedas e inicializaciones
    ===================================== */

        //EVENTOS//

    // Evento q ejecuta al leer el .php
    $(document).ready(function () {
        fnc_cargar_tbl_serviciotecnico(); // tabla principal
        fnc_cargarSelectMarcaBuscada(); // select del buscador
        fnc_Tooltips(); // ayuda memoria ?
    }); 

    // hace funcionar el ? de alado del titulo (guia de estado)
    function fnc_Tooltips() {

        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');

        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl, {
                html: true,
                placement: 'right'
            });
        });

    }

    // evento click de editar para pasar idOT y luego update
    $(document).on("click", ".btnEditarServicioTecnico", function(){

        let fila = $(this).closest("tr");

        // obtiene el valor de la fila en la q esta
        if (fila.hasClass("child")) {
            fila = fila.prev();
        }

        let data = st_table.row(fila).data();
        let idOT = data[1]; // se utiliza la columna 1 xq la 0 es una columna vacia q pide el datatable
        console.log("ID OT seleccionado:", idOT); // DEBUG

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
                console.log("OT obtenida:", respuesta); // DEBUG
                accion = 4; // UPDATE

                // cambia titulo y boton de modal (para mas facha)
                $("#st_titulo_modal_ot").text("Editar Orden de Trabajo");
                $("#st_btn_guardar .text-button").text("ACTUALIZAR");

                // muestro modal
                $("#st_modal_ot").modal("show");

                // cargo datos simples
                $("#st_ot").val(respuesta.idOT).prop("disabled", true);
                $("#st_fecha_ingreso").val(respuesta.fechaIngreso).prop("disabled", true);
                $("#st_falla").val(respuesta.falla);
                $("#st_observaciones").val(respuesta.observaciones);
                $("#st_presupuesto").val(respuesta.presupuesto);
                
                // cargo input del listado + cambia estado del bloqueo
                $("#st_id_cliente").val(respuesta.idCliente);
                $("#st_nombre_cliente")
                    .val(respuesta.cliente)
                    .removeClass("is-invalid")
                    .addClass("is-valid");
                
                // muestra tecnico (el select trae el id pero la funcion trae todo, se reutiliza)
                fnc_cargarSelectTecnicoModal();
                setTimeout(() => {
                    $("#st_tecnico")
                        .val(respuesta.idTecnico)
                        .prop("disabled", false)
                        .addClass("is-valid");
                }, 300);
                
                // marca + modelo, dependiendo el modelo de la marca
                // carga marca -> selecciona marca -> carga modelo -> selecciona modelo
                fnc_cargarSelectMarcaModal();
                setTimeout(() => {

                    // Marca
                    $("#st_marca")
                        .val(respuesta.idMarca)
                        .prop("disabled", true)
                        .addClass("is-valid");

                    // Habilitamos modelo
                    $("#st_modelo").prop("disabled", false);

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

                            $("#st_modelo").empty()
                                .append('<option value="">Seleccione modelo</option>');

                            modelos.forEach(m => {
                                $("#st_modelo").append(
                                    `<option value="${m[0]}">${m[1]}</option>`
                                );
                            });

                            $("#st_modelo")
                                .val(respuesta.idModelo)
                                .addClass("is-valid");
                        }
                    });

                }, 300);

                // ?? "" → Si fecha viene null, se asigna string vacío para evitar errores en el input
                $("#st_fecha_cierre").val(respuesta.fechaCierre ?? "").prop("disabled", false);
                $("#st_fecha_entrega").val(respuesta.fechaEntrega ?? "").prop("disabled", false);
                
                // limpio validaciones viejas
                $(".needs-validation").removeClass("was-validated");
            }
        });
    });

    //Evento click imprimir comprobante OT
    $(document).on("click", ".st_btnImprimirOT", function() {
        const idOT = $(this).data("idot");
        
        // Abrimos una ventana nueva
        const url = "vistas/imprimir_ot.php?idOT=" + idOT;
        const nombreVentana = "Imprimir OT " + idOT;
        window.open(url, nombreVentana, "width=800,height=900");
    });

    // Evento para criterio de busqueda 
    $("#st_busqueda_ot").keyup(function(){
        st_table.column($(this).data('index')).search(this.value).draw();
    });
   
    $("#st_busqueda_marca").change(function() {

        if (this.value != 0) {
            $('#st_tabla_ot').DataTable().column($(this).data('index')).search('^' + this.value + '$', true, false).draw();
        } else {
            $('#st_tabla_ot').DataTable().column($(this).data('index')).search("").draw();
        }
    });

    $("#st_busqueda_modelo").keyup(function(){
        st_table.column($(this).data('index')).search(this.value).draw();
    });

    $("#st_busqueda_cliente").keyup(function(){
        st_table.column($(this).data('index')).search(this.value).draw();
    });

    // BUSQUEDA POR RANGO DE FECHA   $.fn.dataTable.ext.search.push( 
    $("#st_fecha_desde, #st_fecha_hasta").change(function () {
        if (st_table) st_table.draw(); // se asegura q la st_table este creada antes de ejecutar
    });

    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {

            let dateIni = $('#st_fecha_desde').val();
            let dateFin = $('#st_fecha_hasta').val();

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
    $("#st_btn_limpiar_busqueda").on('click', function() {

        $("#st_busqueda_ot").val('');
        $("#st_busqueda_marca").val('');
        $("#st_busqueda_modelo").val('');
        $("#st_busqueda_cliente").val('');
        $("#st_fecha_desde").val('');
        $("#st_fecha_hasta").val('');

        $("#st_tabla_ot").DataTable().search('').columns().search('').draw();
    });


        // FUNCIONES //

        
    // Cargar listado en DataTable (tabla principal OT)
    function fnc_cargar_tbl_serviciotecnico(){

        //  Si la tabla ya fue inicializada → destruirla antes de recrear
        if ($.fn.DataTable.isDataTable('#st_tabla_ot')) {
            $('#st_tabla_ot').DataTable().destroy();
        }

        //  Variable GLOBAL del módulo (evita conflictos con otras tablas)
        st_table = $("#st_tabla_ot").DataTable({

            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Agregar Servicio',
                    className: 'addNewRecord',
                    action:function(e, dt, node, config){

                        // Abrir modal 
                        fnc_limpiarFormularioModal();
                        $("#st_modal_ot").modal('show');
                        $("#st_titulo_modal_ot").text("Nueva Orden de Trabajo");
                        $("#st_btn_guardar .text-button").text("GUARDAR");

                        accion = 2; // 2 = registrar nueva OT

                        // Carga selects necesarios
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
                data: {'accion' : 1}, // 1 = listar OTs
            },

            responsive: {
                details: {
                    type: 'column'
                }
            },

            //  Cambia color de fila según estado de la OT
            // table-warning → ingresado
            // table-info → cerrado
            // table-success → entregado
            rowCallback: function(row, data) {

                let fechaCierre   = data[15];
                let fechaEntrega  = data[16];

                //  Limpia clases previas (importantísimo)
                $(row).removeClass('table-warning table-success table-info');

                // OT Ingresada
                if (!fechaCierre) {
                    $(row).addClass('table-warning');
                }
                // OT Cerrada
                else if (fechaCierre && !fechaEntrega) {
                    $(row).addClass('table-info');
                }
                // OT Entregada
                else if (fechaCierre && fechaEntrega) {
                    $(row).addClass('table-success');
                }
            },

            columnDefs: // [1] es idOT, [16] es fecha entrega
            [
                {   //  Columna responsive "+" 
                    targets: 0,
                    orderable: false,
                    className: 'control'
                },                
                {
                    targets: 1, 
                    responsivePriority: 1 // Prioridad máxima de visivilidad responsive: se queda siempre visible
                },
                {
                    // Columnas ocultas (datos internos)
                    targets: [3, 6, 8, 10], // 3 idCliente - 6 idMarca - 8 idModelo - 10 idTecnico
                    visible:false
                },
                {   // Formateo de fechas SOLO visual
                    targets: [2, 15, 16],
                    render: function (data, type, row) {

                        if (type === "display" || type === "filter") {
                            return formatearFechaDMY(data);
                        }

                        return data;
                    }
                },                 
                {
                    targets: [4, 5, 9], // Baja prioridad visibilidad responsive: Cliente, Marca, Modelo (se trata de mostrar pero si no hay lugar se va)
                    responsivePriority: 3 
                },
                {
                    targets: [12, 13], // 11 Falla y 12 Observaciones
                    render: function(data, type, row) {
                        if (type === 'display' && data && data.length > 30) {
                            // Corta el texto y le agrega los puntos suspensivos
                            // Además le ponemos un 'title' para que al pasar el mouse se vea el texto completo
                            return `<span title="${data}">${data.substr(0, 30)}...</span>`;
                        }
                    return data;
                    }
                },          
                {
                    //  Columna Opciones (editar / cobrar / info pagos / imprimir)
                    targets: 17, 
                    responsivePriority: 2, // Prioridad alta de visibilidad responsive: solo se oculta si no queda más remedio
                    orderable: false,
                    render: function(data, type, full, meta) {                        
                        // Usa div con min-width para que los iconos tengan espacio y no se amontonen
                        return "<div style='min-width: 120px; text-align: center; white-space: nowrap;'>" +
                                    // Botón Editar (Activo)
                                    "<span class='btnEditarServicioTecnico text-primary px-1' style='cursor:pointer;' title='Editar OT'>" +
                                        "<i class='fas fa-pencil-alt fs-5'></i>" +
                                    "</span>" +
                                    
                                    // Botón Cobrar (Deshabilitado - Modo Demo)
                                    "<span class='st_btnCobrar text-muted px-1' style='cursor:not-allowed; opacity: 0.6;' title='Cobrar en Caja (No disponible en Modo Demo)'>" +
                                        "<i class='fas fa-cash-register fs-5'></i>" +
                                    "</span>" +
                                    
                                    // Botón Ver Pagos (Deshabilitado - Modo Demo)
                                    "<span class='st_btnVerPagos text-muted px-1' style='cursor:not-allowed; opacity: 0.6;' title='Ver historial de pagos (No disponible en Modo Demo)'>" +
                                        "<i class='fas fa-info-circle fs-5'></i>" +
                                    "</span>" +
                                    
                                    // Botón Imprimir (Activo)
                                    "<span class='st_btnImprimirOT text-secondary px-1' style='cursor:pointer;' data-idot='"+full[1]+"' title='Imprimir Comprobante'>" +
                                        "<i class='fas fa-print fs-5'></i>" +
                                    "</span>" +
                                "</div>";
                    }
                }

            ],

            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }

        });
    }

  
    // BOTÓN COBRAR (Desde Servicio Técnico a Caja)
    $(document).on("click", ".st_btnCobrar", function() {
        
        // 1. Capturamos los datos de la fila 
        const idOT = $(this).data("idot");
        const monto = $(this).data("monto");

        // 2. Ejecutamos la función de plantilla.php
        // Pasamos null en 'elemento' porque no es un click de sidebar
        abrirModulo(null, 'vistas/movimiento_dia.php', 'Movimientos del Día');

        // 3. Esperamos a que el módulo de caja esté inyectado en el DOM
        // Usamos un intervalo para verificar si el modal ya existe
        let checkModulo = setInterval(function() {
            
            if ($("#mov_modal").length > 0) {
                
                clearInterval(checkModulo); // Detenemos la espera

                // Ejecutamos la limpieza y carga de datos
                if (typeof mov_limpiarModal === "function") {
                    mov_limpiarModal();
                }

                // Inyectamos los datos de la OT
                $("#mov_idOT").val(idOT);
                $("#mov_importe").val(monto);
                $("#mov_detalle").val("Cobro de reparación OT #" + idOT);
                
                // Cambiamos el título visualmente para guiar al usuario
                $("#mov_modal .modal-title").text("Cobrar Orden de Trabajo #" + idOT);
                
                // Abrimos el modal de caja
                $("#mov_modal").modal("show");
            }
        }, 100); // Revisa cada 100ms
    });


    // Cargar select Marca del buscador
    function fnc_cargarSelectMarcaBuscada(){
        
        $.ajax({
            url: "ajax/marcas.ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {

                var options = '<option selected value="">Seleccione una marca</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options += '<option value=' + respuesta[index][1] + '>' + respuesta[index][1] + '</option>';
                }

                // ID actualizado
                $("#st_busqueda_marca").empty().append(options);
            }
        });    
    }

    //  Formatea fechas a dd/mm/yyyy SOLO visualmente.
    //  Internamente se mantiene yyyy-mm-dd para no romper búsquedas ni ordenamientos.
    function formatearFechaDMY(fecha) {

        if (!fecha || fecha === "0000-00-00") {
            return "";
        }

        let partes = fecha.split("-");
        return `${partes[2]}/${partes[1]}/${partes[0]}`;
    }

    // INICIALIZAMOS EL MENSAJE DE TIPO TOAST (EMERGENTE EN LA PARTE SUPERIOR)
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });

    /* ====================================
    3- MODAL OT 
    (Base del flujo)
    Responsabilidad: apertura, estados y limpieza
    Variables relacionadas: accion selectedClienteIndex
    ===================================== */

    //EVENTOS//

$(document).on("click", ".st_btnVerPagos", function() {
    const idOT = $(this).data("idot");
      console.log("🔍 Consultando pagos para OT:", idOT);
     
    // Primero nos aseguramos de que el modal de pagos exista en el HTML de Servicio Técnico
    $("#st_txtIdOTPagos").text(idOT);

    let datos = new FormData();
    datos.append("accion", "obtener_pagos_por_ot");
    datos.append("idOT", idOT);

    $.ajax({
        url: "ajax/movimientos.ajax.php",
        method: "POST",
        data: datos,
        cache: false, contentType: false, processData: false, dataType: "json",
        success: function(respuesta) {
            console.log("Datos modal minimalista:",respuesta)
            let tbody = $("#st_tablaPagosOT tbody");
            tbody.empty();

            if(respuesta.length > 0) {
                respuesta.forEach(p => {
                    tbody.append(`
                        <tr>
                            <td>${p.fechaMovi}</td>
                            <td>${p.descripcionMovi}</td>
                            <td class="text-success font-weight-bold">$ ${parseFloat(p.importe).toFixed(2)}</td>
                        </tr>
                    `);
                });
            } else {
                tbody.append('<tr><td colspan="3" class="text-center text-muted">No se registran pagos.</td></tr>');
            }
            $("#st_modalPagos").modal("show");
        }
    });
});



    // Al abrir modal se ejecuta + fecha hoy en alta
    $("#st_modal_ot").on("shown.bs.modal", function () {
        if (accion === 2) { // solo carga la fecha de hoy en modal si es un ingreso, no si es update
            fnc_cargarFechaIngresoHoy();
        }
    });

    //  EVENTO GUARDAR → VALIDACIONES + REGISTRO
    $("#st_btn_guardar").on('click', function () {

        /* ================= VALIDAR TÉCNICO ================= */
        console.log("tecnico que se intento validar:", $("#st_tecnico").val());

        if (!validarTecnico()) {
            Toast.fire({
                icon: "warning",
                title: "Debe seleccionar un técnico válido"
            });
            return;
        }

        /* ================= VALIDAR CLIENTE ================= */
        console.log("id cliente que se intento validar:", $("#st_id_cliente").val());

        if ($("#st_id_cliente").val() === "") {

            clienteInvalido();

            Toast.fire({
                icon: 'warning',
                title: 'Debe seleccionar un cliente válido'
            });

            return;
        }

        /* ================= VALIDAR MARCA ================= */
        console.log("id marca que se intento validar:", $("#st_marca").val());

        if (!validarMarca()) {
            Toast.fire({
                icon: "warning",
                title: "Debe seleccionar una marca válida"
            });
            return;
        }

        /* ================= VALIDAR MODELO ================= */
        console.log("id modelo que se intento validar:", $("#st_modelo").val());

        if (!validarModelo()) {
            Toast.fire({
                icon: "warning",
                title: "Debe seleccionar un modelo válido"
            });
            return;
        }

        /* ================= VALIDAR FALLA ================= */
        console.log("inicio validacion campo falla:", $("#st_falla").val());

        if (!validarTexto("st_falla")) {
            Toast.fire({
                icon: "warning",
                title: "El campo Falla no puede estar vacío"
            });
            return;
        }

        /* ================= VALIDAR OBSERVACIONES ================= */
        console.log("Inicio validacion observaciones:", $("#st_observaciones").val());

        if (!validarTexto("st_observaciones")) {
            Toast.fire({
                icon: "warning",
                title: "El campo Observaciones no puede estar vacío"
            });
            return;
        }

        /* ================= VALIDAR PRESUPUESTO ================= */
        console.log("Inicio validacion presupuesto:", $("#st_presupuesto").val());

        if (!validarPresupuesto()) {
            Toast.fire({
                icon: "warning",
                title: "El campo Presupuesto posee un valor incorrecto"
            });
            return;
        }

        /* ================= VALIDAR SECUENCIA DE FECHAS ================= */
        let fechaIngreso  = $("#st_fecha_ingreso").val();
        let fechaCierre   = $("#st_fecha_cierre").val();
        let fechaEntrega  = $("#st_fecha_entrega").val();

        if(!validarSecuenciaFechas(fechaIngreso, fechaCierre, fechaEntrega)){
            return; // corta el guardado
        }

        /* ================= TODO OK → REGISTRAR ================= */
        fnc_registrarServicioTecnico();
    });

    //  Limpiar inputs y ocultar modal
    $("#st_btn_cancelar, #st_btn_cerrar_modal").on('click', function() {
        fnc_limpiarFormularioModal();
    });

        // FUNCIONES //

    function fnc_limpiarFormularioModal(){

        //  Inputs
        $("#st_ot").val("");
        fnc_cargarFechaIngresoHoy();
        $("#st_marca").val("");
        $("#st_modelo").val("");
        $("#st_tecnico").val("");
        $("#st_id_cliente").val("");
        $("#st_nombre_cliente").val("");
        $("#st_falla").val("");
        $("#st_observaciones").val("");
        $("#st_presupuesto").val("");
        $("#st_fecha_cierre").val("").prop("disabled", true);
        $("#st_fecha_entrega").val("").prop("disabled", true);

        //  Quita validaciones Bootstrap
        $(".needs-validation").removeClass("was-validated");

        //  Quita validaciones JS
        $("#st_nombre_cliente").removeClass("is-valid is-invalid");
        $("#st_tecnico").removeClass("is-valid is-invalid");
        $("#st_marca").removeClass("is-valid is-invalid").prop("disabled", false);
        $("#st_modelo").removeClass("is-valid is-invalid");
        $("#st_presupuesto").removeClass("is-valid is-invalid");
        $("#st_falla").removeClass("is-valid is-invalid");
        $("#st_observaciones").removeClass("is-valid is-invalid");

        //  Estado inicial del modal
        bloquearModelo();
        accion = null;

        $("#st_titulo_modal_ot").text("Nueva Orden de Trabajo");
        $("#st_btn_guardar .text-button").text("GUARDAR");

        //  Cierra modal
        $("#st_modal_ot").modal('hide');
    }

    // cargar fecha actual automáticamente
    function fnc_cargarFechaIngresoHoy() {

        const hoy = new Date();

        const yyyy = hoy.getFullYear();
        const mm = String(hoy.getMonth() + 1).padStart(2, '0');
        const dd = String(hoy.getDate()).padStart(2, '0');

        const fechaHoy = `${yyyy}-${mm}-${dd}`;

        $("#st_fecha_ingreso").val(fechaHoy);
    }

    /* ====================================
    4- DATOS RELACIONADOS 
    (Clientes + Marca/Modelo + Técnicos)
    agrupados porque pertenecen al mismo flujo del modal
    ===================================== */

    /* === 👤 Clientes (autocomplete) === */

        // EVENTOS //
        
    // lista clientes segun nombre buscado + ignora flechita y enter + declara invalida x defecto
    $(document).on("keyup", "#st_nombre_cliente", function (e) {
        
        // Ignoramos flechas y enter
        if (["ArrowDown", "ArrowUp", "Enter"].includes(e.key)) {
            return;
        }

        clienteInvalido(); //  escribir invalida el ID

        let termino = $(this).val();
        selectedClienteIndex = -1;

        if (termino.length < 2) {
            $("#st_lista_clientes").empty();
            return;
        }
        console.log("Inicia fragemento funcion peticion ajax clientes para listar");
        $.ajax({
            url: "ajax/clientes.ajax.php",
            type: "POST",
            data: {
                accion: 1,
                termino: termino
            },
            dataType: "json",
            success: function (respuesta) {
                console.log("Clientes listados:", respuesta);
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

                $("#st_lista_clientes").html(html);
            }
        });     
    });

    // navega en listado con flechitas + acepta con enter + pinta seleccionado
    $(document).on("keydown", "#st_nombre_cliente", function (e) {

        let items = $("#st_lista_clientes a");

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
    $(document).on("click", "#st_lista_clientes a", function (e) {
        e.preventDefault();

        $("#st_id_cliente").val($(this).data("id"));
        $("#st_nombre_cliente").val($(this).text());

        clienteValido(); // cambia validacion a valido

        $("#st_lista_clientes").empty();
    });

    // cierra listado clientes al perder foco
    $(document).on("blur", "#st_nombre_cliente", function () {
        setTimeout(function () { // se usa setTimeout porque blur se ejecuta antes que click
            $("#st_lista_clientes").empty();
        }, 150);
    });

    // permite volver a cargar listado clientes si saliste del foco antes
    $(document).on("focus", "#st_nombre_cliente", function () {
        $("#st_lista_clientes").empty();
    });

        // FUNCIONES //

    // validacion de campos a traves de js (front)
    function clienteValido() {
        $("#st_nombre_cliente").removeClass("is-invalid").addClass("is-valid");
    }

    function clienteInvalido() {
        $("#st_nombre_cliente").removeClass("is-valid").addClass("is-invalid");
        $("#st_id_cliente").val("");
    }

    /* === 🏷 Marca / Modelo === */

        // EVENTOS //

    // disparador validador marca + habilita modelo + carga select modelos 
    $("#st_marca").on("change", function () {

        // limpiamos y bloqueamos modelos al cambiar marca
        bloquearModelo();

        if (!validarMarca()) { // Si la marca NO es válida, corto la ejecución
        console.log("!validarMarca"); // DEBUG    
        return;
        }

        var idMarca = $(this).val();
        console.log("Inicio validación idMarca:", idMarca); // DEBUG

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

                if (!respuesta || respuesta.length === 0) { // Si no hay respuesta o está vacía

                    Toast.fire({
                        icon: 'warning',
                        title: 'La marca seleccionada no tiene modelos cargados'
                    });

                    console.log("La marca NO tiene modelos cargados"); // DEBUG
                    // Se mantiene bloqueado modelos
                    return;
                }

                // Si hay modelos → habilitamos
                $("#st_modelo").prop("disabled", false);

                for (var i = 0; i < respuesta.length; i++) {
                    $("#st_modelo").append(
                        '<option value="' + respuesta[i][0] + '">' + respuesta[i][1] + '</option>'
                    );
                }

                console.log("Modelos cargados para marca", idMarca); // DEBUG
            }
        });
    });
    
    // disparador validador modelos modal
    $("#st_modelo").on("change", function () {
        validarModelo();
    });

        // FUNCIONES //

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
                $("#st_marca").empty();

                // Opción inicial
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
                $("#st_marca").append(options);

                // Al cargar marcas, modelo debe quedar bloqueado
                bloquearModelo();
            }
        });
    }

    // bloquea modelo hasta elejir marca
    function bloquearModelo() {
        $("#st_modelo").empty();
        $("#st_modelo").append('<option value="">Seleccione modelo</option>');
        $("#st_modelo").prop("disabled", true);
        $("#st_modelo").removeClass("is-valid is-invalid");
        console.log("Input modelos bloqueado"); // DEBUG
    }

    // validacion marca
    function validarMarca() {

        const marca = $("#st_marca");

        // Si no hay marca seleccionada, return
        if (marca.val() === "") {
            marca.addClass("is-invalid").removeClass("is-valid");
            console.log("Marca vacía, modelos bloqueados"); // DEBUG
            bloquearModelo();
            return false;
        }

        marca.removeClass("is-invalid").addClass("is-valid");
        console.log("Marca válida seleccionada:", marca); // DEBUG
        return true;
    }

    // validar modelos
    function validarModelo() {

        var idModelo = $("#st_modelo").val();

        if (idModelo === "" || $("#st_modelo").prop("disabled")) {
            $("#st_modelo").removeClass("is-valid")
            $("#st_modelo").addClass("is-invalid");
            console.log("modelo NO pasa validacion"); // DEBUG
            return false;
        }

        $("#st_modelo").removeClass("is-invalid")
        $("#st_modelo").addClass("is-valid");
        console.log("modelo SI pasa validacion"); // DEBUG

        return true;
    }

    /* === 👨‍🔧 Técnicos === */

        // EVENTOS //

    // disparador validador tecnico
    $("#st_tecnico").on("change", function () {
        validarTecnico();
    });
      
        // FUNCIONES //

    // Cargar input select tecnicos
    function fnc_cargarSelectTecnicoModal(){
        
        $.ajax({
            url: "ajax/tecnicos.ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {

                // LIMPIA el select antes de cargar ya que sino vuelve a cargarlo cada vez que se abre el modal
                $("#st_tecnico").empty();

                var options = '<option value="">Seleccione técnico</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options += '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';
                }

                $("#st_tecnico").append(options);  
                console.log("listado tecnicos:",respuesta);       
            }
        });      
    }

    // validar input tecnicos
    function validarTecnico() {

        const tecnico = $("#st_tecnico");

        if (tecnico.val() === "") {
            tecnico.addClass("is-invalid").removeClass("is-valid");
            return false;
        }

        tecnico.removeClass("is-invalid").addClass("is-valid");
        return true;
    }

    /* ====================================
    5- VALIDACIONES
    Responsabilidad: integridad de datos del formulario
    ===================================== */

        // EVENTOS //


    function initEventosValidacion() {

        //  Disparadores de validación para campos de texto
        $("#st_falla").on("blur", function () {
            validarTexto("st_falla");
        });

        $("#st_observaciones").on("blur", function () {
            validarTexto("st_observaciones");
        });

        //  Disparador validador presupuesto modal
        $("#st_presupuesto").on("blur keyup", function () {
            validarPresupuesto();
        });
    }


        // FUNCIONES //

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

    //  Validador campo presupuesto modal
    function validarPresupuesto() {

        var valor = $("#st_presupuesto").val();

        if (valor === "" || parseFloat(valor) < 0) {
            $("#st_presupuesto").addClass("is-invalid").removeClass("is-valid");
            return false;
        }

        $("#st_presupuesto").addClass("is-valid").removeClass("is-invalid");
        return true;
    }

    // funcion congruencia fechas
    function validarSecuenciaFechas(fechaIngreso, fechaCierre, fechaEntrega){

        if(!fechaIngreso){
            alert("Debe existir una fecha de ingreso");
            return false;
        }

        let fIngreso  = new Date(fechaIngreso);
        let fCierre   = fechaCierre ? new Date(fechaCierre) : null;
        let fEntrega  = fechaEntrega ? new Date(fechaEntrega) : null;

        // Entrega sin cierre
        if(fEntrega && !fCierre){
            alert("No se puede asignar fecha de entrega sin fecha de cierre");
            return false;
        }

        // Cierre menor que ingreso
        if(fCierre && fCierre < fIngreso){
            alert("La fecha de cierre no puede ser menor que la fecha de ingreso");
            return false;
        }

        // Entrega menor que cierre
        if(fEntrega && fEntrega < fCierre){
            alert("La fecha de entrega no puede ser menor que la fecha de cierre");
            return false;
        }

        return true; // todo OK
    }

    /* ====================================
    6- REGISTRO Y ACTUALIZACIÓN
    Responsabilidad: guardar y actualizar OT
    ===================================== */
    
        // FUNCIONES //
    

    function fnc_registrarServicioTecnico() {

        console.log("Validaciones superadas, listo para registrar OT");

        Swal.fire({
            title: accion == 2 // cambia el texto ente update y crear
                ? '¿Está seguro de registrar Orden de Trabajo?' 
                : '¿Está seguro de actualizar Orden de Trabajo?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, continuar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {

            if (result.isConfirmed) {

                var datos = new FormData();

                datos.append("accion", accion);
                datos.append("idOT", $("#st_ot").val());
                datos.append("fechaIngreso", $("#st_fecha_ingreso").val());
                datos.append("idCliente", $("#st_id_cliente").val());
                datos.append("idTecnico", $("#st_tecnico").val());
                datos.append("idModelo", $("#st_modelo").val());
                datos.append("falla", $("#st_falla").val());
                datos.append("observaciones", $("#st_observaciones").val());
                datos.append("presupuesto", $("#st_presupuesto").val());
                datos.append("fechaCierre", $("#st_fecha_cierre").val());
                datos.append("fechaEntrega", $("#st_fecha_entrega").val());

                $.ajax({
                    url: "ajax/servicio_tecnico.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (respuesta) {

                        if (respuesta === "ok" || respuesta.status === "ok") {
                            Toast.fire({
                                icon: "success",
                                title: "Orden de Trabajo registrada correctamente"
                            });
                            fnc_cargar_tbl_serviciotecnico();
                            fnc_limpiarFormularioModal();

                        } else {
                            Toast.fire({
                                icon: "error",
                                title: "No se pudo registrar la Orden de Trabajo"
                            });
                        }
                    },
                    error: function () {
                        Toast.fire({
                            icon: "error",
                            title: "Error de comunicación con el servidor"
                        });
                    }
                });
            }
        });
    }

</script>



























<script>
/* ============================================================

    
 Prefijar IDs (Servicio Técnico)

Objetivo: evitar colisiones entre módulos.

Usaremos el prefijo:

st_

🔧 IDs que deben cambiar

🔍 Buscadores
Actual	Nuevo
id_ot_busqueda	st_busqueda_ot
id_marca_busqueda	st_busqueda_marca
id_modelo_busqueda	st_busqueda_modelo
id_nombrecliente_busqueda	st_busqueda_cliente
inputFechaIngresoDesde	st_fecha_desde
inputFechaIngresoHasta	st_fecha_hasta
btnLimpiarBusqueda	st_btn_limpiar_busqueda
📊 Tabla
Actual	Nuevo
table st_table
tbl_serviciotecnico	st_tabla_ot
🪟 Modal
Actual	Nuevo
mdlGestionarOT	st_modal_ot
tituloModalOT	st_titulo_modal_ot
btnCerrarModal	st_btn_cerrar_modal
frm-datos-OT	st_form_ot
🧾 Campos del modal
Actual	Nuevo
modal_OT	st_ot
modal_fechaingreso	st_fecha_ingreso
modal_marca	st_marca
modal_modelo	st_modelo
modal_nombretecnico	st_tecnico
modal_idcliente	st_id_cliente
modal_nombrecliente	st_nombre_cliente
lista_clientes	st_lista_clientes
modal_falla	st_falla
modal_observaciones	st_observaciones
modal_presupuesto	st_presupuesto
modal_fechacierre	st_fecha_cierre
modal_fechaentrega	st_fecha_entrega
🎛 Botones
Actual	Nuevo
btnCancelarRegistro	st_btn_cancelar
btnGuardarServicioTecnico	st_btn_guardar


============================================================ */

</script>
