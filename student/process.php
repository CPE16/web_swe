<?php
require "config.php";
function have_a_project($id,$pdo)
{
	$sth = $pdo->prepare("SELECT * FROM project WHERE std1 = :id or std2 = :id or std3 = :id");
	$sth->bindParam(':id', $id, PDO::PARAM_STR);
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
		return true;
  	}
  	return false;
}
function login($usr,$pass,$type,$pdo)
{
	if($type == 0)
	{
			$login_type = "admin";
			$from = "adminregis";
	}
	else if($type==1) 
	{
			$login_type = "Student_ID";
			$from = "studentregis";
	}
	else 
	{
			$login_type = "Projressor_ID";
			$from = "profressorregis";
	}

	$sth = $pdo->prepare("SELECT * FROM $from WHERE $login_type = :usr and password = :psswrd");
	$sth->bindParam(':usr', $usr, PDO::PARAM_STR);
  	$sth->bindParam(':psswrd', $pass, PDO::PARAM_STR);
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
		return true;
  	}
  	return false;
}

function goback($message,$url)
{ ?>
	<script type="text/javascript">alert("<?php $message?>");window.location.href='<?php echo $url?>';</script>
 <?php
}

function success($user,$url)
{
		session_start();
		$_SESSION['login_user']= $user; // Initializing Session
		$status = "Success";
		header("location: $url");// Redirecting To Other Page
}
 function reset_temp($id,$pdo)
 {
 		$value = "0";
 		$sql = "UPDATE temp SET id =:value WHERE No = 3 or No = 2";
		$q = $pdo->prepare($sql);
		$q->execute(array(':value'=>$value));

		$sql = "UPDATE temp SET id =:value WHERE No = 1";
		$q = $pdo->prepare($sql);
		$q->execute(array(':value'=>$id));
 }
 function check_position($id,$pdo)
 {
 	$sth = $pdo->prepare("SELECT * FROM temp WHERE No = :id");
	$sth->bindParam(':id', $id, PDO::PARAM_STR);
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
  		if($row['id']=="0") // ยังว่าง
			return true;
  	}
  	return false; // ไม่ว่าง
 }
 function update_temp_member($id,$pdo)
 {
 	// ตรวจสอบว่า เป็น สมาชิกคนที่ 2 หรือ 3 โดย เชคว่า แถวแรก มีค่าเป็น 0 หรือ ไม่ ถ้าเป้น0คือ เป็นมาชิกคนที่ 2 ถ้าไม่ก็คนที่ 3

 	if(check_position("2",$pdo)) // 2
 	{
 		$sql = "UPDATE temp SET id =:id WHERE No = 2 ";
		$q = $pdo->prepare($sql);
		$q->execute(array(':id'=>$id));
 	}
 	else // 3
 	{
 		$sql = "UPDATE temp SET id =:id WHERE No = 3 ";
		$q = $pdo->prepare($sql);
		$q->execute(array(':id'=>$id));
 	}
 }
 function delete_temp_member($id,$pdo)
 {
 	$sql = "UPDATE temp SET id = 0 WHERE id = :id ";
 	$q = $pdo->prepare($sql);
	$q->execute(array(':id'=>$id));
 }

 function count_member($pdo)
 {
 	$No = 0;
	$sth = $pdo->prepare("SELECT * FROM temp");
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
  		if($row['id']!=0)
			$No++;
	}
  	return $No;
 }
 function Fetch_Data($id,$pdo)
 {
 	$sth = $pdo->prepare("SELECT * FROM students where Student_ID = $id");
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
  		return $row;
	}
 }
 function canAdd($id,$pdo) // ok
 {
 	$sth = $pdo->prepare("SELECT * FROM temp");
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
  		if($row['id']==$id) // ยังว่าง
			return false;
  	}
  	return true; // ไม่ว่าง
 }
 function advisorList($pdo)
 {
 	$sth = $pdo->prepare("SELECT * FROM advisor");
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
  		$var = $row['advisor_id'];
  		$name = $row['advisor_name'];
 	?>
			<option value = "<?php echo $var; ?>"><?php echo $name; ?></option>

 	<?php
 	}
 }

?>