<?php
require_once("DBAccess.php");
$db = new DBAccess();
$dbConnection = $db->initConnection();
		
$type = $_POST['type'];
$name = $_POST['name'];
$street = $_POST['street'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$gender = $_POST['gender'];
$dobYear = $_POST['dobYear'];
$dobMonth = $_POST['dobMonth'];
$dobDate = $_POST['dobDate'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];
$rePass = $_POST['rePass'];
$hospital = $_POST['hospital'];
$specialization = $_POST['specialization'];

if($type == 'patient'){
	$uid = "P".rand(100,999);	
}
else{
	$uid = "D".rand(100,999);	
}


	$query1 ="INSERT INTO `user`(`u_id`, `type`, `name`, `street`, `city`, `zip_code`, `password`) VALUES ('".$uid."','".$type."','".$name."','".$street."','".$city."','".$zip."','".md5($pass)."')";
	
	$query11 = mysql_query($query1,$dbConnection) or die("MySql Error".mysql_error());
	
	
	$query2 = "UPDATE doctor SET `hospital` = '".$hospital."',`specialization` ='".$specialization."' WHERE doctor_id = '".$uid."'";
	
	if($type == 'doctor'){		
		$query22 = mysql_query($query2,$dbConnection) or die("MySql Error".mysql_error());
	}
	
	echo "User added. Your User Id is ". $uid."<br/><br/><br/>".$query1."<br/><br/>insert_user trigger inserted new row to ".$type." Table<br/><br/> ".$query2."<br/><br/><br/><a href='index.php'>Back</a>";
?>