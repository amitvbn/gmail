<?php

use Phalcon\Db\Column;

class DeleteController extends \Phalcon\Mvc\Controller
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
		    "to" => $email,
		    "trash" => 0
		];

		// Casting Types
		$types = [
		    "id" => Column::BIND_PARAM_INT,
		    "to" => Column::BIND_PARAM_STR,
		    "trash" => Column::BIND_PARAM_INT,
		];

		// Query Receivers binding parameters with string placeholders
		$receivers = Receivers::findfirst(
		    [
		        "to = :to: AND trash = :trash: AND id = :id:",
		        "bind"      => $parameters,
		        "bindTypes" => $types
		    ]
		);

		if($receivers){
			$receivers->trash = 1;
	        if($receivers->save())
				echo 'deleted';
		}
		else
			echo "no record found";
    }
}