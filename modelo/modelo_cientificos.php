<?php 

class Modelocientificos{

    private $bd;
    private $cientificos;

    public function __construct(){
        $this->bd = Conectar::conexion();
        $this->cientificos = array();
    }

    public function get_cientificos_proyecto($Nombre){
        $sql = "SELECT c.DNI, c.Nombre_apellidos, p.Nombre FROM asignado_a a INNER JOIN cientificos c ON a.Cientifico = c.DNI INNER JOIN proyecto p ON a.Proyecto = p.id WHERE p.Nombre = '$Nombre'";
        $resultado = $this->bd->query($sql);
        while ($row = $resultado->fetch_assoc()){

            $this->cientificos[] = $row;
        }
        return $this->cientificos;
        
       
    }

    public function get_numero_proyectos($DNI){
        $sql = " SELECT c.DNI, c.Nombre_apellidos, count(*)as totalProyectos FROM asignado_a a INNER JOIN cientificos c ON a.Cientifico = c.DNI INNER JOIN proyecto p ON a.Proyecto = p.id WHERE c.DNI = '$DNI'";
        $resultado = $this->bd->query($sql);
        while ($row = $resultado->fetch_assoc()){

            $this->cientificos[] = $row;
        }
        return $this->cientificos;
        
       
    }

    public function get_horas_dedicadas(){
        $sql = " SELECT c.Nombre_apellidos, SUM(p.Horas)as horas_dedicadas FROM asignado_a a INNER JOIN cientificos c ON a.Cientifico = c.DNI INNER JOIN proyecto p ON a.Proyecto = p.id GROUP BY c.DNI";
        $resultado = $this->bd->query($sql);
        while ($row = $resultado->fetch_assoc()){

            $this->cientificos[] = $row;
        }
        return $this->cientificos;
        
       
    }

    public function get_cientificos_proyectos(){
        $sql = "SELECT c.Nombre_apellidos FROM cientificos c WHERE (select count(*) FROM asignado_a a WHERE c.DNI = a.Cientifico ) >=2";
        $resultado = $this->bd->query($sql);
        while ($row = $resultado->fetch_assoc()){

            $this->cientificos[] = $row;
        }
        return $this->cientificos;
        
       
    }

    public function get_cientificos_nigunproyectos(){
        $sql = "SELECT c.Nombre_apellidos FROM asignado_a a RIGHT join cientificos c on c.DNI = a.Cientifico where a.Cientifico is null";
        $resultado = $this->bd->query($sql);
        while ($row = $resultado->fetch_assoc()){

            $this->cientificos[] = $row;
        }
        return $this->cientificos;
        
       
    }

    public function get_ninguncientifico_proyectos(){
        $sql = "SELECT p.Nombre FROM proyecto p left join asignado_a a on a.proyecto = p.id where a.Proyecto is null";
        $resultado = $this->bd->query($sql);
        while ($row = $resultado->fetch_assoc()){

            $this->cientificos[] = $row;
        }
        return $this->cientificos;
        
       
    }


}




?>