<?php

require_once "conexion.php";

class ServicioTecnicoModelo{
    static public function mdlListarServicioTecnico(){
        $stmt = Conexion::conectar()->prepare('call prc_ListarServicioTecnico()');
        $stmt->execute();
        return $stmt->fetchAll();
    } 

     /*=======================================
    REGISTRAR OT DESDE EL FORMULARIO DEL MODAL
    ========================================*/
    static public function mdlRegistrarServicioTecnico($idOT, $fechaIngreso,$idCliente,$idTecnico,
                                                $idModelo,$falla,$observaciones,$presupuesto,$fechaCierre,$fechaEntrega){        

        try{
            //normaliza las bariables para q no guarde un campo vacio como strin "" distinto NULL
            $fechaCierre  = empty($fechaCierre)  ? null : $fechaCierre; 
            $fechaEntrega = empty($fechaEntrega) ? null : $fechaEntrega;

            $stmt = Conexion::conectar()->prepare('INSERT INTO ot(idOT, 
                                                                fechaIngreso, 
                                                                idCliente, 
                                                                idTecnico, 
                                                                idModelo, 
                                                                falla, 
                                                                observaciones, 
                                                                presupuesto, 
                                                                fechaCierre,
                                                                fechaEntrega) 
                                                        VALUES (:idOT, 
                                                                :fechaIngreso, 
                                                                :idCliente, 
                                                                :idTecnico, 
                                                                :idModelo, 
                                                                :falla, 
                                                                :observaciones, 
                                                                :presupuesto, 
                                                                :fechaCierre,
                                                                :fechaEntrega) ');      
                                                        
            $stmt -> bindParam(":idOT", $idOT , PDO::PARAM_STR);
            $stmt -> bindParam(":fechaIngreso", $fechaIngreso , PDO::PARAM_STR);
            $stmt -> bindParam(":idCliente", $idCliente , PDO::PARAM_STR);
            $stmt -> bindParam(":idTecnico", $idTecnico , PDO::PARAM_STR);
            $stmt -> bindParam(":idModelo", $idModelo , PDO::PARAM_STR);
            $stmt -> bindParam(":falla", $falla , PDO::PARAM_STR);
            $stmt -> bindParam(":observaciones", $observaciones , PDO::PARAM_STR);
            $stmt -> bindParam(":presupuesto", $presupuesto , PDO::PARAM_STR);
            $stmt -> bindParam(":fechaCierre", $fechaCierre , PDO::PARAM_NULL | PDO::PARAM_STR); // para q pueda manejar valor null                                                   
            $stmt -> bindParam(":fechaEntrega", $fechaEntrega , PDO::PARAM_NULL | PDO::PARAM_STR); // para q pueda manejar valor null
          
        
            if($stmt -> execute()){
                $resultado = "ok";
            }else{
                $resultado = "error";
            }  
        }catch (Exception $e) {
            $resultado = 'Excepción capturada: '.  $e->getMessage(). "\n";
        }

        $stmt = null;
        return $resultado;        
        
    }

     /*===================================================================
    TRAE 1 OT QUE SE LE PIDIO PARA CARGAR MODAL PARA UPDATE
    ====================================================================*/
    static public function mdlObtenerServicioTecnicoPorId($idOT){

    $stmt = Conexion::conectar()->prepare(
        "SELECT  ot.idOT,
                        ot.fechaIngreso,
                        ot.fechaCierre,
                        ot.fechaEntrega,
                        ot.idCliente,
                        ot.idTecnico,
                        ot.idModelo,
                        ot.falla,
                        ot.observaciones,
                        ot.presupuesto,
                        c.nombre AS cliente,
                        t.nombre AS tecnico,
                        m.idMarca 
                        FROM ot 
                        JOIN clientes c ON c.idCliente = ot.idCliente 
                        JOIN tecnicos t ON t.idTecnico = ot.idTecnico 
                        JOIN modelos m ON m.idModelo = ot.idModelo 
                        WHERE ot.idOT = :idOT"
    );

    $stmt->bindParam(":idOT", $idOT, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

     /*=======================================
    UPDATE OT DESDE EL FORMULARIO DEL MODAL
    ========================================*/

    static public function mdlActualizarServicioTecnico($idOT,$idCliente,$idTecnico,$idModelo,$falla,$observaciones,$presupuesto,$fechaCierre,$fechaEntrega){

        try {

            // Normaliza fechas vacías a NULL
            $fechaCierre  = ($fechaCierre == "")  ? null : $fechaCierre;
            $fechaEntrega = ($fechaEntrega == "") ? null : $fechaEntrega;

            $stmt = Conexion::conectar()->prepare(
                "UPDATE ot SET
                    idCliente     = :idCliente,
                    idTecnico     = :idTecnico,
                    idModelo      = :idModelo,
                    falla         = :falla,
                    observaciones = :observaciones,
                    presupuesto   = :presupuesto,
                    fechaCierre   = :fechaCierre,
                    fechaEntrega  = :fechaEntrega
                WHERE idOT = :idOT"
            );

            $stmt->bindParam(":idOT", $idOT, PDO::PARAM_INT);
            $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
            $stmt->bindParam(":idTecnico", $idTecnico, PDO::PARAM_INT);
            $stmt->bindParam(":idModelo", $idModelo, PDO::PARAM_INT);
            $stmt->bindParam(":falla", $falla, PDO::PARAM_STR);
            $stmt->bindParam(":observaciones", $observaciones, PDO::PARAM_STR);
            $stmt->bindParam(":presupuesto", $presupuesto, PDO::PARAM_STR);
            $stmt->bindParam(":fechaCierre", $fechaCierre, PDO::PARAM_NULL | PDO::PARAM_STR);
            $stmt->bindParam(":fechaEntrega", $fechaEntrega, PDO::PARAM_NULL | PDO::PARAM_STR);

            if($stmt->execute()){
                return "ok";
            }else{
                return "error";
            }

        } catch (Exception $e) {
            return "Excepción: " . $e->getMessage();
        }
    }


   static public function mdlObtenerDatosImpresion($idOT) {
    $stmt = Conexion::conectar()->prepare(
        "SELECT 
            o.idOT, o.fechaIngreso, o.falla, o.observaciones, o.presupuesto,
            c.nombre as cliente, c.dni, c.telefono1, c.telefono2,
            m.modelo as nombreModelo,
            ma.marca as nombreMarca,
            (SELECT SUM(mov.importe) FROM movimientos mov WHERE mov.idOT = o.idOT AND mov.importe > 0) as totalSenia
         FROM ot o
         INNER JOIN clientes c ON o.idCliente = c.idCliente
         INNER JOIN modelos m ON o.idModelo = m.idModelo
         INNER JOIN marcas ma ON m.idMarca = ma.idMarca
         WHERE o.idOT = :idOT"
    );

    $stmt->bindParam(":idOT", $idOT, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}



}