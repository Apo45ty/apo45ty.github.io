<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

try{

$toEmail = 'antonio@apolion.games';
$emailSubject = 'New email from your contant form';
$email='info.apolion.games@gmail.com';
$headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];
$json = file_get_contents('php://input');
$body =  $json;
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com"
$mail->Username = 'info.apolion.games@gmail.com';
$mail->Password = 'Calculo1!';
$mail->AddAddress($toEmail, "Antonio");
$mail->IsHTML(true);
$mail->MsgHTML($body); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}

echo(error_get_last()['message']);
} catch(Exception $e){
    echo $e->getMessage()
}
//header('Location: index.html');
?>
