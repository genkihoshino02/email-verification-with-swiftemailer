<?php 
    require_once './vendor/autoload.php';
    require_once './config/constants.php';
    
 
    // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
      ->setUsername(EMAIL)
      ->setPassword(PASSWORD);
    
    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);
    function sendVerificationEmail($userEmail,$token){ 


            global $mailer;
            $body='<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Verified email</title>
            </head>
            <body>
                <div class="wrapper">
                    <p>
                        thak you for signing up on our website. please click on the link below to verified your email
                    </p>
                    <a href="http://localhost/techbase/login-signup-3.php/index.php?token='. $token .'">  
                    Verify your email address</a>
                  
                </div>
            </body>
            </html>';
                    // Create a message
            $message = (new Swift_Message('Verify your email address'))
            ->setFrom(EMAIL)
            ->setTo($userEmail)
            ->setBody($body,'text/html')
            ;
        
        // Send the message
        $result = $mailer->send($message);
        var_damp($result);
    }


?>

