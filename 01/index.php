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
				<div class="panel-heading">นิสิตที่จะทำโครงงาน ชิป๊ะ</div>
					<div class="panel-body">

						<div  id="memberBoard"></div>	

					</div>
			</div>
			<div class="row">
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
					<div  id="Search_Area" align = "center"></div>
        		</div>
			</div>
		
		</div>




</body>
</html>

