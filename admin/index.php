<?php 
session_start();
// if ($_SESSION['admin'] != 1 || !isset($_SESSION['admin']))
//     header('location:../');
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "";
}
require "../../DOAN/PHP/database.php";
require "../../DOAN/PHP/code.php";
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
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/snackbar.css" />
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <script src="http://malsup.github.io/jquery.form.js"></script>
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
                    break;
                case "customer":
                    require "block/modalMoreUser.php";
                    break;
                case "order":
                    require "block/modalMoreOrder.php";
                    break;
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
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="js/product.js"></script>
    <script src="js/order.js"></script>
    <script src="js/customer.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
</body>

</html>
<!-- end document- ->                                                         