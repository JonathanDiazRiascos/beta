<?php
    //1.DB connection
    require('../../config/db_connection.php');
    //2.Get data from regiter form
    $email  = $_POST['email'];
    $pass   = $_POST['passwd'];
    //3.Encrypt password
    $enc_pass = md5($pass);
    //validate if email already exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);
    if($row){
        echo "<script>alert('Email already exists')</script>";
        header('refresh:0; url=http://127.0.0.1/beta/api/src/register_form.html');
        exit();  // stops the script if email already exists. You might want to consider a more complex error handling mechanism here.  //die("Email already exists");  // This would also stop the script.  //return;  // This would continue executing the rest of the script.  //exit(1);  // This would exit the script with a status code of 1.  //pg_free_result($result);  // Frees the memory associated with a result set.  //pg_close($conn);  // Closes a database connection.  //exit();  // This would stop the script.  //return;  // This would continue executing the rest of the script.  //exit(1);  // This would
    }/*else{
        echo "<script>Alert('registered fellied')</script>";
    }*/
    //4.Query to insert data into users table
    $query = "INSERT INTO users (email, password) VALUES ('$email', '$enc_pass')";
    //5.Execute query
    $result = pg_query($conn, $query);

    if ($result) {
        //echo "User registered successfully!";
        echo "<script>Alert('registered successfully')</script>";
        //Redirecciona al login
        header('refresh:0; url=http://127.0.0.1/beta/api/src/login_form.html');
    } else {
        echo "Refistration failed";
    }
    pg_close($conn);
    //echo "email: " . $email ;
    //echo "<br>password: " . $pass;
    //echo "<br>encrypted password: " . $enc_pass;

?>