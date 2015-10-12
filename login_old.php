<?php
	require "config.php";
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
		  <link rel="stylesheet" type="text/css" href="css/Header.css" />
		   <link rel="stylesheet" type="text/css" href="css/login.css" />
		  <STYLE>
			A:link { color: #F7B810; text-decoration:none}
			A:visited {color: #F7B810; text-decoration: none}
			A:hover {color: #F7B810}
		</STYLE>
	</head>
	<body>
		<div class = "titlepage">
			<div class = "subtitle">
				<img src="images/web.png" width="100%" height="100%">
			</div>
			<div class = "subtext-title" align = "center">
			<font size ="6" color="#EEEEEE" style="text-shadow: 1px 1px #2c3e50;"> <b>ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์ </font><br>
			<font size ="5" color="#EEEEEE" style="text-shadow: 1px 1px #2c3e50;"> Department of Electrical and Computer Engineering.<br>
			คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร</b></font>
			</div>
		</div>
		<div class = "menubar" align="center">
			<a href="index.php"><div class = "menu1" align = "center">
				<b class = "small">หน้าหลัก</b>
			</div>
			</a>
			<a href="login.php"><div class = "menu2" align = "center">
				<b class = "small">เข้าสู่ระบบ</b>
			</div></a>
			<a href="project.php"><div class = "menu3" align = "center">
				<b class = "small">โครงงานนิสิต</b>
			</div></a>
			<a href="about_page.php"><div class = "menu4" align = "center">
			<b class = "small">ติดต่อเรา</b>
			</div></a>
		</div>
		<div class = "mainpage" >
			<div class="frame-main" align = "center">
					 <form role="form" action="activeLogin.php" method="post" id="login-form" autocomplete="off">
					<font face = "ThaiSans Neue" size = "+4" color = "#19B5FE"><B>กรุณาป้อนรหัสประจำตัวและรหัสผ่าน</B></font> <hr>
					<div class="form-group" align = "center">
							<span><?echo $id_status?></span>
                            <input class = "textbox" type="text" name="username" id="username" class="form-control" placeholder="รหัสนิสิต">
                        </div>
						<br>
                        <div class="form-group" align = "center">
							<span><?echo $pass_status?></span>
                            <input class = "textbox" type="password" name="password" id="key" class="form-control" placeholder="รหัสผ่าน">
                        </div>

                        <div class="form-group" align = "center">
							<span><?echo $$status?></span>
								<input type="checkbox" onclick="showPassword()"> <font size = "+2" color="#336E7B"> Show password</font>
                        </div>
						 <div class="form-group" align = "center">
                        <input  class = "botton" type="submit" name ="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Log in">
						 </form> </div>
					   </div>
		</div>
		<div class = "fooster">
			<center><font face = "ThaiSans Neue" size = "+1.5" color = "#446CB3"><b>ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์  คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร   ตำบลท่าโพธิ์ อำเภอเมือง จังหวัดพิษณุโลก  65000<b></font></center> 
			<center><font face = "ThaiSans Neue" size = "+1.5" color = "#446CB3"><b>โทร  0559-6437-3,0559-6437-1 แฟกซ์ 0559-6400-5 อีเมล์</font> <a href = "mailto:ecpe-software@nu.ac.th" ><font class = "link" >ecpe-software@nu.ac.th </font></a> <b></center>
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
	</body>
</html>
	