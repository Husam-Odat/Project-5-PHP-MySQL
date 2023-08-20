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
        $crudObj->deleteProduct($deleteid);
        header("Location: all_products.php");
    }
    require_once("../../partials/_navbar.php");
    $products = $crudObj->getAllProducts();

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
                <p class="card-title">All product</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <?php

                            ?>
                            <table class="display expandable-table" style="width:100%;text-align:center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Product price</th>
                                        <th> brife</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th> <a href="addproduct.php"><i id="plus" class="fa fa-plus" aria-hidden="true"></i></a>
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    while ($product = $products->fetch_assoc()) {

                                    ?>
                                        <tr id="row1">
                                            <td><?php echo $product['id'] ?></td>
                                            <td><?php echo $product['product_name'] ?></td>
                                            <td><?php echo $product['product_price'] ?></td>
                                            <td><?php echo $product['product_brife'] ?></td>
                                            <td id="edit"> <a href="edit.php?updateid=<?php echo $product['id'] ?>">Edit</a></td>
                                            <td id="edit"> <a href="product_review.php?product_id=<?php echo $product['id']  ?>">reviews</a></td>
                                            <td class=" btn btn-danger"> <a href="?deleteid=<?php echo $product['id'] ?>">Delete</a> </td>

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