<?php

require_once "conexion.php";

class MovimientosModelo {

    /*=============================================
    LISTAR MOVIMIENTOS DEL DÍA 
    =============================================*/
    static public function mdlListarMovimientosDia() {
        $stmt = Conexion::conectar()->prepare(
            "SELECT m.idMovimiento, m.fechaMovi, m.idOT, m.idTipoMovi, m.importe, m.detalle, t.descripcionMovi 
            FROM movimientos m
            INNER JOIN tipomovimientos t ON m.idTipoMovi = t.idTipoMovi
            WHERE m.fechaMovi = CURDATE()
            ORDER BY m.idMovimiento DESC"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*=============================================
    CREAR MOVIMIENTO
    =============================================*/
    static public function mdlCrearMovimiento($datos) {

        // CURDATE() para usar fecha del servidor de BD
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO movimientos(fechaMovi, idOT, idTipoMovi, importe, detalle) 
             VALUES(CURDATE(), :idOT, :idTipoMovi, :importe, :detalle)"
        );

        $stmt->bindParam(":idOT", $datos["idOT"], PDO::PARAM_INT);
        $stmt->bindParam(":idTipoMovi", $datos["idTipoMovi"], PDO::PARAM_INT);
        $stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR); // Decimal se pasa como STR en PDO
        $stmt->bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    /*=============================================
    EDITAR MOVIMIENTO
    =============================================*/
    static public function mdlEditarMovimiento($datos) {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE movimientos 
             SET idTipoMovi = :idTipoMovi, importe = :importe, detalle = :detalle 
             WHERE idMovimiento = :idMovimiento"
        );
        $stmt->bindParam(":idMovimiento", $datos["idMovimiento"], PDO::PARAM_INT);
        $stmt->bindParam(":idTipoMovi", $datos["idTipoMovi"], PDO::PARAM_INT);
        $stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR);
        $stmt->bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);
        return $stmt->execute();
    }

}
