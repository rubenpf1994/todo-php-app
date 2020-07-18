<?php

class Audit{
    private $id;
    private $idTarea;
    private $accion;
    private $descripcion;
    private $fecha;

    public function __construct(){
        $this->fecha = date("Y-m-d H:i:s");
    }

    public function getId(){
		return $this->id;
	}
 

    public function getIdTarea(){
		return $this->idTarea;
	}
 
    public function setIdTarea($id){
        $this->idTarea = $id;
    }

    public function getAccion(){
		return $this->accion;
	}
 
    public function setAccion($accion){
        $this->accion = $accion;
    }

    public function getDescripcion(){
		return $this->descripcion;
	}
 
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getFecha(){
		return $this->fecha;
	}
 
    public function setFechaCompletada($fecha){
        $this->fecha = $fecha;
    }
}

?>