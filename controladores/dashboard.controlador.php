<?php

class DashboardControlador{
    static public function ctrGetDatosDashboard(){
        $datos = DashboardModelo::mdlGetDatosDashboard();
        return $datos;
    }

    static public function ctrGetVentasMesActual(){
        $ventasMesActual = DashboardModelo::mdlGetVentasMesActual();
        return $ventasMesActual;
    }

    static public function ctrGetClientesFrecuentes(){
        $clientesFrecuentes = DashboardModelo::mdlGetClientesFrecuentes();
        return $clientesFrecuentes;
    }

    static public function ctrGetModelosMasIngresados(){
        $modelosMasIngresados = DashboardModelo::mdlGetModelosMasIngresados();
        return $modelosMasIngresados;
    }
}