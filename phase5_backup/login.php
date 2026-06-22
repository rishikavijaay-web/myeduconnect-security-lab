<?php
include 'db.php';

$message = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE username='$username'
            AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        $message = "Welcome ".$user['full_name']." (".$user['role'].")";
    } else {
        $message = "Login Failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>MyEduConnect Login</title>
</head>
<body>

<h1>MyEduConnect Login</h1>

<form method="POST">

Username:
<input type="text" name="username"><br><br>

Password:
<input type="password" name="password"><br><br>

<input type="submit" name="login" value="Login">

</form>

<br>

<?php echo $message; ?>

</body>
</html>
