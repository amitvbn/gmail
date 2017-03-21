<?php

use Phalcon\Db\Column;
use Phalcon\Mvc\Controller;

class ComposeController extends \Phalcon\Mvc\Controller
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

        if ($this->request->isPost()) {

            $mail = new Mails();
            $mail->sender = $email;
            $mail->subject = $this->request->getPost("subject");
            $mail->body = $this->request->getPost("body");
            $mail->draft = $this->request->getPost("draft");
            $mail->conversation_id = $this->request->getPost("conversation_id");
            if(!$mail->save())
					echo 'mail saving failed';
            if(is_null($mail->conversation_id)){
				$mail->conversation_id = $mail->id;
				if(!$mail->save())
					echo 'mail saving failed';
            }

			$to = $this->request->getPost("to");
			$to = str_replace(" ","",$to);
			$to = str_replace(";",",",$to);
			$to = explode(",",$to);
			$to = array_flip($to);

			foreach ($to as $key => $value) {
	 			$receiver = new Receivers();
	            $receiver->mail_id = $mail->id;
	            $receiver->to = $key;
	            if(!$receiver->save())
					echo 'receiver saving failed';
	        }
	        echo "success";
        }
    }
}