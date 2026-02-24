<?php

class ServicioTecnicoControlador{
    static public function ctrListarServicioTecnico(){
        $serviciotecnico = ServicioTecnicoModelo::mdlListarServicioTecnico();
        return $serviciotecnico;
    }

    static public function ctrRegistrarServicioTecnico($idOT, $fechaIngreso,$idCliente,$idTecnico,
    $idModelo,$falla,$observaciones,$presupuesto,$fechaCierre,$fechaEntrega){

        $registroServicioTecnico = ServicioTecnicoModelo::mdlRegistrarServicioTecnico($idOT, $fechaIngreso,$idCliente,$idTecnico,
        $idModelo,$falla,$observaciones,$presupuesto,$fechaCierre,$fechaEntrega);

        return $registroServicioTecnico;
    }

    static public function ctrObtenerServicioTecnicoPorId($idOT){
    return ServicioTecnicoModelo::mdlObtenerServicioTecnicoPorId($idOT);
    }

    static public function ctrActualizarServicioTecnico(){

        if(isset($_POST["idOT"])){

            $respuesta = ServicioTecnicoModelo::mdlActualizarServicioTecnico(
                $_POST["idOT"],
                $_POST["idCliente"],
                $_POST["idTecnico"],
                $_POST["idModelo"],
                $_POST["falla"],
                $_POST["observaciones"],
                $_POST["presupuesto"],
                $_POST["fechaCierre"],
                $_POST["fechaEntrega"]
            );

            return $respuesta;
        }else{
            return "error";
        }
    }

    static public function ctrObtenerDatosImpresion($idOT) {
        
        $respuesta = ServicioTecnicoModelo::mdlObtenerDatosImpresion($idOT);
        return $respuesta;
    }


}
