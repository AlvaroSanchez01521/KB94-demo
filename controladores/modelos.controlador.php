<?php

class ModelosControlador {

    /* =====================================================
       🔹 CÓDIGO VIEJO (aún en uso) 
       Usado para listar modelos filtrados por marca
    ===================================================== */
    static public function ctrListarModelosPorMarca($idMarca) {

        return ModelosModelo::mdlListarModelosPorMarca($idMarca);
    }


    /* ===============================
       LISTAR ABM (modulo modelos)
    =============================== */

    static public function ctrListarModelosPorMarcaABM($idMarca) {

        return ModelosModelo::mdlListarModelosPorMarcaABM($idMarca);
    }

    /* ===============================
       CREAR
    =============================== */
    static public function ctrCrearModelo($modelo, $idMarca){

        // 🔹 Validar duplicado
        if (ModelosModelo::mdlExisteModelo($modelo, $idMarca)) {
            return "duplicado";
        }

        $respuesta = ModelosModelo::mdlCrearModelo($modelo, $idMarca);

        return $respuesta ? "ok" : "error";
    }


    /* ===============================
       EDITAR
    =============================== */
    static public function ctrEditarModelo($id, $modelo, $idMarca){

        // 🔹 Obtener datos actuales
        $modeloActual = ModelosModelo::mdlObtenerModeloPorId($id);

        if (!$modeloActual) {
            return "error";
        }

        // 🔹 Si no cambió nada
        if (
            $modeloActual["modelo"] === $modelo &&
            $modeloActual["idMarca"] == $idMarca
        ) {
            return "sin_cambios";
        }

        // 🔹 Validar duplicado excluyendo el actual
        if (ModelosModelo::mdlExisteModelo($modelo, $idMarca, $id)) {
            return "duplicado";
        }

        $respuesta = ModelosModelo::mdlEditarModelo($id, $modelo, $idMarca);
        return $respuesta ? "ok" : "error";
    }

}
