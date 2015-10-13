<?php
	require "config.php";
	require "layout.php";
	session_start();
	if(!isset($_SESSION['login_user']))
	{
		header('Location: login.php');
		exit;
	}
	?>
<!DOCTYPE html>
<html>
<head>
	<?php //res() ?>
</head>
<body>

<?php
$q = intval($_GET['q']);
$q = $_GET['q'];

	$sth = $pdo->prepare("SELECT * FROM students WHERE Student_ID = :id");
	$sth->bindParam(':id', $q, PDO::PARAM_STR);
  	$sth->execute();
  	$found = 0;
  	if($_SESSION['login_user']==$q)
		{
			?> 
			<div class="row" align = "center"><br><br>
				<div class="col-xs-8">
					ไม่สามารถเพิ่มตัวเองได้
				</div>
			</div>
		<?php
		die();
		}

  	while ($row = $sth->fetch(PDO::FETCH_ASSOC))  
  	{
  		$found++;

  		//echo "<br>"." ชื่อ ".$row['Name'] ." ". $row['email'] ." ". $row['phone'];
  		?>
				<div class="row">
					<br>
					<div class="col-xs-4">
						<label>รหัสนิสิต</label>  
						<?php echo " : ".$q; ?> <br><br>
						<label>ชื่อ - นามสกุล</label> 
						<?php echo " : ".$row['Name']; ?> <br><br>
						<label>เบอร์โทรศัพท์</label>
						<?php echo " : ".$row['phone']; ?> <br><br>
						<label>อีเมลล์</label>
						<?php echo " : ".$row['email']; ?>
					</div>
					

				</div>
		<?php


	}
	if($found ==0)
	{
		?> 
		<div class="row" align = "center"><br><br>
			<div class="col-xs-8">
				ไม่พบข้อมูล
			</div>
		</div>
		<?php
	}
	

?>
</body>
</html>