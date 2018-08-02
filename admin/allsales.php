<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../header.php';
include '../connection/connect.php';
?>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">
                    <form class="navbar-form navbar-left" method="post" action="../functions/search.php">
                        <p>
                            <label>From &nbsp&nbsp&nbsp</label><input type="date" name = from class="form-control" id = "myInput">
                            <label>To &nbsp&nbsp&nbsp</label><input type="date" name = "to" class="form-control" id = "myInput">
                            <input type="submit" class="btn btn-primary" name = "generate" value="Generate">
                            <input type="submit" class="btn btn-primary" name = "generate_all" value="Generate All">
                        </p>
                    </form>
                </div>
            </div>
            <div class = "">
                <div class="">
                    <!-- <h4 class="text-left">CURRENT SALES</h4> -->
                </div>
                <div class="scroll">
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
                            $from = $_GET['from'];
                            $to = $_GET['to'];
                            if($from == 0 || $to == 0){
                                $sql = mysqli_query($conn,"SELECT * FROM tbl_sale LEFT JOIN tbl_products ON tbl_products.id = tbl_sale.product_id ORDER BY tbl_sale.id");
                            }
                            else{
                                $sql = mysqli_query($conn,"SELECT * FROM tbl_sale LEFT JOIN tbl_products ON tbl_products.id = tbl_sale.product_id WHERE date_sold >= '$from' AND date_sold <= '$to'");
                            }
                            if(empty(mysqli_num_rows($sql))){
                                echo "<td colspan='7' class='text-center'>No sales records.</td>";
                            }
                            else {
                                while ($row = mysqli_fetch_array($sql)) {

                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['product_name'] . "</td>";
                                    echo "<td>" . $row['product_desc'] . "</td>";
                                    echo "<td>" . $row['qty'] . "</td>";
                                    echo "<td>" . $row['total_price'] . "</td>";
                                    echo "<td>" . $row['date_sold'] . "</td></tr><tr>";

                                }
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



<?php include '../footer.php';?>
