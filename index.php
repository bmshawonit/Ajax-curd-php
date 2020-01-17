<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/all.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	
	<p id="output"></p>

	<div class="log">
		<div class="card">
			<div class="card-body">
					<div class="form-inline">
						<div class="form-group">
							<label for="">Name</label>
							<input id="name" name="fname" class="form-control" type="text">
						</div>

						<div class="form-group">
							<label for="">Email</label>
							<input id="email" name="lname" class="form-control" type="text">
						</div>

						<div class="form-group">
							<label for="">Cell</label>
							<input id="cell" name="lname" class="form-control" type="text">
						</div>


						
						<div class="form-group">
							<input id="submit" name="submit" class="btn btn-dark btn-block" type="submit">
						</div>
					</div>

				
			</div>
		</div>
	</div>
	


	<div class="log">
		<table class="table">
			
			<thead>
				<tr>
					<th>Sl</th>
					<th>Name</th>
					<th>Email</th>
					<th>Cell</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody id="alldata">
				
			</tbody>
		</table>
	</div>


	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){


			$('input#submit').click(function(){
				let name = $('input#name').val();
				let email = $('input#email').val();
				let cell = $('input#cell').val();

				if( name == ''  || email == '' || cell == ''  ){
					alert('fields are required');
				}else{

					$.ajax({
						url : 'data.php',
						data : { name: name, email:email, cell:cell },
						method: 'POST',
						success : function(data){


							$('input#name').val('');
							$('input#email').val('');
							$('input#cell').val('');

							showAllData();
						}
					});

				}

			});

			showAllData();
			function showAllData(){

				$.ajax({
					url : 'all_data.php',
					success	: function(data){
						$('#alldata').html(data);	
					}

				});

			}


			
			$(document).on('click','a#delete_user', function(){
				let usr_id = $(this).attr('user_id');


				$.ajax({
					url : 'delete_user.php',
					data : { usr_id: usr_id },
					method : 'POST',
					success : function(data){
						
						showAllData();
					}

				});

				return false;

			});

		});
	</script>

</body>
</html>