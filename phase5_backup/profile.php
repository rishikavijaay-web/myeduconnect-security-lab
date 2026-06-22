<?php
include 'db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();
?>

<html>
<body>

<h1>Student Profile</h1>

<p><b>Name:</b> <?php echo $user['full_name']; ?></p>
<p><b>Username:</b> <?php echo $user['username']; ?></p>
<p><b>Email:</b> <?php echo $user['email']; ?></p>
<p><b>Role:</b> <?php echo $user['role']; ?></p>

</body>
</html>
