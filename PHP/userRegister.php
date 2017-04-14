<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form name="form" method="post" action="userRegisterContraller.php" id="regForm">
            <h1>User Register</h1>
  <h3><span>Please fill the application with correct details</span></h3>
            		
                 <table id="table" width="100%" height="auto"  border="0" cellpadding="5" style="align:center;">
                    <tr>
                    	<td height="5%" width="14%" ><label for="type"><strong>Type</strong></label></td>
                      <td width="28%">                       
                        <LABEL><INPUT TYPE="RADIO" NAME="type" VALUE="patient" checked="checked">Patient</LABEL>
                                    
                        <LABEL><INPUT TYPE="RADIO" NAME="type" VALUE="doctor">Doctor</LABEL>
                  </td>
                        <td width="6%"><span id="spanname" ></span> </td>
                    </tr>
                    <tr>
                    	<td>
                        </TD>
                    </tr>
                    
                    <tr>
                        <td height="5%" width="14%" ><label for="name"><strong>Name</strong></label></td>
                        <td height="5%" colspan="2"><input type="text" name="name" id="name" /></td>
						<td><span id="spanname" ></span> </td>
                      </tr>
                      <tr> 
                        <td height="5%" width="14%"><label for="address"> <strong>Address</strong></label></td>
                        <td height="5%" colspan="2"></td>
						<td height="5%" width="52%"></td>
                      </tr>
                       <tr> 
                        <td height="5%" width="14%"><label for="street"> - Street : </label></td>
                        <td height="5%" colspan="2"><input type="text" name="street" id="street" /></td>
						<td height="5%" width="52%"><span id="spanStreet" > </span></td>
                      </tr>
                       <tr> 
                        <td height="5%" width="14%"><label for="city"> - City : </label></td>
                        <td height="5%" colspan="2"><input type="text" name="city" id="city"/></td>
						<td height="5%" width="52%"><span id="spanCity" > </span></td>
                      </tr>
                       <tr> 
                        <td height="5%" width="14%"><label for="zip"> - Zip Code :</label></td>
                        <td height="5%" colspan="2"><input type="text" name="zip" id="zip" /></td>
						<td height="5%" width="52%"><span id="spanZip" > </span></td>
                      </tr>
                      <tr>
                        <td height="5%" width="14%"><label for="gender"> <strong>Gender</strong></label></td>
                        <td height="5%" colspan="2"><input type="radio" name="gender" CHECKED id="gender" value="female">Female
						<input type="radio" name="gender" value="male">Male</td>
						<td height="5%" width="52%"><span id="spangender" style='color:red;fontSize:30px;'> </span></td>
                      </tr>
                      <tr>
                        <td height="5%"><label for="dob"><strong>Date of Birth</strong></label></td>
                        <td height="5%" colspan="2"><?php
						
						$str = '<select id = "dobYear" name="dobYear" onChange="display();" style="width:55px">';
						$count = 1900;
						while($count <2018)
						{	
							if($count == 2010)
								$str .=	'<option value="'.$count.'" selected>'.$count.'</option>';
							else
								$str .=	'<option value="'.$count.'">'.$count.'</option>';
							
                            $count++;
                        }
						 $str .= '</select>';
						 echo $str;
						?>
                          <?php
						
						$str1 = '<select id = "dobMonth" name="dobMonth" style="width:35px">';
						$count1 = 1;
						while($count1 <13)
						{	
						
								$str1 .=	'<option value="'.$count1.'">'.$count1.'</option>';
							
                            $count1++;
                        }
						 $str1 .= '</select>';
						 echo $str1;
						?>
                          <?php
						
						$str2 = '<select id = "dobDate" name="dobDate" style="width:35px"> ';
						$count2 = 1;
						while($count2 <30)
						{	
						
								$str2 .=	'<option value="'.$count2.'">'.$count2.'</option>';
							
                            $count2++;
                        }
						 $str2 .= '</select>';
						 echo $str2;
						?></td>
                        <td height="5%"><span id="spandob2"></span></td>
                      </tr>
                      <tr>
                        <td height="5%" ><label for="name"><strong>Phone</strong></label></td>
                        <td height="5%" colspan="2"><input type="text" name="phone" id="phone" /></td>
                        <td><span id="spanname2" >(Add multiple phone numbers using commas)</span></td>
                      </tr>
                      <tr>
                        <td height="5%" ><label for="name"><strong>Password</strong></label></td>
                        <td height="5%" colspan="2"><input type="password" name="pass" id="pass" /></td>
                        <td><span id="spanname3" ></span></td>
                      </tr>
                      <tr>
                        <td height="5%"><strong>Re-Type Password</strong></td>
                        <td height="5%" colspan="2"><input type="password" name="rePass" id="rePass" /></td>
                        <td height="5%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="5%">&nbsp;</td>
                        <td height="5%" colspan="2">&nbsp;</td>
                        <td height="5%">&nbsp;</td>
                      </tr>
					  
					  <tr>
					    <td height="5%" bgcolor="#CCCCCC">Only for Doctors</td>
					    <td height="5%" colspan="2" bgcolor="#CCCCCC">&nbsp;</td>
					    <td height="5%" bgcolor="#CCCCCC">&nbsp;</td>
			       </tr>
					  <tr>
					    <td height="5%"><strong>Hospital</strong></td>
					    <td height="5%" colspan="2"><input type="text" name="hospital" id="hospital" /></td>
					    <td height="5%">&nbsp;</td>
			       </tr>
					  <tr>
					    <td height="5%"><label for="nationality"><strong>Specialization</strong></label></td>
					    <td height="5%" colspan="2"><select style="width:100px" id = "specialization" name="specialization">
					      <option value="Cardiology">Cardiology</option>
					      <option value="Anaesthesiology">Anaesthesiology</option>
					      <option value="Pathology">Pathology</option>
					      <option value="Gastroenterology">Gastroenterology</option>
					      <option value="Geriatrics">Geriatrics</option>
					      <option value="Radiology">Radiology</option>
					      <option value="Neurology">Neurology</option>
					      <option value="Psychiatry">Psychiatry</option>
					      </select></td>
					    <td height="5%"><span id="spanNationality" style='color:red;fontSize:30px;'> </span></td>
			       </tr>
					  <tr>
					    <td height="5%">&nbsp;</td>
					    <td height="5%" colspan="2">&nbsp;</td>
					    <td height="5%">&nbsp;</td>
			       </tr>
					  <tr>
					    <td height="5%">&nbsp;</td>
					    <td height="5%" colspan="2"><button type="submit">Submit</button>&nbsp;&nbsp; <button type="reset">Reset</button></td>
					    <td height="5%"><a href="index.php">Back</a></td>
			       </tr>
					</table> 
                    <br />
                    </br>
                                  
			</form>


</body>
</html>