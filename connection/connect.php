<?php
    $conn = mysqli_connect('localhost','root','',"inventory");
    if(!$conn){
        echo"
            <script>alert('Cannot connect to database');</script>
        ";
    }