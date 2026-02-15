<?php 

require_once "conexion.php";

class TecnicosModelo{

    /* ===============================
       LISTAR
    =============================== */
    static public function mdlListarTecnicos(){

        $stmt = Conexion::conectar()
            ->prepare("SELECT idTecnico, nombre FROM tecnicos ORDER BY idTecnico ASC");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    /* ===============================
    CREAR
    =============================== */
    static public function mdlCrearTecnico($nombre){

        $stmt = Conexion::conectar()
            ->prepare("INSERT INTO tecnicos(nombre) VALUES (:nombre)");

        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


    /* ===============================
    EDITAR
    =============================== */
    static public function mdlEditarTecnico($id, $nombre){

        $stmt = Conexion::conectar()
            ->prepare("UPDATE tecnicos 
                    SET nombre = :nombre 
                    WHERE idTecnico = :idTecnico");

        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":idTecnico", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


     /* ===============================
       VALIDACIONES
    =============================== */
    /*  uso princial -> evitar valores duplicados  */
    static public function mdlExisteTecnico($nombre, $id = null){

        if ($id) {
            $stmt = Conexion::conectar()->prepare(
                "SELECT COUNT(*) FROM tecnicos 
                WHERE nombre = :nombre AND idTecnico != :id"
            );
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        } else {
            $stmt = Conexion::conectar()->prepare(
                "SELECT COUNT(*) FROM tecnicos 
                WHERE nombre = :nombre"
            );
        }

        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    /* OBTENER TÉCNICO POR ID  */
     /*  uso princial -> evitar guardar sin cambios  */

    static public function mdlObtenerTecnicoPorId($id){

        $stmt = Conexion::conectar()
            ->prepare("SELECT nombre FROM tecnicos WHERE idTecnico = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}
