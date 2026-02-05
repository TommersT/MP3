<?php
session_start();
include_once("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $query = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $username;
        if ($row["is_admin"] == 1) {
            header('Location: viewusers.php');
        } else {
            header('Location: viewusers1.php');
        }
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Employee System</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #FFE900 0%, #ECC232 50%, #BDBCB8 100%);
            min-height: 100vh; display: flex; justify-content: center; align-items: center;
        }
        .login-container {
            background: white; padding: 40px; border-radius: 15px; width: 100%; max-width: 400px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2); transition: 0.3s ease;
        }
        h1 { color: #333; text-align: center; margin-bottom: 30px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #555; font-weight: 600; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 12px; border: 2px solid #BDBCB8; border-radius: 8px; outline: none;
        }
        input:focus { border-color: #ECC232; }
        input[type="submit"] {
            width: 100%; padding: 14px; background: #ECC232; border: none; border-radius: 8px;
            font-weight: bold; cursor: pointer; transition: 0.3s;
        }
        input[type="submit"]:hover { background: #333; color: white; }
        .register-links { text-align: center; margin-top: 20px; font-size: 14px; }
        .register-links a { color: #8a7300; text-decoration: none; font-weight: bold; }
        .error { color: #d9534f; text-align: center; margin-bottom: 15px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <input type="submit" value="Login">
            <div class="register-links">
                No account? <a href="registernow.php">Register Now</a> | 
                <a href="registeradmin.php">Admin Access</a>
            </div>
        </form>
    </div>
</body>
</html>