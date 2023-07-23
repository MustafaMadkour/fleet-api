<?php
include "../connect.php";

$email = filterRequest("email");
$verify = filterRequest("verifycode");

$stmt = $con->prepare("SELECT * FROM users WHERE email = '$email' AND verifycode = '$verify'");
$stmt->execute();

$count = $stmt->rowCount();
if ($count > 0) {
    $data = array("approve" => "1");
    updateData("users", $data, "email = '$email'");
} else {
    printFailure("Please enter a valid verify code sent to your email.");
}