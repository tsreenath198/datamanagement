<?php
$headers = 'From: gangonekiran@gmail.com' . "\r\n" .
'Reply-To: kiran.uskcorp@gmail.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

$toEmail = "kiran.uskcorp@gmail.com";
$subject = "Subject Line Here";
$body = "Body of email goes here";

if(mail($toEmail , $subject, $body, $headers))
echo "email sent";
else
echo "email *not* sent";
?>