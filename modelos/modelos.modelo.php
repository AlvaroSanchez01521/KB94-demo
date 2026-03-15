<?php

require_once "conexion.php";


class ModelosModelo{


     /* ===============================
       Listar Viejo 
    =============================== */

    static public function mdlListarModelosPorMarca($idMarca) {

        $stmt = Conexion::conectar()->prepare("SELECT idModelo, modelo FROM modelos WHERE idMarca = :idMarca ORDER BY modelo ASC" );

        $stmt->bindParam(":idMarca", $idMarca, PDO::PARAM_INT); //envia id marca para poder mostrar los modelos de esa marca
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /* ===============================
       Listar para abm modelos
    =============================== */
    static public function mdlListarModelosPorMarcaABM($idMarca){
        

        $stmt = Conexion::conectar()->prepare(
            "SELECT idModelo, modelo, idMarca
            FROM modelos
            WHERE idMarca = :idMarca
            ORDER BY modelo"
        );

        $stmt->bindParam(":idMarca", $idMarca, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

   

 

    /* ===============================
       OBTENER POR ID
    =============================== */
    static public function mdlObtenerModeloPorId($id){

        $stmt = Conexion::conectar()->prepare(
            "SELECT modelo, idMarca 
             FROM modelos 
             WHERE idModelo = :id"
        );

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}




