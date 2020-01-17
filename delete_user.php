<?php  

	$conn = new PDO('mysql:host=localhost;dbname=ac','root','');

	$uid = $_POST['usr_id'];

	$sql = "DELETE FROM users WHERE user_id=:uid";
	$statement = $conn -> prepare($sql);
	$statement -> execute([
		':uid'			=> $uid
	]);

