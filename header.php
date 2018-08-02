<?php
    define('URL', '/inventory/');
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>INVENTORY</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!--CSS-->
        <link rel="stylesheet" href="<?= URL ?>assets/css/bootstrap.css" >
        <link rel="stylesheet" href="<?= URL ?>assets/css/main.css" >

        <script type="text/javascript" src="<?= URL ?>assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?= URL ?>assets/js/jquery-ui.js"></script>
        <script type="text/javascript"  src="<?= URL ?>assets/js/tether.js"></script>
    </head>
    <body>

    <?php 
        $url = $_SERVER['PHP_SELF'];

        // echo $arrayLink[0];
    ?>

    <div class="outer-wrapper">
        <div class="row">




            
                    <?php
                            
                         if(isset($_SESSION['admin'])) {
                            ?>

                            <nav class="navbar navbar-bg">
                                <div class="container">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href="<?= URL ?>admin?cust_id=0"><b>INVENTORY SYSTEM</b></a>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li class="<?= $url == URL."admin/index.php" ? 'active-link' : '' ?>"><a href="<?= URL ?>admin">Home<span class="sr-only">(current)</span></a></li>
                                            <li class="<?= $url == URL."admin/inventory.php" ? 'active-link' : '' ?>"><a href="<?= URL ?>admin/inventory.php?from=0&to=0">Inventory</a></li>
                                            <li class="dropdown <?= $url == URL."admin/allsales.php" || $url ==  URL."admin/currentsales.php" ? 'active-link' : '' ?>">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                   aria-haspopup="true" aria-expanded="false">Sales<span
                                                            class="caret"></span></a>
                                                <ul class="dropdown-menu" id="dp1">
                                                    <li><a href="<?= URL ?>admin/currentsales.php?date=<?= date('Y-m-d') ?>">View current sales</a></li>
                                                    <li><a href="<?= URL ?>admin/allsales.php?from=0&to=0">View all sales</a></li>

                                                </ul>
                                            </li>
                                            <li class="dropdown <?= $url == URL.'admin/viewProducts.php' || $url ==  URL.'admin/viewStudents.php' || $url ==  URL.'admin/viewFaculty.php' ? 'active-link' : '' ?>">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                   aria-haspopup="true" aria-expanded="false">Manage<span
                                                            class="caret"></span></a>
                                                <ul class="dropdown-menu" id="dp1">
                                                    <li><a href="<?= URL ?>admin/viewProducts.php">Products</a></li>
                                                    <!-- <li><a href="<?= URL ?>admin/viewUsers.php">User Accounts</a></li> -->
                                                   
                                                </ul>
                                            </li>
                                            <li class="dropdown <?= $url == URL."admin/changepword.php" ? 'active-link' : '' ?>">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                   aria-haspopup="true" aria-expanded="false"><?= $_SESSION['name']?><span
                                                            class="caret"></span></a>
                                                <ul class="dropdown-menu" id="dp1">
                                                    <li><a href="<?= URL ?>admin/changepword.php?id=<?= $_SESSION['id'] ?>">Change Password</a></li>

                                                    <li role="separator" class="divider"></li>
                                                    <li><a href="<?= URL ?>functions/logout.php">Logout</a></li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <ul class="nav navbar-nav navbar-right">
                                            
                                        </ul>
                                    </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                            </nav>






            <?php }
                else{
                    echo"
                        <br><br><br><br>
                    
                    ";
                }

            ?>

<script>
$(document).ready(function(){
    $('.dropdown').each().click(function(){
        ('.dropdown-menu').addClass({active});
    });
});
</script>

