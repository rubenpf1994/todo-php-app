<?php

require_once('conexion.php');

class AuditCrud{
    private $con = null;
    public function __construct()
    {
        $db = new Conexion();
        $this->con = $db->getConn();
    }


    public function get_report($param){
        $totalResults=[];
        if($param!=='all'){
            $query='SELECT * FROM audit join todo';
        }else{
            //Si la variable $param recibe el nombre del campo por el que filtrar
            $query='SELECT * FROM audit join todo WHERE accion LIKE '.$param;
        }
        $result = $this->con->query($query);

        while($row = $result->fetch_assoc()){
            $totalResults[]=json_encode($row);
        }

        return $totalResults;
    }   

    //Muestra la auditoria de una tarea
    public function get_report_by_id($id){
        $totalResults=[];
        $result = $this->con->query('SELECT * FROM audit where idTarea = '.$id);
        while($row = $result->fetch_assoc()){
            $totalResults[]=json_encode($row);
        }
        return $totalResults;
    }
}

?>