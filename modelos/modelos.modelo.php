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
       LISTAR
    =============================== */
    static public function mdlListarModelos(){

        $stmt = Conexion::conectar()->prepare(
                    "SELECT 
                                    m.idModelo,
                                    ma.marca,
                                    m.modelo,
                                    m.idMarca
                                FROM modelos m
                                INNER JOIN marcas ma ON ma.idMarca = m.idMarca
                                ORDER BY ma.marca ASC, m.modelo ASC;"
        );

        $stmt->execute();

        return $stmt->fetchAll();
    }

    /* ===============================
       CREAR
    =============================== */
    static public function mdlCrearModelo($modelo, $idMarca){

        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO modelos(modelo, idMarca)
             VALUES (:modelo, :idMarca)"
        );

        $stmt->bindParam(":modelo", $modelo, PDO::PARAM_STR);
        $stmt->bindParam(":idMarca", $idMarca, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /* ===============================
       EDITAR
    =============================== */
    static public function mdlEditarModelo($id, $modelo, $idMarca){

        $stmt = Conexion::conectar()->prepare(
            "UPDATE modelos 
             SET modelo = :modelo, idMarca = :idMarca
             WHERE idModelo = :idModelo"
        );

        $stmt->bindParam(":modelo", $modelo, PDO::PARAM_STR);
        $stmt->bindParam(":idMarca", $idMarca, PDO::PARAM_INT);
        $stmt->bindParam(":idModelo", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /* ===============================
       VALIDAR DUPLICADOS
    =============================== */
    static public function mdlExisteModelo($modelo, $idMarca, $id = null){

        if ($id) {
            $stmt = Conexion::conectar()->prepare(
                "SELECT COUNT(*) FROM modelos
                 WHERE modelo = :modelo 
                 AND idMarca = :idMarca
                 AND idModelo != :id"
            );
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        } else {
            $stmt = Conexion::conectar()->prepare(
                "SELECT COUNT(*) FROM modelos
                 WHERE modelo = :modelo 
                 AND idMarca = :idMarca"
            );
        }

        $stmt->bindParam(":modelo", $modelo, PDO::PARAM_STR);
        $stmt->bindParam(":idMarca", $idMarca, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
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




