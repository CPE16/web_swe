<?php
	require "config.php";
	require "layout.php";
	require "process.php";
	session_start();
	if(!isset($_SESSION['login_user']))
	{
		header('Location: login.php');
		exit;
	}

	reset_temp($pdo);
	$id =  $_SESSION['login_user'];

	$sth = $pdo->prepare("SELECT * FROM students WHERE Student_ID = :id");
	$sth->bindParam(':id', $id, PDO::PARAM_STR);
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
		$name =  $row['Name'];
		$email = $row['email'];
		$phone = $row['phone'];
  	}


  	$sth = $pdo->prepare("SELECT Student_ID FROM students"); // ลอง คิวรี่ รหัสนิสิตทุกคนเข้าใส่ อาเรย์
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
  		$all_id[] = $row['Student_ID'];
  	}
?>

<html>
<meta charset = "utf-8">
<head>
	<title>CPE01</title>
	<?php res(); ?>

</head>
<script type="text/javascript">

function clear()
{
	document.getElementById("ff").value = "";
	document.getElementById("s_id").innerHTML = "";
}


function setID2(id)
{
	$(document).ready(function(){
	    // $("button").click(function(){
	        $.post("test.php",
	        {
	          name: "ddd"
	        },
	        function(data,status){
	            //alert("Data: " + data + "\nStatus: " + status);
	        });
	    });
	// });
}
function Addmember()
{
	  var id = document.getElementById("sdid").value;
	 setID2(id);
	 clear();
	 var elem = document.getElementById("inputS").value = id;
	 abc();
	 PrintMember(" ");
	 PrintMember(" ");
	 PrintMember(" ");
	 PrintMember(" ");
	 var ids = document.getElementById("chk").value;
	 if(ids=="end")
	 {
	 	document.getElementById("search_field").style.display = "hidden";
	 }
	 else
	 {
	 	document.getElementById("search_field").style.display = "block";
	 }


}
function abc()
{
		 $.post( $("#myForm").attr("action"), 
		         $("#myForm :input").serializeArray(), 
		         function(info){ $("#result").html(info); 
		   });
		 //clearInput();
		 
		$("#myForm").submit( function() {
		  return false;	
		});
}

</script>


<body> 
<form id="myForm" action="userInfo.php" method="post">
	<input  type="hidden" type="text" name="id" id="inputS"/>
</form>
 
<span id="result"></span>

	<div class="container">
	<!-- -->
  			<!-- <div class="jumbotron"> -->
    			<p class="text-center">แบบเสนอหัวข้อโครงงานวิศวกรรมคอมพิวเตอร์</p>   
    			
    			<div class="panel panel-primary">
      				<div class="panel-heading">ชื่อโครงงาน</div>
      					<div class="panel-body">
      						<div class="col-lg-6">
								<label for="i-focused" class="control-label"> ชื่อภาษาไทย </label>
								<input type="text" class="form-control" name = "name_thai" onchange = "checkThai(this.value)"/>
								<label id = "nameThai" style="display: none">ชื่อต้องประกอบด้วยภาษาไทย และต้องไม่ประกอบด้วยเว้นวรรค</label>

							</div>
							<div class="col-lg-6">
								<label for="i-focused" class="control-label"> ชื่อภาษาอังกฤษ </label>
								<input type="text"  class="form-control" name= "name_eng" onchange = "checkEng(this.value)"/>
								<label id = "nameEng" style="display: none">ชื่อต้องประกอบด้วยภาษาอังกฤษ</label>
							</div>
						</div>
    			</div> 


    			<div class="panel panel-primary">
      				<div class="panel-heading">รายชื่อนิสิตผู้ทำโครงงาน</div>
      					<div class="panel-body" style="padding-bottom: 0px;">
      						<div class="row" >
								<div class="col-sm-1" align="center">
									<label>ลำดับที่</label>
									<h4> 1 </h4>
								</div>
								<div class="col-lg-2">
									<label>รหัสนิสิต</label>
									<h4> <?php echo $id ?> </h4>
									
								</div>
								<div class="col-sm-3">
									<label>ชื่อ - สกุล</label>
									<h4> <?php echo $name ?> </h4>
									
								</div>
								<div class="col-sm-2">
									<label>เบอร์โทรศัพท์</label>
									<h4> <?php echo $phone ?> </h4>
									
								</div>
								<div class="col-sm-2">
									<label>อีเมลล์</label>
									<h4> <?php echo $email ?></h4>
								</div>
								<div class="col-sm-2">
									<br>
									<!-- <button class="btn  btn-danger btn-sm">ลบ</button> -->
								</div>
							</div>
							
							
								<div id="memberBoard" align = "left"><b> </b>
					        
							
						<hr>
					</div>

					<div class="row" id="search_field" style="display: block;">
						<div class="container">							
					        <div class="col-sm-3">
					        	<label>กรอกรหัสนิสิต</label>
					        	 <div class="input-group date">					        	 	
					        	 	<?php $_id2 = "";?>
									<input id="ff" name="ff" class="form-control" type="text"  style="height: 28px; "onchange="showUser(this.value,'<?php echo $_id2 ?>')"> 
								    <span class="input-group-btn"> 
								        <button type="button" class="btn btn-default" id="f">
								            <em class="fa fa-fw fa-search "></em>
								        </button>
								    </span>
								</div>
					        </div>
					        <div class="col-sm-9">
							<div id="txtHint" align = "left" class"row"><b>   </b>
					        </div>
				        </div>					    	
					</div>
					<br>
    			</div>			
    			</div> 
	<!-- </div> -->
	</div>
	<form>

</form>

 	<script data-cfasync="false" src="http://alexgorbatchev.com/pub/sh/current/scripts/shCore.js"></script>
    <script data-cfasync="false" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushXml.js"></script>
    <script data-cfasync="false" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushJScript.js"></script>
    <script data-cfasync="false" data-main="js/release.min" src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.1.17/require.min.js"></script>
</body>
</html>