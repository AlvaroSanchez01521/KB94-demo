<?php

require_once "../controladores/tipomovimientos.controlador.php";
require_once "../modelos/tipomovimientos.modelo.php";

class AjaxTipoMovimientos {

    /*=============================================
    LISTAR
    =============================================*/
    public function ajaxListar() {

        echo json_encode(
            TipoMovimientosControlador::ctrListarTipoMovimientos(),
            JSON_UNESCAPED_UNICODE
        );
    }

    /*=============================================
    CREAR
    =============================================*/
    public function ajaxCrear() {

        $respuesta = TipoMovimientosControlador::ctrCrearTipoMovimiento(
            $_POST["descripcionMovi"]
        );

        echo $respuesta;
    }

    /*=============================================
    EDITAR
    =============================================*/
    public function ajaxEditar() {

        $respuesta = TipoMovimientosControlador::ctrEditarTipoMovimiento(
            $_POST["idTipoMovi"],
            $_POST["descripcionMovi"]
        );

        echo $respuesta;
    }
}


/*=============================================
ROUTER POR ACCION
=============================================*/

if (isset($_POST["accion"])) {

    $ajax = new AjaxTipoMovimientos();

    switch ($_POST["accion"]) {

        case "listar":
            $ajax->ajaxListar();
            break;

        case "crear":
            $ajax->ajaxCrear();
            break;

        case "editar":
            $ajax->ajaxEditar();
            break;
    }

    exit;
}
