<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];

  $select = mysqli_query($conn, "SELECT * FROM crud WHERE email = '".$_POST['email']."'");
  if(mysqli_num_rows($select)) {
      exit('This email address is already used!');
    
  }
  
  $sql="insert into crud(name,email,mobile,password)
  values('$name','$email','$mobile','$password')";
  $result=mysqli_query($conn,$sql);
  if($result){
   // echo "data inserted successfully";
   $_SESSION['status']="Inserted Sucessfully";
   $_SESSION['status_code']="success";
   header('location:display.php');
  } else {
    $_SESSION['status']="Not Inserted Sucessfully";
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
    <input type="text" class="form-control" placeholder="enter your name " name="name" autocomplete="off" required>
    </div>
    <div class= "form-group mb-3">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="enter your email " name="email" autocomplete="off" required>
    </div>
    <div class= "form-group mb-3">
    <label>Mobile</label>
    <input type="text" class="form-control" placeholder="enter your mobile " name="mobile" autocomplete="off" required >
    </div>
    <div class= "form-group mb-3">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="enter your password " name="password" autocomplete="off" required >
    </div>  
    

   
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
   
</form>
</div>

  </body>
</html>