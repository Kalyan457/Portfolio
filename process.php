<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer();
echo "test";

$mail->IsSMTP();
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "kalyankk.btech@gmail.com";
$mail->Password   = "santosh123";
$mail->IsHTML(true);
$mail->AddAddress("kalyankk.btech@gmail.com", "Kalyan");
$mail->SetFrom("$email_address", "$name");
$mail->AddReplyTo("$email_address", "$name");
$mail->Subject = "Mail From Portfolio--$subject";
$content = "<b>Sender Email -- $email_address; <br> Sender Message -- <br> $message</b>";



$mail->MsgHTML($content);
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
header("location:home.html");

}

?>