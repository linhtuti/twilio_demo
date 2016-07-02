<?php
require('Services/Twilio.php');
header('Content-Type: text/xml');
$accountSid = getenv('TWILIO_ACCOUNT_SID');
$authToken = getenv('TWILIO_AUTH_TOKEN');

$appSid = getenv('TWILIO_APP_SID');



$requestFunction = $_REQUEST['requestFunction']?:'';
$numberPhone = $_REQUEST['numberPhone']?:'';
class RequestObj{
	  public function __construct() {
	  
    	}
    
    public function ValidateNumber(){
	   $client = new Services_Twilio($accountSid, $authToken);
 		$response = $client->account->outgoing_caller_ids->create($numberPhone);

		echo json_encode(array('numberPhone'=>$numberPhone, 'code'=>'12357'));
    }
    
    public function getNumberValidated(){	
		$client = new Services_Twilio('AC123', '123');
		$arrayObject = array('numberPhone'=>$numberPhone, 'code'=>'12357');
		foreach ($client->account->outgoing_caller_ids as $caller_id) {
			$arrayObject[] = $caller_id->friendly_name;
			
		echo json_encode($arrayObject);
    }

}

$object = new RequestObj();
	if($requestFunction == 'requestValid'){
		$object->ValidateNumber();
		echo 'valid phonenumber';
	} else if($requestFunction = 'requestValidList'){
		$object->getNumberValidated();
		echo 'not valid';
	}
?>
