<?php

class TecnicosControlador{

    /* ===============================
       LISTAR
    =============================== */
    static public function ctrListarTecnicos(){
        
        return TecnicosModelo::mdlListarTecnicos();
    }

    /* ===============================
       CREAR
    =============================== */
    static public function ctrCrearTecnico($nombre){

        if (TecnicosModelo::mdlExisteTecnico($nombre)) {
            return "duplicado";
        }

        $respuesta = TecnicosModelo::mdlCrearTecnico($nombre);

        return $respuesta ? "ok" : "error";
    }


    /* ===============================
       EDITAR
    =============================== */
    static public function ctrEditarTecnico($id, $nombre){

        // 🔹 Obtener nombre actual
        $tecnicoActual = TecnicosModelo::mdlObtenerTecnicoPorId($id);

        if (!$tecnicoActual) {
            return "error";
        }

        // 🔹 Si no cambió nada
        if ($tecnicoActual["nombre"] === $nombre) {
            return "sin_cambios";
        }

        // 🔹 Validar duplicado (excluyendo el actual)
        if (TecnicosModelo::mdlExisteTecnico($nombre, $id)) {
            return "duplicado";
        }

        $respuesta = TecnicosModelo::mdlEditarTecnico($id, $nombre);
        return $respuesta ? "ok" : "error";
    }


}
