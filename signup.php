<?php

$messageForSociety =
    "Name: ".$_POST['firstName']." ".$_POST['lastName']."\r\n".
    "A Number: ".$_POST['anumber']."\r\n".
    "Email: ".$_POST['emailAddress'];

//Create the message to be sent to the client
$messageForClient = 
    "Hello ".$_POST['firstName'].",\r\n\r\n".
    "You have signed up for the SMU Computer Science and Mathematics Society!\r\n\r\n".
    "Please join our facebook group: https://www.facebook.com/groups/519695784759020/ \r\n\r\n".
    "Thank you for joining and please come to our first meeting on January 30th.\r\n".
    "We will post more information about the meeting on the facebook group.\r\n\r\n".
    "The SMU Computer Science and Mathematics Society";

//Create the header to be sent to the client
$headerForClient = "From: smu.csm@gmail.com\r\n";

//email the client
mail($_POST['emailAddress'], "SMU Computer Science and Mathematics Society", $messageForClient, $headerForClient);

//Save the message in a file called feedback.txt
$file = fopen("../data/signup.txt", "a")
    or die("Error: Could not open the log file.");
fwrite($file, "\n***----------------------------------***\n")
    or die("Error: Could not write to the log file.");
fwrite($file, "Date received: ".date("jS \of F, Y \a\\t H:i:s\n"))
    or die("Error: Could not write to the log file.");
fwrite($file, $messageForSociety)
    or die("Error: Could not write to the log file.");

header("Location: http://cs.smu.ca/~j_kuntz/SMUCSM");
?>