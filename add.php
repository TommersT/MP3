<?php
include_once("config.php");
if(isset($_POST['Submit'])) {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $emp_desc = mysqli_real_escape_string($conn, $_POST['emp_desc']);

    $duplicate_check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($duplicate_check) > 0) {
        $msg = "Error: Employee with this Email already exists!";
        $is_error = true;
    } else {
        $result = mysqli_query($conn, "INSERT INTO users(first_name,last_name,email,mobile,emp_desc,is_admin) VALUES('$first_name','$last_name','$email','$mobile','$emp_desc', 0)");
        if($result) {
            $msg = "Employee added successfully!";
            $is_error = false;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(135deg, #FFE900, #ECC232); display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .container { background: white; padding: 40px; border-radius: 15px; width: 500px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        h2 { text-align: center; margin-bottom: 20px; color: #333; }
        input, textarea { width: 100%; padding: 10px; border: 2px solid #BDBCB8; border-radius: 8px; margin-bottom: 15px; outline: none; }
        input[type="submit"] { background: #ECC232; border: none; font-weight: bold; cursor: pointer; height: 45px; transition: 0.3s; }
        input[type="submit"]:hover { background: #333; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <a href="viewusers.php" style="text-decoration:none; color:#666; font-weight:bold;">← Back</a>
        <h2>Add Employee</h2>
        <?php if(isset($msg)) echo "<div style='color:".($is_error ? "red" : "green")."; text-align:center; margin-bottom:15px;'>$msg <a href='viewusers.php'>View List</a></div>"; ?>
        <form method="post">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="mobile" placeholder="Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            <textarea name="emp_desc" placeholder="Employee Description"></textarea>
            <input type="submit" name="Submit" value="Add Employee">
        </form>
    </div>
</body>
</html>