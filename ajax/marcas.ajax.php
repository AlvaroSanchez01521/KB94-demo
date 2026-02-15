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

    /* ===============================
       CREAR
    =============================== */
    public function ajaxCrearMarca(){

        $respuesta = MarcasControlador::ctrCrearMarca($_POST["marca"]);
        echo $respuesta;
    }

    /* ===============================
       EDITAR
    =============================== */
    public function ajaxEditarMarca(){

        $respuesta = MarcasControlador::ctrEditarMarca(
            $_POST["idMarca"],
            $_POST["marca"]
        );

        echo $respuesta;
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

        case "crear":
            $ajax->ajaxCrearMarca();
            break;

        case "editar":
            $ajax->ajaxEditarMarca();
            break;
    }

    exit;
}

/* =====================================================
   🔹 SISTEMA VIEJO (compatibilidad)
===================================================== */

$listaMarcas = new AjaxMarcas();
$listaMarcas->ajaxListarMarcas();
