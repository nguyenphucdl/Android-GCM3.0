<?php
require_once('loader.php');

// return json response 
$json = array();

//var_dump($_POST);die();

$nameUser  = "default";
$nameEmail = $_POST["email"];
$gcmRegID  = $_POST["token"]; // GCM Registration ID got from device


/**
 * Registering a user device in database
 * Store reg id in users table
 */
$res = false;
if (isset($nameUser) && isset($nameEmail) && isset($gcmRegID)) {
    
	// Store user details in db
    $res = storeUser($nameUser, $nameEmail, $gcmRegID);
} 

if($res != false) {
	http_response_code(201);
} else {
	http_response_code(409);
	$message = "Conflict";
	echo $message;
	die();
}  
?>