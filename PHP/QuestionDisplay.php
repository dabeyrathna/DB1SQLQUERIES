<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script>
function addAnswer()
{

	window.location.href = "QuestionDisplay.php?qid=<?php echo $_GET['qid'] ?>&answer="+document.getElementById("commentBox").value;
}
</script>
</head>

<body>
<p align="center"><h2>Answers for the Question : <?php echo $_GET['qid'] ?></h2></p>
<p><a href="FAQList.php">Back</a>&nbsp;&nbsp;<a href="index.php">Home</a></p>
<br/>
<?php

	require_once("DBAccess.php");
	
	$db = new DBAccess();
	$dbConnection = $db->initConnection();
	

    if(isset($_GET['like']) && isset($_GET['ansid']))
    {
		$query = "UPDATE `answer` SET `likes`= (`likes` + 1) WHERE `q_id`= '".$_GET['qid']."' AND `ans_id`= '".$_GET['ansid']."'";
		echo "Query executer : UPDATE `answer` SET `likes`= (`likes` + 1) WHERE `q_id`= '".$_GET['qid']."' AND `ans_id`= '".$_GET['ansid']."'";
		$queryLike = mysql_query($query,$dbConnection);
        echo '<script type="text/javascript">alert("Like count updated...");</script>';
    }
	else if(isset($_GET['delete']) && isset($_GET['ansid']))
	{	
		$query = "DELETE FROM `answer` WHERE `q_id`= '".$_GET['qid']."' AND `ans_id`= '".$_GET['ansid']."'";
		echo "Query executer : DELETE FROM `answer` WHERE `q_id`= '".$_GET['qid']."' AND `ans_id`= '".$_GET['ansid']."'";
		$queryDel = mysql_query($query,$dbConnection);
        echo '<script type="text/javascript">alert("Answer Deleted...");</script>';
	}	
	else if(isset($_GET['delete'])){
		
		$query = "DELETE FROM `question` WHERE `q_id`= '".$_GET['qid']."'";
		$queryDel = mysql_query($query,$dbConnection);
        echo '<script type="text/javascript">alert("Question Deleted...");</script>';
		echo '<script type="text/javascript">window.location.href = "FAQList.php";</script>';
		
	}
	else if(isset($_GET['answer'])){
		echo '<script type="text/javascript">alert("'.$_GET['answer'].'");</script>';
		$ansId = 'A'.rand(1000000,9999999);
		$query = "INSERT INTO `answer`(`q_id`, `ans_id`, `answer`, `answer_time`, `likes`) VALUES ('".$_GET['qid']."','".$ansId."','".$_GET['answer']."','".date("Y-m-d H:i:s")."',0)";
				
		$query = mysql_query($query,$dbConnection) or die("MySql Error".mysql_error());
		echo '<script type="text/javascript">window.location.href = "QuestionDisplay.php?qid='.$_GET['qid'].'";</script>';
	}

if(isset($_GET['qid']))
{
		initialDiscussion();
}

function initialDiscussion()
{
		$qid = $_GET['qid'];
		
		$db = new DBAccess();
		$dbConnection = $db->initConnection();
	
	
		$queryQuesDetails= "SELECT `q_id`,`patient_id`,`title`,`question`,`question_time`,`state`,`likes` FROM `question` WHERE `q_id`= '".$qid."'";
	
		$queryQ = mysql_query($queryQuesDetails,$dbConnection);
		$noOfRaws = mysql_num_rows($queryQ);
		$str = '';
		if($noOfRaws < 1){
			echo "Error";
			return;
		}
		else{			
				$rowQ = mysql_fetch_assoc($queryQ);
				$str .= '<table width="100%" border="0"><tr>
    						<td height="24" colspan="4" bgcolor="#3AC6E2">'.$rowQ['question_time'].'</td>
						</tr>
					  	<tr>
							<td height="176" colspan="2" valign="top" bgcolor="#E6FAFA">
								<div align="center" >
						  			<p>Question asked by : '.$rowQ['patient_id'].'</p>
						  			<p>&nbsp;</p>
									<p>Question number : '.$qid.'</p>
								</div>
							</td>
							<td width="74%" colspan="2" rowspan="2"><p><h2>'.$rowQ['title'].'</h2><br><br>'.$rowQ['question'].'</p>
							</td>
					  </tr>
					  <tr>
					<td height="33" colspan="4" bgcolor="#F5F0EF">
						<p align="center">Question time : '.$rowQ['question_time'].' &nbsp;&nbsp;&nbsp;<a href="QuestionDisplay.php?qid='.$qid.'&delete=1">Delete this question</a></p></td>
				  </tr>
				 </table><br>';
	
	
	
	
				$queryAnsDetails = "SELECT `q_id`,`ans_id`,`answer`,`answer_time`,`likes` FROM `answer` WHERE `q_id`='".$qid."'";
				$queryA = mysql_query($queryAnsDetails,$dbConnection);
				
				$str .= '<table align="right" width="75%">';
				$count =1;
				while($rowA=mysql_fetch_array($queryA)){	
				
				$str .= '<tr bgcolor="#00CC66">
    						<td height="24" colspan="4"><p><b>Respond #'.$count++.'</td>
						</tr>
					  	<tr>
							<td height="176" colspan="2" valign="top" bgcolor="#E3F9DE"> 
								<div id="user details" align="center">
						  			<p>Answer ID <br><br>'.$rowA['ans_id'].'</p>
									<p># Likes : <br><br>'.$rowA['likes'].'</p>
								</div>
							</td>
							<td width="90%" colspan="2" rowspan="2" valign="top"><br><br>'.$rowA['answer'].'</td>
					  </tr>
					  <tr>
						<td height="33" colspan="4" bgcolor="#F5F0EF" align="center">Time answerd :'.$rowA['answer_time'].'
						
						&nbsp;&nbsp;&nbsp; 
						<a href="QuestionDisplay.php?qid='.$qid.'&ansid='.$rowA['ans_id'].'&delete=1">Delete this answer</a>&nbsp;
						<a href="QuestionDisplay.php?qid='.$qid.'&ansid='.$rowA['ans_id'].'&like=1">Like</a>
						</form>
						</td>
				  	</tr>' ;
				
				}
		
				$str .= '<tr>
							<td height="180" colspan="4" >
								<textarea name="commentBox" id ="commentBox" cols="120" rows="10" value="">
								</textarea>	
							</td>
						</tr>
						<tr>
							<td height="100" colspan="4" >
									<p align="center"><button onClick="addAnswer()" name="answer" id="answer">Answer</button></p>
							</td>
						</tr>
						</table>
			
						<br><br>';
				
				echo $str;
			
		}	
}
?>


</body>
</html>