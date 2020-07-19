<?php
	
	require '../libraries/PHPMailer-master/PHPMailerAutoload.php';

	if(isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_subject']) && isset($_POST['contact_message']))
	{
		
		$contact_name = $_POST['contact_name'];
        $contact_email  = $_POST['contact_email'];
        $contact_subject = $_POST['contact_subject'];
        $contact_message = $_POST['contact_message'];
        
        
        $mail = new PHPMailer();
        $mail ->IsSmtp();
        $mail ->SMTPDebug = 0;
        $mail ->SMTPAuth = true;
        $mail ->SMTPSecure = 'tls';
        $mail ->Host = "smtp.gmail.com";
        $mail ->Port = 587;
        $mail ->IsHTML(true);
        $mail ->Username = "your email";
        $mail ->Password = "your password";
        $mail ->SetFrom($contact_email,$contact_name);
        $mail->AddReplyTo($contact_email, $contact_name);
        $mail ->Subject = $contact_subject;
        $mail ->Body = $contact_message;
        $mail ->AddAddress("your email");

        if($mail->Send())
        {
            echo "<div class='success-msg'>";
                echo "<i class='fa fa-check'></i>";
                echo " The message has been sent successfully";
            echo "</div>";
        }
        else
        {
            echo "<div class='warning-msg'>";
                echo "<i class='fa fa-warning'></i>";
                echo " A problem occurred while trying to send the Message, Please try again!";
            echo "</div>";
        }

	}

?>