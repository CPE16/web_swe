<?php
	require "config.php";
	require "layout.php";
	session_start();
	if(isset($_SESSION['login_user']))
	{
		header('Location: student-page.php');
		exit;
	}
?>
<html>
<head>
<meta charset = "utf-8">
<title>Computer System.</title>
<?php res() ?>
	</head>
	<body>

		<?php 
			titlepage(); 
			menuTab();
		?>

		<div class = "container" >
			<div class= "row blue lighten-5 z-depth-1" align="center">	
			<div class="mycard" align = "center" style="width: 70%;margin-top: 20px;margin-bottom: 20px; border-radius: 50px; boarder: 3px;" >
            
				<div class="row">
					<h2>กรุณาป้อนรหัสประจำตัวและรหัสผ่าน</h2>
				<hr>
				  <div class="col-md-4"></div>
				  <div class="col-md-4">

				<form action="activeLogin.php" method="post" id="login-form" autocomplete="off">
				    <div class="form-group" align="left">
				          
				        <label>
				            Username or Email
				        </label>
				        <div class="input-group">
				            <span class="input-group-addon"><em class="fa fa-fw fa-user"></em></span>
				            <input type="text"  name="username" id="username" class="form-control">
				        </div>
				    </div>
				    <div class="form-group" align="left">
				          
				        <label>
				            Password
				        </label>
				        <div class="input-group">
				            <span class="input-group-addon"><em class="fa fa-fw fa-key"></em></span>
				            <input type="password" name="password" id="key" class="form-control">
				        </div>
				    </div>
				    <div class="checkbox" align="left">
				          
				        <label>
				            <input type="checkbox" onclick="showPassword()"> 
				            <font color="#336E7B"> Show password</font>
				        </label>
				    </div>
				    

				    <div class="btn-toolbar">
				        <div class="btn-group">				           
				            <button type="submit" class="btn btn-Success">
				                Signin
				            </button>
				        </div>
				    </div>
				</form>


				  </div>
				  <div class="col-md-4"></div>
				</div>
			</div>
			</div>
			<script src="js/jquery-1.10.2.min.js"></script>
				<script>
         		
			function showPassword() {
				var key_attr = $('#key').attr('type');
				if(key_attr != 'text') {
					$('.checkbox').addClass('show');
					$('#key').attr('type', 'text');
				} 
				else {
					$('.checkbox').removeClass('show');
					$('#key').attr('type', 'password');
				}
			}
        </script>
		</div>

		<?php fooster() ?>	

	</body>
</html>
	