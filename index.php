<?php
session_start(); //inisialisasi session
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include 'sidebar.html';
?>


<div class="page-container">
    <!-- page wellcom start -->
    <div class="main-content-inner p_4 d-flex align-items-center">
                <div class="my-5 left_welcome">
                    <h1>Sepatu Bagus</h1>
                    <h3>Selamat Datang <?php echo $_SESSION['username']; ?></h3>
                    <br>
                    <p>Ini merupakan halaman pengelola website Sepatu Bagus</p>
                </div> <!-- end left welcome -->
                <div class="right_welcome">
                    <div class="img_dash">
                        <img class="dash_img" src="assets/shoes_logo.png" alt="logo-sj-furniture">
                    </div>
                </div> <!-- end right welcome -->
            </div> <!-- page wellcome end -->
<div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area sales-style-two">
                    <div class="row">
                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Jumlah Sepatu</h4>
                                        <h4>
                                        <?php
                                        // include our login information
                                        require_once 'db_login.php';

                                        // execute the query
                                        $query =
                                            ' SELECT * FROM shoes ORDER BY shoes_id ';
                                        $result = $db->query($query);
                                        if (!$result) {
                                            die(
                                                'Could not the query the database: <br />' .
                                                    $db->error .
                                                    '<br>Query: ' .
                                                    $query
                                            );
                                        }
                                        echo $result->num_rows;
                                        $result->free();

                                        ?>
                                            
                                        </h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Jumlah Customer</h4>
                                        <h4>
                                        <?php
                                        require_once 'db_login.php';
                                        $query =
                                            ' SELECT customerid AS ID, name AS Nama, address AS Alamat, city AS Kota FROM customers ORDER BY customerid ';
                                        $result = $db->query($query);
                                        if (!$result) {
                                            die(
                                                'Could not the query the database: <br />' .
                                                    $db->error .
                                                    '<br>Query: ' .
                                                    $query
                                            );
                                        }
                                        echo $result->num_rows;
                                        $result->free();
                                        $db->close();
                                        ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- sales report area end -->
                

                <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
      zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
      ZC.LICENSE = [
        "569d52cefae586f634c54f86dc99e6a9",
        "ee6b7db5b51705a13dc2339db3edaf6d",
      ];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    </div>