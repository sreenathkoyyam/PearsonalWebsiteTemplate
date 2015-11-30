<?php

//$to = 'Sreenath.Kunhikrishnan@in.tesco.com';
$to=$_REQUEST['email'];

$name=$_REQUEST['name'];
$subject = 'Test-Mail';
$message =$_REQUEST['message'];



$headers = 'From: My Website <sreerajphotos@gmail.com>' . "\r\n" .
        'Reply-To: ' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)) {

    echo'sent';
} else {
    echo'not-sent';
}

?>