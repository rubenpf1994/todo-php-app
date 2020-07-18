<?php
require_once('conexion.php');

include 'modelos/audit.php';
class TodoCrud{
    private $con = null;
    public function __construct()
    {
        $db = new Conexion();
        $this->con = $db->getConn();
    }

    //Lista las tareas pendientes de hacer
    public function get_todo(){
        $totalResults=[];
        $result = $this->con->query('SELECT * FROM todo');

        while($row = $result->fetch_assoc()){
            $totalResults[]=json_encode($row);
        }

        return $totalResults;
    }

    //Para crear una nueva tarea
    public function post_todo($tarea){
        $insert = $this->con->prepare('INSERT INTO todo (titulo, completada,fecha_creacion) 
                                VALUES (?, ?, ?)');
        $insert->bind_param('sis', $titulo, $completada, $fecha);
        $titulo = $tarea->getTitulo();
        $completada = (int)$tarea->getCompletada();
        $fecha = $tarea->getFechaCreacion();

        //Si se ha insertado correctamente, añadimos el report correspondiente
        if($insert->execute()){
            $currentId = mysqli_insert_id($this->con);
            $audit = new Audit();
            $audit->setIdTarea($currentId);
            $audit->setAccion('post');
            $audit->setDescripcion("Creada la tarea ".$currentId." a las ".$audit->getFecha());
            $insertReport = $this->con->prepare('INSERT INTO audit (idTarea, accion, descripcion, fecha) VALUES (?,?,?,?)');
            
            if(!$insertReport->bind_param('isss', $idTarea,$accion, $descripcion, $fecha)){
                echo 'Insercion de Report sale mal';
            };

            $idTarea = $audit->getIdTarea();
            $accion = $audit->getAccion(); 
            $descripcion =  $audit->getDescripcion();
            $fecha=$audit->getFecha();
            
            $insertReport->execute();


        }
    }

    //Para eliminar una tarea
    public function delete_todo($id){
        $delete = $this->con->prepare('DELETE FROM todo WHERE id = ?');
        $delete ->bind_param('i', $id);
        
        //Si se elimina correctamente, insertamos nuevo report
        if($delete->execute()){
            $currentId = mysqli_insert_id($this->con);
            $audit = new Audit();
            $audit->setIdTarea($currentId);
            $audit->setAccion('delete');
            $audit->setDescripcion("Eliminada la tarea ".$currentId." a las ".$audit->getFecha());
            $insertReport = $this->con->prepare('INSERT INTO audit (idTarea, accion, descripcion, fecha) VALUES (?,?,?,?)');
            
            if(!$insertReport->bind_param('isss', $idTarea,$accion, $descripcion, $fecha)){
                echo 'Insercion de Report sale mal';
            };
            
            $idTarea = $audit->getIdTarea();
            $accion = $audit->getAccion(); 
            $descripcion =  $audit->getDescripcion();
            $fecha=$audit->getFecha();
            
            $insertReport->execute();


        }
    }

    //Para modificar una tarea
    public function put_todo($tarea){
        $modify = $this->con->prepare('UPDATE todo 
                                        SET titulo=?, 
                                            completada=?,
                                            fecha_creacion=?, 
                                            fecha_completada = ?
                                            WHERE id= ?');
        $modify ->bind_param('sissi', $titulo, $completada, $fecha_creacion, $fecha_completada, $id);
        $titulo = $tarea->getTitulo();
        $completada = $tarea->getCompletada();
        $fecha_creacion = $tarea->getFechaCreacion();
        $fecha_completada = $tarea->getFechaCompletada(); 
        $id = $tarea->getId();      
        

        //Si se ha modificado correctamente, añadimos el report correspondiente
        if($modify->execute()){
            $currentId = mysqli_insert_id($this->con);
            $audit = new Audit();
            $audit->setIdTarea($currentId);
            $audit->setAccion('put');
            $audit->setDescripcion("Actualizada la tarea ".$currentId." a las ".$audit->getFecha());
            $insertReport = $this->con->prepare('INSERT INTO audit (idTarea, accion, descripcion, fecha) VALUES (?,?,?,?)');
            
            if(!$insertReport->bind_param('isss', $idTarea,$accion, $descripcion, $fecha)){
                echo 'Insercion de Report sale mal';
            };
            
            $idTarea = $audit->getIdTarea();
            $accion = $audit->getAccion(); 
            $descripcion =  $audit->getDescripcion();
            $fecha=$audit->getFecha();
            
            $insertReport->execute();


        }
    }

    public function get_todo_by_id($id){
        $result = $this->con->query('SELECT * FROM todo where id = '.$id);

        return json_encode($result->fetch_assoc());
    }
}
?>