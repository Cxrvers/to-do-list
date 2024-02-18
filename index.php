<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>

<div class="container-fluid">
	<div class="row header-box">
		<div class="col-md-4 bg-primary">
		</div>
	</div>
	<div class="row">
		<div class="col-sm">
		One of three columns
		</div>
		<div class="col-sm">
		One of three columns
		</div>
		<div class="col-sm">
		One of three columns
		</div>
	</div>
	<div class="row">
		<div class="col-sm">
		One of three columns
		</div>
		<div class="col-sm">
		One of three columns
		</div>
		<div class="col-sm">
		One of three columns
		</div>
	</div>
</div>





















	<div class="header-box col-md-12">
		<h3 class="header-title col-md-4 text-secondary text-center bg-primary">To Do List</h3>
	</div>
	<div class="col-md-12">
		<img src="images/background_home.jpg" class="img-fluid col-md-12" alt="">
	</div>
	<div class="col-md-8">
		<center>
			<form method="POST" class="form-inline" action="add_query.php">
				<input type="text" class="form-control" name="task" required/>
				<button class="btn btn-primary form-control" name="add">Add Task</button>
			</form>
		</center>
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