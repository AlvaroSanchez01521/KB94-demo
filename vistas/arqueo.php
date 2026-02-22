<!-- HEADER -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0">Gestión de Caja</h1>
      </div>
      <div class="col-sm-6 text-right">
        <h3 id="txtSaldoDiario" class="d-inline mr-3 text-success">$ 0.00</h3>
        <button class="btn btn-primary btn-sm" id="btnNuevoMovimiento">
          <i class="fas fa-plus"></i> Nuevo Movimiento
        </button>
      </div>
    </div>
  </div>
</div>

<!-- CONTENT -->
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="tabCaja" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="diario-tab" data-toggle="tab" href="#diario">Movimientos del Día</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="arqueo-tab" data-toggle="tab" href="#arqueo">Arqueo / Histórico</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          
          <!-- TAB MOVIMIENTOS DÍA -->
          <div class="tab-pane fade show active" id="diario">
            <table id="tablaMovimientosDia" class="table table-sm table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tipo</th>
                  <th>Detalle / OT</th>
                  <th>Importe</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody><!-- Dinámico --></tbody>
            </table>
          </div>

          <!-- TAB ARQUEO -->
          <div class="tab-pane fade" id="arqueo">
            <div class="row mb-3">
              <div class="col-md-4">
                <input type="date" id="filtroFechaArqueo" class="form-control form-control-sm">
              </div>
              <div class="col-md-2">
                <button class="btn btn-secondary btn-sm" id="btnFiltrarArqueo">Consultar</button>
              </div>
            </div>
            <table id="tablaArqueo" class="table table-bordered table-striped">
               <!-- Similar a la anterior pero solo lectura -->
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL MOVIMIENTO -->
<div class="modal fade" id="modalMovimiento" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formMovimiento">
        <div class="modal-header">
          <h5 class="modal-title">Registrar Movimiento</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Tipo de Movimiento</label>
            <select class="form-control" id="idTipoMovi" required>
              <!-- Se carga por AJAX desde tu tabla tipomovimientos -->
            </select>
          </div>
          <div class="form-group">
            <label>Importe (Negativo para Egresos)</label>
            <input type="number" step="0.01" class="form-control" id="importe" placeholder="Ej: 1500 o -500" required>
          </div>
          <div class="form-group">
            <label>Detalle</label>
            <input type="text" class="form-control" id="detalle" maxlength="50">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
