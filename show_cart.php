<?php 
//File      : show_cart.php
//Deskripsi : untuk menambahkan item ke shopping cart dan menampilkan isi shopping cart

session_start();
$id = $_GET['id'];
if($id != ""){
    //jika $_SESSION['cart'] belum ada, maka inisilisasi dengan array kosong
    //$_SESSION['cart'] merupakan array assosiatif
    //indeksnya berisi isbn buku yang dipilih
    //value-nya berisi jumlah (qty) dari buku dengan isbn tersebut
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    //jika $_SESSION['cart'] dengan indeks isbn buku yang dipilih sudah ada, tambahkan value-nya
    // dengan 1, jika belum ada, buat elemen baru dengan indeks tersebut dan set nilainya dengan 1
    if (isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]++;
    } else{
        $_SESSION['cart'][$id] = 1;
    }
}
?>
<!--Menampilkan isi shopping cart-->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="style2.css">
    </head>
    <body style="
    background-color: #f0ebe3;
    background-image: url(assets/shoes_logo.png);
    background-size: 10%;
    ">
        <br>
        <div class="container" style="
            width: 60%;
            margin: auto;
            margin-top: 45px;
            margin-bottom: 30px;
        ">
            <div class="card" style="opacity:0.9;">
                <div class="card-header" style="background-color: #a9c4c2;">Shopping Cart</div>
                <div class="card-body" style="background-color:#d6d6d6;">
                    <br>
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Merk</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Price * Qty</th>
                        </tr>
                        <?php 
                        //include our login information
                        require_once('db_login.php');
                        $sum_qty = 0; //inisialisasi total item di shopping cart
                        $sum_price = 0; //inisialisasi total price di shopping cart
                        if (is_array($_SESSION['cart'])){
                            foreach ($_SESSION['cart'] as $id => $quantity){
                                $query = " SELECT * FROM shoes WHERE shoes_id='".$id."'";
                                $result = $db->query($query);
                                if (!$result){
                                    die("Could not query the database: <br>".$db->error."<br>Query: " .$query);
                                }
                                while ($row = $result->fetch_object()){
                                    echo '<tr>';
                                    echo '<td>'.$row->shoes_id.'</td>';
                                    echo '<td>'.$row->merk.'</td>';
                                    echo '<td>'.$row->type.'</td>';
                                    echo '<td>'.$row->price.'</td>';
                                    echo '<td>'.$quantity.'</td>';
                                    $price = $row->price;
                                    echo '<td>'.$price*$quantity.'</td>';
                                    $sum_price = $sum_price + ($row->price * $quantity);
                                    $sum_qty = $sum_qty + $quantity;
                                }
                            }
                            echo '<tr><td></td><td></td><td></td><td></td><td>'.$sum_qty.'</td><td>'.$sum_price.'</td></tr>';
                            $result->free();
                            $db->close();
                        } else{
                            echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>';
                        } 
                        ?>
                    </table>
                    Total items = <?php echo $sum_qty; ?><br><br>
                    <a class="btn btn-primary" href="customer2/#products">Continue Shopping</a>
                    <a class="btn btn-danger" href="delete_cart.php">Empty Cart</a><br /><br />
                </div>
            </div>
        </div>
    
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>