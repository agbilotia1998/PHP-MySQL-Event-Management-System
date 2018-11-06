<?php

    session_start();
    $servername = getenv('SERVER_NAME');
    $username = getenv('USER_NAME');
    $password = getenv('USER_PASSWORD');
    $dbname = getenv('DB_NAME');

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirm = $_POST["confirm"];
        $email = $_POST["email"];

        $nRows = $conn->query("select count(*) from users WHERE username='$username'")->fetchColumn();
        //echo $nRows;
        if ($nRows == 0) {
            $nRows = $conn->query("select count(*) from users WHERE email='$email'")->fetchColumn();
            if ($nRows == 0) {
                if ($password == $confirm) {
                    $sql = "INSERT INTO users (name, password, email,username)
                    VALUES ('$name','$password','$email','$username')";
                    // use exec() because no results are returned
                    $conn->exec($sql);
                    $conn = null;
    // include the phpmailer class file
                    require_once "PHPMailer-master/PHPMailerAutoload.php";
    // my message to send to the user
                    $message = '<html>
                                <head>
                                    <title>Email Verification</title>
                               </head>
                               <body>';
                    $message .= '<h1>Hi ' . $name . '!<br>Thanks For Registering.</h1>';
                    $message .= "<p><a href='http://localhost:8080/confirmation.php?username=$username'>CLICK TO ACTIVATE YOUR ACCOUNT</a>";
                    $message .= "</body></html>";

    // php mailer code starts
                    $mail = new PHPMailer(true);
    // telling the class to use SMTP
                    $mail->IsSMTP();
    // enable SMTP authentication
                    $mail->SMTPAuth = true;
    // sets the prefix to the server
                    $mail->SMTPSecure = "ssl";
    // sets GMAIL as the SMTP server
                    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
                    $mail->Port = 465;

    // set your username here
                    $mail->Username = getenv("EMAIL_USER");
                    $mail->Password = getenv("EMAIL_PASSWORD");

    // set your subject
                    $mail->Subject = trim("Email Verifcation");
                    $Subject = trim("Email Verifcation");;

    // sending mail from
                    $mail->SetFrom(getenv('EMAIL_USER'), getenv('EMAIL_USERNAME'));
    // sending to
                    $mail->AddAddress($email);
                    $to = $email;
    // set the message
                    $mail->MsgHTML($message);
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'From: Ayush agbilotia1998@gmail.com' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    try {
                        $mail->send();
                    } catch (Exception $ex) {
                        // echo $msg = $ex->getMessage();
                    }
                    mail($to, $Subject, $message, $headers);
                    echo 'Thankyou ', $name, ' For Registering. Click on the confirmation mail sent to your registered email';
                } else {
                    echo "Confirm password field didnot match.";
                }
            } else {
                echo "Email already exists";
            }
        } else {
            echo "Username already exists";
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
