<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../connection/connect.php';
$id = $_SESSION['id'];
    $query = mysqli_query($conn, "SELECT A.temp_id FROM tbl_sale as A INNER JOIN tbl_temp_trans as B ON A.temp_id = B.id");
    while($row=mysqli_fetch_array($query)){
       echo $ids =  $row['temp_id'];
    }
    // print_r($row);
    // echo(count($row));

    ?>
   