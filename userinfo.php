<?php
 	include_once('config.php');
 	include_once('process.php');
 	// 	$sql = "INSERT INTO test (name,age) VALUES (:name,:age)";
		// $q = $pdo->prepare($sql);
		// $q->execute(array(':name'=>$_POST['name'],':age'= $_POST['age']));
		$id = $_POST['id'];
		// $sql = "UPDATE temp SET test = '1' WHERE id=:id";
		// $q = $pdo->prepare($sql);
		// $q->execute(array(':id'=>$id));
		update_temp_member($id,$pdo);
		//echo $id;
?>