<?php
    include 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="text-center">LOGIN</h4>
                </div>
                <div class="panel-body">
                    <form method="post" action="functions/login.php">
                        <label>Username:</label>
                        <p><input type="text" class="login-inputs" name = "username" placeholder="Username..." required></p>
                        <label>Password:</label>
                        <p><input type="password" class="login-inputs" name = "password" placeholder="Password..." required></p>
                        <p align="right"> <input type="submit" class="btn btn-primary" name = "login" value="Login"></p>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>



<?php
include 'footer.php';
?>

