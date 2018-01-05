<?php
// Pear Mail Library
require_once "Mail.php";
class userCakeMail {

		// A text based system with hooks to replace various strs in txt email templates is used
	public $contents = NULL;
	
	// Function used for replacing hooks in our templates
	public function newTemplateMsg($template, $additionalHooks) {
		global $mail_templates_dir;
		
		$this->contents = file_get_contents ( $mail_templates_dir . $template );
		
		// Check to see we can access the file / it has some contents
		if (! $this->contents || empty ( $this->contents )) {
			return false;
		} else {
			// Replace default hooks
			$this->contents = replaceDefaultHook ( $this->contents );
			
			// Replace defined / custom hooks
			$this->contents = str_replace ( $additionalHooks ["searchStrs"], $additionalHooks ["subjectStrs"], $this->contents );
			
			return true;
		}
	}
	public function sendMail($email, $subject, $msg = NULL) {

		$headers = array (
				'From' => "dropZone Production < no-reply@dzproduction.com >",
				'To' => $email,
				'Subject' => '=?UTF-8?B?' . base64_encode ( $subject ) . '?=',
				'MIME-Version' => "1.0",
				'Content-type' => 'text/plain; charset="UTF-8"',
				'Content-Transfer-Encoding' => '8bit' 
		);
		//
		// 'Content-type' => "text/html; charset=iso-8859-1\r\n\r\n"
		
 		$smtp = Mail::factory ('smtp', array (
 				'host' => 'ssl://smtp.gmail.com',
 				'port' => '465',
 				'auth' => true,
 				'username' => 'jasmin.thevathas@gmail.com',
 				'password' => '21jas09min93'
 		) );

		// $header = "MIME-Version: 1.0\r\n";
		// $header .= "Content-type: text/plain; charset=iso-8859-1\r\n";
		// $header .= "From: EVALink Download Center <" . $emailAddress . ">\r\n";
		
		// Check to see if we sending a template email.
		if ($msg == NULL)
			$msg = $this->contents;
		
		$message = $msg;
		
		$message = wordwrap ( $message, 70 );
		
		$mail = $smtp->send ( $email, $headers, $message );
		// mail($to,$subject,$msg,$header);
		
		/*
		 * if (PEAR::isError($mail)) {
		 * echo('<p>' . $mail->getMessage() . '</p>');
		 * } else {
		 * echo('<p>Message successfully sent!</p>');
		 * }
		 */
		
		return true;
	}
}

?>
