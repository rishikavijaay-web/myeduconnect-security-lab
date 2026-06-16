<?php
include 'db.php';

$result = $conn->query("SELECT * FROM courses");
?>

<html>
<head>
<title>Courses</title>
</head>
<body>

<h1>Available Courses</h1>

<?php
while($row = $result->fetch_assoc()){
    echo "<h3>".$row['course_name']."</h3>";
    echo "<p>".$row['description']."</p>";
    echo "<hr>";
}
?>

</body>
</html>
