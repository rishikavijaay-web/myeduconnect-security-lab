<?php
session_start();
include 'db.php';

$message = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password, role, full_name FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['full_name'] = $user['full_name'];
            header("Location: index.php");
          exit();
$_SESSION['login_success'] = "Login successful. Welcome " . $user['username'] . " (" . $user['role'] . ")";
header("Location: index.php");
exit();
        } else {
            $message = "Invalid username or password";
        }
    } else {
        $message = "Invalid username or password";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>MyEduConnect Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">

<div class="login-card">

    <div class="login-left">
        <h1>Welcome to MyEduConnect</h1>
<?php
session_start();
if (isset($_SESSION['login_success'])) {
    echo "<div class='success-message'>" . htmlspecialchars($_SESSION['login_success']) . "</div>";
    unset($_SESSION['login_success']);
}
?>
        <p>
            A secure learning portal for students, teachers and administrators.
            This platform supports login, course browsing, enrolment, profiles,
            comments and admin management.
        </p>

        <div class="login-shape shape1"></div>
        <div class="login-shape shape2"></div>
        <div class="login-shape shape3"></div>
    </div>

    <div class="login-right">
        <h2>USER LOGIN</h2>

        <form method="POST">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <input type="submit" name="login" value="LOGIN">
        </form>

        <div class="login-message">
            <?php echo $message; ?>
        </div>
    </div>

</div>

</body>
</html>
