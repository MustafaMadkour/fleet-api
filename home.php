<?php

include "./connect.php";

$alldata = array();
$currentDate = date('Y-m-d');
// print_r($currentDate);

$alldata['status'] = "success" ; 

$ships = getAllData("ships", null, null, false);
$alldata['ships'] = $ships;

$dangerCertificates = getAllData("shipcertview", " DATEDIFF(ship_cert_expire_at,NOW()) < 7", null, false);
$certificates = getAllData("shipcertview", null, null, false);
$alldata['certificates'] = $certificates;
$alldata['renew_certificates'] = $dangerCertificates;


echo json_encode($alldata);
