<?php
	include '../api/crud/TodoCrud.php';

	echo date("d-m-Y");

	$todo = new TodoCrud();

	var_dump($todo->get());
?>