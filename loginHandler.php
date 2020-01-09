<?php

if(isset( $_POST['email']) && isset($_POST['pwd'])){
$email = $_POST['email'];
$pwd = $_POST['pwd'];
include 'conn.php';

if(isset($_POST['adminBtn'])){
$sql = "select * from admin where email='$email' and password='$pwd'";
}else if(isset($_POST['ownerBtn'])){
$sql = "select * from owner where email='$email' and password='$pwd'";
}
$result = $conn->query($sql);
if($result->num_rows>0){
  // User is valid 
    session_start();
    if(isset($_POST['adminBtn'])){
    $_SESSION['alogin']=true;
    header('location:building.php');
    }else if(isset($_POST['ownerBtn'])){
        $row = $result->fetch_assoc();
         $_SESSION['oid']= $row['id'];
         header('location:tenantReg.php');
    }
}else{
    die('Invalid credentials');

    
}
}