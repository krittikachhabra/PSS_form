<?php
	require_once("config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'credential.php';
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

	$name= $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$age = $_POST["age"];
	$degree = $_POST["degree"];
	$q1= $_POST["q1"];
	$q2= $_POST["q2"];
	$q3= $_POST["q3"];
	$q4= $_POST["q4"];
	$q5= $_POST["q5"];
	$q6= $_POST["q6"];
	$q7= $_POST["q7"];
	$q8= $_POST["q8"];
	$q9= $_POST["q9"];
	$q10= $_POST["q10"];
	$city = $_POST["city"];
	$sum = $_POST["sum"];
	if ($sum>=0 && $sum<=13) {
     $stressLevel = "Low";
} elseif ($sum>=14 && $sum<=26) {
    $stressLevel = "Moderate";
} else {
    $stressLevel = "High";
}

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = EMAIL;
$mail->Password = PASS;
$mail->setFrom(EMAIL, 'PSS');
$mail->addAddress($email);
$mail->Subject = 'Stress Level';
$mail->msgHTML("Your stress Level is ".$sum.". You fall in category ".$stressLevel." stress level."); 
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Read an HTML message body from an external file, convert referenced images to embedded,
// $mail->AltBody = 'HTML messaging not supported';
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else
    echo "Message";

	$created_date = date("Y-m-d H:i:s");
	$mail_check =  mysqli_query($con,"Select count(*) from UserResponses where email = '$email'");
	$count_mail=mysqli_fetch_array($mail_check);
	
	if($count_mail[0] ==1)
	{
		echo "This email exists.";
		exit();
	}
	$result = mysqli_query($con,"Insert into UserResponses values ('$name','$email','$phone','$age','$degree','$city','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$sum','$created_date')");
	
	//echo "Thanks! Your result along with the app link has been emailed to you. Please download the app and allow us to help you. ";
	
	header("Location: thanks.php");
	?>