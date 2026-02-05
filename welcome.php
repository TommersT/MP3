<!DOCTYPE html>
<html>
<head>
    <title>Welcome - Employee System</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #FFE900 0%, #ECC232 50%, #BDBCB8 100%);
            height: 100vh; display: flex; justify-content: center; align-items: center; text-align: center;
        }
        .welcome-card { background: white; padding: 50px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
        h1 { color: #333; margin-bottom: 20px; font-size: 36px; }
        .btn-login {
            display: inline-block; padding: 12px 40px; background: #ECC232; color: #333;
            text-decoration: none; border-radius: 30px; font-weight: bold; transition: 0.3s;
        }
        .btn-login:hover { background: #BDBCB8; transform: scale(1.05); }
    </style>
</head>
<body>
    <div class="welcome-card">
        <h1>Welcome Guest!</h1>
        <p>Your complete Employee Management solution.</p><br>
        <a href="login.php" class="btn-login">Login to Dashboard</a>
    </div>
</body>
</html>