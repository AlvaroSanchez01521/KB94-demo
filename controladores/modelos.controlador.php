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


}
