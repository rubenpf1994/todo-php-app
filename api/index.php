<?php
	include '../api/crud/TodoCrud.php';
	include '../api/modelos/todo.php';

	$todoCrud = new TodoCrud();

	echo json_encode($todoCrud->get_todo());

	
	if(isset($_POST["tarea"])){
		echo $_POST["tarea"];
		echo "Formulario recibido";
		header('Location: file://workspace/todo-app/front-end/index.html');
	exit;
	}

	
?>