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

<!DOCTYPE html>
<html>
<head>
    <title>MyEduConnect Comments</title>
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
        <a href="logout.php">Logout</a> 
    </div>
</div>

<div class="app-container">
<h1>Comments Page</h1>
<form method="POST" class="app-form">
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
</div>

<div class="app-footer">
    MyEduConnect Security Lab | CCS6324 Ethical Hacking Assignment
</div>

</body>
</html>
