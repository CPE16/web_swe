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

<html>
<meta charset = "utf-8">
<head>
	<title>CPE01</title>
	<?php res() ?>
</head>
<style type="text/css">
.card {
    position: relative;
    overflow: hidden;
    margin: 0.5rem 0 1rem 0;
    background-color: #fff;
    border-radius: 0px;
}
</style>
<body>
	<div class="container">
		<div class="card" align = "center"; style="width: 25%;margin-bottom: 0px;"> <label>ชื่อโครงงาน</label> </div>
		<div class="card " style="margin-top: 0px;margin-bottom: 20px; padding-bottom: 20px;" >
			<div class="col-lg-6">
				<label for="i-focused" class="control-label"> name-th </label>
				<input type="text" value="This is focused..." class="form-control">
			</div>
			<div class="col-lg-6">
				<label for="i-focused" class="control-label"> name-en </label>
				<input type="text" value="This is focused..." class="form-control">
			</div>
		</div>

		<div class="card" align = "center"; style="width: 25%;margin-bottom: 0px;"> <label>สมาชิก</label> </div>
		<div class="card " style="margin-top: 0px;margin-bottom: 20px; padding-bottom: 20px;" >
			<div class="row" align="center">
				<div class="col-sm-1">
					<label>ลำดับที่</label>
					<p><b> 1 </b></p>
				</div>
				<div class="col-lg-2">
					<label>รหัสนิสิต</label>
					<p> 55555555 </p>
				</div>
				<div class="col-sm-3">
					<label>ชื่อ - สกุล</label>
					<p> นาย นั่นโน่นนี่นั่น แหนแหนะ </p>
				</div>
				<div class="col-sm-2">
					<label>เบอร์โทรศัพท์</label>
					<p> 0888888888 </p>
				</div>
				<div class="col-sm-2">
					<label>อีเมลล์</label>
					<p> xxyyzzaabb@nu.ac.th </p>
				</div>
			</div>
			<div class="row" align="center">
				<div class="col-sm-2"></div>
				<div class="col-sm-2"> 
		    		<input type="text" class="form-control input-sm"></div>
				<div class="col-sm-2"></div>
			</div>
		</div>

		<div class="card" align = "center"; style="width: 25%;margin-bottom: 0px;"> <label>อาจารย์ที่ปรึกษา</label> </div>
		<div class="card" style="margin-top: 0px;margin-bottom: 20px; padding-bottom: 20px;padding-top: 20px;">
		<div class="col-sm-4"><label>1</label><select class="form-control" >
			  <option value="volvo">Volvo</option>
			  <option value="saab">Saab</option>
			  <option value="mercedes">Mercedes</option>
			  <option value="audi">Audi</option>
			</select>

		</div>
		<div class="col-sm-4"><label>2</label><select class="form-control" >
			  <option value="volvo">Volvo</option>
			  <option value="saab">Saab</option>
			  <option value="mercedes">Mercedes</option>
			  <option value="audi">Audi</option>
			</select></div>
		<div class="col-sm-4"><label>3</label><select class="form-control" >
			  <option value="volvo">Volvo</option>
			  <option value="saab">Saab</option>
			  <option value="mercedes">Mercedes</option>
			  <option value="audi">Audi</option>
			</select></div>
		</div>

	</div>
	<form>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</form>

 	<script data-cfasync="false" src="http://alexgorbatchev.com/pub/sh/current/scripts/shCore.js"></script>
    <script data-cfasync="false" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushXml.js"></script>
    <script data-cfasync="false" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushJScript.js"></script>
    <script data-cfasync="false" data-main="js/release.min" src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.1.17/require.min.js"></script>

</body>
</html>