<?php

class LocalidadesModelo {

    /* ===============================
       LISTAR
    =============================== */
    static public function mdlListarLocalidades(){

        $stmt = Conexion::conectar()
            ->prepare("SELECT * FROM localidades ORDER BY localidad");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

 

    /* ===============================
       OBTENER POR CP
    =============================== */
    static public function mdlObtenerLocalidad($cp){

        $stmt = Conexion::conectar()
            ->prepare("SELECT * FROM localidades WHERE cp = :cp");

        $stmt->bindParam(":cp", $cp, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }




}
