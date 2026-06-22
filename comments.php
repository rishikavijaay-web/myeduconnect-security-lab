<?php
session_start();
include 'db.php';

if (isset($_POST['submit'])) {
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO comments(user_id, comment) VALUES(?, ?)");
    $user_id = 2;
    $stmt->bind_param("is", $user_id, $comment);
    $stmt->execute();
    $stmt->close();
}

$result = $conn->query("SELECT * FROM comments");
?>

<html>
<body>

<h1>Comments Page</h1>

<form method="POST">
    Comment:
    <input type="text" name="comment">
    <input type="submit" name="submit" value="Post">
</form>

<hr>

<?php
if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo htmlspecialchars($row['comment'], ENT_QUOTES, 'UTF-8') . "<br>";
    }
}
?>

</body>
</html>
