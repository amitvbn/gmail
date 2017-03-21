<?php

use Phalcon\Db\Column;

class InboxController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
    	$email = $this->request->getHeader('email');
    	$apikey = $this->request->getHeader('apikey');

 		if(!ValidateController::validate($email,$apikey)){
 			$response = array("result"=>"user not login");
 			echo json_encode($response);
 			die;
 		}

		// Bind parameters
		$parameters = [
		    "to" => $email,
		   	"trash" => 0,
		];

		// Casting Types
		$types = [
		    "to" => Column::BIND_PARAM_STR,
		    "trash" => Column::BIND_PARAM_INT,
		];

		// Query Receivers binding parameters with string placeholders
		$receivers = Receivers::find(
		    [
		        "to = :to: AND trash = :trash:",
		        "bind"      => $parameters,
		        "bindTypes" => $types,
		        "limit" => 10,
		        "order" => "id DESC"
		    ]
		);

		foreach ($receivers as $receiver) {

			   	$json1 = json_encode($receiver); 	
   				$json2 = json_encode($receiver->Mails);
   				$receiver = json_decode($json1, TRUE);
   				$receiver['mail_details'] = json_decode($json2, TRUE);
   				$arr[] = $receiver;
   		}
		echo json_encode($arr);
    }
}