<?php

use Phalcon\Db\Column;

class UnsettokenController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$email = $this->request->getHeader('email');

		// Bind parameters
		$parameters = [
			"email" => $email, 
		];

		// Casting Types
		$types = [
		    "email" => Column::BIND_PARAM_STR,
		];

		// Query user binding parameters with string placeholders
		$users = Users::findfirst(
		    [
		        "email = :email:",
		        "bind"      => $parameters,
		        "bindTypes" => $types
		    ]
		);

		if($users){
			$users->apikey = "";
			$users->time = date("Y-m-d h:m:s",time());
	        if($users->save()){
	        	$users->password = "";
				echo json_encode(array("result" => "success","user_details" => json_decode(json_encode($users),true)));
	        }

		}
		else
			echo json_encode(array("result" => "failed"));
    }
}