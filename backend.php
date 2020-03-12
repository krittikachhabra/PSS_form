<!DOCTYPE html>
<html>
<body>
<?php
	require_once("config.php");
	$age = $_POST["age"];
	$degree = $_POST["degree"];
	$city = $_POST["city"];
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
	$sum = $q1+$q2+$q3+$q4+$q5+$q6+$q7+$q8+$q9+$q10;
	
	$result = mysqli_query($con,"INSERT INTO responses values('$age', '$degree','$city', '$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$sum')");
  
	echo "Your score is $sum";
	echo "<br>";

	if ($sum>=0 && $sum<=13) {
    echo "You have Low level of Stress";
} elseif ($sum>=14 && $sum<=26) {
    echo "You have Moderate level of Stress";
	echo "<br>";
	echo "Please Download Our App. We might be able to help you reduce your Stress.";
	echo " <a href='http://www.github.com/krittikachhabra'>Click here to Download</a>";
} else {
    echo "You have High level of Stress";
		echo "<br>";
	echo "Please Download Our App. We might be able to help you reduce your Stress.";
	echo " <a href='http://www.github.com/krittikachhabra'>Click here to Download</a>";
}
 
?>
<form action=".\pdetails.php" method="POST">
<p>Name</p> <input type="text" required name="name">
<p>Email</p> <input type="email" required name="email">
<p>Phone</p> <input type="tel" name="phone">
 <input type="hidden"  name="q1" value="<?php echo $q1 ?>">
 <input type="hidden"  name="q2" value="<?php echo $q2 ?>">
 <input type="hidden"  name="q3" value="<?php echo $q3 ?>">
 <input type="hidden"  name="q4" value="<?php echo $q4 ?>">
 <input type="hidden"  name="q5" value="<?php echo $q5 ?>">
 <input type="hidden"  name="q6" value="<?php echo $q6 ?>">
 <input type="hidden"  name="q7" value="<?php echo $q7 ?>">
 <input type="hidden"  name="q8" value="<?php echo $q8 ?>">
 <input type="hidden"  name="q9" value="<?php echo $q9 ?>">
 <input type="hidden"  name="q10" value="<?php echo $q10 ?>">
 <input type="hidden"  name="age" value="<?php echo $age ?>">
 <input type="hidden"  name="sum" value="<?php echo $sum ?>">
 <input type="hidden"  name="degree" value="<?php echo $degree ?>">
 <input type="hidden"  name="city" value="<?php echo $city ?>">
<input type="Submit">

</form>
</body>
</html>