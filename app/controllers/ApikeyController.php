<?php

use Phalcon\Db\Column;

class ApikeyController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$email = $this->request->getPost('email');
    	$password = $this->request->getPost('password');

		// Bind parameters
		$parameters = [
			"email" => $email, 
		    "password" => $password
		];

		// Casting Types
		$types = [
		    "email" => Column::BIND_PARAM_STR,
		    "password" => Column::BIND_PARAM_STR,
		];

		// Query user binding parameters with string placeholders
		$users = Users::findfirst(
		    [
		        "email = :email: AND password = :password:",
		        "bind"      => $parameters,
		        "bindTypes" => $types
		    ]
		);

		if($users){
			$str = rand();
			$users->apikey = md5($str);
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