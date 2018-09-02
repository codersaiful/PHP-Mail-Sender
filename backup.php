<?php 
class MailSender{
	private $to;
	private $from;
	private $noreply;
	public $subject;
	private $headers;
	private $message;
	private $default_mailSender = 'Saiful Islam <info@codersaiful.com>';
	private $default_noreply = 'Saiful Islam <noreply@codersaiful.com>';
	private $to_email_error = 'To email Not Set. Class->setTo()';
	private $subject_error = 'Subject Not Set. Class->setSubject()';
	private $from_email_error = 'From email Not. Set Class->setFrom()';
	private $message_error = 'Email Message Body Not Set. Class->setMessage()';
	


        public function __construct(){
            //Settting Header
            $this->setHeader();
            
		
	}
	
	public function setTo($mail_address = false){
		$this->to = $mail_address;
	}
        public function getTo() {
            return $this->to;
        }
	public function setFrom($mail_address = false,$sender_name=false){
		if($sender_name){
			$sender = $sender_name . ' <' . $mail_address . '>';
		}else{
			$sender = $mail_address;
		}
		$this->from = $sender;
	}
	public function getFrom() {
            return $this->from;
        }
        public function setReplyTo($noreply_email=false) {
            $this->noreply = $noreply_email;
        }
        public function getReplyTo() {
            return $this->noreply;
        }
        
	public function setSubject($subject = false){
		$this->subject = $subject;
	}
        public function getSubject() {
                return $this->subject;
        }
	public function setMessage($message = false){
		$this->message = $message;
	}
        public function getMessage() {
            return $this->message;
        }
	
        public function ConfigHeader($from=false, $reply_to=false) {       
            if(!$from){
                $from = $this->default_mailSender;
            }
            //$reply_to = $this->getReplyTo();
            if(!$reply_to){
                $reply_to = $from;
            }
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            $headers  .= "From: $from\r\n";
            $headers  .= "Reply-To: $reply_to\r\n";
            
            
            return $headers;
        }
        public function setHeader() {
            $this->headers = $this->ConfigHeader($this->getFrom(),  $this->getReplyTo());
        }
	public function getHeader() {
            return $this->headers;
        }
        
        
        public function SendEmail() {
            $errors = false;
            $to = (!empty($this->to) ? $this->to : $errors[] = $this->to_email_error);
            $subject = (!empty($this->subject) ? $this->subject : $errors[] = $this->subject_error);
            $message = (!empty($this->message) ? $this->message : $errors[] = $this->message_error);
            $header = $this->headers;
            if($errors){
                echo '<b>Error Found</b><br><pre>';
                foreach($errors as $error){
                    echo $error . '<br>';
                }
                echo '</pre>';
            }else{
                echo '<h2>Mail Function Run now properly</h2>';
                //mail($to, $subject, $message, $header);
            }
            
            var_dump($header);
        }
        
}
