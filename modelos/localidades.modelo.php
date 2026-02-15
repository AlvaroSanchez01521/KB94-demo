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
       EXISTE CP O LOCALIDAD
    =============================== */
    static public function mdlExisteLocalidad($cp, $localidad, $cpActual = null){

        $sql = "SELECT * FROM localidades 
                WHERE (cp = :cp OR localidad = :localidad)";

        if ($cpActual !== null) {
            $sql .= " AND cp != :cpActual";
        }

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":cp", $cp, PDO::PARAM_INT);
        $stmt->bindParam(":localidad", $localidad, PDO::PARAM_STR);

        if ($cpActual !== null) {
            $stmt->bindParam(":cpActual", $cpActual, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetch();
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

    /* ===============================
       CREAR
    =============================== */
    static public function mdlCrearLocalidad($datos){

        $stmt = Conexion::conectar()
            ->prepare("INSERT INTO localidades (cp, localidad)
                       VALUES (:cp, :localidad)");

        $stmt->bindParam(":cp", $datos["cp"], PDO::PARAM_INT);
        $stmt->bindParam(":localidad", $datos["localidad"], PDO::PARAM_STR);

        return $stmt->execute() ? "ok" : "error";
    }

    /* ===============================
       EDITAR
    =============================== */
    static public function mdlEditarLocalidad($datos){

        $stmt = Conexion::conectar()
            ->prepare("UPDATE localidades 
                       SET localidad = :localidad
                       WHERE cp = :cp");

        $stmt->bindParam(":localidad", $datos["localidad"], PDO::PARAM_STR);
        $stmt->bindParam(":cp", $datos["cp"], PDO::PARAM_INT);

        return $stmt->execute() ? "ok" : "error";
    }

}
