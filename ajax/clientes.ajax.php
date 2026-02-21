<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";
require_once "../modelos/conexion.php";

class AjaxClientes {

    /* =====================================================
       🔹 CÓDIGO VIEJO (aún en uso)
       Buscador rápido de clientes (autocompletes)
    ===================================================== */
    public function ajaxBuscarClientes($termino) {
        $clientes = ClientesControlador::ctrBuscarClientes($termino);
        echo json_encode($clientes, JSON_UNESCAPED_UNICODE);
    }


    /* =====================================================
       🔹 LISTAR CLIENTES
       ✔ usado por DataTable
    ===================================================== */
    public function ajaxListarClientes() {
        $clientes = ClientesControlador::ctrListarClientes();
        echo json_encode($clientes, JSON_UNESCAPED_UNICODE);
    }


    /* =====================================================
       🔹 OBTENER CLIENTE POR ID
       ✔ usado para cargar datos en modal de edición
    ===================================================== */
    public function ajaxObtenerCliente() {
        $cliente = ClientesControlador::ctrObtenerCliente($_POST["idCliente"]);
        echo json_encode($cliente, JSON_UNESCAPED_UNICODE);
    }


    /* =====================================================
       🔹 CREAR CLIENTE
    ===================================================== */
    public function ajaxCrearCliente() {

        $datos = array(
            "nombre"     => $_POST["nombre"],
            "dni"        => $_POST["dni"],
            "telefono1"  => $_POST["telefono1"],
            "telefono2"  => $_POST["telefono2"],
            "cp"         => $_POST["cp"]
        );

        $respuesta = ClientesControlador::ctrCrearCliente($datos);
        echo $respuesta;
    }


    /* =====================================================
       🔹 EDITAR CLIENTE
    ===================================================== */
    public function ajaxEditarCliente() {

        $datos = array(
            "idCliente"  => $_POST["idCliente"],
            "nombre"     => $_POST["nombre"],
            "dni"        => $_POST["dni"],
            "telefono1"  => $_POST["telefono1"],
            "telefono2"  => $_POST["telefono2"],
            "cp"         => $_POST["cp"]
        );

        $respuesta = ClientesControlador::ctrEditarCliente($datos);
        echo $respuesta;
    }

}


/* =====================================================
   🔹 NUEVO SISTEMA (ABM con accion)
   ✔ evita interferir con el sistema viejo
===================================================== */
if (isset($_POST["accion"]) && !is_numeric($_POST["accion"])) {

    $ajax = new AjaxClientes();

    switch ($_POST["accion"]) {

        case "listar":
            $ajax->ajaxListarClientes();
            break;

        case "obtener":
            $ajax->ajaxObtenerCliente();
            break;

        case "crear":
            $ajax->ajaxCrearCliente();
            break;

        case "editar":
            $ajax->ajaxEditarCliente();
            break;
    }

    exit; // 🔴 corta ejecución para no caer en el sistema viejo
}


/* =====================================================
   🔹 SISTEMA VIEJO (compatibilidad)
   🔹 accion = 1 → buscador rápido
===================================================== */
if (isset($_POST["accion"]) && $_POST["accion"] == 1) {

    $termino = $_POST["termino"];
    $ajax = new AjaxClientes();
    $ajax->ajaxBuscarClientes($termino);
}
