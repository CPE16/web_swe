<?php
   require "../config.php";
   require "code_page.php";
   require "process.php";
   require "layout.php";

   session_start();
   if(!isset($_SESSION['login_user']))
   {
      header('Location: ../login.php');
      exit;
   }
   $id = $_SESSION['login_user'];
   reset_temp($_SESSION['login_user'],$pdo);
   $sth = $pdo->prepare("SELECT * FROM students WHERE Student_ID = :id");
   $sth->bindParam(':id', $id, PDO::PARAM_STR);
   $sth->execute();
   while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
   {

         $name = $row['Name'];
         $pic_url = $row["pic_url"];
         $email = $row["email"];
         $faculty = $row["Faculty"];
   }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Starter</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include_css(); ?>
    <?php res(); ?>
    <link rel="stylesheet" href="css/animate.min.css">
    <script type="text/javascript" src="js/script_for_cpe01.js"></script>

  </head>
  <body class="hold-transition skin-blue   sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
        <?php 
          main_header($name);
        ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <?php Sidebar_user_panel($name,$id); ?>
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">แบบฟอร์ม</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="student-page.php"><i class="fa fa-link"></i> <span>หน้ารวม คิดชื่อไม่ออก</span></a></li>
            <li class="active"><a href="cpe01.php"><i class="fa fa-link"></i> <span>CPE01</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>CPE02</span></a></li>
            <li class="treeview">
             <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#">Link in level 2</a></li>
                <li><a href="#">Link in level 2</a></li>
              </ul>
            </li>
          </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: auto;">
        <!-- Content Header (Page header) -->
<!--         <section class="content-header">
          <h1>
            Page Header
            <small>Optional description</small>
          </h1>

        </section> -->

        <!-- Main content -->
        <section class="content">

          
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

						<div  id="memberBoard" class="fade in"></div>	
						<div  id="Search_Area" class="fade in"></div>
					</div>
			</div>
			<div class="row" style="margin-bottom: 15px;">
				<div class="col-sm-3">
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

				<div class="col-sm-9" align="center">
					<!-- <div  id="Search_Area" align = "center"></div> -->
        		</div>
			</div>


			<div class="panel panel-primary">
				<div class="panel-heading">อาจารย์</div>
					<div class="panel-body">
						<div class="col-sm-4">
							<div id ="p01" class="form-group">
							<select id ="pro1" name = "pro1" onchange="CheckValue()" class="form-control">
								<option value = "G00">กรุณาเลือกอาจารย์ที่ปรึกษาโครงงาน</option>
								<?php advisorList($pdo); ?>
							</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div id ="p02" class="form-group">
							<select id ="pro2" name = "pro2" onchange="CheckValue()"  class="form-control">
								<option value = "G00">กรุณาเลือกอาจารย์ที่ปรึกษาโครงงาน</option>
								<option value = "N00">ไม่มี</option>	
								<?php advisorList($pdo); ?>
							</select>
						</div>
						</div>
						<div class="col-sm-4">
							<div id ="p03" class="form-group">
							<select id ="pro3" name = "pro3" onchange="CheckValue()"  class="form-control">
								<option value = "G00" >กรุณาเลือกอาจารย์ที่ปรึกษาโครงงาน</option>
								<?php advisorList($pdo); ?>
							</select>
							</div>
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



        </section>
      </div>

      <!-- Main Footer -->
      <?php foot('cpe01') ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <?php include_js(); ?>

  </body>
</html>
