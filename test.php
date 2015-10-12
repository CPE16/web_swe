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
	<?php res() ?>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
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
		<div class="row"> <p class="text-danger">ตลกละ </p> </div>

		<?php
		die();
		}

  	while ($row = $sth->fetch(PDO::FETCH_ASSOC))  
  	{
  		$found++;
	    ?>
	    <div class="col-sm-3">
			<label> <?php echo $row['Name']; ?> </label>
			
		</div>
		<div class="col-sm-2">
			<div><label> <?php echo $row['phone']; ?> </label></div>
			
		</div>
		<div class="col-sm-2">
			<div><label> <?php echo $row['email']; ?> </label></div>
		</div>
		<?php
	}
	if($found ==0)
	{
		?>
		<div class="row"> ไม่เจอ <?php echo $q ?></div>
		<?php
	}
	

?>
</body>
</html>