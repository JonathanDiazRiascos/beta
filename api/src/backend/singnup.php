<?php
    //1.DB connection
    require('../../config/db_connection.php');
    //2.Get data from regiter form
    $email  = $_POST['email'];
    $pass   = $_POST['passwd'];
    //3.Encrypt password
    $enc_pass = md5($pass);
    //4.Query to insert data into users table
    $query = "INSERT INTO users (email, password) VALUES ('$email', '$enc_pass')";
    $result = pg_query($conn, $query);

    if ($result) {
        echo "User registered successfully!";
    } else {
        echo "Refistration failed";
    }
    pg_close($conn);
    //echo "email: " . $email ;
    //echo "<br>password: " . $pass;
    //echo "<br>encrypted password: " . $enc_pass;

?>