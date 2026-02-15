<?php

require_once "conexion.php";

class ClientesModelo {

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
}
