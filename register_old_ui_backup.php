<?php
include 'db.php';

$message = "";

if (isset($_POST['register'])) {
    $full_name = trim($_POST['full_name'] ?? "");
    $username = trim($_POST['username'] ?? "");
    $email = trim($_POST['email'] ?? "");
    $password = $_POST['password'] ?? "";
    $role = "student";

    if (!empty($full_name) && !empty($username) && !empty($email) && !empty($password)) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (full_name, username, email, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $full_name, $username, $email, $hashed_password, $role);

        if ($stmt->execute()) {
            $message = "Registration successful. You can now login.";
        } else {
            $message = "Registration failed. Username or email may already exist.";
        }

    } else {
        $message = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register | MyEduConnect</title>
    <link rel="stylesheet" href="/myeduconnect/style.css">
</head>

<body class="register-page">

<div class="topbar">
    <div class="logo">MyEduConnect</div>
    <div class="nav">
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="index.php">Home</a>
        <a href="courses.php">Courses</a>
        <a href="enrol.php">Enrol</a>
        <a href="payment.php">Payment</a>
        <a href="comments.php">Comments</a>
        <a href="profile.php">Profile</a>
        <a href="admin.php">Admin</a>
    </div>
</div>

<div class="register-wrapper">

    <div class="register-info">
        <h1>Create Your Account</h1>
        <p>
            Register as a student to access the MyEduConnect learning portal,
            browse courses, submit comments, and manage your profile.
        </p>

        <div class="register-feature">Secure password hashing with bcrypt</div>
        <div class="register-feature">Student role assigned automatically</div>
        <div class="register-feature">Protected profile and admin access control</div>

        <a href="login.php" class="register-link-btn">Already have an account? Login</a>
    </div>

    <div class="register-card">
        <h2>Student Registration</h2>

        <?php if (!empty($message)) { ?>
            <div class="payment-result">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php } ?>

        <form method="POST">
            <label>Full Name</label>
            <input type="text" name="full_name" placeholder="Enter your full name" required>

            <label>Username</label>
            <input type="text" name="username" placeholder="Choose a username" required>

            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Create a password" required>

            <input type="submit" name="register" value="Create Account">
        </form>
    </div>

</div>

</body>
</html>
