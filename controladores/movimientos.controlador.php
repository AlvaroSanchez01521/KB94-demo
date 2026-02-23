<?php

class MovimientosControlador {

    /*=============================================
      LISTAR MOVIMIENTOS DEL DÍA
    =============================================*/
    static public function ctrListarMovimientosDia() {
        // La fecha se maneja en el modelo con CURDATE() para seguridad del servidor
        return MovimientosModelo::mdlListarMovimientosDia();
    }

    /*=============================================
      CREAR MOVIMIENTO
    =============================================*/
    static public function ctrCrearMovimiento($datos) {

        // Validaciones básicas
        if (empty($datos["idTipoMovi"]) || empty($datos["importe"])) {
            return "vacio";
        }

        // comprobacion del detalle
        $datos["detalle"] = trim($datos["detalle"]);

        $respuesta = MovimientosModelo::mdlCrearMovimiento($datos);

        return $respuesta ? "ok" : "error";
    }

    /*=============================================
      EDITAR MOVIMIENTO
    =============================================*/
    static public function ctrEditarMovimiento($datos) {
        if (empty($datos["idMovimiento"]) || empty($datos["idTipoMovi"]) || $datos["importe"] == "") {
            return "vacio";
        }
        
        $datos["detalle"] = trim($datos["detalle"]);
        $respuesta = MovimientosModelo::mdlEditarMovimiento($datos);
        
        return $respuesta ? "ok" : "error";
    }

    /*============ zona Arqueo =======*/
    
    static public function ctrObtenerSaldosPorTipo() {
        return MovimientosModelo::mdlObtenerSaldosPorTipo();
    }

    static public function ctrListarResumenArqueo($fechaDesde, $fechaHasta) {
        return MovimientosModelo::mdlListarResumenArqueo($fechaDesde, $fechaHasta);
    }

    static public function ctrListarDetalleDia($fecha) {
        return MovimientosModelo::mdlListarDetalleDia($fecha);
    } 
}
