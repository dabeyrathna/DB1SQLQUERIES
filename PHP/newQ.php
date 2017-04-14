<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form name="form" method="post" id="regForm" action="newQContraller.php">
  <h1>New Question<span></span></h1>
  
  <h4>
  <?php
  	if(isset($_GET['err'])){
		if(isset($_GET['query'])){
			echo "Query executed : ".$_GET['query'];
		}
		
		if($_GET['err'] == '1'){
			echo "<br><br><font color='green'>Added to FAQ list</font>";
			}
			else{
				echo "<font color='red'>Error...</font>";
				}
		}
  ?>
  
  </h4>
        <table width="100%" height="50%"  border="0" cellpadding="5" >
          <tr>
            <td height="5%" >Patient ID</td>
            <td height="5%" colspan="2"><input type="text" name="pid" id="pid"/></td>
          </tr>
                    <tr>
                        <td height="5%" width="29%" >Discussion topic</td>
                        <td height="5%" colspan="2"><input type="text" name="Topic" id="Topic"/></td>
		  </tr>
                      <tr>
                        <td height="5%" width="29%"><label for="desc">Question</label></td>
                        <td height="5%" colspan="2"><textarea name="Question" id="Question" cols="45" rows="5"></textarea></td>
					  </tr>
                        <tr>
                          <td height="5%" width="29%"><label for="issue">Issue Catagory</label></td>
                        <td height="5%" colspan="2">
                        <?php
						include 'getLists.php';
						$issueList = healthIssueList(); 
						echo $issueList;
						?>                        
                       </td>
					  </tr>					
                      
                        <tr>
                          <td height="5%" colspan="3">
                            <div align="center">
                              <input type="submit" name="submit" value="Submit" id= "button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="reset" name="reset" value="Reset" id= "button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="button" name="submit" value="Back" id= "button" onclick="location.href = 'index.php';">
                          </div>                           </td>
                      </tr>
                      
        </table>
		  </form>


</body>
</html>