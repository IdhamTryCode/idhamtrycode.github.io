<?php include 'sidebar.html'; ?>
        <link rel="stylesheet" href="assets/css/body.css">
        <div class="container">
                <div class="card mt-4" style="margin-left:20%; opacity:0.9;">
                    <div class="card-header" style="background-color: #a9c4c2;">Shoes Data</div>
                    <div class="card-body" style="background-color:#d6d6d6;">
                        <br>
                        <table class="table table-striped">
                            <tr>
                                <th>Shoes ID</th>
                                <th>Merk</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Image</th>
                            </tr>

                            <?php
                            // include our login information
                            require_once 'db_login.php';

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

                            // fetch and display the results
                            while ($row = $result->fetch_object()) {
                                echo '<tr>';
                                echo '<td>' . $row->shoes_id . '</td>';
                                echo '<td>' . $row->merk . '</td>';
                                echo '<td>' . $row->type . '</td>';
                                echo '<td> $' . $row->price . '</td>';
                                echo '<td><img src="customer2/images/' .
                                $row->pic .
                                '" style="width: 50px;" alt=""></td>';
                                echo '</tr>';
                            }
                            echo '</table>';
                            echo '<br />';
                            echo 'Total Rows = ' . $result->num_rows;
                            $result->free();
                            $db->close();
                            ?>
                    </div>
                </div>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
