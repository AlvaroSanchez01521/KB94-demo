<?php

class MarcasControlador{

    /* ===============================
       LISTAR
    =============================== */
    static public function ctrListarMarcas(){
        return MarcasModelo::mdlListarMarcas();
    }


}
