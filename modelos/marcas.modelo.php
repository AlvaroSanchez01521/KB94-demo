<?php
require_once "conexion.php";

class MarcasModelo{

    /* ===============================
       LISTAR
    =============================== */
    static public function mdlListarMarcas(){

        $stmt = Conexion::conectar()
            ->prepare("SELECT idMarca, marca FROM marcas ORDER BY idMarca ASC");

        $stmt->execute();
        return $stmt->fetchAll();
    }



    /* 🔹 Obtener por ID */
    static public function mdlObtenerMarcaPorId($id){

        $stmt = Conexion::conectar()
            ->prepare("SELECT marca FROM marcas WHERE idMarca = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
