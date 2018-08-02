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
        <div class="col-lg-4 col-md-4 col-sm-3">
            <div class="panel panel-primary margin-top50">
                <div class="panel-heading">
                    <h4 class="text-center">ADD PRODUCTS</h4>
                </div>
                <div class="panel-body">
                   <form method="post" action="<?= URL ?>functions/add.php">
                       <p><label>Product Name: </label></p>
                       <p><input type="text" name="product_name" class="form-control" placeholder="Product Name.."></p>
                       <p><label>Product Description: </label></p>
                       <p><input type="text" name="product_desc" class="form-control" placeholder="Product Description.."></p>
                       <p><label>Price per piece: </label></p>
                       <p><input type="text" name="price" class="form-control" placeholder="Price.."></p>
                       <p align="right"><input type="submit" name="addProduct" class="btn btn-primary" value="Add"></p>
                   </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-8 col-sm-9 outer-wrapper">
            <div class="row">
            <!-- <div class="col-md-3"></div> -->
                <div class="col-md-6">
                    <form class="">
                        <!-- <label>Search Faculty &nbsp&nbsp&nbsp</label> -->
                        <input type="search" id="myInput" onkeyup="search()" class="form-control" placeholder="Search product name here...">
                    </form>
                </div>
            </div>
            <br>
            <!-- <div class="col-md-3"></div> -->
            <div class="scroll">
                <table class="table table-hover table-bordered" id="myTable">
                    <thead>
                    <tr>
                        <th>PRODUCT ID</th>
                        <th>PRODUCT NAME</th>
                        <th>PRODUCT DESCRIPTION</th>
                        <th>PRICE SRP</th>
                        <th class="">STOCK</th>
                        <th colspan="3" class="text-center">ACTION</th>
                    </tr>
                    <tbody>
                    <tr>
                        <?php
                        $sql = mysqli_query($conn,"SELECT tbl_products.*, tbl_stock.stock_qty FROM tbl_products LEFT JOIN tbl_stock ON tbl_products.id = tbl_stock.product_id");
                        while ($row = mysqli_fetch_array($sql)){
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td>" . $row['product_desc'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['stock_qty'] . "</td>";
                            echo "<td><a href = '../functions/edit.php?prod_id=".$row['id']."' name = 'prod_edit' class = 'btn btn-xs btn-primary'>Edit</a></td>";
                            echo "<td><a href = '../functions/delete.php?prod_id=".$row['id']." ' name = 'prod_delete' class = 'btn-xs btn btn-success'>Delete</a></td>";
                            echo "<td><a href = '../functions/stocks.php?prod_id=".$row['id']." ' name = 'prod_delete' class = 'btn-xs btn btn-warning '>Add Stocks</a></td></tr><tr>";
                        }
                        ?>
                    </tr>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>

    </div>
</div>
<script>
    function search() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                }
                else {
                    tr[i].style.display = "none";

                }
            }
        }
    }
</script>


<?php
include '../footer.php';
?>
