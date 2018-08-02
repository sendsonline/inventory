<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
define('URL', '/inventory/');
    session_start();
    $_SESSION['user'] = '';
    $_SESSION['type'] = '';
    $_SESSION['name'] = '';
    $_SESSION['cust_id'] = '';
    session_destroy();
    header('location: '.URL);