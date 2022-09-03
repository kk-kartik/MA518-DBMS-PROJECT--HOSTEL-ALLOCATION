<!DOCTYPE html>





<html lang="en" oncontextmenu="return false;">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta http-equiv="Pragma" content="no-cache">
	
	<title>IIT Guwahati</title>
	<!-- Bootstrap core CSS-->
  	<link rel="icon" href="assets/images/iitg.ico" type="image/icon" sizes="16x16">

	  <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />

	<!-- Custom fonts for this template-->
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">
	<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
	<script src="js/validate.js"></script> 

	<style>
		* {
		font-family: Serif;
		}

		.content-wrapper{
		margin-left: 0px;
		}
		footer.sticky-footer {
		width: 100%;
		}
	</style>
  
	<script type="text/javascript">
	  
		$(document).keydown(function (event)
		{
			if (event.keyCode == 123)
			{ // Prevent F12
				return false;
			} 
			else if (event.ctrlKey && event.shiftKey && event.keyCode == 73)
			{ // Prevent Ctrl+Shift+I        
				return false;
			}
		});

	</script>

	<script type="text/javascript">

		function changeVisibility(inputId, btn)
		{
			var inputElmnt = document.getElementById(inputId);
			var iconElmnt = btn.childNodes[0];
			if (inputElmnt.type === "password")
			{
				inputElmnt.type = "text";

				iconElmnt.classList.remove('fa-eye');
				iconElmnt.classList.add('fa-eye-slash');
			}
			else
			{
				inputElmnt.type = "password";
				iconElmnt.classList.remove('fa-eye-slash');
				iconElmnt.classList.add('fa-eye');
			}
		}

		function validate()
		{
			var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#^?&])[A-Za-z\d@$!%*#^?&]{8,16}$/;
			var uname = document.getElementById("username").value;
			var curPw = document.getElementById("oPwd").value;
			var newPw = document.getElementById("nPwd").value;
			var cnfrmPw = document.getElementById("cPwd").value;

			var valueArray = [uname, curPw, newPw, cnfrmPw];
			var nameArray = ["Username", "Current Password", "New Password", "Confirm Password"];
			var result = checkBlankForAllInput(valueArray, nameArray);

			if(result==null)
			{
	                        if (newPw.length >= 8)
        	                {
	
        	                        if (regex.test(newPw))
                	                {

                        	                if (newPw.length > 16)
                                	        {
                                        	        alert("Password to be of maximum 16 characters!");
                                                	return;
                                        	}

	                                        if (newPw != cnfrmPw)
        	                                {
                	                                alert("Confirm password does not match with new password!");
                        	                        return;
                                	        }

 
                                	}
                                	else
                                	{
                                        	alert("New password does not match with the password format!");
                                        	return;
                                	}
                        	}
                        	else
                        	{
                                	alert("Password to be of minimum 8 characters!");
                                	return;
                        	}

                        	document.changePwForm.submit();

                        }
			else
			{
				alert(result);
				return;
			}

			/*
			if (newPw.length >= 8)
			{

				if (regex.test(newPw))
				{

					if (newPw.length > 16)
					{
						alert("Password to be of maximum 16 characters!");
						return;
					}

					if (newPw != cnfrmPw)
					{
						alert("Confirm password does not match with new password!");
						return;
					}

					//alert("Successfully submitted");
				}
				else
				{
					alert("New password does not match with the password format!");
					return;
				}
			}
			else
			{
				alert("Password to be of minimum 8 characters!");
				return;
			}

			document.changePwForm.submit();
			*/
		}
	</script>

</head>

<body class="fixed-nav sticky-footer" style="background-color:rgb(233, 236, 239);">
  <!-- Navigation-->
  
  <nav class="navbar navbar-expand-lg fixed-top bg-dark" id="mainNav">
	  <a class="navbar-brand" href="http://www.iitg.ac.in" target="_blank"> <img src="assets/images/iitg.ico" width="19%" alt="IITG"> <font color="white">Indian Institute of Technology Guwahati</font></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
  </nav>

  <!-- Navigation-->

  <div class="content-wrapper" style="background-color: #f9f9f9;">
    <div class="container-fluid">
      <br>
      <div class="card" style="width:85%; margin:auto; margin-top:2%;">
      <div class="card-body">

	
      <div class="row">
        <div class="col-sm-6">
              
          <div class="card">
            <div class="card-header text-white" style="background-color: #393e46;">
	      <h5>Change Password</h5>
            </div>
            <div class="card-body" style="background-color: #eeeeee;">
              <form name="changePwForm" id="changePwForm" method="post" action="eiseezahge" autocomplete="off">
                
                <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"  placeholder="Username" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                          <label for="oPwd">Password (ERP or Office365 Password)</label>
                          
                          <div class="input-group mb-3">
                              <input type="password" class="form-control border-right-0 border" id="oPwd" name="oPwd" placeholder="*********" autocomplete="off" required>
                              <div class="input-group-append ">
                                <button class="btn btn-outline-light border-left-0 border" type="button" onclick="changeVisibility('oPwd', this)"><i class="fa fa-eye" style="color: #3F3F3F;"></i></button>
                              </div>
                            </div>
                    </div>
          
                    <div class="form-group">
                            <label for="nPwd">New ERP Password</label>
                            
                            <div class="input-group mb-3">
                              <input type="password" class="form-control border-right-0 border" id="nPwd" name="nPwd" placeholder="New Password" autocomplete="off" required>
                              <div class="input-group-append ">
                                <button class="btn btn-outline-light border-left-0 border" type="button" onclick="changeVisibility('nPwd', this)"><i class="fa fa-eye" style="color: #3F3F3F;"></i></button>
                              </div>
                            </div>
                    </div>

                    <div class="form-group">
                            <label for="cPwd">Confirm ERP Password</label>
                            
                            <div class="input-group mb-3">
                              <input type="password" class="form-control border-right-0 border" id="cPwd" name="cPwd" placeholder="Re-type Password" autocomplete="off" required>
                              <div class="input-group-append ">
                                <button class="btn btn-outline-light border-left-0 border" type="button" onclick="changeVisibility('cPwd', this)"><i class="fa fa-eye" style="color: #3F3F3F;"></i></button>
                              </div>
                            </div>
                    </div>

                <br>
                <div align="center">
                  <button type="button" class="btn btn-md rounded-0 text-white" style="padding-left:5%; padding-right: 5%; background-color:#1e3799" onclick="validate()">Change</button>
                  <button type="reset" class="btn btn-md rounded-0 text-white" style="padding-left:5%; padding-right: 5%; background-color:#e55039">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          
          <div class="card">
            
            <div class="card-body" style="background-color:#eeeeee">
              <h5><b>Password Requirements</b></h5>
              <hr>
		Choosing a strong password is an important part of protecting your access to IIT Guwahati resources.
		<div class="card" style="margin-top:10px;">
		<div class="card-body">
		<b>Password must:</b>
               <ul>
		<li>Be a minimum of eight (8) characters in length and maximum sixteen (16) characters.</li>
		<li>Contain at least one (1) character from each of the following categories:</li>
			<ul>
				<li>Uppercase letter (A-Z)</li>
				<li>Lowercase letter (a-z)</li>
				<li>Digit (0-9)</li>
				<li>Special character(!,@,#,$,%,^,&,*)</li>
			</ul>
              </ul> 
		<b>Password must not:</b>
		<ul>
		<li>Contain a common proper name, login ID, email address, initials, first, middle or last name.</li>
		</ul>
		</div>
		</div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center" style="color:black;">
          







<small>&copy; 2022. <a href="https://automation.iitg.ac.in/automation" target="_blank" style="color:black;"><abbr title="Indian Institute of Technology Guwahati">IITG</abbr> Office Automation,&nbsp;</a> <a href="http://www.iitg.ac.in/cc" target="_blank"style="color:black;">Computer and Communication Centre</a>  </small>


        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
