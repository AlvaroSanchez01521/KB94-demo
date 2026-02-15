<?php

require_once "../controladores/dashboard.controlador.php";
require_once "../modelos/dashboard.modelo.php";

class AjaxDashboard{
    public function getDatosDashboard(){
        $datos = DashboardControlador::ctrGetDatosDashboard();
        echo json_encode($datos);
    }

    public function getVentasMesActual(){
        $ventasMesActual = DashboardControlador::ctrGetVentasMesActual();
        echo json_encode($ventasMesActual);
    }

    public function getClientesFrecuentes(){
        $clientesFrecuentes = DashboardControlador::ctrGetClientesFrecuentes();
        echo json_encode($clientesFrecuentes);
    }

    public function getModelosMasIngresados(){
        $modelosMasIngresados = DashboardControlador::ctrGetModelosMasIngresados();
        echo json_encode($modelosMasIngresados);
    }
    
}


if(isset($_POST['accion']) && $_POST['accion'] == 1){// parametro para obtener las ventas del mes (grafico de barras) (deve obtener un dato para que sea distinta a las cards)

    $ventasMesActual = new AjaxDashboard();
    $ventasMesActual->getVentasMesActual();

}else if(isset($_POST['accion']) && $_POST['accion'] == 2){// accion 2 indica listar los 10 clientes frecuentes

    $clientesFrecuentes = new AjaxDashboard();
    $clientesFrecuentes->getClientesFrecuentes();

}else if(isset($_POST['accion']) && $_POST['accion'] == 3){// accion 3 indica listar los 10 telefonos más ingresados 
    $modelosMasIngresados = new AjaxDashboard();
    $modelosMasIngresados->getModelosMasIngresados();

}else{
    $datos = new AjaxDashboard();
    $datos->getDatosDashboard();
    
}