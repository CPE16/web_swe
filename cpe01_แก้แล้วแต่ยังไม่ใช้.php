<?php
	require "config.php";
	require "layout.php";
	session_start();
	if(!isset($_SESSION['login_user']))
	{
		header('Location: login.php');
		exit;
	}


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
	<?php res() ?>

</head>

<body>
	<!-- <input id="typeahead-example"class="form-control" type="text" placeholder="Enter popular Indian city name"> -->
    <!--
       jQuery & other libraries
    -->
    <!-- Typeahead.js -->
    


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
								<p><b> 1 </b></p>
							</div>
							<div class="col-lg-2">
								<label>รหัสนิสิต</label>
								<div> <?php echo $id ?> </div>
								
							</div>
							<div class="col-sm-3">
								<label>ชื่อ - สกุล</label>
								<div> <?php echo $name ?> </div>
								
							</div>
							<div class="col-sm-2">
								<label>เบอร์โทรศัพท์</label>
								<div> <?php echo $phone ?> </div>
								
							</div>
							<div class="col-sm-2">
								<label>อีเมลล์</label>
								<div> <?php echo $email ?></div>
							</div>
							<div class="col-sm-2">
								<br>
								<!-- <button class="btn  btn-danger btn-sm">ลบ</button> -->
							</div>
						</div>
						<hr>
					</div>


<!-- <div id="txtHint"><b>Person info will be listed here...</b></div>
 -->
					<div class="row">
						<div class="container">							
					        <div class="col-sm-3">
					        	<label>กรอกรหัสนิสิต</label>
					        	 <div class="input-group date">
									<input id="ff" name="ff" class="form-control" type="text"  style="height: 28px; "onchange="showUser(this.value)"> 
								    <span class="input-group-btn"> 
								        <button type="button" class="btn btn-default" id="f">
								            <em class="fa fa-fw fa-search "></em>
								        </button>
								    </span>
								</div>
					        </div>
					        <div class="col-sm-9">
							<div id="txtHint" align = "center"><b> อิอิ </b>

					        </div>

							</script>

					        <!-- <div id="txtHint" align = "center"><b> อิอิ </b></div> -->
							<!-- <div class="col-sm-2">
								<br>
								<button class="btn  btn-primary btn-sm">เพิ่ม</button>
								<button class="btn  btn-danger btn-sm">ยกเลิก</button>
							</div> -->
				        </div>					    	
					</div>
					<br>
    			</div>
    			<!-- เพิ่ม สมาชิก -->
    			<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">



				  </div>
				</div>

				<div class="row" align="center">
					<div class="col-sm-12"><button type="button" class="btn btn-primary">บันทึก</button>  
						<button type="button" class="btn btn-success disabled">บันทึกและส่งแบบฟอร์ม</button>
					</div>
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