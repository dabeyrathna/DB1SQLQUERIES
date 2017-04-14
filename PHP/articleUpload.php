<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<form name="form" method="post" id="article" enctype="multipart/form-data" action="articalUploadContraller.php">
  <h1>Upload an artical<span></span>
            		</h1>
        <table id="printTable" width="100%" height="50%"  border="0" cellpadding="5" style="align:center;">
          <tr>
            <td height="5%" >Doctor</td>
            <td height="5%" colspan="2"><input type="text" name="did" id="did" /></td>
          </tr>
                    <tr>
                        <td height="5%" >Topic</td>
                        <td height="5%" colspan="2"><input type="text" name="Topic" id="Topic" /></td>
          </tr>
                      <tr>
                        <td height="5%" width="14%"><label for="desc">Description</label></td>
                        <td height="5%" colspan="2"><textarea name="desc" id="desc" cols="45" rows="5"></textarea></td>
					  </tr>
                        <tr>
                          <td height="5%" width="14%"><label for="issue">Issue Catagory</label></td>
                        <td height="5%" colspan="2">
                        <?php
						include 'getLists.php';
						$issueList = healthIssueList(); 
						echo $issueList;	
							
						?>                        
                       </td>
					  </tr>
					  </tr>
                        <tr>
                          <td height="5%" width="14%">&nbsp;</td>
                        <td height="5%" colspan="2">&nbsp;</td>
					  </tr></tr>
                        <tr>
                          <td height="5%" width="14%"><label for="contactNumber">Select the artical</label></td>
                        <td height="5%" colspan="2"><input type="file" name="fileToUpload" id="fileToUpload"></td>
					  </tr>
					     </tr>
                        <tr>
                          <td height="5%" width="14%"> </td>
                        <td height="5%" width="18%"><div align="right">
                          <input type="submit" name="submit" value="Submit" id= "button">
                        </div></td>
                        <td width="68%"><input type="reset" name="reset" value="Reset" id= "button">&nbsp;&nbsp;&nbsp;<a href="index.php">Back to home</a></td>
					  </tr>
                      
        </table>
		  </form>


</body>
</html>