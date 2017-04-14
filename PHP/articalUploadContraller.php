<?php
	require_once("DBAccess.php");
	$did = $_POST["did"];
	$tital = $_POST["Topic"];
	$desc  = $_POST["desc"];
	$issueId  = $_POST["issue"];

	$target_dir = "";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;

	$temp = explode(".", $_FILES["fileToUpload"]["name"]);
	$artId = 'Art'.rand(10000,99999);
	$newfilename = $artId . '.' . end($temp);
	
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {
		$db = new DBAccess();
		$dbConnection = $db->initConnection();
		
		
		$query = "INSERT INTO `article`(`art_id`, `doctor_id`, `title`, `description`, `article_link`, `upload_date`, `likes`) VALUES ('".$artId."','".$did."','".$tital."','".$desc."','upload','".date("Y-m-d")."',0)";
		
		$query1 = mysql_query($query,$dbConnection) or die("MySql Error".mysql_error());
		
        echo "The file ". $newfilename. " has been uploaded.<br><br/>".$query ."<br/><br><a href='articleUpload.php'>Back</a>";
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }



?>