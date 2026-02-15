 <!-- Encabezado del Contenedor (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">Tablero Principal</h1>
             </div><!-- /.col -->
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                     <li class="breadcrumb-item active">Tablero Principal</li>
                 </ol>
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

<!-- Main content (contenedor principal) -->
 <div class="content">
    <div class="container-fluid">

        <!-- Row Cards Interactivas -->
        <div class="row">
            
            <!-- small box TOTAL EQUIPOS INGRESADOS-->
            <div class="col-lg-2">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4 id="totalingresos">---</h4>

                        <p>Ingresos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-log-in"></i> 
                    </div>
                    <!-- Footer small-box 
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    fin Footer small-box -->
                </div>
            </div>

            <div class="col-lg-2">
                <!-- small box TOTAL EQUIPOS RESUPUESTADOS-->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h4 id="totalpresupuestados">---</h4>

                        <p>Presupuestados</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-clipboard"></i>
                    </div>
                    <!-- Footer small-box 
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    fin Footer small-box -->
                </div>
            </div>

            <div class="col-lg-2">
                <!-- small box TOTAL EQUIPOS CERRADOS-->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4 id="totalcerrados">--- </h4>

                        <p>Cerrados Total</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-remove-circle"></i>
                    </div>
                    <!-- Footer small-box 
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    fin Footer small-box -->
                </div>
            </div>

            <div class="col-lg-2">
                <!-- small box TOTAL EQUIPOS ENTREGADOS-->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h4 id="totalentregados">---</h4>

                        <p>Entregados Total</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-checkmark-circle"></i>
                    </div>
                     <!-- Footer small-box 
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    fin Footer small-box -->
                </div>
            </div>

            <div class="col-lg-2">
                <!-- small box TOTAL GANANCIAS -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h4 id="totalganancias">$ ---</h4>

                        <p>Total Ganancias</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>
                    <!-- Footer small-box 
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    fin Footer small-box -->
                </div>
            </div>

            <div class="col-lg-2">
                <!-- small box TOTAL CLIENTES -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4 id="totalclientes">---</h4>

                        <p>Total Clientes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <!-- Footer small-box 
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    fin Footer small-box -->
                </div>
            </div>
        </div>
        <!--- Fin row cards  --->

        <!--- Grafico de barra -->
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title" id="card-title">Ventas Del Mes : $ ---</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!--- Boton Cerrar 
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 300px; max-height: 350px; width: 100%;">

                            </canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Fin Grafico de Barra-->

         <!--  -->
         <div class="row">
            <!-- TOP 10 clientes Frecuentes -->
            <div class="col-lg-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">TOP 10 clientes frecuentes </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                            </div> <!-- ./ end card-tools -->
                        </div> <!-- ./ end card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="tbl_clientes_frecuentes">
                                <thead>
                                    <tr>
                                        <th>Cod. Cliente</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Concurrencia</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div> <!-- ./ end card-body -->
                </div>
            </div>
            <!-- Fin TOP 10 clientes Frecuentes -->

            <!-- TOP 10 telefonos más ingresados -->
            <div class="col-lg-6">
            <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">TOP 10 telefonos más ingresados</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                            </div> <!-- ./ end card-tools -->
                        </div> <!-- ./ end card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="tbl_telefonos_mas_ingresados">
                                <thead>
                                    <tr>                                        
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Nro Ingresos</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div> <!-- ./ end card-body -->
                </div>

            </div>
            <!-- Fin TOP 10 telefonos más ingresados -->

        </div>

        <!-- -->

    </div>

</div><!-- Fin class content  -->


<script>
    
     /*===========================================
        Solicitud Ajax Cards Informativas
    =============================================*/

    $(document).ready(function(){
        $.ajax({
            url: "ajax/dashboard.ajax.php",
            method: 'POST',
            dataType: 'json',
            success:function (respuesta) {
                console.log("respuesta",respuesta);
                $("#totalingresos").html(respuesta[0]['totalingresos']);
                $("#totalpresupuestados").html(respuesta[0]['totalpresupuestados']);
                $("#totalcerrados").html(respuesta[0]['totalcerrados']);
                $("#totalentregados").html(respuesta[0]['totalentregados']);
                $("#totalganancias").html('$ ' + respuesta[0]['totalganancias'].toString().replace(".", ",").replace(/\d(?=(\d{3})+\,)/g, "$&."));
                $("#totalclientes").html(respuesta[0]['totalclientes']);
            }

        })
    })

    /*===========================================
        FIN Solicitud Ajax Cards Informativas
    =============================================*/

    /* Actualización cada 60 segundos  */
    setInterval(() => {
            $(document).ready(function(){
            $.ajax({
                url: "ajax/dashboard.ajax.php",
                method: 'POST',
                dataType: 'json',
                success:function (respuesta) {
                    console.log("respuesta",respuesta);
                    $("#totalingresos").html(respuesta[0]['totalingresos']);
                    $("#totalpresupuestados").html(respuesta[0]['totalpresupuestados']);
                    $("#totalcerrados").html(respuesta[0]['totalcerrados']);
                    $("#totalentregados").html(respuesta[0]['totalentregados']);
                    $("#totalganancias").html('$ ' + respuesta[0]['totalganancias'].toString().replace(".", ",").replace(/\d(?=(\d{3})+\,)/g, "$&."));
                    $("#totalclientes").html(respuesta[0]['totalclientes']);
                }

            })
        })

    }, 60000);


    /*============================================================
    Solicitud Ajax grafico de barra ventas mes
    ==============================================================*/
    $.ajax({
        url: "ajax/dashboard.ajax.php",
        method: 'POST',
        data: {
            'accion': 1 // parametro para obtener las ventas del mes (deve obtener un dato para que sea distinta a las cards)
        },
        dataType: 'json',
        success: function(respuesta) {
            console.log("respuesta", respuesta);

            /* Array necesario para la carga de datos del chart */
            var fecha_venta = [];
            var total_venta = [];
            var total_venta_mes = 0;

            for (let i = 0; i < respuesta.length; i++) {

                fecha_venta.push(respuesta[i]['fecha_venta']);
                total_venta.push(respuesta[i]['total_venta']);
                total_venta_mes = parseFloat(total_venta_mes) + parseFloat(respuesta[i]['total_venta']);

            }

            // console.log(total_venta);


            /* completa el campo del Titulo del chart */
            $("#card-title").html('Ventas del Mes: $ ' + total_venta_mes.toString().replace(".", ",").replace(/\d(?=(\d{3})+\,)/g, "$&."));

            /* Seteo del chart */
            var barChartCanvas = $("#barChart").get(0).getContext('2d');

            var areaChartData = {
                labels: fecha_venta,
                datasets: [{
                    label: 'Ventas del Mes',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    data: total_venta
                }]
            }
           
            var barChartData = $.extend(true, {}, areaChartData);

            var temp0 = areaChartData.datasets[0];

            barChartData.datasets[0] = temp0;

            /* Configs visuales y animaciones del Cart */

            var barChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                events: false,
                legend: {
                    display: true
                },
                animation: {
                    duration: 500,
                    easing: "easeOutQuart",
                    onComplete: function() {
                        var ctx = this.chart.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily,
                            'normal', Chart.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function(dataset) {
                            for (var i = 0; i < dataset.data.length; i++) {
                                var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                    scale_max = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._yScale.maxHeight;
                                ctx.fillStyle = '#444';
                                var y_pos = model.y - 5;
                                if ((scale_max - model.y) / scale_max >= 0.93) y_pos = model.y +
                                    20;
                                ctx.fillText(dataset.data[i], model.x, y_pos);

                            }
                        });
                    }
                }
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

        }
    });
    /*============================================================
    FIN  Solicitud Ajax grafico de barra ventas mes
    ==============================================================*/

    /*============================================================
    Listado 10 productos mas vendidos
    ==============================================================*/
        $.ajax({
             url: "ajax/dashboard.ajax.php",
             type: "POST",
             data: {
                 'accion': 2 // listar los 10 clientes mas frecuentes
             },
             dataType: 'json',
             success: function(respuesta) {
                console.log("respuesta",respuesta);

                 for (let i = 0; i < respuesta.length; i++) {
                     filas = '<tr>' +
                         '<td>' + respuesta[i]["idCliente"] + '</td>'+
                         '<td>' + respuesta[i]["nombre"] + '</td>' +
                         '<td>' + respuesta[i]["telefono1"] + '</td>' +
                         '<td>' + respuesta[i]["concurrencia"] + '</td>' +
                         '</tr>'
                     $("#tbl_clientes_frecuentes tbody").append(filas);
                 }

             }
         });

    /*============================================================
    Listado 10 productos poco stock
    ==============================================================*/
        $.ajax({
             url: "ajax/dashboard.ajax.php",
             type: "POST",
             data: {
                 'accion': 3 // listar los 10 equipos(x modelo) más ingresados
             },
             dataType: 'json',
             success: function(respuesta) {
                console.log("respuesta",respuesta);

                 for (let i = 0; i < respuesta.length; i++) {
                     filas = '<tr>' +
                         '<td>'+ respuesta[i]["marca"] + '</td>'+
                         '<td>' + respuesta[i]["modelo"] + '</td>' +
                         '<td>' + respuesta[i]["veces_ingresadas"] + '</td>' +                         
                         '</tr>'
                     $("#tbl_telefonos_mas_ingresados tbody").append(filas);
                 }

             }
         });
</script>