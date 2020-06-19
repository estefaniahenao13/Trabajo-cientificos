<?php 

    class CientificosController {

        public function __construct(){
            require_once "modelo/modelo_cientificos.php";
        }

        public function index(){

            require_once "modelo/modelo_cientificos.php";
            $cientificos = new Modelocientificos();

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                header("HTTP/1.1 200 OK");
                echo json_encode(['hola mundo']);
            }else{
                header("HTTP/1.1 500 Bad Request");
            }
           

            require_once "vistas/cientificos/cientificos.php";
            
        }

        public function consulta_a(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                header("HTTP/1.1 200 OK");
                
                $Nombre = $_REQUEST['Nombre'];

                $arreglo = array();
                $arreglo['Nombre']=$Nombre;

                $cientificos = new Modelocientificos();
                $arreglo= $cientificos->get_cientificos_proyecto($Nombre);
                echo json_encode($arreglo);

            }else{
                header("HTTP/1.1 500 Bad Request");
            }
            require_once "vistas/cientificos/consult_a.php";
        }

        public function consulta_b(){

            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                header("HTTP/1.1 200 OK");

                $DNI = $_REQUEST['DNI'];

                $arreglo = array();
                $arreglo['DNI']=$DNI;

                
                $cientificos = new Modelocientificos();
                $arreglo= $cientificos->get_numero_proyectos($DNI);
                echo json_encode($arreglo);

            }else{
                header("HTTP/1.1 500 Bad Request");
            }
            require_once "vistas/cientificos/consult_b.php";
        }

        public function consulta_c(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                header("HTTP/1.1 200 OK");
            
                $cientificos = new Modelocientificos();
                $arreglo= $cientificos-> get_horas_dedicadas();
                echo json_encode($arreglo);

            }else{
                header("HTTP/1.1 500 Bad Request");
            }
            require_once "vistas/cientificos/consult_c.php";
        }

        public function consulta_d(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                header("HTTP/1.1 200 OK");
                
                $cientificos = new Modelocientificos();
                $arreglo= $cientificos-> get_cientificos_proyectos();
                echo json_encode($arreglo);

            }else{
                header("HTTP/1.1 500 Bad Request");
            }
            require_once "vistas/cientificos/consult_d.php";
        }

        public function consulta_d_1(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                header("HTTP/1.1 200 OK");
                
                $cientificos = new Modelocientificos();
                $arreglo= $cientificos-> get_cientificos_nigunproyectos();
                echo json_encode($arreglo);

            }else{
                header("HTTP/1.1 500 Bad Request");
            }
            require_once "vistas/cientificos/consult_d.php";
        }

        public function consulta_e(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                header("HTTP/1.1 200 OK");
            
                $cientificos = new Modelocientificos();
                $arreglo= $cientificos->get_ninguncientifico_proyectos();
                echo json_encode($arreglo);

            }else{
                header("HTTP/1.1 500 Bad Request");
            }
            require_once "vistas/cientificos/consult_d.php";
        }
    }

?>