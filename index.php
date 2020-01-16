<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD Operation on JSON File using PHP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style>
	th{
	text-align:center;	
	}
	td{
		background-color:white;
		color:black;
		text-align:center;
	}
	table{
		 border: 1px solid black;
	}
	</style>
</head>
<body>
<!--<a href="add.php">Add</a>-->
<table border="1" class="table table-dark">
	<thead>
		<th></th>
		<th align="center">Firstname</th>
		<th>Lastname</th>
		<th>PHONE</th>
		<th>EMAIL</th>
		<th>ROLE</th>
		<th>DELETE</th>
		<th>EDIT</th>
	</thead>
	<tbody>
		<?php
			//fetch data from json
			$data = file_get_contents('user.json');
			//decode into php array
			$data = json_decode($data);

			$index = 0;
			foreach($data as $row){
				echo "
					<tr>
						<td><img src='image.png' height='20px' width='20px'></td>
						<td>".$row->firstname."</td>
						<td>".$row->lastname."</td>
						<td>".$row->phones."</td>
						<td>".$row->email."</td>
						<td>".$row->role."</td>
						<td>
							<a href='delete.php?index=".$index."'><i class='glyphicon glyphicon-remove' style='color:red;'></i></a></td>
						<td>	<a href='edit.php?index=".$index."'><i class='glyphicon glyphicon-edit'></i></a>
						
						</td>
					</tr>
				";

				$index++;
			}
		?>
	</tbody>
</table>
</body>
</html>