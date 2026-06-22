<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Access denied. Admins only.");
}

$result = $conn->query("SELECT id, username, role FROM users");
?>

<html>
<body>

<h1>Admin Panel</h1>

<table border="1">
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
    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>
