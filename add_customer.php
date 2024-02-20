<?php
//File      : edit_customer.php
//Deskripsi : menampilkan form tambah data customer dan mengupdate ke database

require_once('db_login.php');

// mengecek apakah user sudah menekan tombol submit
if (isset($_POST["submit"])){
    $valid = TRUE; //flag validasi
    $name = test_input($_POST['name']);
    if ($name == ''){
        $error_name = "Name is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)){
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }
    $address = test_input($_POST['address']);
    if ($address == ''){
        $error_address = "Address is required";
        $valid = FALSE;
    }
    $city = $_POST['city'];
    if ($city == '' || $city == 'none'){
        $error_city = "City is required";
        $valid = FALSE;
    }
    if ($valid){
        $address = $db->real_escape_string($address); //menghapus tanda petik
        $query = "INSERT INTO customers (name, address, city) VALUES ('" . $name . "', '" . $address . "', '" . $city . "')";
        //execute the query
        $result = $db->query($query);
        if (!$result){
            die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
        } else{
            //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
            $db->close();
            header('Location: view_customer2.php');
        }
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
            <div class="card" style="opacity: 0.9;">
                <div class="card-header" style="background-color: #a9c4c2;">Add Customers Data</div>
                <div class="card-body" style="background-color:#d6d6d6;">
                    <form method="POST" autocomplete="on" >
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                        <div class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                        <div class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label for="city">City:</label>
                        <select name="city" id="city" class="form-control" required>
                            <option value="none" >--Select a city--</option>
                            <option value="Airport West">Airport West</option>
                            <option value="Box Hill">Box Hill</option>
                            <option value="Yarravile">Yarravile</option>
                        </select>
                        <div class="text-danger"><?php if(isset($error_city)) echo $error_city;?></div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="view_customer2.php" class="btn btn-secondary">Cancel</a>
                </form>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
<?php
$db->close();
?>