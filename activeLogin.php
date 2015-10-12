<?php
require "process.php";

if(isset($_POST['username']) and isset($_POST['password']))
{
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$isBind = "no";
	$isBind = login($user,$pass,"1",$pdo);
  	if($isBind)
  	{
		  success($user,'student-page.php');
  	}
  	else
  	{
  		$isBind = login($user,$pass,"2",$pdo);
  		if($isBind)
  		{
	  		success($user,'pro-page.php');
  		}
  		else
  		{
  			$isBind = login($user,$pass,"0",$pdo);
  			if($isBind)
	  		{
		  		success($user,'admin-page.php');
	  		}
	  		else
	  		{
	  			goback("username หรือ password ไม่ถูกต้อง","login.php");
	  		}
  		}
  	}
}
else
{
	goback("username หรือ password ไม่ถูกต้อง","login.php");
}

?>