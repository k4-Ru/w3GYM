<?php
require 'db.php'; 
session_start(); 

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php'); 
    exit;
}

$admin_username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin';

$search = isset($_GET['search']) ? $_GET['search'] : '';


$sql = "SELECT * FROM admins";
$params = [];

if (!empty($search)) {
    $sql .= " WHERE username LIKE :search 
              OR middle_name LIKE :search 
              OR last_name LIKE :search 
              OR username LIKE :search 
              OR email LIKE :search 
              OR phone LIKE :search ";
    $params[':search'] = '%' . $search . '%';
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$admins = $stmt->fetchAll(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>
    <link rel="stylesheet" href="Design/Dashboard.css">
</head>
<body>

    <nav>
        <div class="nav-content">
            <a href="dashboard.php">Members</a>
            <a href="new_admin.php">New Admin</a>
            <a href="admin_login.php">Logout</a>  
        </div>
    </nav>
       
    <div class="line"></div>

    <header>Welcome, <?php echo htmlspecialchars($admin_username); ?>!</header>

    <section class="_list" id="Admin_list">
        <h1>Admins List</h1>

        <?php if (isset($_SESSION['message'])): ?>
    <div class="error-message">
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php unset($_SESSION['message']); ?> 
<?php endif; ?>
        
        <form class="search" method="GET" action="" style="margin-bottom: 20px;">
            <input type="text" name="search" placeholder="Type here..." value="<?php echo htmlspecialchars($search); ?>" class="search-input">
            <button type="submit" style="padding: 5px;">Find</button>
        </form>

        <div class="DATA">
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($admins) > 0): ?>
                        <?php foreach ($admins as $admin): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($admin['admin_id']); ?></td>
                                <td><?php echo htmlspecialchars($admin['first_name']); ?></td>
                                <td><?php echo htmlspecialchars($admin['middle_name']); ?></td>
                                <td><?php echo htmlspecialchars($admin['last_name']); ?></td>
                                <td><?php echo htmlspecialchars($admin['username']); ?></td>
                                <td><?php echo htmlspecialchars($admin['email']); ?></td>
                                <td><?php echo htmlspecialchars($admin['phone']); ?></td>

                                <td>
                                    <form action="delete_admin.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="admin_id" value="<?php echo $admin['admin_id']; ?>">
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this admin?');">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" style="text-align: center;">No admins found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
