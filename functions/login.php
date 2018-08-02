<?php

    include '../connection/connect.php';

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'");
        if (mysqli_num_rows($sql) == '') {
            echo "
                <script>alert('Incorrect Username/Password!');window.location.href = '../index.php';</script>
            ";
            error_reporting(FALSE);

        }
        else{
            while ($row = mysqli_fetch_array($sql)){
                $type = $row['type'];
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['firstname'];
                $_SESSION['cust_id'] = '';
                if($type == 'admin'){

                    $_SESSION['admin'] =  $type;
                    echo "<script>alert('You are logged in!');window.location.href = '../admin/?cust_id=0';</script>
                    ";
                }
                
            }
        }
    }
