<?php

require_once "../controladores/servicio_tecnico.controlador.php";
require_once "../modelos/servicio_tecnico.modelo.php";


class ajaxServicioTecnico{

    public $idOT;
    public $fechaIngreso;
    public $idCliente;
    public $idTecnico;
    public $idModelo;
    public $falla;
    public $observaciones;
    public $presupuesto;
    public $fechaCierre;
    public $fechaEntrega;



    public function ajaxListarServicioTecnico(){
        $serviciotecnico = ServicioTecnicoControlador::ctrListarServicioTecnico();
        echo json_encode($serviciotecnico);
    }

    public function ajaxRegistrarServicioTecnico(){

    $serviciotecnico = ServicioTecnicoControlador::ctrRegistrarServicioTecnico(
        $this->idOT,
        $this->fechaIngreso,
        $this->idCliente,
        $this->idTecnico,
        $this->idModelo,
        $this->falla,
        $this->observaciones,
        $this->presupuesto,
        $this->fechaCierre,
        $this->fechaEntrega
    );

    echo json_encode($serviciotecnico);
    }

    public function ajaxObtenerServicioTecnico(){

    $serviciotecnico = ServicioTecnicoControlador::ctrObtenerServicioTecnicoPorId(
        $this->idOT
    );

    echo json_encode($serviciotecnico);
    }

    public function ajaxActualizarServicioTecnico(){

        $respuesta = ServicioTecnicoControlador::ctrActualizarServicioTecnico();

        echo json_encode($respuesta);
    }




  
}

if(isset($_POST['accion']) && $_POST['accion'] == 1){// parametro para listar OT (a la tabla)

    $serviciotecnico = new ajaxServicioTecnico();
    $serviciotecnico -> ajaxListarServicioTecnico();

} else if(isset($_POST['accion']) && $_POST['accion'] == 2){//parametro para registrar OT

    $registrarServicioTecnico = new ajaxServicioTecnico();

    $registrarServicioTecnico->idOT = $_POST["idOT"];
    $registrarServicioTecnico->fechaIngreso = $_POST["fechaIngreso"];
    $registrarServicioTecnico->idCliente = $_POST["idCliente"];
    $registrarServicioTecnico->idTecnico = $_POST["idTecnico"];
    $registrarServicioTecnico->idModelo = $_POST["idModelo"];
    $registrarServicioTecnico->falla = $_POST["falla"];
    $registrarServicioTecnico->observaciones = $_POST["observaciones"];
    $registrarServicioTecnico->presupuesto = $_POST["presupuesto"];

    // nos aseguramnos q si el campo esta vacio sea null (necesario para logica de negocio)
    $registrarServicioTecnico->fechaCierre = empty($_POST["fechaCierre"]) ? null : $_POST["fechaCierre"];
    $registrarServicioTecnico->fechaEntrega = empty($_POST["fechaEntrega"]) ? null : $_POST["fechaEntrega"];

    $registrarServicioTecnico->ajaxRegistrarServicioTecnico();

} else if(isset($_POST['accion']) && $_POST['accion'] == 3){// select para preparar update, trae 1 OT

    $obtenerServicioTecnico = new ajaxServicioTecnico();
    $obtenerServicioTecnico->idOT = $_POST["idOT"];
    $obtenerServicioTecnico->ajaxObtenerServicioTecnico();

}else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // Update desde el modal
    $updateServicioTecnico = new ajaxServicioTecnico();
    $updateServicioTecnico->ajaxActualizarServicioTecnico();
}
