<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../connection/connect.php';
	$id = $_SESSION['id'];
    $sql = mysqli_query($conn, "DELETE FROM tbl_temp_trans");
    if(!$sql){
    	echo"";
    }
    else{
    	echo"1";
    }
   