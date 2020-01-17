<?php  
	


	$conn = new PDO('mysql:host=localhost;dbname=ac','root','');

	$name = $_POST['name'];
	$email = $_POST['email'];
	$cell = $_POST['cell'];

	$sql = "INSERT INTO users (user_name, user_email, user_cell ) VALUES ( :name, :email, :cell)";
	$statement = $conn -> prepare($sql);
	$statement -> execute([
		':name'			=> $name,
		':email'		=> $email,
		':cell'			=> $cell
	]);

	echo "Data gasaaaa valo koreeeee";




?>