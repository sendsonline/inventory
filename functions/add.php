<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../connection/connect.php';




    if(isset($_POST['addProduct'])){
        $prod_name = $_POST['product_name'];
        $prod_desc = $_POST['product_desc'];
        $price = $_POST['price'];

        $sql = mysqli_query($conn, "INSERT INTO tbl_products(product_name, product_desc, price)VALUES('$prod_name','$prod_desc','$price')");
            if(!$sql){
                echo "<script>alert('Cannnot add to database');window.location.href='../admin/viewProducts.php';</script>";
            }
            else{
                echo "<script>alert('Successfully added to datasbase!');window.location.href='../admin/viewProducts.php';</script>";
            }
    }







if(isset($_POST['addUser'])){
    $id = $_POST['userid'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename=$_POST['middlename'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "INSERT INTO tbl_user(id, lastname, firstname, middlename, age, gender, position_user, username, password, type)VALUES('$id','$lastname','$firstname','$middlename','$age','$gender','$position','$username','$password','user')");
    if(!$sql){
        echo "<script>alert('Cannnot add to database');window.location.href='../admin/viewUsers.php';</script>";
    }
    else{
        echo "<script>alert('Successfully added to datasbase!');window.location.href='../admin/viewUsers.php';</script>";
    }
}






if(isset($_POST['addStudents'])){
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename=$_POST['middlename'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    $sql = mysqli_query($conn, "INSERT INTO tbl_students(id, lastname, firstname, middlename, course, year)VALUES('$id','$lastname','$firstname','$middlename','$course','$year')");
    if(!$sql){
        echo "<script>alert('Cannnot add to database');window.location.href='../admin/viewStudents.php';</script>";
    }
    else{
        echo "<script>alert('Successfully added to datasbase!');window.location.href='../admin/viewStudents.php';</script>";
    }
}








if(isset($_POST['addFaculty'])){
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename=$_POST['middlename'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $dept = $_POST['department'];

    $sql = mysqli_query($conn, "INSERT INTO tbl_faculty(id, lastname, firstname, middlename, age, gender, department)VALUES('$id','$lastname','$firstname','$middlename','$age','$gender','$dept')");
    if(!$sql){
        echo "<script>alert('Cannnot add to database');window.location.href='../admin/viewFaculty.php';</script>";
    }
    else{
        echo "<script>alert('Successfully added to datasbase!');window.location.href='../admin/viewFaculty.php';</script>";
    }
}



