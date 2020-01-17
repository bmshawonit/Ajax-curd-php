<?php  



	$conn = new PDO('mysql:host=localhost;dbname=ac','root','');

	$sql = "SELECT * FROM users ORDER BY user_id DESC";
	$statement = $conn -> prepare($sql);
	$statement -> execute();

	$data = $statement  -> fetchAll();

	$i = 1;
	foreach($data  as $d) :
?>
	<tr>
		<td><?php echo $i; $i++; ?></td>
		<td><?php echo $d['user_name']; ?></td>
		<td><?php echo $d['user_email']; ?></td>
		<td><?php echo $d['user_cell']; ?></td>
		<td>
			<a id="delete_user" user_id="<?php echo $d['user_id']; ?>" class="btn btn-danger" href="#">Delete</a>
		</td>
	</tr>

<?php endforeach; ?>