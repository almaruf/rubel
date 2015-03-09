<?php
$dbArray = include_once('../dbconfig.php');

$dbhost = $dbArray['host'];
$dbname = $dbArray['dbname'];
$dbuser = $dbArray['username'];
$dbpass = $dbArray['password'];

try {
 $db = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser,$dbpass);
 $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
 echo "Connection Error : ".$e->getMessage();
}
