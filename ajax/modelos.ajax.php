<?php

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";

class AjaxModelos{

    /* =====================================================
       🔹 CÓDIGO VIEJO (aún en uso)
       Listar modelos por marca (usado en selects dependientes)
    ===================================================== */
    public $idMarca;

    public function ajaxListarModelosPorMarca() {

        $modelos = ModelosControlador::ctrListarModelosPorMarca($this->idMarca);
        echo json_encode($modelos, JSON_UNESCAPED_UNICODE);
    }


    /* ===============================
       LISTAR (ABM y selects generales)
    =============================== */
    public function ajaxListarModelos(){

        $modelos = ModelosControlador::ctrListarModelos();
        echo json_encode($modelos, JSON_UNESCAPED_UNICODE);
    }


    /* ===============================
       CREAR
    =============================== */
    public function ajaxCrearModelo(){

        $respuesta = ModelosControlador::ctrCrearModelo(
            $_POST["modelo"],
            $_POST["idMarca"]
        );

        echo $respuesta;
    }


    /* ===============================
       EDITAR
    =============================== */
    public function ajaxEditarModelo(){

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
            $ajax->ajaxListarModelos();
            break;

        case "crear":
            $ajax->ajaxCrearModelo();
            break;

        case "editar":
            $ajax->ajaxEditarModelo();
            break;
    }

    exit; 
    /*
    🔴 exit corta completamente la ejecución
    evita entrar al sistema viejo
    */
}


/* =====================================================
   🔹 SISTEMA VIEJO (compatibilidad)
   🔹 Solo responde cuando llega idMarca
   🔹 Usado por selects dependientes Marca → Modelos
===================================================== */

if (isset($_POST["idMarca"])) {

    $modelos = new AjaxModelos();
    $modelos->idMarca = $_POST["idMarca"];
    $modelos->ajaxListarModelosPorMarca();
}
