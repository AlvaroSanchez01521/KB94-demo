<?php

class TipoMovimientosControlador {

    /*=============================================
      LISTAR
    =============================================*/
    static public function ctrListarTipoMovimientos() {

        return TipoMovimientosModelo::mdlListarTipoMovimientos();
    }

    /*=============================================
      CREAR
    =============================================*/
    static public function ctrCrearTipoMovimiento($descripcionMovi) {

        $descripcionMovi = trim($descripcionMovi);

        if (empty($descripcionMovi)) {
            return "vacio";
        }

        // validar duplicado
        $existe = TipoMovimientosModelo::mdlExisteTipoMovimiento($descripcionMovi);

        if ($existe) {
            return "duplicado";
        }

        $respuesta = TipoMovimientosModelo::mdlCrearTipoMovimiento($descripcionMovi);

        return $respuesta ? "ok" : "error";
    }


    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarTipoMovimiento($id, $descripcionMovi) {

    $descripcionMovi = trim($descripcionMovi);

    if (empty($descripcionMovi)) {
        return "vacio";
    }

    $actual = TipoMovimientosModelo::mdlObtenerTipoMovimientoPorId($id);

    if (!$actual) {
        return "error";
    }

    //  sin cambios
    if ($actual["descripcionMovi"] === $descripcionMovi) {
        return "sin_cambios";
    }

    //  validar duplicado (usando misma función que crear)
    $existe = TipoMovimientosModelo::mdlExisteTipoMovimiento($descripcionMovi);

    if ($existe && $existe["idTipoMovi"] != $id) {
        return "duplicado";
    }

    $respuesta = TipoMovimientosModelo::mdlEditarTipoMovimiento($id, $descripcionMovi);

    return $respuesta ? "ok" : "error";
}



}
