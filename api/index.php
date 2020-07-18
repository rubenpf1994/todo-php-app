<?php
	include '../api/crud/TodoCrud.php';
	include '../api/modelos/todo.php';

	$todoCrud = new TodoCrud();


	$todoTask = new Todo();

	$todoTask->setTitulo('Peinar canas');

	//$todo->delete_todo(7);


	var_dump($todoCrud->post_todo($todoTask));


?>