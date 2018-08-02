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
            <div class="row">
                <div class="col-md-3">
                    <form class="" method="post" action="../functions/search.php">
                        <p>
                            <label>Search Product &nbsp&nbsp&nbsp</label>
                            <input type="search" id="myInput" onkeyup="search()" class="form-control" placeholder="Search product here...">

                        </p>
                    </form>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        
                            <form class="" method="post" action="../functions/search.php">
                               <div class="col-md-2 text-bold text-right margin-top30" style="">

                                Filter By Date:
                               </div>
                                <div class="col-md-3">
                                    <label>From &nbsp&nbsp&nbsp</label><input type="date" name = from class="form-control" value="<?= $_GET['from'] == '' ? '' : $_GET['from'] ?>" id = "myInput">
                                </div>
                                  <div class="col-md-3">
                                    <label>To &nbsp&nbsp&nbsp</label><input type="date" name = "to" class="form-control" value="<?= $_GET['to'] == '' ? '' : $_GET['to'] ?>" id = "myInput">
                                    
                                    
                                
                                </div>
                                <div class="col-md-2 margin-top25" align="left"><input type="submit" style="width: 100%" class="btn btn-primary" name = "generate_inv" value="Generate"></div>
                                <div class="col-md-2 margin-top25" align="left"><input type="submit" style="width: 100%" class="btn btn-primary" name = "generate_all_inv" value="Generate All"></div>
                            </form>
                        
                    </div>
                </div>
            </div>
            <div class = "">
                <div class="table-header">
                    <h4 class="text-left">STOCK INVENTORY</h4>
                </div>
                <div class="scroll">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                        <tr>
                            <th>PRODUCT ID</th>
                            <th>PRODUCT NAME</th>
                            <th>PRODUCT DESCRIPTION</th>
                            <th>STOCK REMAINS</th>
                            <th>TOTAL STOCKS</th>
                            <th>TOTAL STOCK SOLD</th>
                            <th>TOTAL PURCHASE PRICE</th>
                            <th>TOTAL SELLING PRICE</th>
                            <!-- <th>PROFIT</th> -->

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            $from = $_GET['from'];
                            $to = $_GET['to'];
                            $sql1 = mysqli_query($conn,"SELECT tbl_products.*, tbl_stock.stock_qty, tbl_stock.purchase_price FROM tbl_products LEFT JOIN tbl_stock ON tbl_products.id = tbl_stock.product_id");
                            
                            while ($row1 = mysqli_fetch_array($sql1)){
                               

                                $id = $row1['id'];
                                echo "<td>" . $row1['id'] . "</td>";
                                echo "<td>" . $row1['product_name'] . "</td>";
                                echo "<td>" . $row1['product_desc'] . "</td>";
                                echo "<td>" . $row1['stock_qty'] . "</td>";
                                    if($from == 0 || $to == 0){
                                        $sql = mysqli_query($conn,"SELECT SUM(stock_added) as stocks_added, SUM(stock_sold) as stocks_sold, SUM(purchase_price) as purchase_prices, SUM(total_price) as total_prices, stock_added, stock_sold, purchase_price, total_price FROM tbl_inventory WHERE product_id = '$id'");
                                        // $sql = mysqli_query($conn,"SELECT SUM(stock_added) as stocks_added, SUM(stock_sold) as stocks_sold, SUM(purchase_price) as purchase_prices, SUM(total_price) as total_prices, stock_added, stock_sold, purchase_price, total_price FROM tbl_inventory WHERE product_id = '$id'");
                                    }
                                    else{
                                        $sql = mysqli_query($conn,"SELECT product_id, SUM(stock_added) as stocks_added, SUM(stock_sold) as stocks_sold, SUM(purchase_price) as purchase_prices, SUM(total_price) as total_prices, stock_added, stock_sold, purchase_price, total_price FROM tbl_inventory WHERE product_id = '$id' AND date_added_sold >= '$from' AND date_added_sold <= '$to'");
                                        // $sql = mysqli_query($conn,"SELECT product_id, SUM(stock_added) as stock_added, SUM(stock_sold) as stock_sold, SUM(purchase_price) as purchase_price, SUM(total_price) as total_price, stock_added, stock_sold, purchase_price, total_price FROM tbl_inventory WHERE product_id = '$id' AND date_added_sold >= '$from' AND date_added_sold <= '$to'");
                                    }
                                    if(empty(mysqli_num_rows($sql))){
                                        echo "<td colspan='6' class='text-center'>No inventory records.</td>";
                                    }
                                    else {
                                        while ($row = mysqli_fetch_array($sql)) {
                                            // print_r($row);
                                            if((count($row['stock_added']))==0 && (count($row['stock_sold'])==0)){
                                                echo "<td colspan='6' class='text-center'>No inventory records.</td></tr><tr>";
                                            }
                                            else {

                                                    $total_purchase_price = $row1['purchase_price'];
                                                    $total_price_sold = $row['total_prices'];
                                                    
                                                    $st = $row['stocks_added'];
                                                    
                                                    $remain =  $row['stocks_added'] + $row['stocks_sold'];
                                                
                                                echo "<td>" . $remain . "</td>";
                                                echo "<td>" . $row['stocks_sold'] . "</td>";

                                                if(($total_purchase_price==0) && ($total_price_sold == 0)){
                                                    
                                                    echo "<td colspan='3' class='text-center none'>None</td></tr><tr>";
                                                }
                                                else{
                                                    
                                                    echo "<td>P " . $total_purchase_price . "</td>";
                                                    echo "<td>P " . $total_price_sold . "</td>";
                                                    if($from == 0 || $to == 0){
                                                        $sqll = mysqli_query($conn,"SELECT stock_added, stock_sold, purchase_price, total_price FROM tbl_inventory WHERE product_id = '$id'");
                                                        // $sqll = mysqli_query($conn,"SELECT SUM(stock_added) as stocks_added, SUM(stock_sold) as stocks_sold, SUM(purchase_price) as purchase_prices, SUM(total_price) as total_prices, stock_added, stock_sold, purchase_price, total_price FROM tbl_inventory WHERE product_id = '$id'");
                                                    }
                                                    else{
                                                        $sqll = mysqli_query($conn,"SELECT product_id, stock_added, stock_sold, purchase_price, total_price FROM tbl_inventory WHERE product_id = '$id' AND date_added_sold >= '$from' AND date_added_sold <= '$to'");
                                                        // $sql = mysqli_query($conn,"SELECT product_id, SUM(stock_added) as stock_added, SUM(stock_sold) as stock_sold, SUM(purchase_price) as purchase_price, SUM(total_price) as total_price, stock_added, stock_sold, purchase_price, total_price FROM tbl_inventory WHERE product_id = '$id' AND date_added_sold >= '$from' AND date_added_sold <= '$to'");
                                                    }
                                                    if(empty(mysqli_num_rows($sqll))){
                                                        echo "<td colspan='6' class='text-center'>No inventory records.</td>";
                                                    }
                                                    else {
                                                        while ($rowl = mysqli_fetch_array($sqll)) {
                                                            // print_r($row);
                                                            $price_per_piece =+ $rowl['purchase_price'] == '' ? 0 : $rowl['purchase_price']/$rowl['stock_added']."<br>";
                                                             $rowl['purchase_price'] == '' ? 0 : $rowl['purchase_price']."/".$rowl['stock_added']."=".$price_per_piece."<br>";
                                                            $total_ini =+ $price_per_piece * $rowl['stock_sold'];
                                                                 $price_per_piece ."*". $rowl['stock_sold']."=".$total_ini."<br>";
                                                            $total_price_piece =+ $rowl['total_price'] == '' ? 0 : $rowl['total_price']*$rowl['stock_sold'];
                                                            $difference =+ $total_price_piece <= 0 ? 0 : $total_price_piece - $total_ini;
                                                        }
                                                    }

                                                    echo "</tr><tr>";
                                                }
                                            }
                                        }

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
