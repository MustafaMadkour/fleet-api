<?php

include "../connect.php";


$username = filterRequest("username");
$password = sha1($_POST["password"]);
$email = filterRequest("email");
// $role = filterRequest("role");
// $verfiycode     = rand(10000 , 99999);

$stmt = $con->prepare("SELECT * FROM admin_maintain WHERE admin_email = ? ");
$stmt->execute(array($email));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("Admin with this email already exists, Please sign in.");
} else {

    $data = array(
        "admin_name" => $username,
        "admin_password" =>  $password,
        "admin_email" => $email,
        // "role" => $role,
        // "verifycode" => $verfiycode
    );
    sendEmail($email , "Fleet Registeration" , "Hello ".ucfirst($username).", <br>Thanks for registering in Fleet. <br>Your account will be activated soon") ; 
    insertData("admin_maintain" , $data) ; 

}