<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - Employee Management System</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .register-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
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
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #667eea;
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
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background: #764ba2;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            color: #764ba2;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>

        <?php
        if (isset($_POST["submit"])) {
            include_once("config.php");

            $username  = mysqli_real_escape_string($conn, $_POST["username"]);
            $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
            $lastname  = mysqli_real_escape_string($conn, $_POST["lastname"]);
            $password  = mysqli_real_escape_string($conn, $_POST["password"]);
            $email     = mysqli_real_escape_string($conn, $_POST["email"]);

            $sql = "INSERT INTO users (username, first_name, last_name, password, email)
                    VALUES ('$username', '$firstname', '$lastname', '$password', '$email')";

            if (mysqli_query($conn, $sql)) {
                echo "<div class='success-message'>Registration successful! Redirecting to login...</div>";
                header("Refresh: 2; URL=login.php");
            } else {
                echo "<div class='error-message'>Error: " . mysqli_error($conn) . "</div>";
            }

            mysqli_close($conn);
        }
        ?>

        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username *</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="firstname">First Name *</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>

            <div class="form-group">
                <label for="lastname">Last Name *</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" id="password" name="password" required>
            </div>

            <input type="submit" name="submit" value="Register">

            <div class="login-link">
                Already have an account? <a href="login.php">Login Here</a>
            </div>
        </form>
    </div>
</body>
</html>

