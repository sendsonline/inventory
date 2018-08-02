<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../connection/connect.php';


	$conf = $_POST['confpword'];
	echo $id = $_POST['id'];

	$sql = "UPDATE tbl_user SET password='".$conf."' WHERE id = '".$id."'";
	$query = mysqli_query($conn, $sql);

	if(!$query){
		echo"<script>alert('Cannot update!');window.location.href='../admin/changepword.php';</script>";
	}
	else{
		echo"<script>alert('Succesfull update!');window.location.href='../admin/';</script>";

	}



?>