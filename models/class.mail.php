<?php
// Pear Mail Library
include_once "vendor/autoload.php";

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
// This is your From email address
        $from = array("no-reply@dzproduction.com" => 'dropZone Production');
        // Email recipients
        $to = array(
            $email => $email
        );

        // Login credentials
        $username = 'azure_9027786a4bbc4c42562513151f648e03@azure.com';
        $password = 'dzSecure21';

        // Setup Swift mailer parameters
        $transport = Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 587);
        $transport->setUsername($username);
        $transport->setPassword($password);
        $swift = Swift_Mailer::newInstance($transport);

        // Create a message (subject)
        $message = new Swift_Message($subject);

        // Check to see if we sending a template email.
        if ($msg == NULL)
            $msg = $this->contents;

        $msg = wordwrap ( $msg, 70 );

        // attach the body of the email
        $message->setFrom($from);
        $message->setTo($to);
        $message->setBody($msg, 'text/plain');

        // send message
        if ($recipients = $swift->send($message, $failures))
        {
            // This will let us know how many users received this message
            return true;
        }
        // something went wrong =(
        else
        {
            print_r($failures);
            return false;
        }

	}
}

?>
