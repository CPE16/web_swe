<?php
	require "config.php";
	require "layout.php";
?>

<html>
<meta charset = "utf-8">
<head>
	<title>CPE01</title>
	<?php res() ?>
</head>

<body>
	<div class="container">
	<!-- -->
  			<div class="jumbotron">
    			<p class="text-center">แบบเสนอหัวข้อโครงงานวิศวกรรมคอมพิวเตอร์</p>   
    			
    			<div class="panel panel-primary">
      				<div class="panel-heading">ชื่อโครงงาน</div>
      					<div class="panel-body">
      						<div class="col-lg-6">
								<label for="i-focused" class="control-label"> ชื่อภาษาไทย </label>
								<input type="text" value="This is focused..." class="form-control">
							</div>
							<div class="col-lg-6">
								<label for="i-focused" class="control-label"> ชื่อภาษาอังกฤษ </label>
								<input type="text" value="This is focused..." class="form-control">
							</div>
						</div>
    			</div> 


    			<div class="panel panel-primary">
      				<div class="panel-heading">รายชื่อนิสิตผู้ทำโครงงาน</div>
      					<div class="panel-body">
      						<div class="row" >
							<div class="col-sm-1" align="center">
								<label>ลำดับที่</label>
								<p><b> 1 </b></p>
							</div>
							<div class="col-lg-2">
								<label>รหัสนิสิต</label>
								<div> 55555555 </div>
								
							</div>
							<div class="col-sm-3">
								<label>ชื่อ - สกุล</label>
								<div> นาย น่ารัก อิอิ </div>
								
							</div>
							<div class="col-sm-2">
								<label>เบอร์โทรศัพท์</label>
								<div> 0888888888 </div>
								
							</div>
							<div class="col-sm-2">
								<label>อีเมลล์</label>
								<div> jubjub@nu.ac.th</div>
							</div>
							<div class="col-sm-2">
								<br>
								<!-- <button class="btn  btn-danger btn-sm">ลบ</button> -->
							</div>
						</div>
						<hr>
					</div>	
					<div class="row">
						<div class="container">
					        <div class="col-sm-3">
					        	<label>กรอกรหัสนิสิต</label>
					        	 <div class="input-group date">
								    <input type="text" class="form-control" style="height: 28px;"> 
								    <span class="input-group-btn"> 
								        <button type="button" class="btn btn-default">
								            <em class="fa fa-fw fa-search "></em>
								        </button>
								    </span>
								</div>
					        </div>
					        <div class="col-sm-3">
								<br>
								<div><label> ชื่อที่พบ </label></div>
								
							</div>
							<div class="col-sm-2">
								<br>
								<div><label> เบอร์ที่พบ </label></div>
								
							</div>
							<div class="col-sm-2">
								<br>
								<div><label> อีเมลล์ที่พบ </label></div>
							</div>
							<div class="col-sm-2">
								<br>
								<button class="btn  btn-primary btn-sm">เพิ่ม</button>
								<button class="btn  btn-danger btn-sm">ยกเลิก</button>
							</div>

				        </div>					    	
					</div>
					<br>
    			</div>
    			<!-- เพิ่ม สมาชิก -->
    			<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h5 class="modal-title">เพิ่มสมาชิก</h5>
				      </div>
				      <div class="modal-body">
				        <label>กรอกรหัสนิสิต</label><br>
				        <div class="col-sm-4">
				        	 <div class="input-group date">
							    <input type="text" class="form-control" style="height: 28px;"> 
							    <span class="input-group-btn"> 
							        <button type="button" class="btn btn-default">
							            <em class="fa fa-fw fa-search hidden-xs"></em>
							        </button>
							    </span>
							</div>
				        </div>

				        <br><br>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>

				  </div>
				</div>

    			<div class="panel panel-primary">
      				<div class="panel-heading">อาจารย์ที่ปรึกษาและกรรมการ</div>
      					<div class="panel-body">
      						<div class="col-sm-4"><label>1</label>
      							<select class="form-control" >
								  <option value="volvo">Volvo</option>
								  <option value="saab">Saab</option>
								  <option value="mercedes">Mercedes</option>
								  <option value="audi">Audi</option>
								</select>
							</div>
							<div class="col-sm-4"><label>2</label>
								<select class="form-control" >
								  <option value="volvo">Volvo</option>
								  <option value="saab">Saab</option>
								  <option value="mercedes">Mercedes</option>
								  <option value="audi">Audi</option>
								</select>
							</div>
							<div class="col-sm-4"><label>3</label>
								<select class="form-control" >
								  <option value="volvo">Volvo</option>
								  <option value="saab">Saab</option>
								  <option value="mercedes">Mercedes</option>
								  <option value="audi">Audi</option>
								</select>
							</div>
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

</body>
</html>