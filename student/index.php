<?php
	require "config.php";
	require "layout.php";
	require "process.php";
	session_start();
	$id = $_SESSION['login_user'] = "55362318";
	reset_temp($_SESSION['login_user'],$pdo);
?>


<html>
<head>
	<title>ทดสอบรอบที่ล้านละมั้ง</title>
	<?php res(); ?>
	<script type="text/javascript" src="js/script_for_cpe01.js"></script>

</head>
<body>
<script type="text/javascript">
	Addmember(<?php echo $id;?>);
</script>

<form id="myForm" action="userInfo.php" method="post">
	<input  type="hidden" type="text" name="add" id="inputS"/>
	<input  type="hidden" type="text" name="del" id="del"/>
	<input  type="hidden" type="text" name="opp" id="opp"/>
</form>
<span id="result"></span>
	<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="js/my_script.js" type="text/javascript"></script>
		<div class="container">
			
			<div class="panel panel-primary">
  				<div class="panel-heading">ชื่อโครงงาน</div>
  					<div class="panel-body">
  						<div class="col-lg-6">
  							<div class="row">
								<div class="col-xs-6">
									<label for="i-focused" class="control-label"> ชื่อภาษาไทย </label> 
								</div>
								<div class="col-xs-6" align="right">
									<label id = "nameThai" style="display: none"> 
										<p class="text-danger" style="margin-bottom: 0px;">ต้องเป็นภาษาไทย</p>
									</label>
								</div>
							</div>
							<div id ="thaiInput" class="form-group">
								<input  type="text" class="form-control" name = "name_thai" onchange = "checkThai(this.value)"/>	
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-xs-6">
									<label for="i-focused" class="control-label"> ชื่อภาษาอังกฤษ </label>
								</div>
								<div class="col-xs-6" align="right">
									<label id = "nameEng" style="display: none">
										<p class="text-danger" style="margin-bottom: 0px;">ต้องเป็นภาษาอังกฤษ</p>
									</label>
								</div>
							</div>
							<div id ="engInput" class="form-group">
								<input type="text"  class="form-control" name= "name_eng" onchange = "checkEng(this.value)"/>
							</div>
						</div>
					</div>
			</div> 

			<div class="panel panel-primary">
				<div class="panel-heading">นิสิตที่จะทำโครงงาน ชิป๊ะ</div>
					<div class="panel-body">

						<div  id="memberBoard"></div>	
						<div  id="Search_Area"></div>
					</div>
			</div>
			<div class="row" style="margin-bottom: 15px;">
				<div class="col-sm-2">
		        	<label>กรอกรหัสนิสิต</label>
		        	 <div class="input-group date">					        	 	
						<input id="search_input" name="search_input" class="form-control" type="text"  style="height: 28px; "onchange="Search_User(this.value); "> 
					    <span class="input-group-btn"> 
					        <button type="button" class="btn btn-default" id="f">
					            <em class="fa fa-fw fa-search "></em>
					        </button>
					    </span>
					</div>
				</div>

				<div class="col-sm-10" align="center">
					<!-- <div  id="Search_Area" align = "center"></div> -->
        		</div>
			</div>


			<div class="panel panel-primary">
				<div class="panel-heading">อาจารย์</div>
					<div class="panel-body">
						<div class="col-sm-4">
							<select id ="pro1" name = "pro1" onchange="CheckValue()" class="form-control">
								<option value = "G00">กรุณาเลือกอาจารย์ที่ปรึกษาโครงงาน</option>
								<?php advisorList($pdo); ?>
							</select>
						</div>
						<div class="col-sm-4">
							<select id ="pro2" name = "pro2" onchange="CheckValue()"  class="form-control">
								<option value = "G00">กรุณาเลือกอาจารย์ที่ปรึกษาโครงงาน</option>
								<?php advisorList($pdo); ?>
							</select>
						</div>
						<div class="col-sm-4">
							<select id ="pro3" name = "pro3" onchange="CheckValue()"  class="form-control">
								<option value = "G00">กรุณาเลือกอาจารย์ที่ปรึกษาโครงงาน</option>
								<?php advisorList($pdo); ?>
							</select>
						</div>	
					</div>
			</div>
			<div class="row" align="center">
				<span id = "pro" style="display: none"><p class="text-danger">ไม่สามารถเลือกอาจารย์และกรรมการซ้ำคนได้</p></span>

			</div>
			<div class="row" align ="center">

				  <button id = "submit"type="button" class="btn btn-success" onclick="CheckSubmitClick()" disabled>ยืนยัน</button>
			</div>
		</div>




</body>
</html>

