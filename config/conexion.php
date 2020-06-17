<?php 

    class Conectar{

        public static function conexion(){

            $conexion = new mysqli("localhost","root","root","proyecto_cientificos");
            return $conexion;
        }
    }


?>