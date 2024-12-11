<?php
require 'db.php'; 
session_start(); 

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php'); 
    exit;
}

$admin_username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin';


$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM members";
$params = [];

if (!empty($search)) {
    $sql .= " WHERE first_name LIKE :search 
              OR middle_name LIKE :search 
              OR last_name LIKE :search 
              OR username LIKE :search 
              OR email LIKE :search 
              OR phone LIKE :search 
              OR status LIKE :search
              OR membership_type LIKE :search";
    $params[':search'] = '%' . $search . '%';
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$members = $stmt->fetchAll(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="Design/Dashboard.css">
</head>
<body>

    <nav>
        <div class="nav-content">
            <a href="list_admins.php">Admins</a>
            <a href="new_admin.php">New Admin</a>
            <a href="admin_login.php">Logout</a>  
        </div>
    </nav>
       
    <div class="line"></div>

    <header>Welcome, <?php echo  htmlspecialchars($admin_username); ?>! </header>

    

    <section class="_list" id="Member_list">
        <h1>Members List</h1>
    
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
                        <th>Join Date</th>
                        <th>Membership Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            <tbody>
                    <?php if (count($members) > 0): ?>
                        <?php foreach ($members as $member): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($member['id']); ?></td>
                                <td><?php echo htmlspecialchars($member['first_name']); ?></td>
                                <td><?php echo htmlspecialchars($member['middle_name']); ?></td>
                                <td><?php echo htmlspecialchars($member['last_name']); ?></td>
                                <td><?php echo htmlspecialchars($member['username']); ?></td>
                                <td><?php echo htmlspecialchars($member['email']); ?></td>
                                <td><?php echo htmlspecialchars($member['phone']); ?></td>
                                <td><?php echo htmlspecialchars($member['join_date']); ?></td>
                                <td><?php echo htmlspecialchars($member['membership_type']); ?></td>
                                <td><?php echo htmlspecialchars($member['membership_start_date']); ?></td>
                                <td><?php echo htmlspecialchars($member['membership_end_date']); ?></td>

                                <td class="status <?php echo strtolower(htmlspecialchars($member['status'])); ?>">
                                    <?php echo htmlspecialchars($member['status']); ?>
                                </td>

                                <td><?php echo htmlspecialchars($member['updated_at']); ?></td>

                                <td>
                                <form action="delete_member.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="member_id" value="<?php echo $member['id']; ?>">
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this member?');">Delete</button>
                                    </form>

                        
                                    <form action="change_status.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="member_id" value="<?php echo $member['id']; ?>">
                                        <select name="status" onchange="this.form.submit()">
                                            <option value="" disabled selected>Status</option>
                                            <option value="Active" <?php echo $member['status'] === 'Active' ? 'selected' : ''; ?>>Active</option>
                                            <option value="Inactive" <?php echo $member['status'] === 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                                            <option value="Disabled" <?php echo $member['status'] === 'Disabled' ? 'selected' : ''; ?>>Disabled</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="14" style="text-align: center;">No members found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
