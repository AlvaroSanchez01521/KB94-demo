<?php

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";

class AjaxModelos {

    public $idMarca;

    /* =====================================================
       🔹 CÓDIGO VIEJO (aún en uso)
    ===================================================== */
    public function ajaxListarModelosPorMarca() {

        $modelos = ModelosControlador::ctrListarModelosPorMarca($this->idMarca);
        echo json_encode($modelos, JSON_UNESCAPED_UNICODE);
    }

    /* ===============================
       LISTAR ABM
    =============================== */
    public function ajaxListarModelosPorMarcaABM() {

        $modelos = ModelosControlador::ctrListarModelosPorMarcaABM($this->idMarca);
        echo json_encode($modelos, JSON_UNESCAPED_UNICODE);
    }

    /* ===============================
       CREAR
    =============================== */
    public function ajaxCrearModelo() {

        $respuesta = ModelosControlador::ctrCrearModelo(
            $_POST["modelo"],
            $_POST["idMarca"]
        );

        echo $respuesta;
    }

    /* ===============================
       EDITAR
    =============================== */
    public function ajaxEditarModelo() {

        $respuesta = ModelosControlador::ctrEditarModelo(
            $_POST["idModelo"],
            $_POST["modelo"],
            $_POST["idMarca"]
        );

        echo $respuesta;
    }
}


/* =====================================================
   🔹 NUEVO SISTEMA (ABM con accion)
===================================================== */

if (isset($_POST["accion"])) {

    $ajax = new AjaxModelos();

    switch ($_POST["accion"]) {

        case "listar":
            $ajax->idMarca = $_POST["idMarca"]; // nesecita el idMarca xq el listado es filtrado y hay q pasarlo manualmente del _POST al objeto
            $ajax->ajaxListarModelosPorMarcaABM();
            break;

        case "crear":
            $ajax->ajaxCrearModelo();
            break;

        case "editar":
            $ajax->ajaxEditarModelo();
            break;
    }

    exit;
}

/* =====================================================
   🔹 SISTEMA VIEJO (compatibilidad)
===================================================== */

if (!isset($_POST["accion"]) && isset($_POST["idMarca"])) {

    $modelos = new AjaxModelos();
    $modelos->idMarca = $_POST["idMarca"];
    $modelos->ajaxListarModelosPorMarca();
}
