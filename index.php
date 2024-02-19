<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		
	</head>
<body>
	<div class="container-fluid">
		<div class="row header-box fw-semibold text-light">
			<div class="col-md-12" style="position:relative;">
				<h2 class="header-title">To Do List</h2>
			</div>
		</div>
		<div class="row bg-secondary">
			<nav class="navbar">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">Profile</a>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="col-md-12 bg-primary image-box">
				<img src="images/stationary.png" class="img-fluid" alt="">
			</div>
			<div class="col-sm-6 list-input">
				<center>
					<form method="POST" class="form-inline" action="add_query.php">
						<input type="text" class="form-control" name="task" required/>
						<button class="btn btn-primary form-control" name="add"><i class="bi-person"></i></button>
					</form>
				</center>
			</div>
		</div>
	<br /><br /><br />
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Task</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				require 'config.php';
				$query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
				$count = 1;
				while($fetch = $query->fetch_array()){
			?>
			<tr>
				<td><?php echo $count++?></td>
				<td><?php echo $fetch['task']?></td>
				<td><?php echo $fetch['status']?></td>
				<td colspan="2">
					<center>
						<?php
							if($fetch['status'] != "Done"){
								echo 
								'<a href="update_task.php?task_id='.$fetch['task_id'].'" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></a> |';
							}
						?>
							<a href="delete_query.php?task_id=<?php echo $fetch['task_id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
					</center>
				</td>
			</tr>
			<?php
				}
			?>
		</tbody>
		</table>
	</div>
</body>
</html>