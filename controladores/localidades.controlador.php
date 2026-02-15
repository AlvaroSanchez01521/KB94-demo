<?php

class LocalidadesControlador {

    /* ===============================
       LISTAR
    =============================== */
    static public function ctrListarLocalidades(){
        return LocalidadesModelo::mdlListarLocalidades();
    }

    /* ===============================
       CREAR
    =============================== */
    static public function ctrCrearLocalidad($cp, $localidad){

        if (LocalidadesModelo::mdlExisteLocalidad($cp, $localidad)) {
            return "duplicado";
        }

        return LocalidadesModelo::mdlCrearLocalidad([
            "cp" => $cp,
            "localidad" => $localidad
        ]);
    }

    /* ===============================
       EDITAR
    =============================== */
    static public function ctrEditarLocalidad($cp, $localidad){

        $actual = LocalidadesModelo::mdlObtenerLocalidad($cp);

        if (!$actual) {
            return "error";
        }

        if ($actual["localidad"] === $localidad) {
            return "sin_cambios";
        }

        if (LocalidadesModelo::mdlExisteLocalidad($cp, $localidad, $cp)) {
            return "duplicado";
        }

        return LocalidadesModelo::mdlEditarLocalidad([
            "cp" => $cp,
            "localidad" => $localidad
        ]);
    }
}
