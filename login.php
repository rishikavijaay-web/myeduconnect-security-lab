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

            $message = "Welcome " . htmlspecialchars($user['full_name']) . " (" . htmlspecialchars($user['role']) . ")";
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
<body>
<h1>MyEduConnect Login</h1>

<form method="POST">
    Username:
    <input type="text" name="username" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <input type="submit" name="login" value="Login">
</form>

<p><?php echo $message; ?></p>

</body>
</html>
