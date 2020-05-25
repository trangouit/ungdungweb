<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	include  "PHPMailer/src/PHPMailer.php";
	include  "PHPMailer/src/Exception.php";
	include  "PHPMailer/src/OAuth.php";
	include "PHPMailer/src/POP3.php";
	include  "PHPMailer/src/SMTP.php";
	if(isset("txtSender","txtReceiver","txtSubject","txtContent"))
	{
		$send = $_POST["txtSender"];
		$pass = $_POST["txtPassword"];
		$receiv =$_POST["txtReceiver"];
		$subj = $_POST["txtSubject"];
		$msg = $_POST["txtContent"];
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		try {
			//Server settings
			$mail->SMTPDebug = 2;                                 // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = $send;// 'user@example.com';                 // SMTP username
			$mail->Password = $pass;//'secret';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom($send, 'Mailer');
			$mail->addAddress($receiv, 'Reveiver');     // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			//$mail->addReplyTo('info@example.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//Attachments
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subj;// 'Here is the subject';
			$mail->Body    = $msg;// 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}
	?>
	<form action="" method="post">
		<table border="1">
			<caption><h3>CHƯƠNG TRÌNH GỞI EMAIL</h3></caption>
			<tr>
				<td>Sender:</td>
				<td>
					<input type="email" name="txtSender" value="<?php if(isset($send) echo($send);?>">
				</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td>
					<input type="password" name="txtPassword" value="<?php if(isset($pass) echo($pass);?>">
				</td>
			</tr>
			<tr>
				<td>Receiver:</td>
				<td>
					<input type="email" name="txtReceiver" value="<?php if(isset($receiv) echo($receiv);?>">
				</td>
			</tr>
			<tr>
				<td>Subject:</td>
				<td>
					<input type="text" name="txtSubject" value="<?php if(isset($subj) echo($subj);?>">
				</td>
			</tr>
			<tr>
				<td>Content:</td>
				<td>
					<textarea name="txtContent" value="<?php if(isset($msg) echo($msg);?>">
				</td> 
			</tr>
			<tr>
				<td></td>
				<td>
					<button type="submit">Send Mail</button>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>