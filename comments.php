<?php
session_start();
include 'db.php';

/* Allow comments page only for logged-in users */

$user_id = $_SESSION['user_id'] ?? 1;

$message = "";

if (isset($_POST['submit_comment'])) {
    $comment = $_POST['comment'] ?? "";
$user_id = $_SESSION['user_id'] ?? 1;

    if (!empty($comment)) {
        $stmt = $conn->prepare("INSERT INTO comments (user_id, comment) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $comment);

        if ($stmt->execute()) {
            $message = "Comment submitted successfully.";
        } else {
            $message = "Failed to submit comment.";
        }
    } else {
        $message = "Please enter a comment.";
    }
}

$result = $conn->query("SELECT comments.comment, users.username 
                        FROM comments 
                        LEFT JOIN users ON comments.user_id = users.id 
                        ORDER BY comments.id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Comments | MyEduConnect</title>
    <link rel="stylesheet" href="/myeduconnect/style.css">
</head>

<body class="payment-page">

<div class="topbar">
    <div class="logo">MyEduConnect</div>
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
</div>

<div class="payment-hero">
    <h1>Comments</h1>
    <p>Share feedback and test stored XSS remediation safely.</p>
</div>

<div class="comments-wrapper">

    <div class="comments-card">
        <h2>Submit a Comment</h2>

        <?php if (!empty($message)) { ?>
            <div class="payment-result">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php } ?>

        <form method="POST">
            <label>Comment</label>
            <textarea name="comment" placeholder="Enter your comment here" required></textarea>

            <input type="submit" name="submit_comment" value="Submit Comment">
        </form>
    </div>

    <div class="comments-card">
        <h2>Recent Comments</h2>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="comment-item">
                <strong><?php echo htmlspecialchars($row['username'] ?? 'Unknown User'); ?></strong>
                <p><?php echo htmlspecialchars($row['comment'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        <?php } ?>
    </div>

</div>

</body>
</html>
