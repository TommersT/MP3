<?php
include_once("config.php");
if (isset($_POST["submit"])) {
    $username  = mysqli_real_escape_string($conn, $_POST["username"]);
    $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname  = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $password  = mysqli_real_escape_string($conn, $_POST["password"]);
    $email     = mysqli_real_escape_string($conn, $_POST["email"]);

    $duplicate_check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($duplicate_check) > 0) {
        $error = "Error: Username or Email already exists!";
    } else {
        $sql = "INSERT INTO users (username, first_name, last_name, password, email, is_admin)
                VALUES ('$username', '$firstname', '$lastname', '$password', '$email', 0)";

        if (mysqli_query($conn, $sql)) {
            $success = "Registration successful! Redirecting...";
            header("Refresh: 2; URL=login.php");
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #FFE900 0%, #ECC232 50%, #BDBCB8 100%);
            display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0;
        }
        .reg-card { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 100%; max-width: 500px; }
        h2 { text-align: center; margin-bottom: 25px; }
        input { width: 100%; padding: 10px; border: 2px solid #BDBCB8; border-radius: 8px; margin-bottom: 15px; }
        input[type="submit"] { background: #ECC232; font-weight: bold; cursor: pointer; border: none; transition: 0.3s; height: 45px; }
        input[type="submit"]:hover { background: #333; color: white; }
    </style>
</head>
<body>
    <div class="reg-card">
        <h2>Employee Registration</h2>
        <?php if(isset($success)) echo "<div style='color:green; text-align:center; margin-bottom:15px;'>$success</div>"; ?>
        <?php if(isset($error)) echo "<div style='color:red; text-align:center; margin-bottom:15px;'>$error</div>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Register Now">
        </form>
        <div style="text-align:center; margin-top:10px;"><a href="login.php" style="color:#666; text-decoration:none;">Back to Login</a></div>
    </div>
</body>
</html>