<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
    include '../header.php';
    include '../connection/connect.php';

?>

            <?php

            if(isset($_GET['prod_id'])){
                $id = $_GET['prod_id'];

                $sql = mysqli_query($conn,"SELECT * FROM tbl_products WHERE id = '$id'");
                while($row=mysqli_fetch_array($sql)){


                    ?>



                    <div class="container">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h2 class="text-center"><?= $row['product_name'] ?></h2>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" action="../functions/update.php?id=<?= $row['id']?>">
                                            <p>
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name = "product_name" value="<?= $row['product_name'] ?>">
                                            </p>
                                            <p><label>Product Description</label>
                                                <input type="text" class="form-control" name = "product_desc" value="<?= $row['product_desc'] ?>">
                                            </p>
                                            <p><label>Price</label>
                                                <input type="text" class="form-control" name = "price" value="<?= $row['price'] ?>">
                                            </p>
                                            <p><input type="submit" name = "prod_update" class="btn btn-primary" value="Update"></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>





                <?php

                if(isset($_GET['user_id'])){
                    $id = $_GET['user_id'];

                    $sql = mysqli_query($conn,"SELECT * FROM tbl_user WHERE id = '$id'");
                    while($row=mysqli_fetch_array($sql)){


                        ?>



                        <div class="container">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h2 class="text-center"><?= $row['lastname'] ?>, <?= $row['firstname'] ?> <?= $row['middlename'] ?></h2>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action="../functions/update.php?id=<?= $row['id']?>">
                                                <p>
                                                    <label>Lastname</label>
                                                    <input type="text" class="form-control" name = "lastname" value="<?= $row['lastname'] ?>">
                                                </p>
                                                <p><label>Firstname</label>
                                                    <input type="text" class="form-control" name = "firstname" value="<?= $row['firstname'] ?>">
                                                </p>
                                                <p><label>Middlename</label>
                                                    <input type="text" class="form-control" name = "middlename" value="<?= $row['middlename'] ?>">
                                                </p>
                                                <p><label>Age</label>
                                                    <input type="number" class="form-control" name = "age" value="<?= $row['age'] ?>">
                                                </p>
                                                <p><label>Gender</label>
                                                    <select name = "gender" class="form-control">
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </p>
                                                <p><label>Position</label>
                                                    <input type="text" class="form-control" name = "position" value="<?= $row['position_user'] ?>">
                                                </p>
                                                <p><input type="submit" name = "user_update" class="btn btn-primary" value="Update"></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>



                <?php

                if(isset($_GET['stud_id'])){
                    $id = $_GET['stud_id'];

                    $sql = mysqli_query($conn,"SELECT * FROM tbl_students WHERE id = '$id'");
                    while($row=mysqli_fetch_array($sql)){


                        ?>



                        <div class="container">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h2 class="text-center"><?= $row['lastname'] ?>, <?= $row['firstname'] ?> <?= $row['middlename'] ?></h2>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action="../functions/update.php?id=<?= $row['id']?>">
                                                <p>
                                                    <label>STUDENT ID</label>
                                                    <input type="text" class="form-control" name = "id" value="<?= $row['id'] ?>">
                                                </p>
                                                <p>
                                                    <label>Lastname</label>
                                                    <input type="text" class="form-control" name = "lastname" value="<?= $row['lastname'] ?>">
                                                </p>
                                                <p><label>Firstname</label>
                                                    <input type="text" class="form-control" name = "firstname" value="<?= $row['firstname'] ?>">
                                                </p>
                                                <p><label>Middlename</label>
                                                    <input type="text" class="form-control" name = "middlename" value="<?= $row['middlename'] ?>">
                                                </p>

                                                <p><label>Course</label>
                                                    <select name = "course" class="form-control">
                                                        <option>BSIT</option>
                                                        <option>BSED</option>
                                                        <option>ABCOM</option>
                                                        <option>BEED</option>
                                                        <option>BSHRM</option>
                                                        <option>BSTHRM</option>
                                                        <option>BSBIO</option>
                                                    </select>
                                                </p>
                                                <p><label>Year</label>
                                                    <select name = "year" class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>

                                                    </select>
                                                </p>

                                                <p><input type="submit" name = "stud_update" class="btn btn-primary" value="Update"></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                        <?php
                    }
                }
                        ?>




                    <?php

                    if(isset($_GET['fac_id'])){
                        $id = $_GET['fac_id'];

                        $sql = mysqli_query($conn,"SELECT * FROM tbl_faculty WHERE id = '$id'");
                        while($row=mysqli_fetch_array($sql)){


                            ?>



                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h2 class="text-center"><?= $row['lastname'] ?>, <?= $row['firstname'] ?> <?= $row['middlename'] ?></h2>
                                            </div>
                                            <div class="panel-body">
                                                <form method="post" action="../functions/update.php?id=<?= $row['id']?>">
                                                    <p><label>FACULTY ID: </label></p>
                                                    <p><input type="number" name="id" class="form-control" value="<?= $row['id'] ?>" placeholder="FACULTY ID .." required></p>
                                                    <p>
                                                        <label>Lastname</label>
                                                        <input type="text" class="form-control" name = "lastname" value="<?= $row['lastname'] ?>">
                                                    </p>
                                                    <p><label>Firstname</label>
                                                        <input type="text" class="form-control" name = "firstname" value="<?= $row['firstname'] ?>">
                                                    </p>
                                                    <p><label>Middlename</label>
                                                        <input type="text" class="form-control" name = "middlename" value="<?= $row['middlename'] ?>">
                                                    </p>
                                                    <p><label>Age</label>
                                                        <input type="number" class="form-control" name = "age" value="<?= $row['age'] ?>">
                                                    </p>
                                                    <p><label>Gender: </label></p>
                                                    <p><select name = "gender" class="form-control" >
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select></p>
                                                    <p><label>Department</label>
                                                        <input type="text" class="form-control" name = "department" value="<?= $row['department'] ?>">
                                                    </p>

                                                    <p><input type="submit" name = "fac_update" class="btn btn-primary" value="Update"></p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>





<?php
    include '../footer.php';
?>