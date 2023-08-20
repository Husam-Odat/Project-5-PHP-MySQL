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

    // if (isset($_GET['category_id'])) {

    $id = $_GET['product_id'];
    $Reviews = $crudObj->getProductReviews($id);
    // }
    if (isset($_GET['review_id'])) {

        $deleteid = $_GET['review_id'];
        $crudObj->deleteReview($deleteid);
        header("Location: product_review.php?product_id=$id");
    }
    require_once("../../partials/_navbar.php");
    // $categories = $crudObj->getAllCategories();
    // if (isset($_GET['category_id'])) {
    ?>

    <!-- _________________  -->
    <div class="container-fluid page-body-wrapper">

        <?php
        require_once("../../partials/navbar.php")

        ?>
        <!-- <div class="main-panel"> -->
        <div class="card">
            <div class="card-body">
                <p class="card-title">All product</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="display expandable-table" style="width:100%;text-align:center">
                                <thead>
                                    <tr>
                                        <th>product id</th>
                                        <th>Product Name</th>
                                        <th>User Name</th>
                                        <th>User Review</th>
                                        <th>Review Date</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><i class="fa-solid fa-plus"></i></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    while ($Review = $Reviews->fetch_assoc()) {

                                    ?>
                                        <tr id="row1">
                                            <td><?php echo $Review['product_id'] ?> </td>
                                            <td><?php echo $Review['product_name'] ?> </td>
                                            <td><?php echo $Review['userName'] ?> </td>
                                            <td><?php echo $Review['review'] ?> </td>
                                            <td><?php echo $Review['review_date'] ?> </td>
                                            <td><a href="?review_id=<?php echo $Review['id'] ?>& product_id=<?php echo $id ?> ">Delete</a></td>

                                        </tr>
                                    <?php
                                    }

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