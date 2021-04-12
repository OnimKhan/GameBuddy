<?php
require_once "vendor/autoload.php";
include('session.php');
use App\classes\Register;

$result= (new App\classes\Register)->getregister();

if(isset($_GET['delete'])){
   $id= $_GET['id'];
  (new App\classes\Register)->delete($id);

}
?>
<html>
<head>
    <title>View Data</title>
</head>
<body>
<h1>Welcome <?php echo $login_session; ?></h1>
<h2><a href = "logut.php">Sign Out</a></h2>
<link rel="stylesheet" href="css/stylesheet.css">
<a href="index.php">Add Data</a>
<a href="view.php">View Data</a>
<table border="2px">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Country</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Password</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php while
    ($data = mysqli_fetch_assoc($result)){?>


    <tr>
        <td>
            <?php echo $data['id']?>
        </td >
        <td contenteditable="true">   <?php echo $data['name']?></td>
        <td contenteditable="true">   <?php echo $data['country']?></td>
        <td contenteditable="true">   <?php echo $data['phone']?></td>
        <td contenteditable="true">   <?php echo $data['email']?></td>
        <td contenteditable="true">   <?php echo $data['password']?></td>
        <td><a href="edit.php?id= <?php echo $data['id']?>       </td >
">Edit</a></td>
        <td><a href="?delete=true&id=<?php echo $data['id']?>"onclick="return confirm('are you sure delete this data!!')">Delete</a></td>
    </tr>
<?php }?>
</table>


</body>
</html>
