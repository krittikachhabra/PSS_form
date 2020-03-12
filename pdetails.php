<?php
	require_once("config.php");
	
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
	$created_date = date("Y-m-d H:i:s");
	$mail_check =  mysqli_query($con,"Select count(*) from UserResponses where email = '$email'");
	$count_mail=mysqli_fetch_array($mail_check);
	
	if($count_mail[0] ==1)
	{
		echo "This email exists.";
		exit();
	}
	$result = mysqli_query($con,"Insert into UserResponses values ('$name','$email','$phone','$age','$degree','$city','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$sum','$created_date')");
	echo "Thanks! Your result along with the app link has been emailed to you. Please download the app and allow us to help you. ";
	?>