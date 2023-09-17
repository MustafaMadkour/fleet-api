<?php

include "../connect.php";


$ship = filterRequest("ship");
$password = sha1($_POST["password"]);
$type = filterRequest("type");
$capacity = filterRequest("capacity");
$buildyear = filterRequest("buildyear");
$imo = filterRequest("imo");
$flag = filterRequest("flag");


$stmt = $con->prepare("SELECT * FROM ships WHERE ship_name = ? ");
$stmt->execute(array($ship));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("Ship with this name already exists, Please sign in.");
} else {

    $data = array(
        "ship_name" => $ship,
        "ship_password" =>  $password,
        "ship_build_date" => $buildyear,
        "ship_imo_number" => $imo,
        "ship_type" => $type,
        "ship_capacity" => $capacity,
        "ship_flag" => $flag,

        // "role" => $role,
        // "verifycode" => $verfiycode
    );
    // sendEmail($email , "Fleet Registeration" , "Hello ".ucfirst($username).", <br>Thanks for registering in Fleet. <br>Your account will be activated soon") ; 
    insertData("ships" , $data) ; 

}