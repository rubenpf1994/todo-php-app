<?php
	include '../api/crud/TodoCrud.php';
	include '../api/modelos/todo.php';
	include '../api/crud/AuditCrud.php';

	$todoCrud = new TodoCrud();
	$auditCrud = new AuditCrud();
	if(isset($_POST['idCompleted'])||isset($_POST['idDelete'])){
		
		if(isset($_POST['idCompleted'])){
			$tarea = $todoCrud->get_todo_by_id($_POST['idCompleted']);
			$todo = new Todo();
			$todo->setId($tarea["id"]);
			$todo->setTitulo($tarea["titulo"]);
			$todo->setCompletada(true);
			$todo->setFechaCreacion($tarea["fecha_creacion"]);
			$todo->setFechaCompletada($tarea["fecha_completada"]);
			$todoCrud->put_todo($todo);
		}
		if(isset($_POST['idDelete'])){
			$todoCrud->delete_todo((int)$_POST['idDelete']);
		}
		
	}

	if(isset($_POST["newTask"])){
		if (isset($_POST["task"]) && isset($_POST["date"])){
			$todo = new Todo();
			$todo->setTitulo($_POST["task"]);
			$todo->setFechaCompletada($_POST["date"]);
			$todoCrud->post_todo($todo);
		}
	}

	if(isset($_GET["type"])){
		if($_GET["type"]==="todoTasks"){
			echo json_encode($todoCrud->get_todo());
		}
		if($_GET["type"]==="auditTasks"){
			echo json_encode($auditCrud->get_report(null));
		}
	}
	

	
?>