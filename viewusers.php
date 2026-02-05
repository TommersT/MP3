<?php
/**
Crud operation by: Felipe Ante Jr 2023
**/

include_once("config.php");

$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Management - Administrator</title>
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
            max-width: 1200px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .header h2 {
            color: #333;
            margin: 0;
        }

        .current-date {
            color: #666;
            font-size: 14px;
            font-weight: 500;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5568d3;
        }

        .btn-logout {
            background: linear-gradient(135deg, #FFE900 0%, #ECC232 50%, #BDBCB8 100%);
            color: #333;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(236, 194, 50, 0.4);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #667eea;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #e0e0e0;
        }

        tr:hover {
            background: #f5f5f5;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .action-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .action-link:hover {
            color: #764ba2;
        }

        .delete-link {
            color: #dc3545;
        }

        .delete-link:hover {
            color: #c82333;
        }

        .emp-desc {
            max-width: 250px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Welcome Administrator</h2>
            <div class="current-date">
                <script>
                    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    const today = new Date();
                    document.write(today.toLocaleDateString('en-US', options));
                </script>
            </div>
        </div>

        <div class="button-group">
            <a href="add.php" class="btn btn-primary">+ Add New Employee</a>
            <a href="logout.php" class="btn btn-logout">Logout</a>
        </div>

        <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Description</th>
                <th>Operations</th>
            </tr>
            <?php
            while($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".htmlspecialchars($user_data['first_name'])."</td>";
                echo "<td>".htmlspecialchars($user_data['last_name'])."</td>";
                echo "<td>".htmlspecialchars($user_data['mobile'])."</td>";
                echo "<td>".htmlspecialchars($user_data['email'])."</td>";
                echo "<td class='emp-desc' title='".htmlspecialchars($user_data['emp_desc'])."'>".htmlspecialchars($user_data['emp_desc'])."</td>";
                echo "<td class='actions'><a href='edit.php?id=$user_data[id]' class='action-link'>Edit</a> <a href='delete.php?id=$user_data[id]' class='action-link delete-link' onclick='return confirm(\"Are you sure you want to delete this employee?\")'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
