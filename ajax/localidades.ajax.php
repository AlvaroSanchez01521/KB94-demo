<?php

require_once "../controladores/localidades.controlador.php";
require_once "../modelos/localidades.modelo.php";

require_once "../modelos/conexion.php";   


if (isset($_POST["accion"])) {

    if ($_POST["accion"] === "listar") {
        echo json_encode(LocalidadesControlador::ctrListarLocalidades());
    }

    if ($_POST["accion"] === "crear") {
        echo LocalidadesControlador::ctrCrearLocalidad(
            $_POST["cp"],
            trim($_POST["localidad"])
        );
    }

    if ($_POST["accion"] === "editar") {
        echo LocalidadesControlador::ctrEditarLocalidad(
            $_POST["cp"],
            trim($_POST["localidad"])
        );
    }
}
