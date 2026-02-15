<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes {

    public function ajaxBuscarClientes($termino) {
        $clientes = ClientesControlador::ctrBuscarClientes($termino);
        echo json_encode($clientes);
    }
}

if (isset($_POST["accion"]) && $_POST["accion"] == 1) {

    $termino = $_POST["termino"];
    $ajax = new AjaxClientes();
    $ajax->ajaxBuscarClientes($termino);
}
