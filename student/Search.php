<?php


require "process.php";
/*
- เช็กว่า id มีอยู่ใน database หรือไม่
- เช็กว่า id ซ้ำกับ id ที่มีอยู่ในโครงงานหรือไม่
- เช็คว่า id มีโครงงานอยู่แล้วหรือไม่
- เช็คว่าเป็น นิสิต หรือไม่
*/

session_start();
if(!isset($_SESSION['login_user']))
{
	header('Location: login.php');
	exit;
}

$id = $_GET['id'];
if($_SESSION['login_user']==$id)

	{?> 
<!-- 			<div class="row" align = "center">
				<div class="row"> -->
					<div class="alert alert-danger alert-dismissable" align="center">   
   					<strong>ขออภัย </strong> 
   					<a class="alert-link">ไม่สามารถเพิ่มตัวเองได้</a> 
<!-- 				</div>
			</div> -->
		<?php
		die();
	}
if(!canAdd($id,$pdo))
{?> 
			<!-- <div class="row" align = "center"> -->
					<div class="alert alert-danger alert-dismissable" align="center">   
   					<strong>รหัสนิสิต </strong> 
   					<a class="alert-link"><?php echo $id; ?> </a></b>ถูกเพิ่มไปก่อนหน้านี่แล้ว</a> 
			<!-- </div> -->
		<?php
		die();

}
if(count_member($pdo)==3)
{
?> 
<!-- 			<div class="row" align = "center">
				<div class="row"> -->
					<div class="alert alert-danger alert-dismissable" align="center">   
   					<strong>ขออภัย </strong> 
   					<a class="alert-link">สมาชิกเต็มแล้ว หากต้องการเพิ่ม โปรดติดต่อ อาจารย์ประจำวิชา</a> 
				</div>
<!-- 				</div>
			</div> -->
		<?php
		die();
}



	$sth = $pdo->prepare("SELECT * FROM students WHERE Student_ID = :id");
	$sth->bindParam(':id', $id, PDO::PARAM_STR);
  	$sth->execute();
  	$found = 0;
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC))  
  	{
  		$found++;
  		if(check_position("2",$pdo))
  			$No = "2";
  		else
  			$No = "3";
  		?>
  			
					<!-- <div class="card" align="center"> -->
						<!-- <hr> -->
						<div class="row" style="padding-bottom: 15px;">
							<br>
							  <div class="col-lg-1" align="center">
							  	<label>ลำดับที่</label>
                				<div> <?php echo $No ?> </div> 
             
				              </div>
							<div class="col-lg-2">
								<label>รหัสนิสิต</label>
								<div> <?php echo $id ?> </div>
								
							</div>
							<div class="col-sm-3">
								<label>ชื่อ - สกุล</label>
								<div> <?php echo $row['Name']; ?> </div>
								
							</div>
							<div class="col-sm-2">
								<label>เบอร์โทรศัพท์</label>
								<div> <?php echo $row['phone']; ?> </div>
								
							</div>
							<div class="col-sm-3">
								<label>อีเมลล์</label>
								<div> <?php echo $row['email']; ?></div>
							</div>
							<div class="col-sm-1" align ="center">
								<br>
									<button class="btn  btn-success btn-sm" id="clickAdd" onclick="Addmember('<?php echo $id;?>')">เพิ่ม</button>
							</div>
						</div>
					<!-- </div> -->

		<?php
	}




if($found == 0)
	{
		?> 
<!-- 		<div class="row" align = "center">
			<div class="row"> -->
				<div class="alert alert-danger alert-dismissable" align="center">   
   					<strong>ไม่พบรหัสนิสิต </strong> 
   					<a class="alert-link"><?php echo $id ; ?></a> โปรดตรวจสอบรหัสนิสิต ก่อนค้นหา
				</div>
<!-- 			</div>
		</div> -->
		<?php
	}
?>







