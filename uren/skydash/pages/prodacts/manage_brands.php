<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <!-- <link rel="stylesheet" href="../../"> -->
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- font awsome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />

</head>

<body>
    <?php
    require_once("../../db.php");
    if (isset($_GET['deleteid'])) {

        $deleteid = $_GET['deleteid'];
        $crudObj->deleteBrand($deleteid);
        header("Location: manage_brands.php");
    }

    if (isset($_POST['submit'])) {
        $newBrand = $_POST['brand_name'];
        $crudObj->addBrand($newBrand);
        header("Location: manage_brands.php");
    }

    if(isset($_POST['updateBrand'])){
        $newBrandText = $_POST['updatedBrand'];
        $brandID = $_POST['brandId'];
        $crudObj->updateBrand($brandID, $newBrandText);
        header("Location: manage_brands.php");
    }
    require_once("../../partials/_navbar.php");
    $brands = $crudObj->getAllBrands();
    $thebrand = $brands->fetch_all(MYSQLI_ASSOC);
    // var_dump($categories);
    ?>

    <!-- _________________  -->
    <div class="container-fluid page-body-wrapper">

        <?php
        // require_once("../../partials/navbar.php")
        require_once("../../partials/navbar.php")

        ?>
        <!-- <div class="main-panel"> -->
        <div class="card">
            <div class="card-body">
                <p class="card-title">Add New Brand</p>
                <form action="" method="post">
                    <label for="">Enter the brand name</label>
                    <input type="text" name="brand_name" required>
                    <button name="submit">Add brand</button>
                </form><br><br>
                <p class="card-title">All Brands</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <?php

                            ?>
                            <table class="display expandable-table" style="width:100%;text-align:center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Brand Name</th>
                                        <th>Update Brand Name</th>
                                        <th></th>
                                        <th></th>
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    // while ($category = $categories->fetch_assoc()) {
                                    foreach ($thebrand as $value) {
                                    ?>
                                        <tr id="row1">
                                            <td><?php echo $value['brand'] ?></td>
                                            <td><?php echo $value['Brand_name'] ?></td>
                                            <td>
                                                <form method="post">
                                                    <input type="text" name="updatedBrand" required>
                                                    <input type="hidden" name="brandId" value="<?php echo $value['brand']; ?>">
                                                    <button type="submit" name="updateBrand">Update Brand</button>
                                                </form>
                                            </td>



                                            <td class=" btn btn-danger"> <a href="?deleteid=<?php echo $value['brand'] ?>">Delete</a> </td>

                                        </tr>
                                    <?php
                                    }

                                    //  foreach ($variable as  $value) {


                                    //  echo <<< "All_product"
                                    //     <tr> <td>$value['id'] </td>
                                    //     <td>$value['name']  </td>
                                    //     <td> </td>
                                    //     <td> </td>
                                    //     <td> </td>
                                    //     <td> <img src="" alt=""></td>
                                    //     <td>  </td>
                                    //     </tr>
                                    //       All_product;
                                    ?>
                                    <?php
                                    // }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" pop">
    </div>
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../../js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../js/dashboard.js"></script>
    <script src="../../js/Chart.roundedBarCharts.js"></script>
    <!-- ___________ 
 -->
    <script src="../../js/product.js"></script>

</body>

</html>