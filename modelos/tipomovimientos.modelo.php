<?php

require_once "conexion.php";

class TipoMovimientosModelo {

    /*=============================================
    LISTAR
    =============================================*/
    static public function mdlListarTipoMovimientos() {

        $stmt = Conexion::conectar()->prepare(
            "SELECT idTipoMovi, descripcionMovi 
             FROM tipomovimientos 
             ORDER BY descripcionMovi ASC"
        );

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*=============================================
    CREAR
    =============================================*/
    static public function mdlCrearTipoMovimiento($descripcionMovi) {

        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO tipomovimientos(descripcionMovi) 
             VALUES(:descripcionMovi)"
        );

        $stmt->bindParam(":descripcionMovi", $descripcionMovi, PDO::PARAM_STR);

        return $stmt->execute();
    }

    /*=============================================
    EDITAR
    =============================================*/
    static public function mdlEditarTipoMovimiento($id, $descripcionMovi) {

        $stmt = Conexion::conectar()->prepare(
            "UPDATE tipomovimientos 
            SET descripcionMovi = :descripcionMovi
            WHERE idTipoMovi = :id"
        );

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":descripcionMovi", $descripcionMovi, PDO::PARAM_STR);

        return $stmt->execute();
    }


    /*=============================================
    OBTENER POR ID
    =============================================*/
    static public function mdlObtenerTipoMovimientoPorId($id) {

        $stmt = Conexion::conectar()->prepare(
            "SELECT descripcionMovi 
            FROM tipomovimientos 
            WHERE idTipoMovi = :id"
        );

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /*=============================================
    VALIDAR EXISTENCIA
    =============================================*/
    static public function mdlExisteTipoMovimiento($descripcionMovi) {

        $stmt = Conexion::conectar()->prepare(
            "SELECT idTipoMovi 
            FROM tipomovimientos 
            WHERE descripcionMovi = :descripcionMovi"
        );

        $stmt->bindParam(":descripcionMovi", $descripcionMovi, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
