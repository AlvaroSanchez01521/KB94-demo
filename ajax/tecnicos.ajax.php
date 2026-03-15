<?php

require_once "../controladores/tecnicos.controlador.php";
require_once "../modelos/tecnicos.modelo.php";

class AjaxTecnicos{
/* Se utiliza sistema ibrido entre la forma vieja de listar traida de ST y la nueva de abm de Tecnicos */

    /* ===============================
       LISTAR (usado por select y ABM)
    =============================== */
    public function ajaxListarTecnicos(){

        $tecnicos = TecnicosControlador::ctrListarTecnicos();

        echo json_encode($tecnicos, JSON_UNESCAPED_UNICODE);
    }

    /* ===============================
       CREAR
    =============================== */
    public function ajaxCrearTecnico(){

        $respuesta = TecnicosControlador::ctrCrearTecnico($_POST["nombre"]);

        echo $respuesta;
    }

    /* ===============================
       EDITAR
    =============================== */
    public function ajaxEditarTecnico(){

        $respuesta = TecnicosControlador::ctrEditarTecnico(
            $_POST["idTecnico"],
            $_POST["nombre"]
        );

        echo $respuesta;
    }
}

/* =====================================================
   🔹 NUEVO SISTEMA (ABM con accion)
===================================================== */

if (isset($_POST["accion"])) {

    $ajax = new AjaxTecnicos();

    switch ($_POST["accion"]) {

        case "listar":
            $ajax->ajaxListarTecnicos();
            break;

        case "crear":
            $ajax->ajaxCrearTecnico();
            break;

        case "editar":
            $ajax->ajaxEditarTecnico();
            break;
    }


    exit;/*  y no RETURN

    🟡 return
        Sale de una función o método
        NO corta la ejecución del archivo completo

    🔴 exit (o die)
        Corta completamente la ejecución del script
        Nada después de eso se ejecuta
        Evita entrar en "Sistema Viejo"    
    
    */

}

/* =====================================================
   🔹 SISTEMA VIEJO (compatibilidad)
===================================================== */

$listaTecnis = new AjaxTecnicos();
$listaTecnis->ajaxListarTecnicos();
