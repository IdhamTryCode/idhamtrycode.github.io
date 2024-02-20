<?php
require_once('db_login.php');
?>

<?php
// mengecek apakah user sudah menekan tombol submit
if (isset($_POST["submit"])){
    $valid = TRUE; //flag validasi
    $email = test_input($_POST['email']);
    if ($email == ''){
        $error_email = "Email is required";
        $valid = FALSE;
    } 
    
    $password = test_input($_POST['password']);
    if ($password == ''){
        $error_password = "Password is required";
        $valid = FALSE;
    }

    if ($valid){
        $address = $db->real_escape_string($address); //menghapus tanda petik
        $query = "INSERT INTO user (email, password, role) VALUES ('" . $email . "', '" . $password . "', 'customer')";
        //execute the query
        $result = $db->query($query);
        if (!$result){
            die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
        } else{
            //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
            $db->close();
            header('Location: login.php');
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
        <link rel="stylesheet" href="assets/css/style2.css">
    </head>
    <body style="background-image: url('assets/images/download/shoes_store.jpg');
                background-size:100%;">
        <br>
        <div class="acontainer">
            <div class="sepatu">Sepatu Bagus</div>
            <img src="assets/images/download/avatar.png">
            <div class="acard">
                <div class="acard-header">Registrasi</div>
                <div class="acard-body">
                    <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="aform-group">
                            <label for="email">Email</label><br>
                            <input type="email" class="form-control" id="email" name="email" size="30" value="<?php if(isset($email)) echo $email;?>">
                            <div class="text-danger"><?php if(isset($error_email)) echo $error_email;?></div>
                        </div>
                        <div class="aform-group">
                            <label for="password">Password</label><br>
                            <input type="password" class="form-control" id="password" name="password" size="30" value="">
                            <div class="text-danger"><?php if(isset($error_password)) echo $error_password;?></div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    </form>
                </div>
                <a href="login.php">Login</a>
            </div>

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>