<?php

use Phalcon\Db\Column;

class DraftController extends \Phalcon\Mvc\Controller
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
		    "sender" => $email,
		    "sent_trash" => 0,
		    "draft" => 1,
		];

		// Casting Types
		$types = [
		    "sender" => Column::BIND_PARAM_STR,
		    "sent_trash" => Column::BIND_PARAM_INT,
		    "draft" => Column::BIND_PARAM_INT,		    
		];

		// Query Receivers binding parameters with string placeholders
		$mails = Mails::find(
		    [
		        "sender = :sender: AND sent_trash = :sent_trash: AND draft = :draft:",
		        "bind"      => $parameters,
		        "bindTypes" => $types,
		        "limit" => 10,
		        "order" => "id DESC"
		    ]
		);

		foreach ($mails as $mail) {
			   	$json1 = json_encode($mail); 	
   				$json2 = json_encode($mail->Receivers);
   				$n = sizeof($mail->Receivers);
   				$email = "";
   				for($i=0; $i<$n; $i++){
   					$email = $email . $mail->Receivers[$i]->to . ",";
   				}
   				$mail = json_decode($json1, TRUE);
   				$mail['receivers_details'] = json_decode($json2, TRUE);
   				$mail['email'] = $email;
   				$arr[] = $mail;
   		}
		echo json_encode($arr);
    }
}