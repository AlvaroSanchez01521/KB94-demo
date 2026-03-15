<?php

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

class AjaxMarcas{

    /* ===============================
       LISTAR
    =============================== */
    public function ajaxListarMarcas(){

        $marcas = MarcasControlador::ctrListarMarcas();
        echo json_encode($marcas, JSON_UNESCAPED_UNICODE);
    }


}

/* =====================================================
   🔹 NUEVO SISTEMA (ABM con accion)
===================================================== */

if (isset($_POST["accion"])) {

    $ajax = new AjaxMarcas();

    switch ($_POST["accion"]) {

        case "listar":
            $ajax->ajaxListarMarcas();
            break;
    }


    exit;
}

/* =====================================================
   🔹 SISTEMA VIEJO (compatibilidad)
===================================================== */

$listaMarcas = new AjaxMarcas();
$listaMarcas->ajaxListarMarcas();
