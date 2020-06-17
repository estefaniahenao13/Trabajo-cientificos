<?php 
    require_once "config/config.php";
    require_once "core/rutas.php";
    require_once "config/conexion.php";
    require_once "controlador/Cientificos.php";
    
    if(isset($_GET['c'])){

        $controlador = cargarControlador($_GET['c']);

        if(isset($_GET['action'])){

            cargarAccion($controlador,$_GET['action']);

        }else{
            cargarAccion($controlador,ACCION_PRINCIPAL);
        }

    }else{

        $controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
        $accionTmp = ACCION_PRINCIPAL;
        $controlador->$accionTmp();
    }


?>