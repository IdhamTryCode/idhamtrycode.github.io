<?php
session_start(); //inisialisasi session
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepatu Bagus</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>

    <!-- header section starts  -->

    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#home"class="logo">Sepatu Bagus<span>.</span></a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#products">products</a>
            <a href="#icons-container">Why Us?</a>
            <a href="#about">about</a>
            <a href="../show_cart.php">Cart</a>
        </nav>
        <div class="icons"></div>
        <div class="LogOut">
            <a href="../logout.php">
                <img src="images/box-arrow-right.svg" width="30px" alt=""> <br>
            </a>
        </div>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>Sepatu Bagus</h3>
            <span> pusatnya beli sepatu bagus </span>
            <!-- <p>Website Sepatu Bagus merupakan halaman marketplace untuk membeli sepatu secara online. Website ini didirikan pada tahun 2022
            untuk memenuhi kebutuhan tugas kelompok mini project PBP.
        </p> -->
            <a href="#products" class="btn">shop now</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- icons section starts  -->

    <section class="icons-container" id="icons-container">
        <div class="icons">
            <img src="images/icon-1.png" alt="">
            <div class="info">
                <h3>free delivery</h3>
                <span>on all orders</span>
            </div>
        </div>

        <div class="icons">
            <img src="images/icon-2.png" alt="">
            <div class="info">
                <h3>10 days returns</h3>
                <span>moneyback guarantee</span>
            </div>
        </div>

        <div class="icons">
            <img src="images/icon-3.png" alt="">
            <div class="info">
                <h3>offer & gifts</h3>
                <span>on all orders</span>
            </div>
        </div>

        <div class="icons">
            <img src="images/icon-4.png" alt="">
            <div class="info">
                <h3>secure paymens</h3>
                <span>protected by paypal</span>
            </div>
        </div>

    </section>

    <!-- icons section ends -->

    <!-- prodcuts section starts  -->

    <section class="products" id="products">

        <h1 class="heading"> latest <span>products</span> </h1>

        <div class="box-container">


            <?php
            // include our login information
            require_once '../db_login.php';

            // execute the query
            $query = ' SELECT * FROM shoes ORDER BY shoes_id ';
            $result = $db->query($query);
            if (!$result) {
                die(
                    'Could not the query the database: <br />' .
                        $db->error .
                        '<br>Query: ' .
                        $query
                );
            }
            while ($row = $result->fetch_object()) {
                echo '<div class="box ">';
                echo '<span class="discount">-15%</span>';
                echo '<div class="image">';
                echo '<img src="images/' .
                    $row->pic .
                    '" style="width: 300px;" alt="">';
                echo '<div class="icons">';
                echo ' <a href="../show_cart.php?id=' .
                    $row->shoes_id .
                    '" class="cart-btn">add to cart</a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="content">';
                echo '<h3>' . $row->type . '</h3>';
                echo '<div class="price"> ' . $row->price . '$</span> </div>';
                echo '</div>';
                echo '</div>';
            }
            ?>


        </div>
        </div>

    </section>

    <!-- prodcuts section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span> about </span> us! </h1>

        <div class="row">

            <div class="video-container">
                <video src="images/about-vid.mp4" loop autoplay muted></video>
                <h3>best shoes sellers</h3>
            </div>

            <div class="content">
                <h3>SEPATU BAGUS.</h3>
                <p>Website Sepatu Bagus merupakan halaman marketplace untuk membeli sepatu secara online. Website ini didirikan pada tahun 2022
                    untuk memenuhi kebutuhan tugas kelompok mini project PBP.
                </p>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- footer section starts  -->

    <section class="footer">
        <div class="credit"> created by <span> BIFROST. </span> | all rights reserved </div>
    </section>
    <!-- footer section ends -->

</body>

</html>