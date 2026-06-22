<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: forbidden.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Access Denied</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="app-page">

<div class="app-navbar">
    <div class="app-logo">MyEduConnect</div>
    <div class="app-nav">
        <a href="index.php">Home</a>
        <a href="courses.php">Courses</a>
        <a href="comments.php">Comments</a>
        <a href="profile.php">Profile</a>
        <a href="login.php">Login</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="error-card">
    <div class="error-icon">!</div>
    <h1>Access Denied</h1>
    <p>This page is restricted to administrator accounts only. Please login using an administrator account to continue.</p>
    <a class="app-btn" href="login.php">Go to Login</a>
    <a class="app-btn" href="index.php">Back to Home</a>
</div>

</body>
</html>';
    exit();
}

$result = $conn->query("SELECT id, username, role FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>MyEduConnect Admin</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="app-page">

<div class="app-navbar">
    <div class="app-logo">MyEduConnect</div>
    <div class="app-nav">
        <a href="index.php">Home</a>
        <a href="courses.php">Courses</a>
        <a href="comments.php">Comments</a>
        <a href="profile.php">Profile</a>
        <a href="admin.php">Admin</a>
        <a href="login.php">Login</a>
    </div>
</div>

<div class="app-container">
<h1>Admin Panel</h1>

<div class="app-card">

<div class="table-wrapper">
<table class="app-table">
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Role</th>
</tr>

<?php
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
echo "<td><span class='role-badge'>" . htmlspecialchars($row['role']) . "</span></td>";
    echo "</tr>";
}
?>

</table>

</div>
</div>

<div class="app-footer">
    MyEduConnect Security Lab | CCS6324 Ethical Hacking Assignment
</div>


</body>
</html>
