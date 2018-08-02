<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../connection/connect.php';
$id = $_POST['id'];


$sql = mysqli_query($conn, "SELECT * FROM tbl_products WHERE id = '$id'");

while($row = mysqli_fetch_array($sql)){
   echo $row['price'];
}

