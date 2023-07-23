<?php

include "../connect.php";


$username = filterRequest("username");
$password = sha1("password");
$email = filterRequest("email");
// $role = filterRequest("role");
$verfiycode     = rand(10000 , 99999);

$stmt = $con->prepare("SELECT * FROM users WHERE email = ? ");
$stmt->execute(array($email));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("User with this email already exists, Please sign in.");
} else {

    $data = array(
        "username" => $username,
        "password" =>  $password,
        "email" => $email,
        // "role" => $role,
        "verifycode" => $verfiycode
    );
    sendEmail($email , "Fleet Verfiy Code" , "Hello ".ucfirst($username).", <br>Thanks for registering in Fleet. <br>Your Verfiy Code is: $verfiycode") ; 
    insertData("users" , $data) ; 

}