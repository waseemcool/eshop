<?php

require "connection.php";

require  "Exception.php";
require  "PHPMailer.php";
require  "SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["e"])) {

    $email = $_POST["e"];

    if (empty($email)) {
        echo "Please enter your Email address.";
    } else {

        $adminrs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "'");
        $an = $adminrs->num_rows;

        if ($an == 1) {

            $code =  uniqid();

            Database::iud("UPDATE `admin` SET `verification_code` = '" . $code . "' WHERE `email` = '" . $email . "'");

            //email code
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'abdullahzufar414@gmail.com';
            $mail->Password = 'Abdullah2004';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('abdullahzufar414@gmail.com', 'eShop');
            $mail->addReplyTo('abdullahzufar414@gmail.com', 'eShop');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'eShop Admin Verification Code';
            $bodyContent = '<h1 style="color: green;">Your Verification Code : ' . $code . '</h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo "Verification Code sending fail";
            } else {
                echo 'Verification Code sending success';
            }
            //email code

        } else {
            echo "You are not a valid User";
        }
    }
} else {
    echo "Please enter your Email";
}

?>