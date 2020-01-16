<?php
	//get the index from URL
	$index = $_GET['index'];

	//get json data
	$data = file_get_contents('user.json');
	$data_array = json_decode($data);

	//assign the data to selected index
	$row = $data_array[$index];

?>
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
	
</head>
<body>
<form method="POST" class="container" style="margin-top:25px;">
	<a href="index.php" class="btn btn-primary">Back</a>
	<div class="form-group">
	<p>
		<label for="firstname">FIRST NAME</label>
		<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row->firstname; ?>">
	</p>
	</div>
	<p>
		<label for="lastname">LAST NAME</label>
		<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row->lastname; ?>">
	</p>
	<p>
		<label for="address">PHONE</label>
		<input type="text" class="form-control" id="address" name="phones" value="<?php echo $row->phones; ?>">
	</p>
	<p>
		<label for="gender">EMAIL</label>
		<input type="text" class="form-control" id="gender" name="email" value="<?php echo $row->email; ?>">
	</p>
	
	<p>
		<label for="gender">ROLE</label>
		<input type="text" class="form-control" id="gender" name="role" value="<?php echo $row->role; ?>">
	</p>
	<input type="submit" class="btn btn-primary" name="save" value="Save">
</form>

<?php
	if(isset($_POST['save'])){
		//set the updated values
		$input = array(
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'phones' => $_POST['phones'],
			'email' => $_POST['email'],
			'role' => $_POST['role']			
		);

		//update the selected index
		$data_array[$index] = $input;

		//encode back to json
		$data = json_encode($data_array, JSON_PRETTY_PRINT);
		file_put_contents('user.json', $data);

		header('location: index.php');
	}
?>
</body>
</html>