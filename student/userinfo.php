<?php
 	include_once('config.php');
 	include_once('process.php');

 	// 	if(isset($_POST['add']))
 	// 	{
 	// 		
 	// 		echo "Add -> ".$_POST['add']."<br>";
 	// 		
 	// 	}
 		//$id = $_POST['add'];
		// update_temp_member($id,$pdo);
		// //echo $name;
		// if(isset($_POST['del']))
		// {
		// 	echo "del -> ".$_POST['del']."<br>";
		// 	delete_temp_member($id,$pdo);
		// }

		$add = $_POST['add'];
		$del = $_POST['del'];
		$opp = $_POST['opp'];

		

		if($opp=="del")
		{
			delete_temp_member($del,$pdo);
		}
		else if($opp=="add")
		{
			update_temp_member($add,$pdo);
		}

		//echo "opp - >" . $opp . " " . $add . " " . $del ;
?>

