<?php
	include '../api/crud/TodoCrud.php';
	include '../api/modelos/todo.php';

	$todoCrud = new TodoCrud();
	
	if(isset($_POST['idCard'])||isset($_POST['idDelete'])){
		
		if(isset($_POST['idCard'])){
			$tarea = $todoCrud->get_todo_by_id($_POST['idCard']);
			$todo = new Todo();
			$todo->setId((int)$tarea["id"]);
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
			echo $_POST["date"];
			$todo = new Todo();
			$todo->setTitulo($_POST["task"]);
			$todo->setFechaCompletada($_POST["date"]);
			$todoCrud->post_todo($todo);
		}
		echo "Formulario recibido";
	}

	echo json_encode($todoCrud->get_todo());

	
?>