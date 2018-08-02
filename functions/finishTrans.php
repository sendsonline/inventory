<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../connection/connect.php';
$id = $_SESSION['id'];
    $query = mysqli_query($conn, "SELECT * FROM tbl_temp_trans WHERE seller_id = '".$id."'");
    while($row=mysqli_fetch_array($query)){
        $prod_id = $row['product_id'];
        $cust_id = $row['customer_name'];
        $seller_id = $row['seller_id'];
        $qty = $row['qty'];
        $date = date('Y-m-d');
        $total_price = $row['total_price'];

        $sql = mysqli_query($conn,"INSERT INTO tbl_sale(product_id,customer_name,seller_id,qty,date_sold,total_price)VALUES('$prod_id','$cust_id','$seller_id', '$qty',CURDATE(),'$total_price')");
        
    }
    if($sql){
        $sql1 = "UPDATE tbl_stock SET stock_qty = stock_qty - ".$qty." WHERE product_id = ".$prod_id."";
        $query1 = mysqli_query($conn, $sql1);
        echo $sql;
    }
    
   
        
        // $date = date('Y-m-d');

    //     $sql = "INSERT INTO tbl_temp_trans(product_id, customer_id, seller_id, qty, total_price)VALUES('$prod_id','$customer_id','$seller', '$qty','$total')";
    //     $query = mysqli_query($conn, $sql);
    //     if(!$sql){
    //         echo"<script>alert('not okay');window.location.href = '../admin/?cust_id=0';</script>";
    //     }
    //     else{
    //         echo"<script>alert(' okay');window.location.href = '../admin/?cust_id=".$customer_id."';</script>";
    //     }
    // 