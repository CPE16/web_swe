<input type="hidden" name="chk" id = "chk" value="end" />  
<?php
  require "config.php";
  require "layout.php";
  require "process.php";

    $amount = count_member($pdo);
    if($amount==1)
    {
        printMember("2",$pdo,"y");
    }
    else
    {
        printMember("2",$pdo,"n");
        printMember("3",$pdo,"y");
        ?>
        <input type="hidden" name="chk" id = "chk" value="end" />  
        <?php
    }

function printMember($Number,$pdo,$last)
{
        $sth = $pdo->prepare("SELECT * FROM temp where id = $Number ");
        $sth->execute();
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
        {
            $this_id = $row['test'];
            $sth = $pdo->prepare("SELECT * FROM students WHERE Student_ID = :id");
            $sth->bindParam(':id', $this_id, PDO::PARAM_STR);
            $sth->execute();
            while ($rows = $sth->fetch(PDO::FETCH_ASSOC)) 
            {
              $name =  $rows['Name'];
              $email = $rows['email'];
              $phone = $rows['phone'];
              memberList("$Number","$this_id","$name","$phone","$email","$last");
            }
        }
}
?>
<?php function memberList($no,$id,$name,$phone,$email,$last)
{
  ?>
  <hr>
    <div class="row" >
        <div class="col-sm-1" align="center">
          <label>ลำดับที่</label>
          <h4> <?php echo $no ?> </h4>
        </div>
        <div class="col-lg-2">
          <label>รหัสนิสิต</label>
          <h4> <?php echo $id; ?> </h4>
          
        </div>
        <div class="col-xs-3">
          <label>ชื่อ - สกุล</label>
          <h4> <?php echo $name; ?> </h4>
          
        </div>
        <div class="col-xs-2">
          <label>เบอร์โทรศัพท์</label>
          <h4> <?php echo $phone; ?> </h4>
        </div>
        <div class="col-xs-2 span6">
          <label>อีเมลล์</label>
          <h4> <?php echo $email; ?></h4>
        </div>
        <div class="col-lg-2">
          <br>
          <?php if($last=="y"){ ?>
            <button class="btn  btn-danger btn-sm" id="btn_del">ลบ</button>
            <?php } ?>
        </div>
    </div>
<?php
}
?>