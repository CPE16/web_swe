function Search_User(str) {
    if (str == "") {
        document.getElementById("Search_Area").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("Search_Area").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","Search.php?id="+str,true);
        xmlhttp.send();
    }
}


function PrintLaout(id)
{
    if (id == "") {
        document.getElementById("memberBoard").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("memberBoard").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","member.php?id="+id,true);
        xmlhttp.send();
    }
}
function clear_Search_User()
{
    document.getElementById("search_input").value = "";
    document.getElementById("Search_Area").innerHTML = "";
}
function updateDatabase()
{
    $.post( $("#myForm").attr("action"), 
                 $("#myForm :input").serializeArray(), 
                 function(info){ $("#result").html(info); 
           });         
    $("#myForm").submit( function() {
        return false; 
    });
}
function Addmember(id)
{
    PrintLaout(id);
    document.getElementById("inputS").value = id;
    document.getElementById("opp").value = "add";
    updateDatabase();	
    PrintLaout(id); 
    PrintLaout(id); 
    PrintLaout(id); 
    clear_Search_User();
}

function Del(id)
{
    document.getElementById("del").value = id;
    document.getElementById("opp").value = "del";
    updateDatabase(); 
    PrintLaout(id); 
    PrintLaout(id); 
    PrintLaout(id);
    clear_Search_User();  
}
