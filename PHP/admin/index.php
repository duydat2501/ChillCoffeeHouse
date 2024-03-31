<?php
session_start();
// if ($_SESSION['admin'] != 1 || !isset($_SESSION['admin']))
//     header('location:../');

if (!isset($_SESSION['username'])) {
    header("location: ../");
}

if ($_SESSION['admin'] != 1) {
    header("location: ../");
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "";
}

require "../database.php";
require "../code.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="summary" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title> Trang quản trị</title>

    <!-- Fontfaces CSS-->
    <link href="public/css/font-face.css" rel="stylesheet" media="all">
    <link href="public/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="public/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="public/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="public/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="public/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="public/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="public/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="public/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="public/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="public/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="public/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">



    <!-- Main CSS-->
    <link href="public/css/theme.css" rel="stylesheet" media="all">
    <link href="public/css/style.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/snackbar.css" />
    <script src="public/vendor/jquery-3.2.1.min.js"></script>
    <script src="public/js/jquery.form.js"></script>
    <style>
        @keyframes example {
            0% {
                background-color: red;
            }

            25% {
                background-color: yellow;
            }

            50% {
                background-color: blue;
            }

            100% {
                background-color: green;
            }
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php require "block/header_mobile.php"; ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php require "block/sidebar.php"; ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php require "block/header_desktop.php" ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                switch ($page) {
                                    case "product":
                                        require "page/product.php";
                                        break;
                                    case "category":
                                        require "page/category.php";
                                        break;
                                    case "customer":
                                        require "page/customer.php";
                                        break;
                                    case "order":
                                        require "page/order.php";
                                        break;
                                    case "discounting":
                                        require "page/discounting.php";
                                        break;
                                    default:
                                        require "page/product.php";
                                }
                                ?>
                                <!-- content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-->
            <?php
            switch ($page) {
                case "product":
                    require "block/modalAddProduct.php";
                    require "block/modalupdateProduct.php";
                    require "block/modalMoreProduct.php";
                    require "block/modalKhuyenMai.php";
                    break;
                case "customer":
                    require "block/modalMoreUser.php";
                    require "block/modalUpdateUser.php";
                    require "block/modalAddUser.php";

                    break;
                case "order":
                    require "block/modalupdateOrder.php";
                    require "block/modalMoreOrder.php";
                    break;
                case "category":
                    require "block/modalUpdateCasebook.php";
                    require "block/modalAddCategory.php";

                    break;
                case "discounting":
                    require "block/modalMoreDiscounting.php";
                default:
                    require "block/modalAddProduct.php";
                    require "block/modalupdateProduct.php";
                    require "block/modalMoreProduct.php";
            }
            ?>
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <div id="snackbar" style="z-index:100000"></div>
    <!-- Jquery JS-->
    <!-- Bootstrap JS-->
    <script src="public/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="public/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="public/vendor/slick/slick.min.js">
    </script>
    <script src="public/vendor/wow/wow.min.js"></script>
    <script src="public/vendor/animsition/animsition.min.js"></script>
    <script src="public/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="public/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="public/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="public/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="public/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="public/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="public/vendor/select2/select2.min.js">
    </script>
    <script src="public/js/product.js"></script>
    <script src="public/js/order.js"></script>
    <script src="public/js/customer.js"></script>
    <script src="public/js/case.js"></script>
    <script src="public/js/discounting.js"></script>
    <!-- Main JS-->
    <script src="public/js/main.js"></script>

</body>
</html>
<!-- end document- ->                                                                                 