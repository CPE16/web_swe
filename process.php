<meta charset = "utf-8">

<?php
require "config.php";
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
{ 
	echo "
	<script type='text/javascript'>
	alert('$message');
	window.location.href='$url' </script>
	";
}

function success($user,$url)
{
		session_start();
		$_SESSION['login_user']= $user; // Initializing Session
		$status = "Success";
		header("location: $url");// Redirecting To Other Page
}


function check_user($id,$pdo)
{
	$sth = $pdo->prepare("SELECT * FROM students WHERE Student_ID = :usr");
	$sth->bindParam(':usr', $id, PDO::PARAM_STR);
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
		return 1;
  	}
  	return 0;
}
 

 function check_position($id,$pdo)
 {
 	$sth = $pdo->prepare("SELECT * FROM temp WHERE id = :id");
	$sth->bindParam(':id', $id, PDO::PARAM_STR);
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
  		if($row['test']=="0") // ยังว่าง
			return true;
  	}
  	return false; // ไม่ว่าง
 }
 
 function update_temp_member($id,$pdo)
 {
 	// ตรวจสอบว่า เป็น สมาชิกคนที่ 2 หรือ 3 โดย เชคว่า แถวแรก มีค่าเป็น 0 หรือ ไม่ ถ้าเป้น0คือ เป็นมาชิกคนที่ 2 ถ้าไม่ก็คนที่ 3

 	if(check_position("2",$pdo)) // 2
 	{
 		$sql = "UPDATE temp SET test =:id WHERE id = 2 ";
		$q = $pdo->prepare($sql);
		$q->execute(array(':id'=>$id));
 	}
 	else // 3
 	{
 		$sql = "UPDATE temp SET test =:id WHERE id = 3 ";
		$q = $pdo->prepare($sql);
		$q->execute(array(':id'=>$id));
 	}
 }

 function canAdd($id,$pdo) // ok
 {
 	$sth = $pdo->prepare("SELECT * FROM temp");
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
  		if($row['test']==$id) // ยังว่าง
			return false;
  	}
  	return true; // ไม่ว่าง
 }

 function reset_temp($pdo)
 {
 		$value = "0";
 		$sql = "UPDATE temp SET test =:value WHERE id = 3 or id = 2";
		$q = $pdo->prepare($sql);
		$q->execute(array(':value'=>$value));
 }

 function count_member($pdo)
 {	
 	$amount = 0;
 	$sth = $pdo->prepare("SELECT * FROM temp");
    $sth->execute();
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
    {
        if($row['test']!=0)
        {
          $amount++;
        }
    }
    return $amount;
 }
?>


		   
