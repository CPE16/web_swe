<?php
	require "config.php";
	session_start();
	if(!isset($_SESSION['login_user']))
	{
		header('Location: login.php');
		exit;
	}
	$sql = "SELECT nameThai,nameEng,std1,std2 FROM comsystem.createproject WHERE std1 = '".$_SESSION['login_user']."' or std2 = '".$_SESSION['login_user']."' or std3 = '".$_SESSION['login_user']."'";
	$query =  mysql_query($sql) or die(mysql_error());
	$rows =  mysql_num_rows($query);
	if($rows == 0)
	{
		echo "<font size = '5' color='#2c3e50'>คุณยังไม่ผ่านขั้นตอนกรอกข้อมูลโครงงานในฐานข้อมูล CPE-01</font><br><br><a href='appform.php'><button>BACK.</button></a><hr>";
	}
	else{
	if($rows > 0){
	while($r1=mysql_fetch_assoc($query))
	{
		$nameThai = $r1["nameThai"] ;
		$nameEng = $r1["nameEng"];
		$std1 = $r1["std1"];
		$std2 = $r1["std2"];
		
	}
	}
	}
	
	$sql2 = "SELECT Name,Faculty,email FROM comsystem.students WHERE Student_ID = '".$std1."'";
	$query2 =  mysql_query($sql2) or die(mysql_error());
	$rows2 =  mysql_num_rows($query2) or die("ERROR");
	if($rows2 == 1){
	while($r1=mysql_fetch_array($query2))
	{
		$stdName = $r1["Name"];
		$faculty = "คณะ".$r1["Faculty"];
		$email = "E-mail : ".$r1["email"];
	}
	}
	else;
	if($std2 == nuLl){
		$stdName2 = "ไม่มี";
		}else{
			
		$sql3 = "SELECT Name,Faculty,email FROM comsystem.students WHERE Student_ID = '".$std2."'";
	$query3 =  mysql_query($sql3) or die(mysql_error());
	$rows3 =  mysql_num_rows($query3) or die("error");
	if($rows3 == 1){
	while($r1=mysql_fetch_array($query3))
	{
		$stdName2 = $r1["Name"];
		$faculty2 = "คณะ".$r1["Faculty"];
		$email2 = "E-mail : ".$r1["email"];
		
	}
	}
	else;
	}
	$date_t = array();
	$title_t = array();
	$note_t = array();
	$sub = array();
	
	$logSql = "SELECT date,title,note,test FROM comsystem.logs ORDER BY date DESC ,date ASC LIMIT 3";
	$logq = mysql_query($logSql) or die("error");
	$rows =  mysql_num_rows($logq);
	if($rows == 1){
	while($r1=mysql_fetch_assoc($logq))
	{
		array_push($date_t,$r1["date"]);
		array_push($title_t,$r1["title"]);
		array_push($note_t,$r1["note"]);
		array_push($sub,$r1["test"]);
		
	}
	print_r($date_t);
	}
	else{
		while($r1=mysql_fetch_assoc($logq))
	{
		array_push($date_t,$r1["date"]);
		array_push($title_t,$r1["title"]);
		array_push($note_t,$r1["note"]);
		array_push($sub,$r1["test"]);
		
	}
	}
	
?>
<html>
	<head>
	<meta charset = "utf-8">
		<title>Computer System.</title>
		  <link rel="stylesheet" type="text/css" href="css/Header.css" />
		  <link rel="stylesheet" type="text/css" href="css/cpe02-min.css" />
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
		<form id = "cpe02" name = "cpe02" action = "cpe02-active.php" method="post">
			<center><font face = "ThaiSans Neue" size = "+3" color = "#446CB3"><b>CPE02-แบบบันทึกการดำเนินงานโครงงานวิกรรมคอมพิวเตอร์ ปีการศึกษา 2557<b></font></center><hr><br> 
			<div class = "submain1">
				<div class = "subheader" align = "center"><?php echo "Today is ".date("d-m-y")?></div>
				<table style="border:1px solid red; width:100%;height:100%; color:#34495e;" align ="center">
						<tr>
						<th style="border:1px solid red; width:20%;"> โครงงานเรื่อง </th>
						<td style="border:1px solid red; width:40%;" align = "center"><?php echo $nameThai."<br>".$nameEng;?></td>
						</tr>
						<tr>
						<th style="border:1px solid red; width:20%;">สมาชิก
						<td style="border:1px solid red; width:40%;"align = "center"><?php echo $std1." ".$stdName."<br>".$faculty."<br> ".$email."<br>";echo "<hr> ".$std2." ".$stdName2."<br>".$faculty2."<br>".$email2."<br>";?></td>
						
						</tr>
						
					
				</table>
				
			</div>
			<div class = "submain1">
				<div class = "subheader" align = "center"><?php echo "Today is ".date("d-m-y")?></div>
					<table style=" width:100%;height:100%;" align ="center">
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e">ประเด็น/หัวข้อ/งานที่มอบหมาย</font></th>
						<td style="width:65%;"><textarea id = "title" name = "title" class ="textbox" rows="2" placeholder="ประเด็น/หัวข้อ/งานที่มอบหมาย"></textarea></td>
				</tr>
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e"> ข้อสรุป/ความคืบหน้าของงาน</font></th>
					<td style="width:65%;"><textarea id = "note" name = "note" class ="textbox" rows="2" placeholder=" ข้อสรุป/ความคืบหน้าของงาน"></textarea></td>
				</tr>
				<tr>
					<th style="width:35%;"> <font face = "ThaiSans Neue" size = "+2" color = "#34495e">หมายเหตุ</font></th>
					<td style="width:65%;"><textarea id = "subtitle" name = "subtitle" class ="textbox" rows="2" placeholder="หมายเหตุ"></textarea></td>
				</tr>
				</table>
			</div>
			<div class = "submain2" align = "center">	
				<a href="#"><div class ="botton-div" align = "center" onClick="document.forms['cpe02'].submit();">
				
					<h2>บันทึกการดำเนินงาน</h2>
					 
				</div></a>
				</form>
			</div>
			<div class = "submain1">
				<div class = "subheader" align = "center"><?php echo "Today is ".date("d-m-y")?></div>
				<table style="border:1px solid red; width:100%;height:100%;" align ="center">
						<tr>
						<th style="border:1px solid red; width:20%;"> วันที่ </th>
						<td style="border:1px solid red; width:40%;"><?php echo $date_t[0];?></td>
						</tr>
						<tr>
						<th style="border:1px solid red; width:20%;">ประเด็น/หัวข้อ/งานที่มอบหมาย</th>
						<td style="border:1px solid red; width:40%;"><?php echo $title_t[0];?></td>
						
						</tr>
						<tr>
						<th style="border:1px solid red; width:20%;">ข้อสรุป/ความคืบหน้าของงาน</th>
						<td style="border:1px solid red; width:40%;"><?php echo $note_t[0];?></td>
						</tr>
						<tr>
						<th style="border:1px solid red; width:20%;">หมายเหตุ</th>
						<td style="border:1px solid red; width:40%;"><?php echo $sub[0];?></td>
						</tr>
						
					
				</table>
			</div>
				<div class = "submain1">
				<div class = "subheader" align = "center"><?php echo "Today is ".date("d-m-y")?></div>
				<table style="border:1px solid red; width:100%;height:100%;" align ="center">
						<tr>
						<th style="border:1px solid red; width:20%;"> วันที่ </th>
						<td style="border:1px solid red; width:40%;"><?php echo $date_t[1];?></td>
						</tr>
						<tr>
						<th style="border:1px solid red; width:20%;">ประเด็น/หัวข้อ/งานที่มอบหมาย</th>
						<td style="border:1px solid red; width:40%;"><?php echo $title_t[1];?></td>
						
						</tr>
						<tr>
						<th style="border:1px solid red; width:20%;">ข้อสรุป/ความคืบหน้าของงาน</th>
						<td style="border:1px solid red; width:40%;"><?php echo $note_t[1];?></td>
						</tr>
						<tr>
						<th style="border:1px solid red; width:20%;">หมายเหตุ</th>
						<td style="border:1px solid red; width:40%;"><?php echo $sub[1];?></td>
						</tr>
						
					
				</table>
			</div>
			<div class = "submain1">
				<div class = "subheader" align = "center"><?php echo "Today is ".date("d-m-y")?></div>
				<table style="border:1px solid red; width:100%;height:100%;" align ="center">
						<tr>
						<th style="border:1px solid red; width:20%;"> วันที่ </th>
						<td style="border:1px solid red; width:40%;"><?php echo $date_t[2];?></td>
						</tr>
						<tr>
						<th style="border:1px solid red; width:20%;">ประเด็น/หัวข้อ/งานที่มอบหมาย</th>
						<td style="border:1px solid red; width:40%;"><?php echo $title_t[2];?></td>
						
						</tr>
						<tr>
						<th style="border:1px solid red; width:20%;">ข้อสรุป/ความคืบหน้าของงาน</th>
						<td style="border:1px solid red; width:40%;"><?php echo $note_t[2];?></td>
						</tr>
						<tr>
						<th style="border:1px solid red; width:20%;">หมายเหตุ</th>
						<td style="border:1px solid red; width:40%;"><?php echo $sub[2];?></td>
						</tr>
						
					
				</table>
			</div>
			
		<div class = "submain2">	
				
				<div class = "next_position" align = "center">ถัดไป</div>
				<div class = "prev_position" align = "center">ก่อนหน้า</div>
				<div class ="botton-div" align = "center">
				
					<h2>ส่งแบบฟอร์มให้อาจารย์ที่ปรึกษา</h2>
					 
				</div>
			</div>
		
		</div>
		<div class = "fooster">
			<center><font face = "ThaiSans Neue" size = "+1.5" color = "#446CB3"><b>ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์  คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร   ตำบลท่าโพธิ์ อำเภอเมือง จังหวัดพิษณุโลก  65000<b></font></center> 
			<center><font face = "ThaiSans Neue" size = "+1.5" color = "#446CB3"><b>โทร  0559-6437-3,0559-6437-1 แฟกซ์ 0559-6400-5 อีเมล์</font> <a href = "mailto:ecpe-software@nu.ac.th" ><font class = "link" >ecpe-software@nu.ac.th </font></a> <b></center>
		</div>
		
	</body>
</html>
	