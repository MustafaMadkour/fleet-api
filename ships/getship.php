<?php

include "../connect.php";

 
$ship = filterRequest("ship"); 
// $stmt = $con->prepare("SELECT * FROM admin WHERE admin_email = ? AND  admin_password = ?  ");
// $stmt->execute(array($email, $password));
// $count = $stmt->rowCount();
// result($count) ; 
// $alldata['status'] = "success" ; 


getData("ships", " ship_name = ? ", array($ship));


