<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Sign In</title>
    <link rel="Stylesheet" href="UI/css.css" type="text/css" />
    <script type="text/javascript" src="UI/jquery-1.4.min.js"></script>
	<script type="text/javascript" src="UI/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
 document.title = "Sign in";
</script>	
	<script type="text/javascript" src="UI/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="UI/jquery.animate-colors-min.js"></script>
    <script type="text/javascript" src="UI/ajax.js"></script>
</head>
<body >

<div id="allogin">
<div id="container">
	<!--************************ Header *********************************-->

    <div id="header">
        <div id="header-content" style="width:1059px;height:121px;margin:0 auto;">

            <div id="logo">
		
			<img id="Logoo" src="UI/images/logo.png"     width:247px; height:104px;>
		
	    </div>

            <ul id="menu">
 	    <li><a href="#" id="loginpage">First Page</a></li>
            <li><a href="#" id="aboutpage" >About</a></li>
            <li><a href="#" id="contactuspage">Contact Us</a></li>
            <li><a href="#" id="helppage">Help</a></li>
            <li><a href="#">Forum</a></li>
            </ul>
        </div>
    </div>
    <div id="body">
	<div id="bodyImg" >

	<!--************************ Sign Up *********************************-->

        <div id="signup"  class="box" style="display:show">
            <h1>
                Sign Up :
            </h1>
	  <div id="SignC">
            <div id="shiftlogin" class="shiftsignup">
                <br />
                <a href="#">Next Step</a>
            </div>
            <table class=table >
                <tr>
                    <td style>
                        USER NAME:
                    </td>
                    <td>
                        <input class=TextBox type=text id="UserField" />
                    </td>
                
                </tr>

                <tr>
                    <td>
                        PASSWORD:
                    </td>
                    <td>
                        <input class=TextBox type="password" id="PassField" />
                    </td>
                </tr>
                <tr>
                    <td>
                        CONFORM PASSWORD:
                    </td>
                    <td>
                        <input class=TextBox type="password" id="ConField" />
                    </td>
                </tr>
                <tr>
                    <td>
                        USER TYPE:
                    </td>
                    <td>
                        <select id="usertypeselect" class="TextBox" >
                            <option id="EmployerRegistrationFinish" value="Employer">Employer</option>
                            <option id="EmployeeRegistration" value="Employee">Employee</option>
			    <option id="LookingForJob" value="LookingForJob">Look For Job</option>
                        </select>
                    </td>
                </tr>
            </table>
	  </div>
        </div>

	<!--************************ Login *********************************-->

        <div id="login" class="box" style="display:show;">
            <h1>Login :</h1>
            <form action="index.php" method="post">
            <table id="loginTable" class=table>
                <tr id="UTR">
                    <td>
                        USER NAME:
                    </td>
                    <td>
                        <input class=TextBox type=text id="LUserField" />
                    </td>
                </tr>
                <tr id="PASSTR">
                    <td>
                        PASSWORD:
                    </td>
                    <td>
                        <input class=TextBox type="password" id="LPassField" onkeypress="runScriptLogin(event)" />
                    </td>
                </tr>
            </table>
             <div align="center" id="display"><br></br></div>
            <table id="signin">
                <tr>
                    <td>
                        <div id="LoginPic">
                            <a href="#" >Sign In</a>
                        </div>
                       
                    </td>
                    <td>
			<div id="rem">
                        	<input type=checkbox id="remember" style="color:#ffc600">stay signed In</input><br />
                        	<a href="#" id="forgetpass" style="text-decoration:none;color:#ff6600;">forgot password?</a>
                    	</div>
		    </td>
                </tr>
            </table>
            </form>
            </div>
	</div>

	<!--************************ Employer *********************************-->

    <div id="EmployerRegistrationFinish" style="display:none;">
        <div id="box" class=box>
            <h1 id="titleEmployerRegistrationFinish">
                Employer Registration :
            </h1>
            <div id="ContentBoxEmployerRegistrationFinish">
              <table id="table1EmployerRegistrationFinish" class=table>
                <tr>
                    <td>FIRST NAME :</td>
                    <td><input type=text id="FirstNameField" class=TextBox /></td>
                </tr>
                <tr>
                    <td>LAST NAME :</td>
                    <td><input type=text id="LastNameField" class=TextBox /></td>
                </tr>
                <tr>
                    <td>BIRTHDAY :</td>
                    <td><input type=text id="BirthdayField" class=TextBox /></td>
                </tr>
                <tr>
                    <td>GENDER :</td>
                    <td>
                    <select id="gender">
                        <option>
                            Male
                        </option>
                        <option>
                            Female
                        </option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>TEL :</td>
                    <td><input type=text id="TelField" class=TextBox /></td>
                </tr>
            </table>
                <div id="shift" class="shiftEmployerRegistration">
                    <a href="#">Next</a>
                </div>
             <table id="table2EmployerRegistrationFinish" class=table>
                <tr>
                    <td>EMAIL :</td>
                    <td><input type=text id="EmailField" class=TextBox /></td>
                </tr>
                <tr>
                    <td>ORGANIZATION :</td>
                    <td><input type=text id="OrgField" class=TextBox /></td>
                </tr>
                <tr>
                    <td>ORGANIZATION TYPE :</td>
                    <td>
                        <select id="OrgTypeEmployerRegistrationFinish" class=TextBox>
                            <option>item1</option>
                            <option>item2</option>
                        </select>
                    </td>
                </tr>
                <tr >
                    <td>ORGANIZATION LOCATION:</td>
                    <td><textarea id="OrgLocField" rows=3 cols=20 class=TextBox style="position:relative;"></textarea></td>
                </tr>
		
            </table>
            </div>
        </div>    
    </div>

	<!--************************ Employee *********************************-->

		<div id="EmployeeRegistration" style="display:none;">
		
			<div id="box" class=box>
				<h1 id="title">
					Employee Registration :
				</h1>
				
				<div id="ContentBox">
					<table id="table1" class=table>
					<tr>
						<td>FIRST NAME :</td>
						<td><input type=text id="FirstNameField1" class=TextBox /></td>
					</tr>
					<tr>
						<td>LAST NAME :</td>
						<td><input type=text id="LastNameField1" class=TextBox /></td>
					</tr>
					<tr>
						<td>BIRTHDAY :</td>
						<td><input type=text id="BirthdayField1" class=TextBox /></td>
					</tr>
					<tr>
						<td>GENDER :</td>
						<td>
						<select id="gender">
							<option value="male">
								Male
							</option>
							<option value="female">
								Female
							</option>
						</select>
						</td>
					</tr>
					<tr>
						<td>TEL :</td>
						<td><input type=text id="TelField1" class=TextBox /></td>
					</tr>
					
				</table>

					<table id="table2" class=table>
					<tr>
						<td>JOB :</td>
						<td><input type=text id="JobField1" class=TextBox /></td>
					</tr>
					<tr>
						<td>EMAIL :</td>
						<td><input type=text id="EmailField1" class=TextBox /></td>
					</tr>
					<tr>
						<td>ORGANIZATION :</td>
						<td><input type=text id="OrgField1" class=TextBox /></td>
					</tr>
					<tr>
						<td>ORGANIZATION'S CITY :</td>
						<td><input type=text id="OrgCityField" class=TextBox /></td>
					</tr>
					
				</table>
					<table id="tableBottom" >
					<div id="displayRegister" ></div>
					<div id="shift" class="shiftEmployeeRegistrationFinish">
						<a href="#">Finish</a>
					
					</table>
				
				</div>
			</div>    
		</div>

	<!--************************ Employer3  *********************************-->

		<div id="EmployerRegistration" style="display:none;">
        <div id="box" class=box>
            <h1 id="title">
                Employer Registration :
            </h1>
            <div id="ContentBoxEmployerRegistration">
                <table id="table1EmployerRegistration" class=table>
                <tr>
                    <td>BRANCH :</td>
                    <td><input type=text id="BranchField" class=TextBox /></td>
                </tr>
                <tr>
                    <td>NUMBER OF BRANCHES :</td>
                    <td><input type=text id="BranchNumberField" class=TextBox /></td>
                </tr>
                <tr>
                    <td>ORGANIZATION'S CITY :</td>
                    <td><input type=text id="OrgCityField" class=TextBox /></td>
                </tr>
                <tr>
                    <td>ORGANIZATION TEL :</td>
                    <td>
                        <input type=text id="OrgTelField" class=TextBox />
                    </td>
                </tr>
            </table>
                <div id="shift2" class="shiftEmployerRegistration">
                    <a href="#">Finish</a>
                </div>
            </div>
        </div>    
    </div>

	<!--************************ Looking for job3 *********************************-->

   <div id="LookingForJobFini" style="display:none;">
        <div id="box" class=box>
            <h1 id="titlelookingforjobfinish">
                Looking For Job :
            </h1>
            <div id="ContentBoxlookingforjobfinish">
                <table id="table1lookingforjobfinish" class=table>
 		<tr>
                    <td>NATIONALITY :</td>
                    <td><input type=text id="NationalityField" class=TextBox /></td>
                    <td></td>
                </tr>
                <tr>
		    <td>Background :</td>
                    <td><input type=text id="OrgCityField" class=TextBox /></td>
                  
                </tr>
               
                <tr>
                    <td>UPLOAD RESUME :</td>
                    <td><input type=text id="OrgCityField" class=TextBox /></td>
                    <td><img id="uploadlookingforjobfinish" src="UI/images/upload.jpg" /></td>
                </tr>
                <tr>
                    <td>PROFICIENCY :</td>
                    <td>
                        <textarea id="ProfField" cols=20 rows=2 class=TextBox></textarea>
                    </td>
                    <td></td>
                </tr>
            </table>
                <div id="shiftE" class="c">
                    <a href="#">Finish</a>
                </div>
            </div>
        </div>
	</div>


	<!--************************ Looking for job2 *********************************-->

		<div id="LookingForJob" style="display:none;" >
        <div id="box" class=box>
            <h1 id="titlelookingforjob">
                Looking For Job :
            </h1>
            <div id="ContentBoxlookingforjob">
                <table id="table1lookingforjob" class=table>
                <tr>
                    <td>FIRST NAME :</td>
                    <td><input type=text id="FirstNameField" class=TextBox /></td>
                </tr>
                <tr>
                    <td>LAST NAME :</td>
                    <td><input type=text id="LastNameField" class=TextBox /></td>
                </tr>
                <tr>
                    <td>BIRTHDAY :</td>
                    <td><input type=text id="BirthdayField" class=TextBox /></td>
                </tr>
                <tr>
                    <td>GENDER :</td>
                    <td>
                    <select id="gender">
                        <option>
                            Male
                        </option>
                        <option>
                            Female
                        </option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>TEL :</td>
                    <td><input type=text id="TelField" class=TextBox /></td>
                </tr>
            </table>
                <div id="shift" class="shiftLookingForJob">
                    <a href="#">Next</a>
                </div>
                <table id="table2lookingforjob" class=table>

 		<tr>
                    <td>EMAIL :</td>
                    <td><input type=text id="EmailField" class=TextBox /></td>
                </tr>
                <tr>
                    <td>
                        HOMETOWN :
                    </td>
                    <td>
                        <input type=text id="HomeTownField" class=TextBox />
                    </td>
                </tr>
		
                <tr>
                     <td>EDUCATION :</td>
                    <td>
                    <select id="educationlookingforjobfinish" class=TextBox>
                        <option>item1</option>
                        <option>item2</option>
                    </select>
                    </td>
                    <td></td>
                </tr>
               
                <tr>
                    <td>University :</td>
                    <td><input type=text id="OrgField" class=TextBox /></td>
                </tr>
                <tr>
   		    <td>JOB :</td>
                    <td><input type=text id="JobField" class=TextBox /></td>

                   
                </tr>
            </table>
            </div>
        </div>  
	</div>
   
   </div>

</div><!--End Container-->


	<!--************************ Footer *********************************-->

    <div id="footer">
        <div id="footer-content">
            <ul id="FooterMenu">
                <li><a href="#" id="aboutpage1">About</a></li>
                <li><a href="#" id="contactuspage1">Contact Us</a></li>
                <li><a href="#" id="helppage1">Help</a></li>
                <li><a href="#">Forum</a></li>
            </ul>
            <br />
            <p>© All Rights Reserved by<font color="#c0f372"> M.R. Sabernezhad</font></p>
        </div>
    </div>
 </div>   
</body>
</html>
