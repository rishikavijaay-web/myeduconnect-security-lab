<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: forbidden.php");
    exit();
}

$result = $conn->query("SELECT id, username, role, email FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel | MyEduConnect</title>
    <link rel="stylesheet" href="/myeduconnect/style.css">
</head>

<body class="payment-page">

<div class="topbar">
    <div class="logo">MyEduConnect</div>
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="courses.php">Courses</a>
        <a href="enrol.php">Enrol</a>
        <a href="payment.php">Payment</a>
        <a href="comments.php">Comments</a>
        <a href="profile.php">Profile</a>
        <a href="admin.php">Admin</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="payment-hero">
    <h1>Admin Dashboard</h1>
    <p>Manage registered MyEduConnect users in a restricted administrator area.</p>
</div>

<div class="admin-wrapper">
    <div class="admin-card">
        <h2>Registered Users</h2>
        <p class="small-note">Only authenticated administrator accounts can access this page.</p>

        <table class="admin-table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Email</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['role']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
