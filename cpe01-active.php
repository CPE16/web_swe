<?php
	session_start();
	require "config.php";
	require "process.php";
	$name_thai =  $_POST["name_thai"];
	$name_eng = $_POST["name_eng"];
	$std1 = $_SESSION['login_user'];
	$std2 = $_POST["id_std2"];
	$std3 = $_POST["id_std3"];
	$pro1 = $_POST["pro1"];
	$pro2 = $_POST["pro2"];
	$pro3 = $_POST["pro3"];



	$haveUser2 = check_user($std2,$pdo);
	$haveUser3 = check_user($std3,$pdo);

	// echo " -> ".$haveUser2;
	// echo " -> ".$haveUser3;

	// if($haveUser2 == 0 || $haveUser3 ==0 and $std2==null||$std3==null)
	// {	
	// 	if($haveUser2 == 0)
	// 	{
	// 		$comd = "ไม่มีรหัส ".$std2." อยู่ในระบบ";
	// 		goback($comd,"cpe01.php");
	// 		die();
	// 	}
	// 	else if ($haveUser3 == 0)
	// 	{
	// 		$comd = "ไม่มีรหัส ".$std3." อยู่ในระบบ";
	// 		goback($comd,"cpe01.php");
	// 		die();
	// 	}
	// 	else
	// 	{
	// 		$comd = "ไม่มีรหัส ".$std2." และ ".$std3." อยู่ในระบบ";
	// 		goback($comd,"cpe01.php");
	// 		die();
	// 	}
	// }
	if($name_thai == null || $name_eng == null)
	{
		goback("ชื่อโครงงานไม่ถูกต้อง","cpe01.php");
		die();
	}
	// if($name_thai == null || $name_eng == null || $std1 == null || $pro1 == null ||$pro2 == null || $pro3 == null )
	// {
	// 	header("Refresh:0.1; url=cpe01.php");	
	// }

	if($std2!=null||$std3!=null)
	{
		if($std1==$std2||$std1==$std3||$std2==$std3)
		{
			goback("สมาชิกไม่ถูกต้อง1","cpe01.php");
			die();
		}
	}
	if($haveUser2 == 0 || $haveUser3 == 0)
	{
		if($haveUser2==0 && $haveUser3!="" && $haveUser2!="")
		{
			goback("สมาชิกไม่ถูกต้อง2","cpe01.php");
			die();
		}
		if($haveUser3==0 && $haveUser3!="")
		{
			goback("สมาชิกไม่ถูกต้อง3","cpe01.php");
			die();	
		}
		if($haveUser2==0 && $haveUser3==0 && $haveUser3!="" && $haveUser2!="")
		{
			goback("สมาชิกไม่ถูกต้อง4","cpe01.php");
			die();	
		}
		if($haveUser2 == 0 && $haveUser3 == 0)
		{
			goback("สมาชิกไม่ถูกต้อง5","cpe01.php");
			die();	
		}
		// if($haveUser2 == 0)
		// {
		// 	goback("สมาชิกไม่ถูกต้อง6","cpe01.php");
		// 	die();	
		// }
		// if($haveUser3 == 0)
		// {
		// 	goback("สมาชิกไม่ถูกต้อง7","cpe01.php");
		// 	die();	
		// }

	}


		$sql_check = "SELECT ID FROM comsystem.project_status WHERE ID = '".$std1."' or ID = '".$std2."' or ID = '".$std3."'";
			
		$query_check =  mysql_query($sql_check) or die(mysql_error());
		 $rows_check =  mysql_num_rows($query_check);
		 if($rows_check > 0){
			while($rs = mysql_fetch_array($query_check) ){
			echo "<font size ='5' color='#2c3e50'> สมาชิกรหัสนิสิต ".$rs['ID']." <br>";
			}
			echo "มีชื่อร่วมโครงงานในระบบ <a href='cpe01.php'><button>BACK.</button></a><hr>";
		 }
		else
		{
			$sql = "INSERT INTO comsystem.createproject(nameThai,nameEng,std1,std2,std3,pro1,pro2,pro3) VALUES('$name_thai','$name_eng','$std1','$std2','$std3','$pro1','$pro2','$pro3')";
			$sql2 = "INSERT INTO comsystem.project_status(ID,status_ID,status_title) VALUES('$std1','1','CPE01')";
			$sql3 = "INSERT INTO comsystem.project_status(ID,status_ID,status_title) VALUES('$std2','1','CPE01')";
			$sql4 = "INSERT INTO comsystem.project_status(ID,status_ID,status_title) VALUES('$std3','1','CPE01')";
	
		if($std1 !=null)
		{
			mysql_query($sql2);
		}
		if($std2 != null)
		{
			mysql_query($sql3);
		}
		if($std3!=null)
		{
			mysql_query($sql4);
		}
		if(mysql_query($sql)){
	header("Refresh:0.1; url=appform.php");
		}
	else
	{
	echo mysql_error();
	}
		}
	

	
	 
   

?>
