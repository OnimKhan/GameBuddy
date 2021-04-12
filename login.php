<?php
require_once "vendor/autoload.php";
session_start();
$hostName='localhost';
$userName='root';
$password='';
$dbName='game';
$con= mysqli_connect($hostName,$userName,$password,$dbName);

$email = $_POST['email'];
$password = $_POST['password'];


$email = stripcslashes($email);
$password = stripcslashes($password);
$email = mysqli_real_escape_string($con, $email);
$password = mysqli_real_escape_string($con, $password);

$sql = "select *from admin where email = '$email' and password = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);



    if ($count == 1) {

        $_SESSION['login_user'] = $email;

        header("location: view.php");
    } else {
        $error = "Your Login Name or Password is invalid";

}


?>
<html>
<head>
    <title>Admin Login Form</title>
</head>
<body>
<link rel="stylesheet" href="css/stylesheet.css">
<a href="admin-register.php">Admin Register Form</a>
<form action="" method="POST">
    <div class="container">
        <h1>Admin Login</h1>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit"  name="btn">Login</button>
    </div>


</form>


</body>
</html>


