<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../header.php';
include '../connection/connect.php';
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class = "">
                    <div class="">
                        <h4 class="text-left">CURRENT SALES</h4>
                    </div>
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>PRODUCT ID</th>
                                    <th>PRODUCT NAME</th>
                                    <th>PRODUCT DESCRIPTION</th>
                                    <th>QTY</th>
                                    <th>PRICE</th>
                                    <th>DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $date = date('Y-m-d');
                                    $sql = mysqli_query($conn,"SELECT * FROM tbl_sale LEFT JOIN tbl_products ON tbl_products.id = tbl_sale.product_id WHERE date_sold = CURDATE()");
                                    if(empty(mysqli_num_rows($sql))){
                                        echo "<td colspan='7' class='text-center'>No Sales Yet.</td>";
                                    }

                                    while ($row = mysqli_fetch_array($sql)){
                                        echo "<td class='text-center'>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['product_name'] . "</td>";
                                        echo "<td>" . $row['product_desc'] . "</td>";
                                        echo "<td>" . $row['qty'] . "</td>";
                                        echo "<td>" . $row['total_price'] . "</td>";
                                        echo "<td>" . $row['date_sold'] . "</td></tr><tr>";
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>



<?php include '../footer.php';?>
