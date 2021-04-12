<?php
require_once "vendor/autoload.php";


use App\classes\AdminRegister;

if (isset($_POST['btn'])){

    $name=($_POST['name']);
    $contry=($_POST['country']);
    $email=($_POST['email']);



    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        echo "<p style='color:red'> Only letters and white space allowed <p/>";
    }
    if (!preg_match("/^[a-zA-Z- ']*$/",$name)) {
        echo "<p style='color:red'> Only letters allowed <p/>";
    }
    if (strlen($_POST['phone']) == 13 ) {
        echo "<p style='color:red'>Please enter a valid phone number</p>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style = 'color:red'>Enter Valid email Address</p>";
    } else{
        (new App\classes\AdminRegister)->register($_POST);
    }

}




?>
<html>
<head>
    <title>Admin Registration Form</title>
</head>
<body>
<link rel="stylesheet" href="css/stylesheet.css">
<a href="login.php">Login</a>
<form action="" method="POST">
    <div class="container">
        <h1>Admin Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label for="firstname"><b>Name</b></label>
        <input type="text" placeholder="Enter Fullname" name="name" required>


        <label for="country"><b>Country</b></label>
        <input type="text" placeholder="Enter Country" name="country" required>

        <label for="phone"><b>Phone</b></label>
        <input type="text" placeholder="Enter Phone" name="phone" required>


        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit"  name="btn">Register</button>
    </div>


</form>


</body>
</html>

