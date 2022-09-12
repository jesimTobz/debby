<?php 

    if (isset($_POST['login-user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'connect/connection.php'; 
    require_once 'connect/functions.php'; 

    if (emptyInputLogin($username, $password) !== false) {
        header("location: login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
} else {
     header("location: login.php");
        exit();
}

 ?>