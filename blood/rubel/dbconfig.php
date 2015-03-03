<?php
$conf = include_once('../config.php');

$dbhost = $conf['host'];
$dbname = $conf['dbname'];
$dbuser = $conf['username'];
$dbpass = $conf['password'];

try{
 $db = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser,$dbpass);
 $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
 echo "Connection Error : ".$e->getMessage();
}
?>