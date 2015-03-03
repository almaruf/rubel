<?php
$dbhost = 'localhost';
$dbname = 'blood_donation';
$dbuser = 'root';
$dbpass = '';

try{
	$db = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser,$dbpass);
	$db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
	echo "Connection Error : ".$e->getMessage();
}
?>