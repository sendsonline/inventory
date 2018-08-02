<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
    $id = $_GET['prod_id'];
    include '../header.php';
    include '../connection/connect.php';

    $sql = mysqli_query($conn,"SELECT tbl_products.*, tbl_stock.stock_qty FROM tbl_products INNER JOIN tbl_stock ON tbl_products.id = tbl_stock.product_id WHERE tbl_products.id = '$id'");
    while($row=mysqli_fetch_array($sql)){

?>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="text-center">PRODUCT ID : &nbsp<?= $row['id'] ?></h4>
                </div>
                <div class="panel-body">
                    <form method="post" action="../functions/update.php?id=<?= $row['id']?>">
                        <p><label>PRODUCT NAME: </label>&nbsp<?= $row['product_name'] ?></p>
                        <p><label>PRODUCT DESC: </label>&nbsp<?= $row['product_desc'] ?></p>
                        <p><label>PRODUCT PRICE: </label> per PIECE: &nbsp<?= $row['price'] ?></p>
                        <p><label>CURRENT STOCK: </label> &nbsp<?= $row['stock_qty'] ?></p>
                        <form method="post" action="update.php">
                            <p><label>Add Stock</label>
                                <input type="number" class="form-control" name = "stock_qty" >
                            </p>
                            <p><label>Purchase Price</label>
                                <input type="text" class="form-control" name="pur_price" >
                            </p>
                        <p align="right"><input type="submit" name = "stock" class="btn btn-primary" value="Add"></p>
                        </form>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<?php } ?>

<?php
include '../footer.php';
?>
