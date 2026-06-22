<?php
include 'db.php';

$users = $conn->query("SELECT * FROM users");
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
while($row = $users->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['username']."</td>";
    echo "<td>".$row['role']."</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>
