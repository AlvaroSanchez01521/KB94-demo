<!-- HEADER -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0"></h1>
      </div>
      <div class="col-sm-6 text-right">
        <!-- Contenedor para el saldo dinámico -->
        <span class="h4 mr-3">Saldo Hoy: <b id="mov_txtSaldoTotal">$ 0.00</b></span>
        <button class="btn btn-primary btn-sm" id="mov_btnNuevo">
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
      <div class="card-body">
        <table id="mov_tablaDia" class="table table-bordered table-hover table-sm">
          <thead class="thead-light">
            <tr>
              <th style="width: 50px">ID</th>
              <th>Tipo</th>
              <th>Detalle / OT</th>
              <th style="width: 120px">Importe</th>
              <th style="width: 100px">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- Contenido dinámico via AJAX -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- MODAL MOVIMIENTO -->
<div class="modal fade" id="mov_modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="mov_form">
        <div class="modal-header">
          <h5 class="modal-title">Registrar Movimiento</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="mov_idMovimiento">
          
          <div class="form-group">
            <label>Tipo de Movimiento</label>
            <select class="form-control" id="mov_idTipoMovi" required>
              <option value="">Seleccione tipo...</option>
              <!-- Se carga dinámicamente -->
            </select>
          </div>

          <div class="form-group">
            <label>Importe</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="number" step="0.01" class="form-control" id="mov_importe" placeholder="Ej: 1500 o -500" required>
            </div>
            <small class="text-muted">Use signo negativo (-) para Egresos/Gastos.</small>
          </div>

          <div class="form-group">
            <label>Orden de Trabajo (OT)</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
              </div>
              <input type="text" class="form-control bg-light" id="mov_idOT" placeholder="Bloqueado">
            </div>
            <small class="text-muted">Este campo solo se completa desde el módulo de Servicio Técnico.</small>
          </div>


          <div class="form-group">
            <label>Detalle / Observación</label>
            <input type="text" class="form-control" id="mov_detalle" maxlength="50" placeholder="Ej: Pago de internet">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    $(document).ready(function () {
    mov_listarMovimientos();
    mov_cargarComboTipos();
    });

    // =============================
    // EVENTOS
    // =============================

    $("#mov_btnNuevo").on("click", function () {
    mov_limpiarModal();
    $("#mov_modal").modal("show");
    });

    $("#mov_form").on("submit", function (e) {
    e.preventDefault();
    mov_guardar();
    });

    // =============================
    // FUNCIONES
    // =============================

    function mov_listarMovimientos() {
    let datos = new FormData();
    datos.append("accion", "listar_dia");

    $.ajax({
        url: "ajax/movimientos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          console.log("Tabla carga", respuesta)
        let tbody = $("#mov_tablaDia tbody");
        tbody.empty();
        let saldoTotal = 0;

        respuesta.forEach(function (item) {
            let importe = parseFloat(item.importe);
            saldoTotal += importe;
            
            // Color según importe
            let badgeClass = importe >= 0 ? "text-success" : "text-danger";
            
            // --- LÓGICA PARA MOSTRAR DETALLE Y OT JUNTOS ---
            let columnaDetalle = "";            
            if (item.idOT) {
                columnaDetalle += `<span class="badge badge-secondary">OT: ${item.idOT}</span> `;
            }            
            columnaDetalle += item.detalle ? item.detalle : (item.idOT ? "" : "-");

              tbody.append(`
                  <tr>
                      <td>${item.idMovimiento}</td>
                      <td>${item.descripcionMovi}</td>
                      <td>${columnaDetalle}</td>
                      <td class="font-weight-bold ${badgeClass}">$ ${importe.toFixed(2)}</td>
                      <td>
                          <button class="btn btn-warning btn-sm mov_btnEditar" 
                              data-id="${item.idMovimiento}" 
                              data-tipo="${item.idTipoMovi}" 
                              data-ot="${item.idOT || ''}" 
                              data-importe="${item.importe}" 
                              data-detalle="${item.detalle || ''}">
                              <i class="fas fa-edit"></i>
                          </button>
                      </td>
                  </tr>
              `);
        });

        $("#mov_txtSaldoTotal").text("$ " + saldoTotal.toFixed(2));
        $("#mov_txtSaldoTotal").removeClass("text-danger text-success");
        if(saldoTotal < 0) $("#mov_txtSaldoTotal").addClass("text-danger");
        else $("#mov_txtSaldoTotal").addClass("text-success");
        }
    });
    }

    function mov_cargarComboTipos() {
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
                let select = $("#mov_idTipoMovi");
                // Limpiar opciones previas dejando solo la de "Seleccione..."
                select.html('<option value="">Seleccione tipo...</option>');
                
                respuesta.forEach(function (item) {
                    select.append(`<option value="${item.idTipoMovi}">${item.descripcionMovi}</option>`);
                });
            }
        });
    }

    function mov_guardar() {
        // 1. Validar que no falten datos antes de enviar
        const idTipo = $("#mov_idTipoMovi").val();
        const importe = $("#mov_importe").val();

        if (idTipo == "" || importe == "") {
            toastr.warning("Por favor complete el Tipo e Importe");
            return;
        }

        // 2. Crear el objeto FormData
        let datos = new FormData();
        
        datos.append("accion", "guardar");
        datos.append("mov_idMovimiento", $("#mov_idMovimiento").val());
        datos.append("mov_idTipoMovi", idTipo);
        datos.append("mov_importe", importe);
        datos.append("mov_detalle", $("#mov_detalle").val()); 
        datos.append("mov_idOT", $("#mov_idOT").val());

        $.ajax({
            url: "ajax/movimientos.ajax.php", 
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                // Usamos .trim() para limpiar posibles espacios en blanco o saltos de línea del PHP
                if (respuesta.trim() === "ok") {
                    $("#mov_modal").modal("hide");
                    mov_listarMovimientos();
                    toastr.success("Guardado correctamente");
                } else if (respuesta.trim() === "vacio") {
                    toastr.warning("Faltan datos obligatorios");
                } else {
                    console.error("Respuesta del servidor:", respuesta);
                    toastr.error("Error al guardar");
                }
            }
        });
    }

    $(document).on("click", ".mov_btnEditar", function () {
        // 1. Extraer datos del botón (el atributo es data-tipo)
        const id = $(this).data("id");
        const tipoId = $(this).data("tipo"); 
        const importe = $(this).data("importe");
        const detalle = $(this).data("detalle");
        const ot = $(this).data("ot");

        // 2. Cargar los inputs
        $("#mov_idOT").val(ot); 
        $("#mov_idMovimiento").val(id);
        $("#mov_importe").val(importe);
        $("#mov_detalle").val(detalle);

        // 3. Seleccionar el tipo en el combo
        // Usamos .change() para que si tenés algún listener de cambio, se dispare
        $("#mov_idTipoMovi").val(tipoId).trigger('change');

        // 4. UI
        $("#mov_modal .modal-title").text("Editar Movimiento");
        $("#mov_modal").modal("show");
    });

    function mov_limpiarModal() {
        $("#mov_form")[0].reset();
        $("#mov_idMovimiento").val("");
        $("#mov_idOT").val(""); 
        $("#mov_modal .modal-title").text("Nuevo Movimiento");
    }
</script>
