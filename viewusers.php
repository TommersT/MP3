<?php
include_once("config.php");
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f9f9f9; }
        .header { background: #ECC232; padding: 20px 50px; display: flex; justify-content: space-between; align-items: center; color: #333; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .container { padding: 40px 50px; }
        .btn { padding: 12px 25px; border-radius: 8px; text-decoration: none; font-weight: bold; transition: 0.3s; display: inline-block; cursor: pointer; border: none; }
        .btn-add { background: #333; color: white; }
        .btn-add:hover { background: #FFE900; color: #333; transform: translateY(-2px); }
        .btn-logout { background: #BDBCB8; color: #333; }
        .btn-logout:hover { background: #999; }
        
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        th { background: #ECC232; padding: 18px; text-align: left; }
        td { padding: 18px; border-bottom: 1px solid #eee; }
        tr:hover { background: #fffdf0; }
        
        .actions a { margin-right: 15px; text-decoration: none; font-weight: bold; padding: 8px 15px; border-radius: 5px; cursor: pointer; display: inline-block; }
        .edit { color: #8a7300; border: 1px solid #8a7300; }
        .delete { color: #d9534f; border: 1px solid #d9534f; }

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
            width: 400px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            animation: modalFadeIn 0.3s ease;
        }

        .gold-border { border-top: 10px solid #ECC232; }
        .silver-border { border-top: 10px solid #BDBCB8; }

        @keyframes modalFadeIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .modal-content h3 { color: #333; margin-bottom: 15px; }
        .modal-content p { color: #666; margin-bottom: 25px; }
        .modal-buttons { display: flex; justify-content: center; gap: 15px; }
        
        .confirm-btn { color: white; border: none; padding: 10px 25px; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .btn-red { background: #d9534f; }
        .btn-red:hover { background: #c9302c; }
        .btn-gold { background: #ECC232; color: #333; }
        .btn-gold:hover { background: #d4ae2b; }

        .cancel-btn { background: #BDBCB8; color: #333; border: none; padding: 10px 25px; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .cancel-btn:hover { background: #999; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Administrator Dashboard</h1>
        <div>
            <a href="add.php" class="btn btn-add">+ Add Employee</a>
            <button onclick="showLogoutModal()" class="btn btn-logout">Logout</button>
        </div>
    </div>

    <div class="container">
        <table>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <?php while($user = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? '')); ?></td>
                <td><?php echo htmlspecialchars($user['email'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($user['mobile'] ?? 'N/A'); ?></td>
                <td><?php echo htmlspecialchars($user['emp_desc'] ?? ''); ?></td>
                <td class="actions">
                    <a href="edit.php?id=<?php echo $user['id']; ?>" class="edit">Edit</a>
                    <a class="delete" onclick="showDeleteModal(<?php echo $user['id']; ?>)">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div id="deleteModal" class="modal-overlay">
        <div class="modal-content gold-border">
            <h3>Delete User?</h3>
            <p>Are you sure you want to delete this user? This action cannot be undone.</p>
            <div class="modal-buttons">
                <button id="modalConfirmDelete" class="confirm-btn btn-red">Yes, Delete</button>
                <button onclick="closeModals()" class="cancel-btn">Cancel</button>
            </div>
        </div>
    </div>

    <div id="logoutModal" class="modal-overlay">
        <div class="modal-content silver-border">
            <h3>Confirm Logout</h3>
            <p>Are you sure you want to log out of your account?</p>
            <div class="modal-buttons">
                <button onclick="window.location.href='logout.php'" class="confirm-btn btn-gold">Yes, Logout</button>
                <button onclick="closeModals()" class="cancel-btn">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        let deleteId = null;

        function showDeleteModal(id) {
            deleteId = id;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function showLogoutModal() {
            document.getElementById('logoutModal').style.display = 'flex';
        }

        function closeModals() {
            document.getElementById('deleteModal').style.display = 'none';
            document.getElementById('logoutModal').style.display = 'none';
        }

        document.getElementById('modalConfirmDelete').onclick = function() {
            if (deleteId) window.location.href = "delete.php?id=" + deleteId;
        };

        window.onclick = function(event) {
            if (event.target.className === 'modal-overlay') closeModals();
        }
    </script>
</body>
</html>