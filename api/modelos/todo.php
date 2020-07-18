<?php

class Todo{
    private $id;
    private $titulo;
    private $completada;
    private $fecha_creacion;
    private $fecha_completada;

    public function __construct(){
        $this->completada = false;
        $this->fecha_creacion = date("Y-m-d H:i:s");
    }

    public function getId(){
		return $this->id;
	}
 

    public function getTitulo(){
		return $this->titulo;
	}
 
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getCompletada(){
		return $this->completada;
	}
 
    public function setCompletada($completada){
        $this->completada = $completada;
    }

    public function getFechaCreacion(){
		return $this->fecha_creacion;
	}
 
    public function setFechaCreacion($fCreacion){
        $this->fecha_creacion = $fCreacion;
    }

    public function getFechaCompletada(){
		return $this->fecha_completada;
	}
 
    public function setFechaCompletada($fCompletada){
        $this->fecha_completada = $fCompletada;
    }
}

?>