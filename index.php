<?php
include 'MailSender.php';

$mail = new MailSender();
$mail->setTo('codersaiful@gmail.com');
$mail->setFrom('support@hostbikroy.com');
$mail->setReplyTo('noreply@codersaiful.com');
$message = <<<EOR
        <h1>Holding Message</h1>
        <p>Message Body</p>
        
EOR;
$mail->setMessage($message);
$mail->setSubject('My PHP Class Test Mail');
$mail->setSuccessMessage("Your mail has been sent");
//$mail->getHeader();
if(!$mail->SendEmail()){
    echo '<h1>FAILED: unable to Success</h1>';
    //We can redirect here, for Unable to send Mail
}
var_dump($mail->getHeader());
var_dump($mail);
