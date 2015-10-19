function checkThai(name_thai)
{
	
	if (!name_thai.match(/^[ก-๙]+$/)){
     	$( "#nameThai" ).show( "fast" ).delay(3000);
	     $("#correct").hide(1);
   }
   else 
   {
	   	$( "#nameThai" ).hide(1);
		$("#correct").show("fast").delay(3000);
   }
}
function checkEng(name_eng)
{
	
	if (!name_eng.match(/^[a-zA-z]+$/)){
     	$( "#nameEng" ).show( "fast" ).delay(3000);
		$("#correct2").hide(1);
	  
   }
   else 
   {
	   	$( "#nameEng" ).hide(1);
		$("#correct2").show("fast").delay(3000);
   }
}

function check_phone(phone_std1)
{
	if (!phone_std1.match(/^[0-9]/)){
     	$( "#phone1" ).show( "fast" ).delay(3000);
		$("#correct5").hide(1);
	  
   }
   else 
   {
	   	$( "#phone1" ).hide(1);
		$("#correct5").show("fast").delay(3000);
   }
}
function check_email(email_std1)
{

   if (email_std1.indexOf(' ') >= 0 ||email_std1.indexOf('@') < 3){
     $( "#mail1" ).show( "fast" ).delay(3000);
	  $("#correct6").hide(1);
   }
   else 
   {
	  $("#mail1").hide(1);
	  $("#correct6").show( "fast" ).delay(3000);
   }
   
}
function check_phone2(phone_std2)
{
	if (!phone_std2.match(/^[0-9]/)){
     	$( "#phone2" ).show( "fast" ).delay(3000);
		$("#correct9").hide(1);
	  
   }
   else 
   {
	   	$( "#phone2" ).hide(1);
		$("#correct9").show("fast").delay(3000);
   }
}
function check_email2(email_std2)
{

   if (email_std2.indexOf(' ') >= 0 ||email_std2.indexOf('@') <3){
      $( "#mail2" ).show( "fast" ).delay(3000);
	  $("#correct10").hide(1);
   }
   else 
   {
	  $("#mail2").hide(1);
	  $("#correct10").show( "fast" ).delay(3000);
   }
   
}
function check_phone3(phone_std3)
{
	if (!phone_std3.match(/^[0-9]/)){
     	$( "#phone3" ).show( "fast" ).delay(3000);
		$("#correct13").hide(1);
	  
   }
   else 
   {
	   	$( "#phone3" ).hide(1);
		$("#correct13").show("fast").delay(3000);
   }
}
function check_email3(email_std3)
{

   if (email_std3.indexOf(' ') >= 0 ||email_std3.indexOf('@') <3){
      $( "#mail3" ).show( "fast" ).delay(3000);
	  $("#correct14").hide(1);
   }
   else 
   {
	  $("#mail3").hide(1);
	  $("#correct14").show( "fast" ).delay(3000);
   }
   
}