<?php

use Phalcon\Db\Column;

class SentdeleteController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$email = $this->request->getHeader('email');
    	$id = $this->request->getHeader('id');
    	$apikey = $this->request->getHeader('apikey');

 		if(!ValidateController::validate($email,$apikey)){
 			$response = array("result"=>"user not login");
 			echo json_encode($response);
 			die;
 		}

		// Bind parameters
		$parameters = [
			"id" => $id, 
		    "sender" => $email,
		    "sent_trash" => 0
		];

		// Casting Types
		$types = [
		    "id" => Column::BIND_PARAM_INT,
		    "to" => Column::BIND_PARAM_STR,
		    "sent_trash" => Column::BIND_PARAM_INT,
		];

		// Query Receivers binding parameters with string placeholders
		$mails = Mails::findfirst(
		    [
		        "sender = :sender: AND sent_trash = :sent_trash: AND id = :id:",
		        "bind"      => $parameters,
		        "bindTypes" => $types
		    ]
		);

		if($mails){
			$mails->sent_trash = 1;
	        if($mails->save())
				echo 'deleted';
		}
		else
			echo "no record found";
    }
}