<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
	include '../connection/connect.php';
	$id = $_POST['ids'];

	$sql = mysqli_query($conn, "SELECT * FROM tbl_stock WHERE product_id = '$id'");
	while($row = mysqli_fetch_array($sql)){
		echo $row['id'];
	}
?>