<?php
	require_once 'config.php';
	if(ISSET($_POST['add'])){
		if($_POST['task'] != ""){
			$task = $_POST['task'];
			$date = date('Y-m-d');
			$conn->query("INSERT INTO `task` VALUES('', '1', '$task', '', '$date')");
			header('location:index.php');
		}
	}
?>