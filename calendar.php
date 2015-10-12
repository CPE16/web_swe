<?php
	require "config.php";
	session_start();
	if(!isset($_SESSION['login_user']))
	{
		header('Location: login.php');
		exit;
	}
	$sql = "SELECT Name,pic_url,email,Faculty FROM comsystem.students WHERE Student_ID = '".$_SESSION['login_user']."'";
	$query =  mysql_query($sql) or die(mysql_error());
	$rows =  mysql_num_rows($query) or die("1234");
	if($rows == 1){
	while($r1=mysql_fetch_array($query))
	{
		$name = $r1["Name"] ;
		$pic_url = $r1["pic_url"];
		$email = $r1["email"];
		$faculty = $r1["Faculty"];
	}
	}
	else;

?>
<html>
	<head>
	<meta charset = "utf-8">
		<title>Computer System.</title>
		  <link rel="stylesheet" type="text/css" href="css/Header.css" />
		  <link rel="stylesheet" type="text/css" href="css/calendar.css" />
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
				<div class = "mainpage" >
					<div class = "profile">
			<br>
					<div class = "picture">
						<img src="<?php echo $pic_url;?>" width="100%" height="100%" style ="border-radius:15px;">
					</div>
				
					<div class = "profile-info">
					<table style="width:100%; color:#2980b9;" align ="left">
					<tr align ="left">
					<th align ="left" >ID:</th>
					<td align ="left" ><?php echo $_SESSION['login_user']; ?></td>
					</tr>
					<tr>
					<th align ="left">Name:</th>
					<td align ="left"><?php echo $name; ?></td>
					</tr>
					<tr>
					<th align ="left">Email:</th>
					<td align ="left"><?php echo $email; ?></td>
					</tr>
					<tr>
					<th align ="left">Faculty:</th>
					<td align ="left"><?php echo $faculty; ?></td>
					</tr>
					</table>
					</div>
					<div class = "profile-info" align = "center">
						<input type = "button" class = "button_" value="Edit Profile"/> 
						<input type = "button" class = "button_" value="Edit Profile"/> 
					</div>
					
			</div>
			<div class = "submain" align = "center">
				<iframe src="https://www.google.com/calendar/htmlembed?src=%23contacts%40group.v.calendar.google.com&ctz=Asia/Bangkok" style="border: 0" width="100%" height="100%" frameborder="0" scrolling="yes"></iframe>
			</div>
		</div>
		<div class = "fooster">
			<center><font face = "ThaiSans Neue" size = "+1.5" color = "#446CB3"><b>ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์  คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร   ตำบลท่าโพธิ์ อำเภอเมือง จังหวัดพิษณุโลก  65000<b></font></center> 
			<center><font face = "ThaiSans Neue" size = "+1.5" color = "#446CB3"><b>โทร  0559-6437-3,0559-6437-1 แฟกซ์ 0559-6400-5 อีเมล์</font> <a href = "mailto:ecpe-software@nu.ac.th" ><font class = "link" >ecpe-software@nu.ac.th </font></a> <b></center>
		</div>
		
	</body>
</html>