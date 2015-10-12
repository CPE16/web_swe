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

function check_id2(id_std2)
{
	if (id_std2.match(/^[0-9]/)){
     	$( "#id2" ).hide(1);
		$("#correct8").show( "fast" ).delay(3000);
	  
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
        cities = ["Chennai", "Dehradun", "Delhi", "Bombay", "Kolkata", "Lucknow", "Mirzapur", "Varanasi"];
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


 function showUser(str) {
                        //alert("Value: " + $("#ff").val());

    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","test.php?q="+str,true);
        xmlhttp.send();
    }
}
