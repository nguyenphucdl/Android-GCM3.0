<?php 
 require_once('loader.php');

 	$gcmRegID    = $_POST["regId"]; // GCM Registration ID got from device
	$pushMessage = $_POST["message"];

	if (isset($gcmRegID) && isset($pushMessage)) {
		
		
		$registatoin_ids = array($gcmRegID);
	
		$result = send_push_notification($gcmRegID, $pushMessage);
	
		echo $result;
	}

?>