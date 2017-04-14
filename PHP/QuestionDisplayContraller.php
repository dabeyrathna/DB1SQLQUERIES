
<?php

	require_once("DBAccess.php");
	
	$db = new DBAccess();
	$dbConnection = $db->initConnection();

if(isset($_GET['qid']))
{
		initialDiscussion();
}

function initialDiscussion()
{
		$qid = $_GET['qid'];
		
		$db = new DBAccess();
		$dbConnection = $db->initConnection();
	
	
		$queryQuesDetails= "SELECT `q_id`,`patient_id`,`title`,`question`,`question_time`,`state`,`likes` FROM `question` WHERE `q_id`= '".qid."'";
	
		$queryQ = mysql_query($queryQuesDetails,$dbConnection);
		$noOfRaws = mysql_num_rows($queryQ);
		$str = '';
		if($noOfRaws < 1){
			echo "Error";
			return;
		}
		else{
				
				$queryQU = mysql_query($queryQuesUserDetails,$dbConnection);
				$recQU = mysql_fetch_assoc($queryQU);
				
	
				$str .= '<table width="100%" border="0"><tr>
    						<td height="24" colspan="4" bgcolor="#3AC6E2">'.$rowQ['question_time'].'</td>
						</tr>
					  	<tr>
							<td height="176" colspan="2" valign="top" bgcolor="#E6FAFA">
								<div align="center" >
						  			<p>'.$rowQ['patient_id'].'</p>
						  			<p>&nbsp;</p>
								</div>
							</td>
							<td width="74%" colspan="2" rowspan="2"><p><h2>'.$rowQ['title'].'</h2><br><br>'.$rowQ['question'].'</p>
							</td>
					  </tr>
					  <tr>
					<td height="33" colspan="4" bgcolor="#F5F0EF"></td>
				  </tr>
				 </table><br>';
	
	
	
	
				$queryAnsDetails = "SELECT `q_id`,`ans_id`,`answer`,`answer_time`,`likes` FROM `answer` WHERE `q_id`='".$qid."'";
				$queryA = mysql_query($queryAnsDetails,$dbConnection);
				
				$str .= '<table align="right" width="55%">';
				$count =1;
				while($rowA=mysql_fetch_array($queryA)){	
				
				$str .= '<tr bgcolor="#00CC66">
    						<td height="24" colspan="4"><p><b>Respond #'.$count++.'</td>
						</tr>
					  	<tr>
							<td height="176" colspan="2" valign="top" bgcolor="#E3F9DE"> 
								<div id="user details" align="center">
						  			<p>'.$rowA['q_id'].'</p>
								</div>
							</td>
							<td width="74%" colspan="2" rowspan="2" valign="top"><br><br>'.$rowA['answer'].'</td>
					  </tr>
					  <tr>
						<td height="33" colspan="4" bgcolor="#F5F0EF" align="center">'.$rowA['answer_time'].'</td>
				  	</tr>' ;
				
				}
		
				$str .= '<tr>
							<td height="180" colspan="4" >
								<textarea name="commentBox" id ="commentBox" cols="120" rows="10">
								</textarea>
								<br>
											
							</td>
						</tr>
						</table>
						<br>
							<div id="areabox" align="center" style="padding-top: 50px;">
								<br><br>
							</div>
							<p align="center"><a class="button-link" style="cursor:pointer;padding: 12px 18px;" onClick="ajaxPending(1);">Comment</a></p>							
						<br><br>';
				
				echo $str;
			
		}	
}
?>