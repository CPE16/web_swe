เตรียมเก็บ <br>
<?php
require "process.php";
function getID($no,$pdo)
{
	$sth = $pdo->prepare("SELECT * FROM temp where No = $no");
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC))
  	{
  		return $row['id'];
  	}
  	return null;
}

$nth = $_GET['nth'];
$nen = $_GET['nen'];
$p1  = $_GET['p1'];
$p2  = $_GET['p2'];
$p3  = $_GET['p3'];
$id1 = getID("1",$pdo);
$id2 = getID("2",$pdo);
$id3 = getID("3",$pdo);
	

$statement = $pdo->prepare("INSERT INTO project(nameThai, nameEng, std1 , std2, std3 ,pro1 ,pro2 ,pro3)
    VALUES(:nth, :nen, :s1,:s2,:s3,:p1,:p2,:p3)");
	$statement->execute(array(
    "nth" => $nth,
    "nen" => $nen,
    "s1" => $id1,
    "s2" => $id2,
    "s3" => $id3,
    "p1" => $p1,
    "p2" => $p2,
    "p3" => $p3
));
		session_start();
		$_SESSION['save_success'] = "success"; // Initializing Session
		
?>
