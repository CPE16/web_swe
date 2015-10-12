<?php
require "config.php";
	session_start();
	if(!isset($_SESSION['login_user']))
	{
		header('Location: login.php');
		exit;
	}
	echo "<center><font size = '7' color='#2c3e50'>หน้านี้ยังไม่พร้อมใช้งาน</font><br><br><a href='appform.php'><button>BACK.</button></a><hr>";
	
?>
<html>
	<head>
	<meta charset = "utf-8">
		<title>Computer System.</title>
		  <link rel="stylesheet" type="text/css" href="css/Header.css" />
		  <link rel="stylesheet" type="text/css" href="css/cpe03-min.css" />
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
			<a href="student-page.php"><div class = "menu1" align = "center">
				<b class = "small">หน้าหลัก</b>
			</div>
			</a>
			<a href="appform.php"><div class = "menu2" align = "center">
				<b class = "small">ฟอร์มโครงงาน</b>
			</div></a>
			<a href="#"><div class = "menu3" align = "center">
				<b class = "small">ติดตามโครงงาน</b>
			</div></a>
			<a href="logout.php"><div class = "menu4" align = "center">
			<b class = "small">ออกจากระบบ</b>
			</div></a>
		</div>
		<div class = "mainpage">
			<center><font face = "ThaiSans Neue" size = "+3" color = "#446CB3"><b>CPE03-แบบขอสอบข้อเสนอโครงงานวิศกรรมคอมพิวเตอร์ ปีการศึกษา 2557<b></font></center><hr><br> 
			<div class = "submain1">
				<div class = "subheader" align = "center">ชื่อโครงงาน</div>
				<table style=" width:100%;height:80%;" align ="center">
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e"> รหัสโครงงาน</font></th>
					<td style="width:65%;"><input type = "text" class ="show_text" /></td>
				</tr>
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e"> ภาษาไทย</font></th>
					<td style="width:65%;"><input type = "text" class ="show_text" /></td>
				</tr>
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e">ภาษาอังกฤษ</font></th>
					<td style="width:65%;"><input type = "text" class ="show_text" /></td>
				</tr>
				</table>
			</div>
			<div class = "submain1">
				<div class = "subheader" align = "center">รายชื่อนิสิตผู้ทำโครงงาน</div>
					<table style=" width:100%;height:100%;" align ="center">
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e">ชื่อ-นามสกุล</font></th>
					<td style="width:65%;"><input type = "text" class ="show_text" /></td>
				</tr>
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e"> รหัสนิสิต</font></th>
					<td style="width:65%;"><input type = "text" class ="show_text" /></td>
				</tr>
				<tr>
					<th style="width:35%;"> <font face = "ThaiSans Neue" size = "+2" color = "#34495e">เบอร์โทร</font></th>
					<td style="width:65%;"><input type = "text" class ="show_text" /></td>
				</tr>
					<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e"> อีเมล์</font></th>
					<td style="width:65%;"><input type = "text" class ="show_text" /></td>
				</tr>
				</table>
			</div>
			<div class = "submain1" align = "center">
				<div class = "subheader" align = "center">ประเด็นปัญหาและขอบเขต</div>
						<table style=" width:100%;height:100%;" align ="center">
				<tr>
						<td style="width:90%;" align ="center"><textarea class ="textbox" rows="2" placeholder="ประเด็นปัญหาและขอบเขตของโครงงานโดยย่อ"></textarea></td>
						</TR>
				</table>
			</div>
						<div class = "submain1">
				<div class = "subheader" align = "center">กรรมการสอบโครงงาน</div>
				<table style=" width:100%;height:100%;" align ="center">
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e"> กรรมการที่ 1 </font></th>
					<td style="width:75%;"><select class = "selection">
						<option>กรุณาเลือกกรรมการ</option>
						<option>นางสาวสมศรี   ดีมั่น</option>
						<option>นายสมศักดิ์   ดีใจ</option>
						<option>นางสาวดวงดาว   ส่องแสง</option>
						<option>นางสาวก่อแก้ว  มุ่งมั่น</option>
					</select></td>
				</tr>
				<tr>
					<th style="width:35%;"> <font face = "ThaiSans Neue" size = "+2" color = "#34495e">กรรมการที่ 2</font></th>
					<td style="width:75%;"><select class = "selection">
						<option>กรุณาเลือกกรรมการ</option>
						<option>นางสาวสมศรี   ดีมั่น</option>
						<option>นายสมศักดิ์   ดีใจ</option>
						<option>นางสาวดวงดาว   ส่องแสง</option>
						<option>นางสาวก่อแก้ว  มุ่งมั่น</option>
					</select></td>
				</tr>
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e"> กรรมการที่ 3</font></th>
					<td style="width:75%;"><select class = "selection">
						<option>กรุณาเลือกกรรมการ</option>
						<option>นางสาวสมศรี   ดีมั่น</option>
						<option>นายสมศักดิ์   ดีใจ</option>
						<option>นางสาวดวงดาว   ส่องแสง</option>
						<option>นางสาวก่อแก้ว  มุ่งมั่น</option>
					</select></td>
				</tr>
				</table>
			</div>
			<div class = "submain2" align = "center">
				<div class ="botton-div" align = "center">
					<h2>ส่งข้อเสนอ</h2>
				</div>
			</div>
		
		</div>
		<div class = "fooster">
			<center><font face = "ThaiSans Neue" size = "+1.5" color = "#446CB3"><b>ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์  คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร   ตำบลท่าโพธิ์ อำเภอเมือง จังหวัดพิษณุโลก  65000<b></font></center> 
			<center><font face = "ThaiSans Neue" size = "+1.5" color = "#446CB3"><b>โทร  0559-6437-3,0559-6437-1 แฟกซ์ 0559-6400-5 อีเมล์</font> <a href = "mailto:ecpe-software@nu.ac.th" ><font class = "link" >ecpe-software@nu.ac.th </font></a> <b></center>
		</div>
		
	</body>
</html>
	