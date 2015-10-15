<?php

	require "config.php";
	require "layout.php";
	require "process.php";
	session_start();
	if(!isset($_SESSION['login_user']))
	{
		header('Location: login.php');
		exit;
	}
	if(isset($_POST['name']))
	{
		echo $_POST['name'];

	}

	// function check_prepareMember($id,$pdo)
	//  {
	//  	$sth = $pdo->prepare("SELECT * FROM temp WHERE id = :id");
	// 	$sth->bindParam(':id', $id, PDO::PARAM_STR);
	//   	$sth->execute();
	//   	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
	//   	{
	//   		if($row['test']==0) // ยังว่าง
	// 			return true;
	//   	}
	//   	return false; // ไม่ว่าง
	//  }
	?>
<!DOCTYPE html>
<html>
<head>
	<?php res(); ?>
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
			<div class="row" align = "center">
				<div class="col-xs-8">
					ไม่สามารถเพิ่มตัวเองได้
				</div>
			</div>
		<?php
		die();
	}
	if(!canAdd($q,$pdo))
	{
		?> 
			<div class="row" align = "center">
				<div class="col-xs-8">
					รหัส :: <?php echo $q; ?> ถูกเพิ่มไปแล้ว 
				</div>
			</div>
		<?php
		die();
	}
	// if(canAdd($q,$pdo))
	// {
	// 	die("ok");
	// }
	// else
	// {
	// 	die("มึงเพิ่มไปแล้วป๊ะ");
	// }

	// if(check_prepareMember($q,$pdo))
	// {
	// 	die("ยังไม่มี");
	// }
	// else
	// {
	// 	die("มีแล้ว");	
	// }
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC))  
  	{
  		$found++;
  		?>
				<!--  -->




				<input type="hidden" name="sdid" id = "sdid" value="<?php  echo $q; ?>" />	
				<input type="hidden" name="sdnm" id = "sdnm" value="<?php  echo $row['Name']; ?>" />	
				<input type="hidden" name="sdph" id = "sdph" value="<?php  echo $row['phone']; ?>" />	
				<input type="hidden" name="sdem" id = "sdem" value="<?php  echo $row['email']; ?>" />	

				<div class="col-lg-12" id="s_id" >
					<div class="card">
						<div class="container" style="padding-bottom: 15px;">
							<br>
							<div class="col-lg-2">
								<label>รหัสนิสิต</label>
								<div> <?php echo $q ?> </div>
								
							</div>
							<div class="col-sm-3">
								<label>ชื่อ - สกุล</label>
								<div> <?php echo $row['Name']; ?> </div>
								
							</div>
							<div class="col-sm-3">
								<label>เบอร์โทรศัพท์</label>
								<div> <?php echo $row['phone']; ?> </div>
								
							</div>
							<div class="col-sm-3">
								<label>อีเมลล์</label>
								<div> <?php echo $row['email']; ?></div>
							</div>
							<div class="col-sm-1">
								<br>
								<button class="btn  btn-danger btn-xs" id="clickAdd" onclick="Addmember()">เพิ่ม</button>
							</div>
						</div>
					</div>
				</div>
		<?php
	}
	if($found ==0)
	{
		?> 
		<div class="row" align = "center">
			<div class="col-xs-8">
				ไม่พบข้อมูล
			</div>
		</div>
		<?php
	}
?>
</body>
</html>