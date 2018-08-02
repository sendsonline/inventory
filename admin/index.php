<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../header.php';
include '../connection/connect.php';

$seller = $_SESSION['id'];
$cust = isset($_GET['cust_id']) ? $_GET['cust_id'] : 0;
?>
                                
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                <div class="transact-wrapper">
                    
                
                    <div class="transact-header">
                        <h5 class="text-center">Transactions</h5>
                    </div>
                    <div class="transact-body">
                        <form class="" action="../functions/save_sale.php" method="post">
                            <p>
                                <label>CUSTOMER NAME: </label>
                                <?php
                                $sql4 = mysqli_query($conn, "SELECT * FROM tbl_temp_trans WHERE customer_name='".$cust."'");
                                    if(!empty(mysqli_num_rows($sql4))){
                                        while($rows=mysqli_fetch_array($sql4)){
                                            $cust = $rows['customer_name'];
                                            $styles = "pointer-events:none";
                                        }
                                    }
                                    else{
                                        $cust = '';
                                        $styles = "";
                                    }
                                    
                                    echo '<input type="text" style="'.$styles.'" class="login-inputs" id="cust" value="'.$cust.'" name="cust_id" placeholder="Customer Name..." required>';

                                ?>
                            </p>
                            <h6 class="errormsg"></h6>
                            <p><label>PRODUCT ID : </label></p>
                            <p> <input type="text" id="product_id" class="login-inputs" name="prod_id" placeholder="Product ID" required></p>
                            <p id = "prod-id"></p>
                            <p><label>PRODUCT PRICE : </label></p>
                            <p> <input type="text" id = "price" class="login-inputs" name="prod_price" placeholder="Price.." required style="pointer-events:none"> </p>
                                            
                            <p> <label>QUANTITY: </label></p>
                            <p> <input type="number" id="qty" class="login-inputs" name="qty" placeholder="Quantity..." required></p>
                            <p><label>TOTAL: </label></p>
                            <p><input type="number" id="total" class="login-inputs" name="total_price"   placeholder="TOTAL PRICE..." required style="pointer-events:none"> </p>
                            <p align="right"><input type="submit" name="save_sale" class="btn btn-xs btn-info" value="+ Add">
                        </form>
                    </div>
               </div>
            </div>
            
        </div>
        <div class="col-md-3">
            <div class="">
                <div class="transact-wrapper">
                <div class="transact-header">
                    <h5 class="text-center">Pending Customer</h4>
                </div>
                <div class="sale-body">
                    <table class="trans table" id="receipt_result">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</td>
                                <th>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                                $sql = mysqli_query($conn, "SELECT * FROM tbl_temp_trans WHERE customer_name='".$cust."'");
                                $num_row = mysqli_num_rows($sql);
                                if(!empty($num_row)){
                                    while($row=mysqli_fetch_array($sql)){
                                    $ids = $row['id'];
                                    $prod_id = $row['product_id'];
                                    $sql1 =  mysqli_query($conn, "SELECT * FROM tbl_products WHERE id='".$prod_id."'");
                                    while($row1=mysqli_fetch_array($sql1)){
                                    echo "<tr><td>".$row1['product_name']."</td>";

                                    }
                                    echo "<td>".$row['qty']."</td>";
                                    echo "<td>".$row['total_price']."</td>";
                                    echo "<td><a href='../functions/delete.php?id=".$ids."&qty=".$row['qty']."&product_id=".$prod_id."&cust_id=".$cust."' class='btn btn-xs btn-danger btn-delete'>x</a></td>";
                                    echo "</tr>";
                                }
                                }
                                else{
                                    $style = "display:none";
                                    echo "<td colspan='4' class='text-center'>Nothing to display..</td>";
                                }
                                
                            ?>
                            </tr>
                            <tr><td colspan="4" style="border-bottom: 1px solid rgba(0,0,0,0.1) !important"></td></tr>
                            <tr style="border-bottom: 1px solid rgba(0,0,0,0.1) !important" class="sale-footer">
                                <td colspan="2" class="text-bold">Total :</td>
                                <?php
                                    $sql2 = mysqli_query($conn, "SELECT SUM(total_price) as total FROM tbl_temp_trans WHERE seller_id = '".$seller."'");
                                    while($row2=mysqli_fetch_array($sql2)){
                                    echo "<td>".$row2['total']."</td>";

                                    }
                                 ?>
                                <td colspan="2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="sale-action" align="center" style = "<?= $style ?>">
                    <button class="btn btn-xs btn-success" type="button" id="finish_trans">Confirm Transaction</button>
                    <button class="btn btn-xs btn-default" id="clear_trans">Cancel Transaction</button>
                    <!-- <button class="btn btn-xs btn-warning" onclick="print()" id="receipt">Print Receipt</button> -->
                    <!-- <button class="btn btn-xs btn-primary" id="transact-done">Reset</button> -->
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-11">
                    <form class="" action="functions/search.php" method="get">
                        <p>
                            <div class="input-group input-group-md input-primary">
                              <span class="input-group-addon" id="sizing-addon1">Search</span>
                              <input type="text"id = "myInput" onkeyup="search()"  class="form-control" placeholder="Search Name of the Product..." aria-describedby="sizing-addon1">
                            </div>
                           
                        </p>
                    </form>
                </div>
            <div class="col-md-2"></div>

            </div>
            <div class="row">
                <div class="col-md-12 scroll">
                    <table class="table table-bordered table-responsive table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>PRODUCT ID</th>
                                <th>PRODUCT NAME</th>
                                <th>PRODUCT DESCRIPTION</th>
                                <th>SRP</th>
                                <th>STOCK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $sql = mysqli_query($conn,"SELECT tbl_products.*, tbl_stock.stock_qty FROM tbl_products LEFT JOIN tbl_stock ON tbl_products.id = tbl_stock.product_id ORDER BY product_name ASC");
                                while ($row = mysqli_fetch_array($sql)){
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['product_name'] . "</td>";
                                    echo "<td>" . $row['product_desc'] . "</td>";
                                    echo "<td>" . $row['price'] . "</td>";
                                    echo "<td>" . $row['stock_qty'] . "</td></tr><tr>";
                                }
                                ?>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>                       
        </div>
    </div>
</div>
    

<?php
include '../footer.php';
?>
<script type="text/javascript" src="<?= URL ?>assets/js/sale.js"></script>