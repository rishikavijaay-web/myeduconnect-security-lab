<?php
include 'db.php';

$message = "";

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users(username,password,role,full_name,email)
            VALUES('$username','$password','student','$fullname','$email')";

    if($conn->query($sql) === TRUE){
        $message = "Registration Successful";
    } else {
        $message = "Registration Failed";
    }
}
?>

<html>
<head>
<title>Register</title>
</head>

<body>

<h1>MyEduConnect Registration</h1>

<form method="POST">

Full Name:<br>
<input type="text" name="fullname"><br><br>

Email:<br>
<input type="text" name="email"><br><br>

Username:<br>
<input type="text" name="username"><br><br>

Password:<br>
<input type="password" name="password"><br><br>

<input type="submit" name="register" value="Register">

</form>

<br>

<?php echo $message; ?>

</body>
</html>
