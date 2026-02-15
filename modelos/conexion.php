<?php

class Conexion{
    static public function conectar(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=kb94","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $conn;
        }
        catch (PDOException $e) {
            echo 'Falló la conexion: ' . $e->getMessage();
        }
    }
}
