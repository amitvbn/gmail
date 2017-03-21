<?php

use Phalcon\Db\Column;

class ValidateController extends \Phalcon\Mvc\Controller
{
    public static function validate($email, $apikey)
    {
		// Bind parameters
		$parameters = [
		    "email" => $email,
		   	"apikey" => $apikey,
		];

		// Casting Types
		$types = [
		    "email" => Column::BIND_PARAM_STR,
		    "apikey" => Column::BIND_PARAM_STR,
		];

		// Query Receivers binding parameters with string placeholders
		$users = Users::find(
		    [
		        "email = :email: AND apikey = :apikey:",
		        "bind"      => $parameters,
		        "bindTypes" => $types,
		        "limit" => 10,
		        "order" => "id DESC"
		    ]
		);

		if(count($users)>0){
			return TRUE;
		}
		else{
			return FALSE;
		}
    }
}