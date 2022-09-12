<?php

//require 'connect/DB.php';

if (isset($_POST['reg_user'])) {
    // Registering Users
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sex = $_POST['sex'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    require_once 'connect/connection.php'; 
    require_once 'connect/functions.php'; 

    if (emptyInputSignup($firstname, $lastname , $username , $email, $phone, $sex, $password_1, $password_2) !== false) {
        header("location: login.php?error=emptyinput");
        exit();
    }

    /*if(invalidEmail($email) !== false){
        header("location: login.php?error=invalidemail");
        exit();
    }*/

    if(pwdMatch($password_1, $password_2) !== false){
        header("location: login.php?error=passworddontmatch");
        exit();
    }

    if(uidExist($conn, $username, $email) !== false){
        header("location: login.php?error=usernametaken");
        exit();
    }

    createUser($conn, $firstname, $lastname , $username , $email, $phone, $sex, $password_1);
} else {
    header("location: login.php");
        exit();
}



