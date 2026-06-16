<?php
include 'db.php';

if(isset($_POST['submit'])){

    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    $sql = "INSERT INTO comments(user_id, comment)
            VALUES(2, '$comment')";

    $conn->query($sql);
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
if($result){
    while($row = $result->fetch_assoc()){
        echo $row['comment'] . "<br>";
    }
}
?>

</body>
</html>
