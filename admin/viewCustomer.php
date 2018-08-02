<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
define('URL', '/');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Practice</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--CSS-->
    <link rel="stylesheet" href="<?= URL ?>assets/css/bootstrap.css" >
    <link rel="stylesheet" href="<?= URL ?>assets/css/main.css" >

    <script type="text/javascript" src="<?= URL ?>assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?= URL ?>assets/js/jquery-ui.js"></script>
    <script type="text/javascript"  src="<?= URL ?>assets/js/tether.js"></script>
</head>
<br><br><br>
<p>1. <input type="text" name = "text" id = "text1" onchange="add()"></p>
<p>2. <input type="text" name = "text" id = "text2" onchange="add()"></p>
<p>3. <input type="text" name = "text" id = "text3" onchange="add()"></p>
<p>4. <input type="text" name = "text" id = "text4" onchange="add()"></p>
<p>5. <input type="text" name = "text" id = "text5"  onchange="add()"></p>

<br><br><br>

<p>Total: <input type="text" name = "text" id = "total"></p>

<script>
    function add() {
        var text1 = Number(document.getElementById('text1').value);
        var text2 = Number(document.getElementById('text2').value);
        var text3 = Number(document.getElementById('text3').value);
        var text4 = Number(document.getElementById('text4').value);
        var text5 = Number(document.getElementById('text5').value);
        var vals = text1 + text2 + text3 + text4 + text5;
        document.getElementById('total').value = vals;
        console.log(vals);
    }
</script>