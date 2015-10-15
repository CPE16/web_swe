<?php
	require "config.php";
	require "process.php";
	session_start();
	if(!isset($_SESSION['login_user']))
	{
		header('Location: login.php');
		
		exit;
	}
	$sql = "SELECT nameThai,nameEng,std1,std2 FROM comsystem.createproject WHERE std1 = '".$_SESSION['login_user']."' or std2 = '".$_SESSION['login_user']."' or std3 = '".$_SESSION['login_user']."'";
	$query =  mysql_query($sql) or die(mysql_error());
	$rows =  mysql_num_rows($query);
	if($rows == 1)
	{
		goback("คุณมีข้อมูลโครงงานในระบบแล้ว","appform.php");
		die();
		// echo "<center><font size = '7' color='#2c3e50'>คุณมีข้อมูลโครงงานในระบบแล้ว</font><br><br><a href='appform.php'><button>BACK.</button></a><hr>";
		// echo "<script>setTimeout(\"location.href = 'appform.php';\",2000);</script></center>";
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

?>
<html>
	<head>
	<meta charset = "utf-8">
		<title>Computer System.</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">

		  <link rel="stylesheet" type="text/css" href="css/Header.css" />
		  <link rel="stylesheet" type="text/css" href="css/cpe01-min.css" />
		  <STYLE>
			A:link { color: #F7B810; text-decoration:none}
			A:visited {color: #F7B810; text-decoration: none}
			A:hover {color: #F7B810}
		</STYLE>
		 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		   <script src="js/input-js.js" type="text/javascript"></script>
		   <script>
	function check_id(id_std1)
{
	if (id_std1.match(/^[0-9]/)){
     	$( "#id1" ).hide(1);
		$("#correct4").show( "fast" ).delay(3000);
	  
   }
   else 
   {
	   $( "#id1" ).show( "fast" ).delay(3000);
		$("#correct4").hide(1);
		
   }
	
}
function check_name(name_std1)
{
 	if (!name_std2.match(/^[ก-๙]/)){
     	$( "#name1" ).show( "fast" ).delay(3000);
	     $("#correct3").hide(1);
   }
   else 
   {
	   	$( "#name1" ).hide(1);
		$("#correct3").show("fast").delay(3000);
   }
}


function showUser(str,type,pos) {
    if (str == "") {
        //document.getElementById(<?php echo "pos"; ?>).innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(<?php echo "pos"; ?>).innerHTML = xmlhttp.responseText;
                var elem = document.getElementById("what");
				elem.value = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","test.php?q="+str+"&t="+type,true);
        xmlhttp.send();
    }
}

  	

function check_id2(id_std2)
{
	if (id_std2.match(/^[0-9]/)){
		showUser(id_std2,"name","name_std2"); 
		//showUser(id_std2,"name","name_std2"); 
		
		// showUser(phone_std2,"email"); 
		// showUser(id_std2,"phone"); 
     	$( "#id2" ).hide(1);
		$("#correct8").show( "fast" ).delay(3000);
		//alert("ok");
   }
   else 
   {
	   $( "#id2" ).show( "fast" ).delay(3000);
		$("#correct8").hide(1);
		
   }
	
}
function check_name2(name_std2)
{
 	if (!name_std2.match(/^[ก-๙]/)){
     	$( "#name2" ).show( "fast" ).delay(3000);
	     $("#correct7").hide(1);
   }
   else 
   {
	   	$( "#name2" ).hide(1);
		$("#correct7").show("fast").delay(3000);
   }
}

	function check_id3(id_std3)
{
	if (id_std3.match(/^[0-9]/)){
		 		showUser(id_std3,"name","name_std3"); 

     	$( "#id3" ).hide(1);
		$("#correct12").show( "fast" ).delay(3000);
	  
   }
   else 
   {
	   $( "#id3" ).show( "fast" ).delay(3000);
		$("#correct12").hide(1);
		
   }
	
}
function check_name3(name_std3)
{
 	if (!name_std3.match(/^[ก-๙]/)){
     	$( "#name3" ).show( "fast" ).delay(3000);
	     $("#correct11").hide(1);
   }
   else 
   {
	   	$( "#name3" ).hide(1);
		$("#correct11").show("fast").delay(3000);
   }
}
var first = true;
function CheckValue()
{
	if(first){first = false;}
	else{
	var val1 = document.getElementById("pro1").value;
	var i1 = document.getElementById("pro1").selectedIndex;
	var val2 = document.getElementById("pro2").value;
	var i2 = document.getElementById("pro2").selectedIndex;
	var val3 = document.getElementById("pro3").value;
	var i3 = document.getElementById("pro3").selectedIndex;
	if(val1 == val2 || val1 == val3 || val2 == val3)
	{
		$("#pro").show("fast").delay(3000);
	}
	else{
		$("#pro").hide(1);
	}
	}
}

function CheckSubmit()
{
	
	var cid2 = document.getElementById('what').value;
	// if(cid2.length  20)
	// {
	// 	alert(cid2.length);
	// 	alert("ไม่พบข้อมูลนิสิต");
	// 	return false;
	// }
	var elem = document.getElementById("name_std2");
				elem.value = xmlhttp.responseText;
				alert(elem);

				return false;
	

}
</script>
	</head>
	<body>
		<label id="txtHint"></label>
		<input id="what">
		<div class = "titlepage">
			<div class = "subtitle">
				<img src="images/web.png" width="100%" height="100%">
			</div>
			<div class = "subtext-title" align = "center">
			<font size ="6" color="#EEEEEE" style="text-shadow: 1px 1px #2c3e50;"> <b>ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์ </font><br>
			<font size ="5" color="#EEEEEE" style="text-shadow: 1px 1px #2c3e50;"> Department of Electrical and Computer Engineering.<br>
			คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร</b></font>
			</div>
		</div>
		<div class = "menubar" align="center">
			<a href="student-page.php"><div class = "menu1" align = "center">
				<b class = "small">หน้าหลัก</b>
			</div>
			</a>
			<a href="appform.php"><div class = "menu2" align = "center">
				<b class = "small">ฟอร์มโครงงาน</b>
			</div></a>
			<a href="#"><div class = "menu3" align = "center">
				<b class = "small">ติดตามโครงงาน</b>
			</div></a>
			<a href="logout.php"><div class = "menu4" align = "center">
			<b class = "small">ออกจากระบบ</b>
			</div></a>
		</div>
		<div class = "mainpage">
		<form id = "cpe01" name = "cpe01" action = "cpe01-active.php" method="post" onSubmit="return CheckSubmit();">
			<center><font face = "ThaiSans Neue" size = "+3" color = "#446CB3"><b>CPE01-แบบเสนอหัวข้อโครงงานกรรมคอมพิวเตอร์ ปีการศึกษา 2557<b></font></center><hr><br> 
			<div class = "submain1">
				<div class = "subheader" align = "center">ชื่อโครงงาน</div>
				<table style=" width:100%;height:80%;" align ="center">
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e"> ภาษาไทย</font></th>
					<td style="width:65%;"><input type = "text" id = "name_thai" name = "name_thai" class ="textbox" placeholder="ชื่อภาษาไทย" onchange = "checkThai(this.value)"/>	<span id = "correct" style="display: none" ><img src="images/select.png" width="20px" height="20px";></span><br>
					<span id = "nameThai" style="display: none">ชื่อต้องประกอบด้วยภาษาไทย และต้องไม่ประกอบด้วยเว้นวรรค</span></td>
				</tr>
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e">ภาษาอังกฤษ</font></th>
					<td style="width:65%;"><input type = "text" id = "name_eng"  name= "name_eng"  class ="textbox" placeholder="ชื่อภาษาอังกฤษ" onchange = "checkEng(this.value)"/><span id = "correct2" style="display: none" ><img src="images/select.png" width="20px" height="20px";></span><br>
					<span id = "nameEng" style="display: none">ชื่อต้องประกอบด้วยภาษาอังกฤษ</span></td>
				</tr>
				</table>
			</div>
			<!-------------------------------- Student 1 ------------------------------------------------>
			<div class = "submain1">
				<div class = "subheader" align = "center">***รายชื่อนิสิตผู้ทำโครงงาน</div>
					<table style=" width:100%;height:100%;" align ="center">
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e"> รหัสนิสิต</font></th>
					<td style="width:65%;">
						<input type = "text" id="id_std1" name = "id_std1" class ="textbox" placeholder="รหัสนิสิต" value = "<?php echo $id; ?>" onchange="check_id(this.value)" disabled/><span id = "correct4" style="display: none" ><img src="images/select.png" width="20px" height="20px";></span><br>
					<span id = "id1" style="display: none">รหัสนิสิตประกอบด้วยตัวเลขเท่านั้น</span></td>
				</tr>
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e">ชื่อ-นามสกุล</font></th>
					<td style="width:65%;">
						<input type = "text" id="name_std1" name = "name_std1" class ="textbox" placeholder="ชื่อ-นามสกุล" value = "<?php echo $name; ?>" onchange="check_name(this.value)" disabled/><span id = "correct3" style="display: none" ><img src="images/select.png" width="20px" height="20px";></span><br>
					<span id = "name1" style="display: none">ชื่อต้องประกอบด้วยภาษาไทย และไม่มีอัขระพิเศษ</span></td>
				</tr>
				
				<tr>
					<th style="width:35%;"> <font face = "ThaiSans Neue" size = "+2" color = "#34495e">เบอร์โทร</font></th>
					<td style="width:65%;">
						<input type = "text" id="phone_std1" name = "phone_std1" class ="textbox" placeholder="เบอร์โทร" value = "<?php echo $phone; ?>" onchange="check_phone(this.value)" disabled/><span id = "correct5" style="display: none" ><img src="images/select.png" width="20px" height="20px";></span><br>
					<span id = "phone1" style="display: none">ต้องเป็นตัวเลข(และ เบอร์โทรรูปแบบ 081123456789 ไม่ต้องมีเว้นวรรค</span></td>
				</tr>
					<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e"> อีเมล์</font></th>
					<td style="width:65%;">
						<input type = "text" id="email_std1" name = "email_std1" class ="textbox" placeholder="อีเมล์" value = "<?php echo $email; ?>" onchange="check_email(this.value)" disabled/><span id = "correct6" style="display: none" ><img src="images/select.png" width="20px" height="20px";></span><br>
					<span id = "mail1" style="display: none">รูปแบบอีเมล์ไม่ถูกต้อง</span></td>
				</tr>

				</table>
			</div>
			
			<!-------------------------------- Student 2 ------------------------------------------------>
			<div class = "submain1">
				<div class = "subheader" align = "center">รายชื่อนิสิตผู้ทำโครงงาน</div>
				<div class="container">
					
					<div class="col-xs-3">
						<label>ค้นหา </label>
						<input type = "text" id="id_std2" name = "id_std2" class ="textbox" placeholder="รหัสนิสิต" onchange="check_id2(this.value)" style="height: 39px;"/>
<!-- 						<span id = "correct8" style="display: none" ><img src="images/select.png" width="20px" height="20px";></span><br>
 -->
						<span id = "id2" style="display: none">รหัสนิสิตประกอบด้วยตัวเลขเท่านั้น</span>

					</div>
					<div class="col-xs-9" id = "name_std2"> <br></div>
				</div>


					<table style=" width:100%;height:100%;" align ="center">

				<tr>
					<!-- <div id="name_std2" name = "name_std2"> 
					</div> -->
				</tr>
			</div>
				</table>
			</div>
			

			<!-------------------------------- Student 3 ------------------------------------------------>
			<div class = "submain1">
				<div class = "subheader" align = "center">รายชื่อนิสิตผู้ทำโครงงาน</div>
				<div class="container">
					
					<div class="col-xs-3">
						<label>ค้นหา </label>
						<input type = "text" id="id_std3" name = "id_std3" class ="textbox" placeholder="รหัสนิสิต" onchange="check_id3(this.value)" style="height: 39px;"/>
<!-- 						<span id = "correct8" style="display: none" ><img src="images/select.png" width="20px" height="20px";></span><br>
 -->
						<span id = "id3" style="display: none">รหัสนิสิตประกอบด้วยตัวเลขเท่านั้น</span>

					</div>
					<div class="col-xs-9" id = "name_std3"> <br></div>
				</div>	
			</div>
			<!-------------------------------- Profressor ------------------------------------------------>
			<div class = "submain1">
				<div class = "subheader" align = "center">อาจารย์ที่ปรึกษาและกรรมการ</div>
				<table style=" width:100%;height:100%;" align ="center">
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e"> อาจารย์ที่ปรึกษา</font></th>
					<td style="width:75%;"><select id ="pro1" name = "pro1" onchange="CheckValue()" class = "selection">
						<option value = "G00">กรุณาเลือกอาจารย์ที่ปรึกษาโครงงาน</option>
						<option value = "G01">นางสาวสมศรี   ดีมั่น</option>
						<option value = "G02">นายสมศักดิ์   ดีใจ</option>
						<option value = "G03">นางสาวดวงดาว   ส่องแสง</option>
						<option value = "G04">นางสาวก่อแก้ว  มุ่งมั่น</option>
					</select></td>
				</tr>
				<tr>
					<th style="width:35%;"> <font face = "ThaiSans Neue" size = "+2" color = "#34495e">อาจารย์ที่ปรึกษาร่วม (ถ้ามี)</font></th>
					<td style="width:75%;"><select id ="pro2" name = "pro2" onchange="CheckValue()" class = "selection">
						<option value = "G00">กรุณาเลือกอาจารย์ที่ปรึกษาโครงงาน</option>
						<option value = "G01">นางสาวสมศรี   ดีมั่น</option>
						<option value = "G02">นายสมศักดิ์   ดีใจ</option>
						<option value = "G03">นางสาวดวงดาว   ส่องแสง</option>
						<option value = "G04">นางสาวก่อแก้ว  มุ่งมั่น</option>
					</select></td>
				</tr>
				<tr>
					<th style="width:35%;"><font face = "ThaiSans Neue" size = "+2" color = "#34495e"> เสนอรายชื่อกรรมการ 1 ท่าน</font></th>
					<td style="width:75%;"><select id ="pro3" name="pro3" onchange="CheckValue()" class = "selection">
						<option value = "G00">กรุณาเลือกอาจารย์ที่ปรึกษาโครงงาน</option>
						<option value = "G01">นางสาวสมศรี   ดีมั่น</option>
						<option value = "G02">นายสมศักดิ์   ดีใจ</option>
						<option value = "G03">นางสาวดวงดาว   ส่องแสง</option>
						<option value = "G04">นางสาวก่อแก้ว  มุ่งมั่น</option>
					</select><br><span id = "pro" style="display: none">ไม่สามารถเลือกอาจารย์และกรรมการซ้ำคนได้</span></td>
				</tr>
				</table>
			</div>
						<div class = "submain2" align = "center">
				
					
				<a href="#"><div class ="botton-div" align = "center">
					<h2>ยืนยันข้อมูล</h2>
				</div></a>
				<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" >
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</div>
		</form>
		</div>
		<div class = "fooster">
			<center><font face = "ThaiSans Neue" size = "+1.5" color = "#446CB3"><b>ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์  คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร   ตำบลท่าโพธิ์ อำเภอเมือง จังหวัดพิษณุโลก  65000<b></font></center> 
			<center><font face = "ThaiSans Neue" size = "+1.5" color = "#446CB3"><b>โทร  0559-6437-3,0559-6437-1 แฟกซ์ 0559-6400-5 อีเมล์</font> <a href = "mailto:ecpe-software@nu.ac.th" ><font class = "link" >ecpe-software@nu.ac.th </font></a> <b></center>
		</div>
		
	</body>
</html>
	