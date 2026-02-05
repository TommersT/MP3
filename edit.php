<?php
include_once("config.php");

if(isset($_POST['update']))
{
	$id = $_POST['id'];

	$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
	$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$emp_desc = mysqli_real_escape_string($conn, $_POST['emp_desc']);

	$result = mysqli_query($conn, "UPDATE users SET first_name='$first_name',last_name='$last_name', email='$email',mobile='$mobile',emp_desc='$emp_desc' WHERE id=$id");

	header("Location: viewusers.php");
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
	$first_name = $user_data['first_name'];
	$last_name = $user_data['last_name'];
	$email = $user_data['email'];
	$mobile = $user_data['mobile'];
	$emp_desc = $user_data['emp_desc'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Employee</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			min-height: 100vh;
			padding: 20px;
		}

		.container {
			max-width: 600px;
			margin: 40px auto;
			background: white;
			padding: 40px;
			border-radius: 10px;
			box-shadow: 0 10px 40px rgba(0,0,0,0.2);
		}

		h2 {
			color: #333;
			margin-bottom: 30px;
			text-align: center;
		}

		.nav-link {
			display: inline-block;
			padding: 10px 20px;
			background: #667eea;
			color: white;
			text-decoration: none;
			border-radius: 5px;
			margin-bottom: 20px;
			transition: background 0.3s;
		}

		.nav-link:hover {
			background: #764ba2;
		}

		.form-group {
			margin-bottom: 20px;
		}

		label {
			display: block;
			margin-bottom: 8px;
			color: #555;
			font-weight: 500;
		}

		input[type="text"],
		input[type="email"],
		textarea {
			width: 100%;
			padding: 12px;
			border: 2px solid #e0e0e0;
			border-radius: 5px;
			font-size: 14px;
			transition: border-color 0.3s;
		}

		input[type="text"]:focus,
		input[type="email"]:focus,
		textarea:focus {
			outline: none;
			border-color: #667eea;
		}

		textarea {
			resize: vertical;
			min-height: 100px;
			font-family: inherit;
		}

		input[type="submit"] {
			width: 100%;
			padding: 14px;
			background: #667eea;
			color: white;
			border: none;
			border-radius: 5px;
			font-size: 16px;
			font-weight: 600;
			cursor: pointer;
			transition: background 0.3s;
		}

		input[type="submit"]:hover {
			background: #764ba2;
		}
	</style>
</head>

<body>
	<div class="container">
		<a href="viewusers.php" class="nav-link">← Back to Users</a>

		<h2>Edit Employee</h2>

		<form name="update_user" method="post" action="edit.php">
			<div class="form-group">
				<label for="first_name">First Name *</label>
				<input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name);?>" required>
			</div>

			<div class="form-group">
				<label for="last_name">Last Name *</label>
				<input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name);?>" required>
			</div>

			<div class="form-group">
				<label for="email">Email *</label>
				<input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email);?>" required>
			</div>

			<div class="form-group">
				<label for="mobile">Mobile</label>
				<input type="text" id="mobile" name="mobile" value="<?php echo htmlspecialchars($mobile);?>">
			</div>

			<div class="form-group">
				<label for="emp_desc">Description</label>
				<textarea id="emp_desc" name="emp_desc" placeholder="Enter a brief description of the employee..."><?php echo htmlspecialchars($emp_desc);?></textarea>
			</div>

			<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
			<input type="submit" name="update" value="Update Employee">
		</form>
	</div>
</body>
</html>
