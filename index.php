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
//$mail->getHeader();
$mail->SendEmail();
var_dump($mail->getHeader());
var_dump($mail);