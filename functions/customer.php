<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
if(isset($_GET['transact'])){

    $custid = $_GET['cust_id'];
    echo"<script>window.location.href='../admin/index.php?cust_id=".$custid."';</script>";


}