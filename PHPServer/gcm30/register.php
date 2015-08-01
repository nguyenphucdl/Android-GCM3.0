<?php 
require_once('loader.php');


//echo "OK";die();
// return json response 
$json = array();
$isValid = false;
$nameUser = "default";

$json = file_get_contents('php://input');// GCM Registration ID got from device
$obj = json_decode($json, true);

if( array_key_exists('email', $obj) && array_key_exists("token", $obj)) {
	$nameEmail = $obj['email'];
	$nameTokenID = $obj['token'];
	$isValid = true;
} else {
	http_response_code(400);
	$message = "Bad Request";
	echo $message;
	die();
}


/**
 * Registering a user device in database
 * Store reg id in users table
 */
$res = false;
if ($isValid) {
    
	// Store user details in db
    $res = storeUser($nameUser, $nameEmail, $nameTokenID);
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