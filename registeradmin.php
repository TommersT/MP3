<?php
include_once("config.php");

if (isset($_POST["submit"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $is_admin = 1;

    // Strict Policy: Check for duplicates
    $duplicate_check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($duplicate_check) > 0) {
        $msg = "Error: Admin Username or Email already exists!";
        $is_error = true;
    } else {
        $sql = "INSERT INTO users (username, is_admin, first_name, last_name, password, email) 
                VALUES ('$username', '$is_admin', '$firstname', '$lastname', '$password', '$email')";
        
        if (mysqli_query($conn, $sql)) {
            $msg = "Admin Registration successful!";
            $is_error = false;
            header('Refresh: 2; URL = login.php');
        } else {
            $msg = "Error: " . mysqli_error($conn);
            $is_error = true;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #FFE900 0%, #ECC232 50%, #BDBCB8 100%);
            display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0;
        }
        .reg-card { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 100%; max-width: 500px; }
        h2 { text-align: center; color: #333; margin-bottom: 25px; border-bottom: 4px solid #ECC232; padding-bottom: 10px; }
        input { width: 100%; padding: 10px; border: 2px solid #BDBCB8; border-radius: 8px; margin-bottom: 15px; }
        input[type="submit"] { background: #333; color: white; font-weight: bold; cursor: pointer; border: none; transition: 0.3s; height: 45px; }
        input[type="submit"]:hover { background: #ECC232; color: #333; }
        .btn-back {
            display: block; text-align: center; padding: 10px; background: #BDBCB8; color: #333;
            text-decoration: none; border-radius: 8px; font-weight: bold; transition: 0.3s; margin-top: 10px;
        }
        .btn-back:hover { background: #999; color: white; }
    </style>
</head>
<body>
    <div class="reg-card">
        <h2>Admin Registration</h2>
        <?php if(isset($msg)) echo "<div style='color:".($is_error ? "red" : "green")."; text-align:center; margin-bottom:15px;'>$msg</div>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Register Administrator">
        </form>
        <a href="login.php" class="btn-back">Back to Login</a>
    </div>
</body>
</html>