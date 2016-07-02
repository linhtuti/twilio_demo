<?php
require('Services/Twilio/Capability.php');
header('Content-Type: text/xml');
$accountSid = getenv('TWILIO_ACCOUNT_SID');
$authToken = getenv('TWILIO_AUTH_TOKEN');

$appSid = getenv('TWILIO_APP_SID');



$requestFunction = $_REQUEST['requestFunction']?:'';
$numberPhone = $_REQUEST['numberPhone']?:'';
$client = new Services_Twilio($accountSid, $authToken);
 		$response = $client->account->outgoing_caller_ids->create($numberPhone);
//  		echo json_encode(array('numberPhone'=>$numberPhone, 'code'=>$response));
 		
		// $client = new Services_Twilio('AC123', '123');
// 		foreach ($client->account->outgoing_caller_ids as $caller_id) {
// 		  print $caller_id->friendly_name;
// 		}
	echo json_encode(array('numberPhone'=>$numberPhone, 'code'=>'12357'));
// class RequestValidatorTest{
// 	  public function __construct() {
// 	   $this->ValidateNumbar();
//        		if($requestFunction == 'requestValid'){
// // 				$this->ValidateNumbar();
// 				echo 'valid phonenumber';
//        		} else {
//        			echo 'not valid';
//        		}
//     	}
//     
//     public function ValidateNumbar(){
// 	   $client = new Services_Twilio($accountSid, $authToken);
//  		$response = $client->account->outgoing_caller_ids->create($numberPhone);
// //  		echo json_encode(array('numberPhone'=>$numberPhone, 'code'=>$response));
//  		
// 		// $client = new Services_Twilio('AC123', '123');
// // 		foreach ($client->account->outgoing_caller_ids as $caller_id) {
// // 		  print $caller_id->friendly_name;
// // 		}
// 	echo json_encode(array('numberPhone'=>$numberPhone, 'code'=>'12357'));
//     }
// }

?>
