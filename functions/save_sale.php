<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../connection/connect.php';

    if(isset($_POST['save_sale'])){
   
        echo $prod_id = $_POST['prod_id'];
        echo $customer_name = $_POST['cust_id'];
        echo $qty = $_POST['qty'];
        echo $total = $_POST['total_price'];
        echo $seller = $_SESSION['id'];
        // $date = date('Y-m-d');

        $sql = "INSERT INTO tbl_temp_trans(product_id,customer_name,seller_id,qty,total_price)VALUES($prod_id,'$customer_name',$seller,$qty,'$total')";
        $query = mysqli_query($conn, $sql);

        // $sql1 = "UPDATE tbl_stock SET stock_qty = stock_qty - ".$qty." WHERE product_id = ".$prod_id."";
        // $query1 = mysqli_query($conn, $sql1);
        if(!$query){
            echo"<script>alert('Transaction not saved!');window.location.href = '../admin/?cust_id=0';</script>";
        }
        else{
            echo"<script>window.location.href = '../admin/?cust_id=".$customer_name."';</script>";
        }

    }