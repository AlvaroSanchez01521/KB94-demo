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

    /* ===============================
       CREAR
    =============================== */
    static public function mdlCrearMarca($marca){

        $stmt = Conexion::conectar()
            ->prepare("INSERT INTO marcas(marca) VALUES (:marca)");

        $stmt->bindParam(":marca", $marca, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    /* ===============================
       EDITAR
    =============================== */
    static public function mdlEditarMarca($id, $marca){

        $stmt = Conexion::conectar()
            ->prepare("UPDATE marcas
                       SET marca = :marca
                       WHERE idMarca = :idMarca");

        $stmt->bindParam(":marca", $marca, PDO::PARAM_STR);
        $stmt->bindParam(":idMarca", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    /* ===============================
       VALIDACIONES
    =============================== */

    /* 🔹 Evitar duplicados */
    static public function mdlExisteMarca($marca, $id = null){

        if ($id) {
            $stmt = Conexion::conectar()->prepare(
                "SELECT COUNT(*) FROM marcas
                 WHERE marca = :marca AND idMarca != :id"
            );
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        } else {
            $stmt = Conexion::conectar()->prepare(
                "SELECT COUNT(*) FROM marcas
                 WHERE marca = :marca"
            );
        }

        $stmt->bindParam(":marca", $marca, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
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
