<?php
include_once("config.php");
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Directory</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f4f4f4; }
        .header { background: #ECC232; padding: 20px 50px; display: flex; justify-content: space-between; align-items: center; color: #333; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .container { padding: 40px 50px; }
        
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        th { background: #ECC232; padding: 15px; text-align: left; }
        td { padding: 15px; border-bottom: 1px solid #eee; }
        tr:hover { background: #fffdf0; }
        
        .btn-logout { padding: 10px 25px; background: #333; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .btn-logout:hover { background: #ECC232; color: #333; }

        .modal-overlay {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            width: 380px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            border-top: 10px solid #BDBCB8;
            animation: modalFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .modal-content h3 { color: #333; margin-bottom: 15px; }
        .modal-content p { color: #666; margin-bottom: 25px; }
        .modal-buttons { display: flex; justify-content: center; gap: 15px; }
        
        .confirm-btn { background: #ECC232; color: #333; border: none; padding: 10px 25px; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .confirm-btn:hover { background: #d4ae2b; }

        .cancel-btn { background: #BDBCB8; color: #333; border: none; padding: 10px 25px; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .cancel-btn:hover { background: #999; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Employee Directory</h1>
        <button onclick="showLogoutModal()" class="btn-logout">Logout</button>
    </div>
    <div class="container">
        <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Description</th>
            </tr>
            <?php while($user = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($user['first_name'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($user['last_name'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($user['email'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($user['mobile'] ?? 'N/A'); ?></td>
                <td><?php echo htmlspecialchars($user['emp_desc'] ?? ''); ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div id="logoutModal" class="modal-overlay">
        <div class="modal-content">
            <h3>Confirm Logout</h3>
            <p>Are you sure you want to log out?</p>
            <div class="modal-buttons">
                <button onclick="window.location.href='logout.php'" class="confirm-btn">Yes, Logout</button>
                <button onclick="closeModal()" class="cancel-btn">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        function showLogoutModal() {
            document.getElementById('logoutModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }

        window.onclick = function(event) {
            let modal = document.getElementById('logoutModal');
            if (event.target == modal) closeModal();
        }
    </script>
</body>
</html>