<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


$email =isset($_POST['email']) ? $_POST['email'] : null;

$subject = isset($_POST['subject']) ? $_POST ['subject'] : "Konu boş bırakılmış.";

$content = isset($_POST['content']) ? $_POST ['content'] : null;

if(!$email){
	echo "Lütfen email adresinizi giriniz";
}
elseif (!$content) {
	echo "Lütfen mail içeriğini yazınız.";
}
else{
	$mail = new PHPMailer(true);
	
	try{

	$mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ebber1269@gmail.com';                     //SMTP username  // baglanılan hesap
    $mail->Password   = 'cemadar1.';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->CharSet='UTF-8';
    $mail->setLanguage('tr');
    //Recipients
    $mail->setFrom($email,$email);
    $mail->addAddress('berdan1269@gmail.com');     //Add a recipient 			//gönderilecek email
                //Name is optional
    $mail->addReplyTo($email, 'Otomatik mail');
   


   if (isset($_FILES['attachment']['name'])) {

   		$mail-> addAttachment($_FILES['attachment']['tmp_name'],$_FILES['attachment']['name']);

   	# code...
   }

   $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $content;
    echo "deenem";
    $mail->send();
  
    
    echo "Başarıyla gönderildi.";
//   	header("Location: http://localhost/Projeler/phpmailer/index.php");

	}
	catch(Exception $e){
		echo $e->errorMessage();
		die();
	}





}


 ?>