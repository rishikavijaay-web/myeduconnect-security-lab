<?php
$message = "";

if (isset($_POST['enrol']) || isset($_POST['enroll'])) {
    $student_id = $_POST['student_id'] ?? "";
    $course_id = $_POST['course_id'] ?? "";

    if (!empty($student_id) && !empty($course_id)) {
        $message = "Enrolment successful for Student ID " . htmlspecialchars($student_id) . " into Course ID " . htmlspecialchars($course_id) . ".";
    } else {
        $message = "Please enter both Student ID and Course ID.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Enrolment | MyEduConnect</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="enrol-page">

<div class="nav">
    <a href="index.php">Home</a>
    <a href="courses.php">Courses</a>
    <a href="enrol.php">Enrol</a>
    <a href="payment.php">Payment</a>
    <a href="comments.php">Comments</a>
    <a href="profile.php">Profile</a>
    <a href="admin.php">Admin</a>
    <a href="logout.php">Logout</a>
</div>

<div class="page-header">
    <h1>Course Enrolment</h1>
    <p>Register students into available MyEduConnect learning courses.</p>
</div>

<div class="enrol-wrapper">

    <div class="info-panel">
        <h2>Available Courses</h2>
        <p>Select a valid course ID and student ID to complete the enrolment workflow.</p>

        <div>
            <span class="course-tag">1 - Ethical Hacking Basics</span>
            <span class="course-tag">2 - Web Security</span>
            <span class="course-tag">3 - Cyber Law and PDPA</span>
        </div>

        <h3>Enrolment Notes</h3>
        <ul>
            <li>Student ID represents the learner account in the platform.</li>
            <li>Course ID represents the selected course.</li>
            <li>This is a mock enrolment workflow for the security lab.</li>
            <li>All testing is performed in a controlled local environment.</li>
        </ul>
    </div>

    <div class="enrol-card">
        <h2>ENROL STUDENT</h2>

        <form method="POST">
            <label>Student ID</label>
            <input type="text" name="student_id" placeholder="Example: 2" required>

            <label>Course ID</label>
            <input type="text" name="course_id" placeholder="Example: 1" required>

            <input type="submit" name="enrol" value="Enrol Student">
        </form>

        <?php if (!empty($message)) { ?>
            <div class="enrol-result">
                <?php echo $message; ?>
            </div>
        <?php } ?>
    </div>

</div>

<div class="footer">
    MyEduConnect Security Lab | CCS6324 Ethical Hacking Assignment
</div>

</body>
</html>
