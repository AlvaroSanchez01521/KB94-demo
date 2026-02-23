<!-- HEADER -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Arqueo e Histórico</h1>
      </div>
    </div>
  </div>
</div>

<!-- SECTOR 1: TARJETAS DE SALDO ACTUAL (CONSOLIDADO HISTÓRICO) -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- Tarjeta Caja 1 -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner"><h3 id="arq_txtSaldoCaja1">$ 0.00</h3><p id="arq_lblCaja1">Caja 1</p></div>
          <div class="icon"><i class="fas fa-cash-register"></i></div>
        </div>
      </div>
      <!-- Tarjeta Caja 2 -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner"><h3 id="arq_txtSaldoCaja2">$ 0.00</h3><p id="arq_lblCaja2">Caja 2</p></div>
          <div class="icon"><i class="fas fa-university"></i></div>
        </div>
      </div>
      <!-- Tarjeta Caja 3 -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner"><h3 id="arq_txtSaldoCaja3">$ 0.00</h3><p id="arq_lblCaja3">Caja 3</p></div>
          <div class="icon"><i class="fas fa-wallet"></i></div>
        </div>
      </div>
      <!-- Tarjeta Total General -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
          <div class="inner"><h3 id="arq_txtSaldoTotal">$ 0.00</h3><p>Total General (Cajas)</p></div>
          <div class="icon"><i class="fas fa-coins"></i></div>
        </div>
      </div>
    </div>

    <!-- SECTOR 2: FILTRADO POR RANGO -->
    <div class="card card-outline card-secondary">
      <div class="card-header">
        <div class="row align-items-end">
          <div class="col-md-3">
            <label>Desde:</label>
            <input type="date" id="arq_fechaDesde" class="form-control form-control-sm">
          </div>
          <div class="col-md-3">
            <label>Hasta:</label>
            <input type="date" id="arq_fechaHasta" class="form-control form-control-sm">
          </div>
          <div class="col-md-2">
            <button class="btn btn-secondary btn-sm btn-block" id="arq_btnFiltrar">
              <i class="fas fa-search"></i> Consultar
            </button>
          </div>
        </div>
      </div>

      <!-- TABLA DE RESUMEN POR FECHA -->
      <div class="card-body">
        <table id="arq_tablaResumenDiario" class="table table-bordered table-hover table-sm">
          <thead class="thead-light">
            <tr>
              <th>Fecha</th>
              <th id="arq_thCaja1">Caja 1</th>
              <th id="arq_thCaja2">Caja 2</th>
              <th id="arq_thCaja3">Caja 3</th>
              <th>Total Día</th>
              <th style="width: 10%">Detalle</th>
            </tr>
          </thead>
          <tbody>
            <!-- Aquí figurará el saldo acumulado por fecha -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- MODAL: DETALLE FINO DE MOVIMIENTOS (Solo lectura) -->
<div class="modal fade" id="arq_modalDetalle" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-info">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-white" id="arq_lblDetalleDia">Detalle de Movimientos - Fecha</h5>
        <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body">
        <table id="arq_tablaFino" class="table table-sm table-striped">
          <thead>
            <tr>
              <th>Caja</th>
              <th>Detalle / OT</th>
              <th>Importe</th>
            </tr>
          </thead>
          <tbody><!-- Dinámico --></tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
    // 1. Configuración de fechas: Hoy y hace 15 días
    let fechaHoy = new Date();
    let fechaInicio = new Date();
    fechaInicio.setDate(fechaHoy.getDate() - 15); // Restamos 15 días exactos

    // Formateamos a YYYY-MM-DD para los inputs tipo date
    let hoyStr = fechaHoy.toISOString().split('T')[0];
    let inicioStr = fechaInicio.toISOString().split('T')[0];

    $("#arq_fechaDesde").val(inicioStr);
    $("#arq_fechaHasta").val(hoyStr);

    // 2. Cargas iniciales
    arq_cargarTarjetasSaldos();
    arq_listarResumenDiario();
});

// Evento click del botón filtrar
$("#arq_btnFiltrar").on("click", function(){
    arq_listarResumenDiario();
});

/*=============================================
LISTAR RESUMEN DIARIO (NETOS POR CAJA)
=============================================*/
function arq_listarResumenDiario() {
    let datos = new FormData();
    datos.append("accion", "listar_resumen_arqueo");
    datos.append("desde", $("#arq_fechaDesde").val());
    datos.append("hasta", $("#arq_fechaHasta").val());

    $.ajax({
        url: "ajax/movimientos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            let tbody = $("#arq_tablaResumenDiario tbody");
            tbody.empty();

            // 1. Agrupamos los datos por FECHA
            // La respuesta de SQL trae una fila por cada combinación Fecha-Caja
            let agrupado = {};
            respuesta.forEach(item => {
                if (!agrupado[item.fechaMovi]) {
                    agrupado[item.fechaMovi] = { 
                        cajas: {}, 
                        totalDia: 0 
                    };
                }
                // Guardamos el neto por el ID del tipo de movimiento
                agrupado[item.fechaMovi].cajas[item.idTipoMovi] = parseFloat(item.netoDia);
                agrupado[item.fechaMovi].totalDia += parseFloat(item.netoDia);
            });

            // 2. Dibujamos las filas (recorriendo el objeto agrupado)
            // Las fechas saldrán de la más nueva a la más vieja (según el ORDER BY del SQL)
            for (let fecha in agrupado) {
                let datosDia = agrupado[fecha];
                
                // Obtenemos los valores de las 3 cajas. 
                // Usamos el índice 0, 1, 2 asumiendo el orden de IDs de la DB (Efectivo, S1, S2)
                let idsCajas = Object.keys(datosDia.cajas);
                let c1 = datosDia.cajas[idsCajas[0]] || 0;
                let c2 = datosDia.cajas[idsCajas[1]] || 0;
                let c3 = datosDia.cajas[idsCajas[2]] || 0;

                tbody.append(`
                    <tr>
                        <td class="font-weight-bold">${fecha}</td>
                        <td class="${c1 >= 0 ? 'text-success' : 'text-danger'}">$ ${c1.toFixed(2)}</td>
                        <td class="${c2 >= 0 ? 'text-success' : 'text-danger'}">$ ${c2.toFixed(2)}</td>
                        <td class="${c3 >= 0 ? 'text-success' : 'text-danger'}">$ ${c3.toFixed(2)}</td>
                        <td class="bg-light font-weight-bold">$ ${datosDia.totalDia.toFixed(2)}</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-xs" onclick="arq_verDetalleArqueo('${fecha}')" title="Ver movimientos">
                                <i class="fas fa-search-plus"></i>
                            </button>
                        </td>
                    </tr>
                `);
            }

            if (respuesta.length === 0) {
                tbody.append('<tr><td colspan="6" class="text-center text-muted">Sin movimientos en este rango.</td></tr>');
            }
        }
    });
}

/*=============================================
CARGAR LAS 4 TARJETAS SUPERIORES (SALDO ACTUAL)
=============================================*/
function arq_cargarTarjetasSaldos() {
    let datos = new FormData();
    datos.append("accion", "obtener_saldos_cajas");

    $.ajax({
        url: "ajax/movimientos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            
            let totalConsolidado = 0;

            // Limpiamos los labels por si acaso
            $("#arq_lblCaja1, #arq_lblCaja2, #arq_lblCaja3").text("Sin definir");

            // La respuesta trae un array con los tipos de movimientos y sus SUM(importe)
            respuesta.forEach(function (item, index) {
                
                let saldoCaja = parseFloat(item.saldo || 0);
                totalConsolidado += saldoCaja;

                // Llenamos solo las primeras 3 tarjetas según el orden de la base de datos
                if (index < 3) {
                    let n = index + 1;
                    $(`#arq_txtSaldoCaja${n}`).text("$ " + saldoCaja.toLocaleString('es-AR', {minimumFractionDigits: 2}));
                    $(`#arq_lblCaja${n}`).text(item.descripcionMovi);
                    
                    // También actualizamos los encabezados de la tabla de abajo para que coincidan
                    $(`#arq_thCaja${n}`).text(item.descripcionMovi);
                }
            });

            // La 4ta tarjeta es la suma de TODO
            $("#arq_txtSaldoTotal").text("$ " + totalConsolidado.toLocaleString('es-AR', {minimumFractionDigits: 2}));
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error en tarjetas:", jqXHR.responseText);
        }
    });
}

/*=============================================
VER DETALLE DE MOVIMIENTOS DE UN DÍA (MODAL)
=============================================*/
function arq_verDetalleArqueo(fechaSeleccionada) {
    
    // 1. Cambiamos el título del modal con la fecha para que el socio sepa qué mira
    $("#arq_lblDetalleDia").text("Detalle de Caja: " + fechaSeleccionada);

    let datos = new FormData();
    datos.append("accion", "ver_detalle_dia");
    datos.append("fecha", fechaSeleccionada);

    $.ajax({
        url: "ajax/movimientos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            
            let tbody = $("#arq_tablaFino tbody");
            tbody.empty();

            if (respuesta.length > 0) {
                respuesta.forEach(function (item) {
                    
                    let importe = parseFloat(item.importe);
                    let color = importe >= 0 ? "text-success" : "text-danger";
                    let ot = item.idOT ? `<span class="badge badge-secondary">OT: ${item.idOT}</span>` : "-";

                    tbody.append(`
                        <tr>
                            <td>${item.descripcionMovi}</td>
                            <td>${item.detalle || "-"} ${ot}</td>
                            <td class="font-weight-bold ${color}">$ ${importe.toFixed(2)}</td>
                        </tr>
                    `);
                });
            } else {
                tbody.append('<tr><td colspan="3" class="text-center">No hay movimientos registrados.</td></tr>');
            }

            // 2. Mostramos el modal
            $("#arq_modalDetalle").modal("show");
        }
    });
}


</script>
