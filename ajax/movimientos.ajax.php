<?php

require_once "../controladores/movimientos.controlador.php";
require_once "../modelos/movimientos.modelo.php";

class AjaxMovimientos {

    /*=============================================
    LISTAR MOVIMIENTOS DEL DÍA
    =============================================*/
    public function ajaxListarDia() {

        // Llamamos al controlador para traer solo los de hoy
        $respuesta = MovimientosControlador::ctrListarMovimientosDia();

        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    /*=============================================
    GUARDAR MOVIMIENTO (crear o editar)
    =============================================*/

    public function ajaxGuardar() {
        $datos = array(
            "idTipoMovi" => $_POST["mov_idTipoMovi"],
            "importe"    => $_POST["mov_importe"],
            "detalle"    => $_POST["mov_detalle"],
            "idOT"       => (isset($_POST["mov_idOT"]) && $_POST["mov_idOT"] != "") ? $_POST["mov_idOT"] : null
        );

        if ($_POST["mov_idMovimiento"] == "") {
            $respuesta = MovimientosControlador::ctrCrearMovimiento($datos);
        } else {
            $datos["idMovimiento"] = $_POST["mov_idMovimiento"];
            $respuesta = MovimientosControlador::ctrEditarMovimiento($datos);
        }
        echo $respuesta;
    }
}

/*=============================================
ROUTER POR ACCIÓN
=============================================*/

if (isset($_POST["accion"])) {

    $ajax = new AjaxMovimientos();

    switch ($_POST["accion"]) {

        case "listar_dia":
            $ajax->ajaxListarDia();
            break;

        case "guardar": 
            $ajax->ajaxGuardar(); 
            break;
    }

    exit;
}
