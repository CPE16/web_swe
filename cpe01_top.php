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
	var name = document.getElementById("sdnm").value;
	var email = document.getElementById("sdem").value;
	var phone = document.getElementById("sdph").value;
	document.getElementById("id2").innerHTML = id;
	document.getElementById("name2").innerHTML = name;
	document.getElementById("email2").innerHTML = email;
	document.getElementById("phone2").innerHTML = phone;
	// document.getElementById("id").innerHTML = id;

	setID2(id);
	clear();
	document.getElementById("member2").style.display = "block";
	var elem = document.getElementById("inputS");
	elem.value = id;
	abc();
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
	<input type="hidden" type="text" name="id" id="inputS"/>
</form>
 
<span id="result"></span>

	<div class="container">
	<!-- -->
  			<div class="jumbotron">
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

							

							<div class="row" id ="member2" style="display: none;">
								<hr>
								<div class="col-sm-1" align="center">
									<label>ลำดับที่</label>
									<h4> 2 </h4>
								</div>
								<div class="col-lg-2">
									<label>รหัสนิสิต</label>
									<p id="id2"> </p>
									
								</div>
								<div class="col-sm-3">
									<label>ชื่อ - สกุล</label>
									<p id="name2"></p>
									
								</div>
								<div class="col-sm-2">
									<label>เบอร์โทรศัพท์</label>
									<p id="phone2"></p>
									
								</div>
								<div class="col-sm-2">
									<label>อีเมลล์</label>
									<p id="email2"></p>
								</div>
								<div class="col-sm-2">
									<br>
									<button class="btn  btn-danger btn-sm" id="btn2">ลบ</button>
								</div>
							</div>
						
							<div class="row" id ="member2" style="display: none;">
								<hr>
								<div class="col-sm-1" align="center">
									<label>ลำดับที่</label>
									<h4> 3 </h4>
								</div>
								<div class="col-lg-2">
									<label>รหัสนิสิต</label>
									<p id="id3"> </p>
									
								</div>
								<div class="col-sm-3">
									<label>ชื่อ - สกุล</label>
									<p id="name3"></p>
									
								</div>
								<div class="col-sm-2">
									<label>เบอร์โทรศัพท์</label>
									<p id="phone3"></p>
									
								</div>
								<div class="col-sm-2">
									<label>อีเมลล์</label>
									<p id="email3"></p>
								</div>
								<div class="col-sm-2">
									<br>
									<button class="btn  btn-danger btn-sm" id="btn3">ลบ</button>
								</div>
							</div>
						<hr>
					</div>

					<div class="row">
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
							<div id="txtHint" align = "left"><b>   </b>
					        </div>
							</script>
				        </div>					    	
					</div>
					<br>
    			</div>			
    			</div> 
	</div>
	</div>
	<form>

</form>

 	<script data-cfasync="false" src="http://alexgorbatchev.com/pub/sh/current/scripts/shCore.js"></script>
    <script data-cfasync="false" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushXml.js"></script>
    <script data-cfasync="false" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushJScript.js"></script>
    <script data-cfasync="false" data-main="js/release.min" src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.1.17/require.min.js"></script>



<!-- ห้ามลบนะ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      (function($) {
        var cities, datums;
        datums = function(cities) {
          return function(query, callback) {
            var matches, regex;
            matches = [];
            regex = new RegExp(query, 'i');
            $.each(cities, function(i, city) {
              if (regex.test(city)) {
                return matches.push({
                  value: city
                });
              }
            });
            return callback(matches);
          };
        };
		cities = [<?php echo '"'.implode('","', $all_id).'"' ?>];
        $("#typeahead-example").typeahead({
          highlight: true,
          hint: true,
          minLength: 1
        }, {
          displayKey: "value",
          name: "cities",
          source: datums(cities)
        });
      })(jQuery);
    </script>

</body>
</html>