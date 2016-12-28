<?php 
if(isset($_POST['submit'])){
    $to = "timon.forrer@gmail.com";
    $from = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = $first_name . " " . $last_name . " möchte Voltage Arc Buchen!";
    $subject2 = "Kopie deiner Buchungsanfrage";
    $message = $first_name . " " . $last_name . " schrieb folgendes:" . "\n\n" . $_POST['message'];
    $message2 = "Hallo " . $first_name . ". Hier ist eine Kopie deiner Anfrage bei Voltage Arc " . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail versendet. Danke " . $first_name . ", wir werden Sie zeitnah kontaktieren.";
    }
?>