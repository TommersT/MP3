<?php
include_once("config.php");

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $emp_desc = mysqli_real_escape_string($conn, $_POST['emp_desc']);

    $result = mysqli_query($conn, "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', mobile='$mobile', emp_desc='$emp_desc' WHERE id=$id");
    
    if($result) {
        header("Location: viewusers.php");
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
while($user_data = mysqli_fetch_array($result)) {
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
        body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(135deg, #BDBCB8, #ECC232); display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .container { background: white; padding: 40px; border-radius: 15px; width: 500px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        h2 { text-align: center; margin-bottom: 20px; }
        /* Label styling */
        label { display: block; font-weight: bold; margin-bottom: 5px; color: #333; }
        input, textarea { width: 100%; padding: 10px; border: 2px solid #BDBCB8; border-radius: 8px; margin-bottom: 15px; outline: none; }
        input[type="submit"] { background: #ECC232; border: none; font-weight: bold; cursor: pointer; transition: 0.3s; height: 45px; }
        input[type="submit"]:hover { background: #333; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <a href="viewusers.php" style="text-decoration:none; color:#666; font-weight:bold;">← Cancel</a>
        <h2>Edit Employee Data</h2>
        <form method="post" action="edit.php">
            <label>First Name</label>
            <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name);?>" required>
            
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name);?>" required>
            
            <label>Email Address</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email);?>" required>
            
            <label>Mobile Number</label>
            <input type="text" name="mobile" value="<?php echo htmlspecialchars($mobile);?>" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            
            <label>Description</label>
            <textarea name="emp_desc"><?php echo htmlspecialchars($emp_desc);?></textarea>
            
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" name="update" value="Update Data">
        </form>
    </div>
</body>
</html>