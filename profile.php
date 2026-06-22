<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please login first.");
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT id, username, role, full_name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    die("Profile not found.");
}

$stmt->close();
?>

<html>
<body>

<h1>User Profile</h1>

<p><b>ID:</b> <?php echo htmlspecialchars($user['id']); ?></p>
<p><b>Username:</b> <?php echo htmlspecialchars($user['username']); ?></p>
<p><b>Role:</b> <?php echo htmlspecialchars($user['role']); ?></p>
<p><b>Full Name:</b> <?php echo htmlspecialchars($user['full_name']); ?></p>
<p><b>Email:</b> <?php echo htmlspecialchars($user['email']); ?></p>

</body>
</html>
