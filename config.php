<?php
	$conn = new mysqli("localhost", "root", "", "todo_list");
 
	if(!$conn){
		die("Error: Cannot connect to the database");
	}
?>