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
			
			<div class = "container" >
		<div class= "row blue lighten-5 z-depth-1" align="center">	
		<strong><font face="Browallia New" size="+3" color="#222D32">สมาชิกกลุ่ม IRON</font></strong><br>
		<strong><font face="Browallia New" size="+2" color="#222D32">เป็นส่วนหนึ่งของรายวิชา วิศวกรรมระบบคอมพิวเตอร์  
			 ภาคการศึกษา 2557 / 2  ที่ปรึกษา <a href="http://www.ecpe.nu.ac.th/suradet/">ดร.สุรเดช จิตประไพกุลศาล</a>
		</font></strong><br>
		
					<!-- mod1 -->
					<div class="mycard" align = "center" style="width: 80%;margin-top: 20px;margin-bottom: 20px; border-radius: 50px; boarder: 3px;" >
						<div class="row" align="center">
							<div class="col-sm-6">
								<div class = "picture" >
									<img src="images\members\kwanchanok.jpg" class="img-rounded" alt="Cinque Terre" width = "60%" height = "auto" >
								</div>
							</div>

							<div class="col-sm-6" >
									<div class = "info" align = "center" valign = "top"><br><br>
									<center><font face = "ThaiSans Neue" size = "+3" color = "#8B6914"><B>55361076</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>นางสาวขวัญชนก  นวลนภาศรี</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>Kwanchanok  Nonnapasri</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>คณะวิศวกรรมศาสตร์  สาขาคอมพิวเตอร์</B></center>
									</div>
							</div>	
						</div> 
					</div><!-- row -->
					
					<!-- end mod -->

					<!-- mod2 -->
					<div class="mycard" align = "center" style="width: 80%;margin-top: 20px;margin-bottom: 20px; border-radius: 50px; boarder: 3px;" >
						<div class="row" align="center">
							<div class="col-sm-6">
								<div class = "picture" >
									<img src="images\members\thee.jpg"  class="img-rounded" alt="Cinque Terre" width = "50%" height = "auto" >
								</div>
							</div>

							<div class="col-sm-6">
									<div class = "info" align = "center" valign = "top"><br>
									<center><font face = "ThaiSans Neue" size = "+3" color = "#8B6914"><B>55361151</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>นายธีรวัฒน์ หินแก้ว</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>Theerawat Hinkaew</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>คณะวิศวกรรมศาสตร์  สาขาคอมพิวเตอร์</B></center>
									</div>
							</div>
						</div> 
					</div><!-- row -->
					
					<!-- end mod -->

					<!-- mod3 -->
					<div class="mycard" align = "center" style="width: 80%;margin-top: 20px;margin-bottom: 20px; border-radius: 50px; boarder: 3px;" >
						<div class="row" align="center">
							<div class="col-sm-6">
								<div class = "picture" >
									<br><img src="images\members\nontakorn.jpg"  class="img-rounded" alt="Cinque Terre" width = "45%" height = "auto" >
								</div>
							</div>

							<div class="col-sm-6">
									<div class = "info" align = "center" valign = "top"><br><br>
									<center><font face = "ThaiSans Neue" size = "+3" color = "#8B6914"><B>55361076</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>นายนนทกรณ์      มางิ้ว</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>Nontakorn Ma-ngiw</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>คณะวิศวกรรมศาสตร์  สาขาคอมพิวเตอร์</B></center>
									</div>
							</div>
						</div>	
					</div> <!-- row -->
					
					<!-- end mod -->

					<!-- mod4 -->
					<div class="mycard" align = "center" style="width: 80%;margin-top: 20px;margin-bottom: 20px; border-radius: 50px; boarder: 3px;" >
						<div class="row" align="center">
							<div class="col-sm-6">
								<div class = "picture" >
									<br><img src="images\members\sakchai.jpg"  class="img-rounded" alt="Cinque Terre" width = "50%" height = "auto" >
								</div>
							</div>

							<div class="col-sm-6">
									<div class = "info" align = "center" valign = "top"><br><br>
									<center><font face = "ThaiSans Neue" size = "+3" color = "#8B6914"><B>55362417</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>นายศักดิ์ชัย ศรีโสม</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>Sakchai Srisom</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>คณะวิศวกรรมศาสตร์  สาขาคอมพิวเตอร์</B></center>
									</div>
							</div>
						</div>	
					</div> <!-- row -->
					
					<!-- end mod -->

					<!-- mod5 -->
					<div class="mycard" align = "center" style="width: 80%;margin-top: 20px;margin-bottom: 20px; border-radius: 50px; boarder: 3px;" >
						<div class="row" align="center">
							<div class="col-sm-6">
								<div class = "picture" >
									<br><img src="images\members\sahakorn.jpg"  class="img-rounded" alt="Cinque Terre" width = "42%" height = "auto">
								</div>
							</div>

							<div class="col-sm-6">
									<div class = "info" align = "center" valign = "top"><br><br>
									<center><font face = "ThaiSans Neue" size = "+3" color = "#8B6914"><B>55362431</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>นายสหกรณ์ บัวงาม</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>Sahakorn Buangam </B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>คณะวิศวกรรมศาสตร์  สาขาคอมพิวเตอร์</B></center>
									</div>
							</div>
						</div>	
					</div> <!-- row -->
					
					<!-- end mod -->
		

		<!-- 	End old user --> 				
		</div>	
</div><br>


<div class = "container" >
		<div class= "row blue lighten-5 z-depth-1" align="center">	<br>

					<strong><font face="Browallia New" size="+3" color="#222D32">พัฒนาต่อโดย</font></strong><br>
					<strong><font face="Browallia New" size="+3" color="#222D32">สมาชิกกลุ่ม Tuxedo</font></strong><br>
					<strong><font face="Browallia New" size="+2" color="#222D32">เป็นส่วนหนึ่งของรายวิชา วิศวกรรมซอฟต์แวร์  ภาคการศึกษา 2558/1
									ที่ปรึกษา <a href="http://www.ecpe.nu.ac.th/suradet/">ดร.สุรเดช จิตประไพกุลศาล</a>
								</font></strong><br>

					<!-- mod6 -->
					<div class="mycard" align = "center" style="width: 80%;margin-top: 20px;margin-bottom: 20px; border-radius: 50px; boarder: 3px;" >
						<div class="row" align="center">
							<div class="col-sm-6">
								<div class = "picture" >
									<br><img src="images\members\top_bm.jpg"  class="img-rounded" alt="Cinque Terre" width = "50%" height = "auto" >
								</div>
							</div>

							<div class="col-sm-6">
									<div class = "info" align = "center" valign = "top"><br><br>	
									<center><font face = "ThaiSans Neue" size = "+3" color = "#8B6914"><B>55362318</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>นายรัชวุธ คืนมาเมือง</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>Ratchawut keunmamuang</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>คณะวิศวกรรมศาสตร์  สาขาคอมพิวเตอร์</B></center>
									</div>
							</div>
						</div>	
					</div> <!-- row -->
					
					<!-- end mod -->

					<!-- mod7 -->
					<div class="mycard" align = "center" style="width: 80%;margin-top: 20px;margin-bottom: 20px; border-radius: 50px; boarder: 3px;" >
						<div class="row" align="center">
							<div class="col-sm-6">
								<div class = "picture" >
									<br><img src="images\members\tob.jpg"  class="img-rounded" alt="Cinque Terre" width = "50%" height = "auto" >
								</div>
							</div>

							<div class="col-sm-6">
									<div class = "info" align = "center" valign = "tob"><br><br>
									<center><font face = "ThaiSans Neue" size = "+3" color = "#8B6914"><B>55362257</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>นายพีระพล จันทร์บ่อโพธิ์</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>Peerapol Junbopo</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>คณะวิศวกรรมศาสตร์  สาขาคอมพิวเตอร์</B></center>
									</div>
							</div>
						</div>	
					</div> <!-- row -->
					
					<!-- end mod -->

					<!-- mod8 -->
					<div class="mycard" align = "center" style="width: 80%;margin-top: 20px;margin-bottom: 20px; border-radius: 50px; boarder: 3px;" >
						<div class="row" align="center">
							<div class="col-sm-6">
								<div class = "picture" >
									<br><img src="images\members\non.jpg"  class="img-rounded" alt="Cinque Terre" width = "50%" height = "auto" >
								</div>
							</div>

							<div class="col-sm-6">
									<div class = "info" align = "center" valign = "top"><br><br>
									<center><font face = "ThaiSans Neue" size = "+3" color = "#8B6914"><B>55361885</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>นายชานน วงศ์รจิต</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>Chanon Wongrajit</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>คณะวิศวกรรมศาสตร์  สาขาคอมพิวเตอร์</B></center>
									</div>
							</div>
						</div>	
					</div> <!-- row -->
					
					<!-- end mod -->

					<!-- mod9 -->
					<div class="mycard" align = "center" style="width: 80%;margin-top: 20px;margin-bottom: 20px; border-radius: 50px; boarder: 3px;" >
						<div class="row" align="center">
							<div class="col-sm-6">
								<div class = "picture" >
									<br><img src="images\members\bring.jpg"  class="img-rounded" alt="Cinque Terre" width = "50%" height = "auto" >
								</div>
							</div>

							<div class="col-sm-6">
									<div class = "info" align = "center" valign = "top"><br><br>
									<center><font face = "ThaiSans Neue" size = "+3" color = "#8B6914"><B>55361830</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>นายชนกันต์ ฟองศรัณย์</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>Chanagun Fongsarun</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>คณะวิศวกรรมศาสตร์  สาขาคอมพิวเตอร์</B></center>
									</div>
							</div>
						</div>	
					</div> <!-- row -->
					
					<!-- end mod -->

					<!-- mod10 -->
					<div class="mycard" align = "center" style="width: 80%;margin-top: 20px;margin-bottom: 20px; border-radius: 50px; boarder: 3px;" >
						<div class="row" align="center">
							<div class="col-sm-6">
								<div class = "picture" >
									<br><img src="images\members\jud.jpg"  class="img-rounded" alt="Cinque Terre" width = "50%" height = "auto" >
								</div>
							</div>

							<div class="col-sm-6">
									<div class = "info" align = "center" valign = "top"><br><br>
									<center><font face = "ThaiSans Neue" size = "+3" color = "#8B6914"><B>55361236</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>นายวจนะชัย ว่องวีระยุทธ์</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>Wajanachai Wongverayuth</B></center>
									<center><font face = "Browallia New" size = "+2.5" color = "#6C7B8B"><B>คณะวิศวกรรมศาสตร์  สาขาคอมพิวเตอร์</B></center>
									</div>
							</div>
						</div>	
					</div> <!-- row -->
					
					<!-- end mod -->
								
		</div>
</div>



        </section>
      </div>
  		
      <!-- Main Footer -->
      <?php foot('About') ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <?php include_js(); ?>

  </body>
</html>
