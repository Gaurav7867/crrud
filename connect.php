<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="crudoperations";
//create connection

$conn= new mysqli($servername,$username,$password,$dbname);
//check
if(!$conn){
    die(mysqli_error($conn));
}


?>