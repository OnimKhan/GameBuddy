<?php
require_once "vendor/autoload.php";

use App\classes\Register;
$id=$_GET['id'];
$result= (new App\classes\Register)->registerupdate($id);
$data = mysqli_fetch_assoc($result);



if (isset($_POST['btn'])){
    (new App\classes\Register)->registerupdates($_POST);
}




?>
<html>
<head>
    <title>Registration Update</title>
</head>
<body>
<link rel="stylesheet" href="css/stylesheet.css">
<a href="index.php">Add Data</a>
<a href="view.php">View Data</a>
<form action="" method="POST">
    <div class="container">
        <h1>Updating data</h1>

        <label for="firstname"><b>Name</b></label>
        <input type="text"  name="name" value="<?php echo  $data['name'];?>" >
        <input type="hidden"  name="id" value="<?php echo  $data['id'];?>" >


        <label for="lastname"><b>Country</b></label>
        <input type="text"  name="country" value="<?php echo  $data['country'];?>">

        <label for="phone"><b>Phone</b></label>
        <input type="text" name="phone" value="<?php echo  $data['phone'];?> ">


        <label for="email"><b>Email</b></label>
        <input type="text"  name="email" value="<?php echo  $data['email'];?>">

        <label for="psw"><b>Password</b></label>
        <input type="password"  name="password" value="<?php echo  $data['password'];?>">


        <button type="submit"  name="btn">Update</button>
    </div>


</form>


</body>
</html>
