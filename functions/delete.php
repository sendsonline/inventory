<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../connection/connect.php';

if(isset($_GET['prod_id'])){
    $id = $_GET['prod_id'];

    $sql = mysqli_query($conn, "DELETE FROM tbl_products WHERE id = '$id'");
    if(!$sql){
        echo "<script>alert('Cannnot delete from database');window.location.href='../admin/viewProducts.php';</script>";
    }
    else{
        echo "<script>alert('Successfully deleted from datasbase!');window.location.href='../admin/viewProducts.php';</script>";
    }
}


if(isset($_GET['user_id'])){
    $id = $_GET['user_id'];

    $sql = mysqli_query($conn, "DELETE FROM tbl_user WHERE id = '$id'");
    if(!$sql){
        echo "<script>alert('Cannnot delete from database');window.location.href='../admin/viewUsers.php';</script>";
    }
    else{
        echo "<script>alert('Successfully deleted from datasbase!');window.location.href='../admin/viewUsers.php';</script>";
    }
}


if(isset($_GET['stud_id'])){
    $id = $_GET['stud_id'];

    $sql = mysqli_query($conn, "DELETE FROM tbl_students WHERE id = '$id'");
    if(!$sql){
        echo "<script>alert('Cannnot delete from database');window.location.href='../admin/viewStudents.php';</script>";
    }

    else{
        echo "<script>alert('Successfully deleted from datasbase!');window.location.href='../admin/viewStudents.php';</script>";
    }
}


if(isset($_GET['fac_id'])){
    $id = $_GET['fac_id'];

    $sql = mysqli_query($conn, "DELETE FROM tbl_faculty WHERE id = '$id'");
    if(!$sql){
        echo "<script>alert('Cannnot delete from database');window.location.href='../admin/viewFaculty.php';</script>";
    }
    else{
        echo "<script>alert('Successfully deleted from datasbase!');window.location.href='../admin/viewFaculty.php';</script>";
    }
}


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $qty = $_GET['qty'];
    $prod = $_GET['product_id'];
    $c = $_GET['cust_id'];

    // echo "DELETE FROM tbl_temp_trans WHERE id = ".$id."";
    $sql = mysqli_query($conn, "DELETE FROM tbl_temp_trans WHERE id = '".$id."'");
    $sql1 = mysqli_query($conn, "UPDATE tbl_stock SET stock_qty = stock_qty + ".$qty." WHERE product_id = ".$prod."");
    // print_r($sql);
    if(!$sql || !$sql1){
        echo "<script>alert('Cannnot delete from database');window.location.href='../admin?cust_id=".$c."';</script>";
    }
    else{
        echo "<script>window.location.href='../admin?cust_id=".$c."';</script>";
    }
}