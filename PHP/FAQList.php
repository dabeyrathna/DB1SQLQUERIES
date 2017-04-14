<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<p align="center"><h2>Question List</h2></p>
<p><a href="index.php">Back</a>&nbsp;&nbsp;<a href="index.php">Home</a></p>
<br/>
<?php

	require_once("DBAccess.php");
	
	$db = new DBAccess();
	$dbConnection = $db->initConnection();


		$db = new DBAccess();
		$dbConnection = $db->initConnection();
	
	
		$queryQuesDetails= "SELECT * FROM `question` ORDER BY question_time DESC";
	
		$queryQ = mysql_query($queryQuesDetails,$dbConnection);
		$noOfRaws = mysql_num_rows($queryQ);
		$str = '';
		if($noOfRaws < 1){
			echo "No questions...";
			return;
		}
		else{
				
				while($rowQ=mysql_fetch_array($queryQ)){
	
				$str .= '<table width="100%" border="0"><tr>
    						<td height="24" colspan="4" bgcolor="#3AC6E2">Question time : '.$rowQ['question_time'].'</td>
						</tr>
					  	<tr>
							<td height="10" colspan="2" valign="top" bgcolor="#E6FAFA">
								<div align="center" >
						  			<p> Question asked by : '.$rowQ['patient_id'].'</p>
						  			<p>&nbsp;</p>
								</div>
							</td>
							<td width="74%" colspan="2" rowspan="2"><p><h4>'.$rowQ['title'].' <a href="QuestionDisplay.php?qid='.$rowQ['q_id'].'">(View Question)</a></h4></p>
							</td>
					  </tr>
					  <tr>
					<td height="33" colspan="4" bgcolor="#F5F0EF"></td>
				  </tr>
				 </table><br>';
				}
	
				echo $str;
			
		}	

?>



</body>
</html>