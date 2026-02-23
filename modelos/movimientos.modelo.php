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


    /*===== zona Arqueo =====*/


    /*=============================================
    SALDOS TOTALES (PARA LAS 4 TARJETAS)
    =============================================*/
    static public function mdlObtenerSaldosPorTipo() {
        $stmt = Conexion::conectar()->prepare(
            "SELECT t.idTipoMovi, t.descripcionMovi, SUM(IFNULL(m.importe, 0)) as saldo 
             FROM tipomovimientos t
             LEFT JOIN movimientos m ON t.idTipoMovi = m.idTipoMovi
             GROUP BY t.idTipoMovi 
             ORDER BY t.idTipoMovi ASC"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*=============================================
    RESUMEN DIARIO AGRUPADO (PARA LA TABLA DE ARQUEO)
    =============================================*/
    static public function mdlListarResumenArqueo($fechaDesde, $fechaHasta) {
        $stmt = Conexion::conectar()->prepare(
            "SELECT m.fechaMovi, 
                    t.descripcionMovi, 
                    SUM(m.importe) as netoDia,
                    m.idTipoMovi
             FROM movimientos m
             INNER JOIN tipomovimientos t ON m.idTipoMovi = t.idTipoMovi
             WHERE m.fechaMovi BETWEEN :desde AND :hasta
             GROUP BY m.fechaMovi, m.idTipoMovi
             ORDER BY m.fechaMovi DESC"
        );
        $stmt->bindParam(":desde", $fechaDesde, PDO::PARAM_STR);
        $stmt->bindParam(":hasta", $fechaHasta, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*=============================================
    DETALLE DE MOVIMIENTOS DE UN DÍA ESPECÍFICO
    =============================================*/
    static public function mdlListarDetalleDia($fecha) {

        $stmt = Conexion::conectar()->prepare(
            "SELECT m.idMovimiento, m.idOT, m.importe, m.detalle, t.descripcionMovi 
            FROM movimientos m
            INNER JOIN tipomovimientos t ON m.idTipoMovi = t.idTipoMovi
            WHERE m.fechaMovi = :fecha
            ORDER BY m.idMovimiento ASC"
        );

        $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*=============================================
    VINCULACION MOVIMIENTO CON OT
    =============================================*/
    static public function mdlObtenerPagosPorOT($idOT) {
        $stmt = Conexion::conectar()->prepare(
            "SELECT m.fechaMovi, m.importe, t.descripcionMovi 
            FROM movimientos m
            INNER JOIN tipomovimientos t ON m.idTipoMovi = t.idTipoMovi
            WHERE m.idOT = :idOT
            ORDER BY m.fechaMovi DESC"
        );
        $stmt->bindParam(":idOT", $idOT, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
