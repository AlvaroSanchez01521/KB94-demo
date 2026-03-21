<?php

require_once "../controladores/localidades.controlador.php";
require_once "../modelos/localidades.modelo.php";

class AjaxLocalidades {

    public function ajaxListar() {
        echo json_encode(
            LocalidadesControlador::ctrListarLocalidades(),
            JSON_UNESCAPED_UNICODE
        );
    }

  

}


/*=============================================
ROUTER
=============================================*/

if (isset($_POST["accion"])) {

    $ajax = new AjaxLocalidades();

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