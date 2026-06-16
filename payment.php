<?php

$message = "";

if(isset($_POST['pay'])){

    $name = $_POST['name'];
    $amount = $_POST['amount'];

    $message = "Payment Successful for RM".$amount;
}

?>

<html>
<body>

<h1>Course Payment</h1>

<form method="POST">

Student Name:
<input type="text" name="name"><br><br>

Amount (RM):
<input type="text" name="amount"><br><br>

<input type="submit" name="pay" value="Pay Now">

</form>

<br>

<?php echo $message; ?>

</body>
</html>
