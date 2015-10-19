<?php
require "config.php";
require "process.php";

	function getID($No,$pdo)
	{
		$sth = $pdo->prepare("SELECT id FROM temp where No = $No");
	  	$sth->execute();
	  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
	  	{
	  		return $row['id'];
		}
	}

	function Add($No,$isLast,$pdo)
	{
		$id = getID($No,$pdo);
		$data = Fetch_Data($id,$pdo);
		$last = $isLast;
		$name = $data['Name'];
		$phone = $data['phone'];
		$email = $data['email'];
		memberList($No,$id,$name,$phone,$email,$last);
	}

	$amount = count_member($pdo);
	if($amount=="1")
	{
			Add("1","n",$pdo);

	}
	else if($amount=="2")
	{
			Add("1","n",$pdo);
			Add("2","y",$pdo);
	}
	else
	{
			Add("1","n",$pdo);
			Add("2","n",$pdo);
			Add("3","y",$pdo);
	}
?>

<?php function memberList($no,$id,$name,$phone,$email,$last)
{
  ?>
  <hr>
         <div class="row" style="padding-bottom: 15px;">
              <br>
              <div class="col-lg-1" align="center">
                <label>ลำดับที่</label>
                <div> <?php echo $no ?> </div>                
              </div>
              <div class="col-lg-2">
                <label >รหัสนิสิต</label>
                <div> <?php echo $id ?> </div>                
              </div>
              <div class="col-sm-3">
                <label>ชื่อ - สกุล</label>
                <div> <?php echo $name; ?> </div>                
              </div>
              <div class="col-sm-2">
                <label>เบอร์โทรศัพท์</label>
                <div> <?php echo $phone; ?> </div>
                
              </div>
              <div class="col-sm-3">
                <label>อีเมลล์</label>
                <div> <?php echo $email; ?></div>
              </div>
              <div class="col-sm-1" align="center">
                <br>
                <?php if($last=="y"){ ?>
                  <button class="btn  btn-danger btn-sm" id="btn_del" onclick="Del('<?php echo $id;?>')">ลบ</button>
                <?php } ?>
              </div>
            </div>
<?php
}
?>