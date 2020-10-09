<?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   require_once('../process/session.php');
   include("../dbconnection.php");
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   // Load Composer's autoloader
   require '../../vendor/autoload.php';

   if(isset($_POST['addEnquiry']))
   	{
        $name=$_POST['name'];
        $email=$_POST['email'];
        $date_from=$_POST['date_from'];
        $date_to=$_POST['date_to'];
        $no_of_people=$_POST['no_of_people'];
        $sql ="insert into enquiry (name,email,date_from,date_to,no_of_people,status)VALUES('$name','$email','$date_from','$date_to','$no_of_people','pending')";
		 
		  if (mysqli_query($conn, $sql)) {
				$_SESSION['responseError'] = false;
				$_SESSION['responseMessage'] = 'Enquiry Submitted ';


		

					

					// Instantiation and passing `true` enables exceptions
					$mail = new PHPMailer(true);

					try {
						//Server settings
						$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
						$mail->isSMTP();                                            // Send using SMTP
						$mail->Host       = 'smtp.hostinger.in';                    // Set the SMTP server to send through
						$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
						$mail->Username   = 'info@proponent.tech';                     // SMTP username
						$mail->Password   = 'Test@123';                               // SMTP password
						$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
						$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

						//Recipients
						$mail->setFrom('info@proponent.tech', 'Mailer');
						// $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
						$mail->addAddress('ankushverma784@gmail.com');               // Name is optional
						// $mail->addReplyTo('info@example.com', 'Information');
						// $mail->addCC('cc@example.com');
						// $mail->addBCC('bcc@example.com');

						// Attachments
						// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
						// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

						// Content
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = 'Here is the subject';
						$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
						// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						$mail->send();
						echo 'Message has been sent';
					} catch (Exception $e) {
						echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
					}
						





   				// header('Location:/theme/hoteldetails.php');
   				exit;	
   			} else {
				$_SESSION['responseError'] = true;
				$_SESSION['responseMessage'] = 'Error On Submitting Enquiry';
				// header('Location:/theme/index.php');
				exit;
   			}
     }
    
     
    if($_POST['action']==1)
   	{
   		$id=$_POST['id'];
		
		// $sql ="UPDATE enquiry SET status = '$status' WHERE id = $id";
		$sql ="UPDATE enquiry SET status/listing.php?page=1 = 'confirm' WHERE id = $id";
		// $sql ="UPDATE enquiry SET `status` = `1` WHERE enquiry.id = $id";	
   
   	if (mysqli_query($conn, $sql)) {
		   
		echo json_encode(array('error'=>false,'message'=>'Status updated successfully'));
	   } else {
		echo json_encode(array('error'=>true,'message'=>'Error while updating Status '));
	   }
	}

	if($_POST['action']==2)
	{
		$id=$_POST['id'];
	 
	 // $sql ="UPDATE enquiry SET status = '$status' WHERE id = $id";
	 $sql ="UPDATE enquiry SET status = 'reject' WHERE id = $id";
	 // $sql ="UPDATE enquiry SET `status` = `1` WHERE enquiry.id = $id";	

	if (mysqli_query($conn, $sql)) {
		
	 echo json_encode(array('error'=>false,'message'=>'Status updated successfully'));
	} else {
	 echo json_encode(array('error'=>true,'message'=>'Error while updating Status '));
	}
 }
   


 ?>