<?php



include 'conn.php';
if(isset($_GET['id'])){
 $id= filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $sql = "delete from building where id=$id";
    $conn->query($sql);
    header('location:building.php');
}