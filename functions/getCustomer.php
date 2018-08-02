<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../connection/connect.php';
$id = $_POST['id'];


$sql = mysqli_query($conn, "SELECT * FROM tbl_students WHERE id = '$id'");

if(!empty(mysqli_num_rows($sql))){
	while($row = mysqli_fetch_array($sql)){
   		echo $row['id'];
	}
}
else{
	$sql1 = mysqli_query($conn, "SELECT * FROM tbl_faculty WHERE id = '$id'");
	while($row = mysqli_fetch_array($sql1)){
   		echo $row['id'];
	}
}


