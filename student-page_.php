<?php
	require "config.php";
	require "layout.php";
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
		<?php res() ?>
	</head>
	<body>
		
		<?php 
			titlepage(); 
			menuTab();
		?>
		<!-- Show User Login. 
		<div class = "show-user" align = "center">
		Welcome: คุณ สหกรณ์
		</div>-->
		<!--==================================== Main page ========================================== -->
		<div class = "mainpage">
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
		<br><br>
			<a href="download/manual.pdf"><div class ="botton-div">
					<table style="width:100%; color:#2980b9;" align ="left">
					<tr align ="left">
					<td align ="left" style="width:50px;"><img src="images/pdf.png" width="50px" height="50px"></td>
					<td align = "center">คู่มือการใช้งาน</td>
					</tr>
					</table>
			</div></a>
			<div class ="botton-div">
			<table style="width:100%; color:#2980b9;" align ="left">
					<tr align ="left">
					<td align ="left" style="width:50px;"><img src="images/clock.png" width="50px" height="50px"></td>
					<td align = "center">แจ้งเตือน</td>
					</tr>
					</table>
			</div>
			<div class ="botton-div">
			<table style="width:100%; color:#2980b9;" align ="left">
					<tr align ="left">
					<td align ="left" style="width:50px;"><img src="images/tracking.png" width="50px" height="50px"></td>
					<td align = "center">ติดตามโครงงาน</td>
					</tr>
					</table>
			</div>
			<a href = "calendar.php"><div class ="botton-div">
			<table style="width:100%; color:#2980b9;" align ="left">
					<tr align ="left">
					<td align ="left" style="width:50px;"><img src="images/calendar.png" width="50px" height="50px"></td>
					<td align = "center">ปฏิทิน</td>
					</tr>
					</table>
			</div></a>
		</div>
		
		</div>
		<div class = "fooster">
			<center><font face = "ThaiSans Neue" size = "+1.5" color = "#446CB3"><b>ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์  คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร   ตำบลท่าโพธิ์ อำเภอเมือง จังหวัดพิษณุโลก  65000<b></font></center> 
			<center><font face = "ThaiSans Neue" size = "+1.5" color = "#446CB3"><b>โทร  0559-6437-3,0559-6437-1 แฟกซ์ 0559-6400-5 อีเมล์</font> <a href = "mailto:ecpe-software@nu.ac.th" ><font class = "link" >ecpe-software@nu.ac.th </font></a> <b></center>
		</div>
	</body>
</html>
	