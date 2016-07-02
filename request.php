<?php
require('Services/Twilio.php');
header('Content-Type: text/xml');
$accountSid = getenv('TWILIO_ACCOUNT_SID');
$authToken = getenv('TWILIO_AUTH_TOKEN');

$appSid = getenv('TWILIO_APP_SID');



$requestFunction = $_REQUEST['requestFunction']?:'';
$numberPhone = $_REQUEST['numberPhone']?:'';


function ValidateNumber(){
   $client = new Services_Twilio($accountSid, $authToken);
	$response = $client->account->outgoing_caller_ids->create($numberPhone);

	echo json_encode(array('numberPhone'=>$numberPhone, 'code'=>'12357'));
}

function getNumberValidated(){	
	$client = new Services_Twilio('AC123', '123');
	$arrayObject = array('numberPhone'=>$numberPhone, 'code'=>'12357');
	foreach ($client->account->outgoing_caller_ids as $caller_id) {
		$arrayObject[] = $caller_id->friendly_name;
		
	echo json_encode($arrayObject);
}




if($requestFunction == 'requestValid'){
	ValidateNumber();
	echo 'valid phonenumber';
} else if($requestFunction = 'requestValidList'){
	getNumberValidated();
	echo 'not valid';
}
?>
