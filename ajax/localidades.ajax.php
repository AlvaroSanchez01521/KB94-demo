<?php

require_once "../controladores/localidades.controlador.php";
require_once "../modelos/localidades.modelo.php";

require_once "../modelos/conexion.php";   


if (isset($_POST["accion"])) {

    if ($_POST["accion"] === "listar") {
        echo json_encode(LocalidadesControlador::ctrListarLocalidades());
    }

  

}
