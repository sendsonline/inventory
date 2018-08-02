<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../connection/connect.php';
    if(isset($_POST['generate'])){
        $from = $_POST['from'];
        $to = $_POST['to'];

        echo "<script>window.location.href = '../admin/allsales.php?from=".$from."&to=".$to."';</script>";

    }
    if(isset($_POST['generate_all'])){


        echo "<script>window.location.href = '../admin/allsales.php?from=0&to=0';</script>";

    }
    if(isset($_POST['generate_inv'])){
        $from = $_POST['from'];
        $to = $_POST['to'];

        echo "<script>window.location.href = '../admin/inventory.php?from=".$from."&to=".$to."';</script>";

    }
if(isset($_POST['generate_all_inv'])){


    echo "<script>window.location.href = '../admin/inventory.php?from=0&to=0';</script>";

}