<?php

class MarcasControlador{

    /* ===============================
       LISTAR
    =============================== */
    static public function ctrListarMarcas(){
        return MarcasModelo::mdlListarMarcas();
    }

    /* ===============================
       CREAR
    =============================== */
    static public function ctrCrearMarca($marca){

        if (MarcasModelo::mdlExisteMarca($marca)) {
            return "duplicado";
        }

        $respuesta = MarcasModelo::mdlCrearMarca($marca);
        return $respuesta ? "ok" : "error";
    }

    /* ===============================
       EDITAR
    =============================== */
    static public function ctrEditarMarca($id, $marca){

        // 🔹 Obtener actual
        $marcaActual = MarcasModelo::mdlObtenerMarcaPorId($id);

        if (!$marcaActual) {
            return "error";
        }

        // 🔹 Sin cambios
        if ($marcaActual["marca"] === $marca) {
            return "sin_cambios";
        }

        // 🔹 Validar duplicado
        if (MarcasModelo::mdlExisteMarca($marca, $id)) {
            return "duplicado";
        }

        $respuesta = MarcasModelo::mdlEditarMarca($id, $marca);
        return $respuesta ? "ok" : "error";
    }

}
