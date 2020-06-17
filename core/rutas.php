<?php 

function cargarControlador($controlador){

    $nombreControlador = ucwords($controlador)."Controller";
    $archivoControlador = 'controlador/'.ucwords($controlador).'.php';

    if(!is_file($archivoControlador)){
        
        $archivoControlador = 'controlador/'.CONTROLADOR_PRINCIPAL.'.php';

    }

    //echo $archivoControlador;
    require_once $archivoControlador;
    $control = new $nombreControlador();
    return $control;

}

function CargarAccion($controller,$accion){

    if(isset($accion) && method_exists($controller,$accion)){
        $controller->$accion();
    }else{
        $controller->ACCION_PRINCIPAL();
    }
}

?>

