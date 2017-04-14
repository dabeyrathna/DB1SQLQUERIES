<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<?php 
include 'getLists.php';

if(isset($_GET['tag'])){
	$res = taggedArticles($_GET['tag']); 
	echo $res;			   
}
else if(isset($_GET['top'])){
	$res = topThreeArticles();
	echo $res;
}
else if(isset($_GET['likes'])){
	$res = mostLikedQuestions();
	echo $res;
}
else if(isset($_GET['related'])){
	$res = topRelatedQuestions($_GET['related']);
	echo $res;
}
else if(isset($_GET['ansStat'])){
	$res = answerStatistics();
	echo $res;
}


?>


<body>
</body>
</html>