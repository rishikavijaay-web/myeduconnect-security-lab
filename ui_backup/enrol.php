<?php
include 'db.php';

$message = "";

if(isset($_POST['enrol'])){

    $user_id = $_POST['user_id'];
    $course_id = $_POST['course_id'];

    $sql = "INSERT INTO enrollments(user_id,course_id)
            VALUES('$user_id','$course_id')";

    if($conn->query($sql)){
        $message = "Enrolment Successful";
    }
}
?>

<html>
<body>

<h1>Course Enrolment</h1>

<form method="POST">

Student ID:
<input type="text" name="user_id"><br><br>

Course ID:
<input type="text" name="course_id"><br><br>

<input type="submit" name="enrol" value="Enrol">

</form>

<br>

<?php echo $message; ?>

</body>
</html>
