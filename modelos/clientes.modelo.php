<?php

require_once "conexion.php";

class ClientesModelo {

    /* =====================================================
       🔹 CÓDIGO VIEJO (aún en uso)
       Buscador rápido de clientes (autocompletes, etc.)
    ===================================================== */
    static public function mdlBuscarClientes($termino) {

        $stmt = Conexion::conectar()->prepare("
            SELECT idCliente, nombre 
            FROM clientes 
            WHERE nombre LIKE :termino 
            LIMIT 10
        ");

        $stmt->bindValue(":termino", "%$termino%", PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /* =====================================================
       🔹 LISTAR CLIENTES (para DataTable)
    ===================================================== */
    static public function mdlListarClientes() {

        $stmt = Conexion::conectar()->prepare("
            SELECT 
                c.idCliente,
                c.nombre,
                c.dni,
                c.telefono1,
                c.telefono2,
                c.cp,
                l.localidad
            FROM clientes c
            INNER JOIN localidades l ON c.cp = l.cp
            ORDER BY c.idCliente DESC
        ");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /* =====================================================
       🔹 OBTENER CLIENTE POR ID
       Usado para cargar datos en el modal de edición
    ===================================================== */
    static public function mdlObtenerClientePorId($idCliente) {

        $stmt = Conexion::conectar()->prepare("
            SELECT *
            FROM clientes
            WHERE idCliente = :idCliente
        ");

        $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    /* =====================================================
       🔹 VERIFICAR DUPLICADO POR NOMBRE
       ✔ usado en crear y editar
    ===================================================== */
    static public function mdlExisteCliente($nombre, $idExcluir = null) {

        if ($idExcluir) {
            $stmt = Conexion::conectar()->prepare("
                SELECT idCliente
                FROM clientes
                WHERE nombre = :nombre
                AND idCliente != :idCliente
            ");
            $stmt->bindParam(":idCliente", $idExcluir, PDO::PARAM_INT);
        } else {
            $stmt = Conexion::conectar()->prepare("
                SELECT idCliente
                FROM clientes
                WHERE nombre = :nombre
            ");
        }

        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch() ? true : false;
    }


    /* =====================================================
       🔹 CREAR CLIENTE
    ===================================================== */
    static public function mdlCrearCliente($datos) {

        $stmt = Conexion::conectar()->prepare("
            INSERT INTO clientes (nombre, dni, telefono1, telefono2, cp)
            VALUES (:nombre, :dni, :telefono1, :telefono2, :cp)
        ");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
        $stmt->bindParam(":telefono1", $datos["telefono1"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono2", $datos["telefono2"], PDO::PARAM_STR);
        $stmt->bindParam(":cp", $datos["cp"], PDO::PARAM_INT);

        return $stmt->execute() ? "ok" : "error";
    }


    /* =====================================================
       🔹 EDITAR CLIENTE
    ===================================================== */
    static public function mdlEditarCliente($datos) {

        $stmt = Conexion::conectar()->prepare("
            UPDATE clientes
            SET nombre = :nombre,
                dni = :dni,
                telefono1 = :telefono1,
                telefono2 = :telefono2,
                cp = :cp
            WHERE idCliente = :idCliente
        ");

        $stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
        $stmt->bindParam(":telefono1", $datos["telefono1"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono2", $datos["telefono2"], PDO::PARAM_STR);
        $stmt->bindParam(":cp", $datos["cp"], PDO::PARAM_INT);

        return $stmt->execute() ? "ok" : "error";
    }

}
