<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="select * from crud where id=$id";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];

  $sql=" update crud set id='$id',name='$name',email='$email',mobile='$mobile',password='$password' where id=$id";
 
  $result=mysqli_query($conn,$sql);
  if($result){
   //echo "updated successfully";
   $_SESSION['status']="Updated Sucessfully";
   $_SESSION['status_code']="success";
   header('location:display.php');
  } else {
    $_SESSION['status']="Not Updated Sucessfully";
   $_SESSION['status_code']="error";
    die(mysqli_error($conn));
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD OPERATIONS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
   <form method="post">
    <div class ="container ">
   <div class= "form-group mb-3 mt-3 ">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="enter your name " name="name" autocomplete="off" required value=<?php echo $name; ?>>
    </div>
    <div class= "form-group mb-3">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="enter your email " name="email" autocomplete="off" required value=<?php echo $email; ?>>
    </div>
    <div class= "form-group mb-3">
    <label>Mobile</label>
    <input type="text" class="form-control" placeholder="enter your mobile " name="mobile" autocomplete="off" required value=<?php echo $mobile; ?>>
    </div>
    <div class= "form-group mb-3">
    <label>Password</label>
    <input type="text" class="form-control" placeholder="enter your password " name="password" autocomplete="off" required  value=<?php echo $password; ?>>
    </div>  
    

   
    <button type="submit" class="btn btn-primary" name="submit">Update</button>
   
</form>
</div>

  </body>
</html>