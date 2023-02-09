<?php

if (!isset($_POST) or !isset($_POST["location"]) or !isset($_POST["date"]) or !isset($_POST["time"]) or !isset($_POST["phone"]) or !isset($_POST["package"]) ) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;
}

$location = $_POST["location"];
$date = $_POST["date"];
$time = $_POST["time"];
$phone = $_POST["phone"];
$package = $_POST["package"];
$to = "info@kidsdream.com.au";
$message = "
<h4><strong>Location:</strong> $location</h4>
<h4><strong>Date:</strong> $date</h4>
<h4><strong>Time:</strong> $time</h4>
<h4><strong>Phone:</strong> $phone</h4>
<h4><strong>Package:</strong> $package</h4>
";
$message = wordwrap($message, 70, "\r\n");

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";

if (mail($to, $subject, $message, $headers))
    header('Location: ' . $_SERVER['HTTP_REFERER']);
else
    header('Location: /');
