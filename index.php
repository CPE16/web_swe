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
				<center><font face = "ThaiSans Neue" size = "+3.5" color = "#19B5FE"><b>ยินดีต้อนรับเข้าสู่<b></font></center>
				<center><font face = "ThaiSans Neue" size = "+3.5" color = "#019875">แบบฟอร์มโครงงานนิสิตวิศวกรรมคอมพิวเตอร์</font></center>
			</div> 
		</div>
		<?php fooster() ?>		
	</body>
</html>
	