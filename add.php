<!DOCTYPE html>
<html>
<head>
	<title>Add Employee</title>
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

		.success-message {
			background: #d4edda;
			color: #155724;
			padding: 15px;
			border-radius: 5px;
			margin-top: 20px;
			border: 1px solid #c3e6cb;
		}

		.success-message a {
			color: #155724;
			font-weight: 600;
		}
	</style>
</head>

<body>
	<div class="container">
		<a href="viewusers.php" class="nav-link">← Back to Users</a>

		<h2>Add New Employee</h2>

		<form action="add.php" method="post" name="form1">
			<div class="form-group">
				<label for="first_name">First Name *</label>
				<input type="text" id="first_name" name="first_name" required>
			</div>

			<div class="form-group">
				<label for="last_name">Last Name *</label>
				<input type="text" id="last_name" name="last_name" required>
			</div>

			<div class="form-group">
				<label for="email">Email *</label>
				<input type="email" id="email" name="email" required>
			</div>

			<div class="form-group">
				<label for="mobile">Mobile</label>
				<input type="text" id="mobile" name="mobile">
			</div>

			<div class="form-group">
				<label for="emp_desc">Description</label>
				<textarea id="emp_desc" name="emp_desc" placeholder="Enter a brief description of the employee..."></textarea>
			</div>

			<input type="submit" name="Submit" value="Add Employee">
		</form>

		<?php
		if(isset($_POST['Submit'])) {
			include_once("config.php");

			$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
			$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
			$emp_desc = mysqli_real_escape_string($conn, $_POST['emp_desc']);

			$result = mysqli_query($conn, "INSERT INTO users(first_name,last_name,email,mobile,emp_desc) VALUES('$first_name','$last_name','$email','$mobile','$emp_desc')");

			if($result) {
				echo "<div class='success-message'>Employee added successfully! <a href='viewusers.php'>View Users</a></div>";
			}
		}
		?>
	</div>
</body>
</html>
