<?php
	require_once("DBAccess.php");
	$pid = $_POST["pid"];
	$topic = $_POST["Topic"];
	$question  =  $_POST["Question"];
	$issue  = $_POST["issue"];

try{
	$db = new DBAccess();
	$dbConnection = $db->initConnection();
	$qid = 'Q'.rand(1000000,9999999);
	
	$query = "INSERT INTO `question`(`q_id`, `patient_id`, `title`, `question`, `question_time`, `state`, `likes`) VALUES ('".$qid."','".$pid."','".$topic."','".$question."','".date("Y-m-d")."','public',0)";
	
	$query1 = mysql_query($query,$dbConnection) or die("MySql Error".mysql_error());
	echo '<script type="text/javascript">alert("'.$query.'");</script>';
	Header("Location:newQ.php?err=1&query=".$query);
}
catch(Exception $e){
		Header("Location:newQ.php?err=2");
	}

?>