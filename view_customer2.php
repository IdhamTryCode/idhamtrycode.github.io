<?php
include 'sidebar.html';
//File      : view_customer2.php
//Deskripsi : halaman ini hanya dapat ditampilkan jika user telah login, jika belum akan di-redirect ke halaman login.php
// session_start(); //inisialisasi session
// if (!isset($_SESSION['username'])){
//     header('Location: login.php');
// }
?>
    <link rel="stylesheet" href="assets/css/body.css">
    <div class="container" >
        <div class="card mt-4" style="margin-left: 20%; opacity: 0.9;">
            <div class="card-header" style="background-color: #a9c4c2;">Customers Data</div>
            <div class="card-body" style="background-color:#d6d6d6;">
                <br>
                <a class="btn btn-primary" href="add_customer.php" style="font-family: cursive; background-color: #59acac;">+ Add Customer Data</a><br /><br />
                <table class="table table-striped" style="border-bottom: 1px solid;">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    // include our login information
                    require_once 'db_login.php';

                    // execute the query
                    // yang berbeda dengan sebelumnya yaitu pada view_customer untuk nama panggilan label pada fetch object harus sama dengan di database
                    // tetapi kalau view_customer2 pada pemanggilan querynya dirubah untuk tiap label sesuai dengan keinginan masing masing seperti dibawah
                    // dan pada fetch object menyesuaikan dengan pemanggilan query yang telah diubah
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

                    // fetch and display the results
                    $i = 1;
                    while ($row = $result->fetch_object()) {
                        echo '<tr>';
                        echo '<td>' . $i . '</td>';
                        echo '<td>' . $row->Nama . '</td>';
                        echo '<td>' . $row->Alamat . '</td>';
                        echo '<td>' . $row->Kota . '</td>';
                        echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id=' .
                            $row->ID .
                            '">Edit</a>&nbsp;&nbsp;
                                      <a class="btn btn-danger btn-sm" href="delete_customer.php?op=delete&id=' .
                            $row->ID .
                            '">Delete</a>
                                      </td>';
                        echo '</tr>';
                        $i++;
                    }
                    echo '</table>';
                    echo '<br />';
                    echo 'Total Rows = ' . $result->num_rows;
                    $result->free();
                    $db->close();
                    ?>
            </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
