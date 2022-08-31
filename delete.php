<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql= "delete from crud where id=$id";
    $result= mysqli_query($conn,$sql); 
    if($result){
        //echo "deleted successfully";
        $_SESSION['status']="Deleted Sucessfully";
        $_SESSION['status_code']="success";
    header('location:display.php');
    }else{
        $_SESSION['status']="Not Deleted  Sucessfully";
   $_SESSION['status_code']="error";
      //  die(mysqli_error($conn));
      header('location:display.php');
    }

}
?>