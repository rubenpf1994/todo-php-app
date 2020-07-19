<?php
	include '../api/crud/TodoCrud.php';
	include '../api/modelos/todo.php';

	$todoCrud = new TodoCrud();

	echo json_encode($todoCrud->get_todo());
?>