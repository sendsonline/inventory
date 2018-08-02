<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../connection/connect.php';


if(isset($_POST['prod_update'])){
    $id = $_GET['id'];
    $prod_name = $_POST['product_name'];
    $prod_desc = $_POST['product_desc'];
    $price = $_POST['price'];

    $sql = mysqli_query($conn, "UPDATE tbl_products SET product_name = '$prod_name', product_desc = ' $prod_desc', price='$price' WHERE id = '$id'");
    if(!$sql){
        echo "<script>alert('Cannnot update to database');window.location.href='../admin/viewProducts.php';</script>";
    }
    else{
        echo "<script>alert('Successfully updated to datasbase!');window.location.href='../admin/viewProducts.php';</script>";
    }
}

if(isset($_POST['user_update'])){
    $id = $_GET['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename=$_POST['middlename'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];

    $sql = mysqli_query($conn, "UPDATE tbl_user SET lastname = '$lastname', firstname = ' $firstname', middlename='$middlename', age='$age', gender='$gender', position_user='$position' WHERE id = '$id'");
    if(!$sql){
        echo "<script>alert('Cannnot update to database');window.location.href='../admin/viewUsers.php';</script>";
    }
    else{
        echo "<script>alert('Successfully updated to datasbase!');window.location.href='../admin/viewUsers.php';</script>";
    }
}

if(isset($_POST['stud_update'])){
    $user_id = $_POST['id'];
    $id = $_GET['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename=$_POST['middlename'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    $sql = mysqli_query($conn, "UPDATE tbl_students SET id = '$user_id', lastname = '$lastname', firstname = ' $firstname', middlename='$middlename', course='$course', year='$year' WHERE id = '$id'");
    if(!$sql){
        echo "<script>alert('Cannnot update to database');window.location.href='../admin/viewStudents.php';</script>";
    }
    else{
        echo "<script>alert('Successfully updated to datasbase!');window.location.href='../admin/viewStudents.php';</script>";
    }
}


if(isset($_POST['fac_update'])){
    $facid = $_POST['id'];
    $id = $_GET['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename=$_POST['middlename'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];

    $sql = mysqli_query($conn, "UPDATE tbl_faculty SET id = '$facid',lastname = '$lastname', firstname = ' $firstname', middlename='$middlename', age='$age', gender='$gender', department='$department' WHERE id = '$id'");
    if(!$sql){
        echo "<script>alert('Cannnot update to database');window.location.href='../admin/viewFaculty.php';</script>";
    }
    else{
        echo "<script>alert('Successfully updated to datasbase!');window.location.href='../admin/viewFaculty.php';</script>";
    }
}
if(isset($_POST['stock'])){
    $qty = $_POST['stock_qty'];
    $id = $_GET['id'];
    $pur = $_POST['pur_price'];


    $sql = mysqli_query($conn, "UPDATE tbl_stock SET stock_qty = stock_qty + '$qty', purchase_price = purchase_price + '$pur' WHERE product_id = '$id'");
    if(!$sql){
        echo "<script>alert('Cannnot update to database');window.location.href='../admin/viewProducts.php';</script>";
    }
    else{
        echo "<script>alert('Successfully added stocks!');window.location.href='../admin/viewProducts.php';</script>";
    }
}