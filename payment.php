<?php
$message = "";

if (isset($_POST['pay'])) {
    $name = htmlspecialchars($_POST['name'] ?? "");
    $amount = htmlspecialchars($_POST['amount'] ?? "");

    if (!empty($name) && !empty($amount)) {
        $message = "Payment successful for RM" . $amount . ". Thank you, " . $name . ".";
    } else {
        $message = "Please fill in all payment details.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment | MyEduConnect</title>
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
    <h1>Course Payment</h1>
    <p>Complete a mock course payment for the MyEduConnect learning platform.</p>
</div>

<div class="payment-wrapper">

    <div class="payment-info">
        <h2>Payment Summary</h2>
        <p>This is a simulated payment workflow for the security lab environment.</p>

        <div class="summary-row">
            <span>Platform</span>
            <strong>MyEduConnect</strong>
        </div>

        <div class="summary-row">
            <span>Payment Type</span>
            <strong>Mock Payment</strong>
        </div>

        <div class="summary-row">
            <span>Status</span>
            <strong>Testing Mode</strong>
        </div>

        <p class="small-note">
            No real payment gateway or real card information is used in this lab.
        </p>
    </div>

    <div class="payment-card">
        <h2>Payment Details</h2>

        <form method="POST">
            <label>Student Name</label>
            <input type="text" name="name" placeholder="Enter student name" required>

            <label>Amount (RM)</label>
            <input type="text" name="amount" placeholder="Example: 100" required>

            <input type="submit" name="pay" value="Pay Now">
        </form>

        <?php if (!empty($message)) { ?>
            <div class="payment-result">
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
