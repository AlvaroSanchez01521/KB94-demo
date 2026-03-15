<?php

class LocalidadesControlador {

    /* ===============================
       LISTAR
    =============================== */
    static public function ctrListarLocalidades(){
        return LocalidadesModelo::mdlListarLocalidades();
    }


}
