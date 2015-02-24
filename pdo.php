<?php 
print_r(PDO::getAvailableDrivers());
$db = new PDO('mysql:dbname=test;host=192.168.1.16', 'root', 'password');
$stmt = $db->prepare("select testo, binario from test limit 1");
$stmt->execute(array($_GET['id']));
$stmt->bindColumn(1, $testo, PDO::PARAM_STR);
$stmt->bindColumn(2, $lob, PDO::PARAM_LOB);
$stmt->fetch(PDO::FETCH_BOUND);

var_dump(unpack('H*', $testo));
var_dump(unpack('H*', $lob));