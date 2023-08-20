<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css%22%3E">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
    $categories = $crudObj->getAllCategories();
    $x = $categories->fetch_all(MYSQLI_ASSOC);
    // $add_category= $crudObj->addCategory();
    // print_r($x);
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitAdd'])) {
        $name = $_POST['name'];
        $category_des = $_POST['description'];
        $picture = $_FILES['picture']['name'];
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($picture);
        move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile);

        $crudObj->addCategory($name,$uploadFile,$category_des);
        echo '<script>alert("Category added successfully")</script>';
        header("Location: manage_categories.php");
        exit();
    }
     ?>

    <?php
    require_once("../../partials/_navbar.php");



    ?>
    <div class="container-fluid page-body-wrapper">
        <?php
        require_once("../../partials/navbar.php");
        ?>

        <div class="container">
            <h2></h2><br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3 form">
                    <label for="name" class="form-label">Category Name:</label>
                    <input class="form-control" type="text" name="name" placeholder="Name" aria-label="default input example">
                </div>

                <div class="mb-3 form">
                    <label for="description" class="form-label">Category Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3">
                    </textarea>
                </div>


                <div class="mb-3 form">
                    <label for="picture" class="form-label">Category picture</label>
                    <input class="form-control" type="file" id="picture" name="picture">
                </div>


                <button type=" submit" class="btn btn-outline-success" name="submitAdd">Add product</button>
            </form>

        </div><br><br>
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