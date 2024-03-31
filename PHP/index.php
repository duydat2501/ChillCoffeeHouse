<?php
session_start();
require "database.php";
require "code.php";
?>
<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "";
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home | Chill CoffeeHouse</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="style.css">
    <!-- Cusom css -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/snackbar.css">
    <!-- Modernizer js -->
    <!-- <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script> -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">
        <!-- Header -->
        <header id="wn__header" class="header__area header__absolute sticky__header">
            <?php require "block/header.php" ?>
        </header>
        <!-- Header -->
        <!-- Start Search Popup -->
        <div class="brown--color box-search-content search_active block-bg close__top">
            <?php require "block/searchpopup.php" ?>
        </div>
        <!-- End Search Popup -->
        <?php
        switch ($page) {
            case "homepage":
                require "page/homepage.php";
                break;
            case "casebook":
                require "page/casebook.php";
                break;
            case "product":
                require "page/product.php";
                break;
            case "checkout":
                require "page/checkout.php";
                break;
            case "account":
                require "page/account.php";
                break;
            case "order":
                require "page/order.php";
                break;
            case "informationorder":
                require "page/informationorder.php";
                break;
            case "newaccount":
                require "page/newaccount.php";
                break;
            case "contact":
                require "page/contact.php";
                break;
            case "user":
                require "page/profileuser.php";
                break;
            default:
                require "page/homepage.php";
        }
        ?>
        <!-- Footer Area -->
        <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
            <?php require "block/footer.php" ?>
        </footer>
        <!-- //Footer Area -->
    </div>
    <!-- //Main wrapper -->

    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <?php  ?>
    </div>
    <!-- END QUICKVIEW PRODUCT -->

    <div id="snackbar"></div>

    <!-- JS Files -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
    <script src="js/process_cart.js"></script>
    <script src="js/process_casebook.js"></script>
    <script src="js/submit_filter.js"></script>
    <script src="js/getSearch.js"></script>
    <script src="js/checklogin.js"></script>
    <script src="js/checknewaccount.js"></script>
    <script src="js/editprofile.js"></script>
    <script src="js/profileuser.js"></script>
    <script src="js/product.js"></script>

    <!-- thay đổi hình ảnh -->
    



</body>

</html>