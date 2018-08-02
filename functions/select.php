<?php

    class Select {

        function __construct()
        {

        }
        public function queryAllStocks(){
            $conn = mysqli_connect('localhost','root','',"igp");
            $sql = "SELECT * FROM tbl_products LEFT JOIN tbl_stocks ON tbl_stocks.product_id = tbl_products.id WHERE stocks = 0";
            $query = mysqli_query($conn,($sql));
            while ($row = mysqli_query($conn, $query)){
                $product_id = $row[''];
            }
        }
    }