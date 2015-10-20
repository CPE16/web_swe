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
                //$('#Search_Area').addClass('animated pulse');
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
    //$('#memberBoard').addClass('animated pulse');
    //$('#memberBoard').removeClass();
      
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
function SubmitOK()
{
    //alert("ส่งข้อไปจัดเก็บ");
    var nth = document.getElementById('name_thai').value ;
    var nen = document.getElementById('name_eng').value ;
    var p1 = document.getElementById('pro1').value;
    var p2 = document.getElementById('pro2').value;
    var p3 = document.getElementById('pro3').value;

    if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
    } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
        
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //$('#Search_Area').addClass('animated pulse');
                document.getElementById("save").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","save_form.php?nth="+nth+"&nen="+nen+"&p1="+p1+"&p2="+p2+"&p3="+p3,true);
        xmlhttp.send();
        window.location.href = "student-page.php";
        //alert("ok");
        //location.reload();student-page.php
}
function CheckSubmitClick()
{
    var txt;
    var r = confirm("ตกลง เพื่อยืนยันข้อมูล");
    if (r == true) {
        SubmitOK();
    } else {
        //txt = "You pressed Cancel!";
    }
    // document.getElementById("demo").innerHTML = txt;
}

var chkthai = false;
function checkThai(name_thai)
{
  if (name_thai.length == 0) 
    {
        document.getElementById("thaiInput").className = "";
        $("#nameThai").hide();
    }
  else
    {
      if (!name_thai.match(/^[ก-๙-0-9-' ']+$/))
        {
            $("#nameThai").show();
            document.getElementById("thaiInput").className = "form-group has-error has-feedback";            
            chkthai = false;
            CheckValue();
        }
       else 
        {
            $("#nameThai").hide();
            document.getElementById("thaiInput").className = "form-group has-success has-feedback";
            chkthai = true;
            CheckValue();
        }
    }
}
var chkeng = false;
function checkEng(name_eng)
{
    if (name_eng.length == 0) 
    {
        document.getElementById("engInput").className = "";
        $("#nameEng").hide();
    }
    else
    {
        if (!name_eng.match(/^[a-zA-z-0-9-' ']+$/))
        {
            $("#nameEng").show();
            document.getElementById("engInput").className = "form-group has-error has-feedback";
            chkeng = false;
            CheckValue();
        }
       else 
        {
            $("#nameEng").hide();
            document.getElementById("engInput").className = "form-group has-success has-feedback";
            chkeng = true;
            CheckValue();
        }
    }
}

function CheckSubmit(op)
{
  if(op=="ok" && chkeng == true && chkthai == true)
  {
        document.getElementById("submit").disabled = false;
  }
  else
  {
    document.getElementById("submit").disabled = true;
  }
}

var first = true;

function CheckValue()
{
    if(first)
        {
            first = false;
        }
    else
    {
        var val1 = document.getElementById("pro1").value;
        var i1 = document.getElementById("pro1").selectedIndex;
        var val2 = document.getElementById("pro2").value;
        var i2 = document.getElementById("pro2").selectedIndex;
        var val3 = document.getElementById("pro3").value;
        var i3 = document.getElementById("pro3").selectedIndex;

        if(val1 == val2 || val1 == val3 || val2 == val3)
        {
            CheckSubmit("No");
        }
        else
        {
            if(val1!="G00" && val2!="G00" && val3!="G00")
            {
                CheckSubmit("ok");
            }
            else
            {
                CheckSubmit("No");
            }
        }


        if(val1!="G00" && val2!="G00" && val3!="G00")
         {
                if(val1==val2&&val1==val3)
                {
                    document.getElementById("p01").className = "form-group has-error has-feedback";
                    document.getElementById("p02").className = "form-group has-error has-feedback";
                    document.getElementById("p03").className = "form-group has-error has-feedback";
                }
                else if(val1==val2)
                {
                    document.getElementById("p01").className = "form-group has-error has-feedback";
                    document.getElementById("p02").className = "form-group has-error has-feedback";
                    document.getElementById("p03").className = "form-group has-success has-feedback";
                }
                else if(val1==val3)
                {
                    document.getElementById("p01").className = "form-group has-error has-feedback";
                    document.getElementById("p02").className = "form-group has-success has-feedback";
                    document.getElementById("p03").className = "form-group has-error has-feedback";
                }
                else if(val2==val3)
                {
                    document.getElementById("p01").className = "form-group has-success has-feedback";
                    document.getElementById("p02").className = "form-group has-error has-feedback";
                    document.getElementById("p03").className = "form-group has-error has-feedback";
                }
                else if(val1!=val2&&val1!=val3)
                {
                    document.getElementById("p01").className = "form-group has-success has-feedback";
                    document.getElementById("p02").className = "form-group has-success has-feedback";
                    document.getElementById("p03").className = "form-group has-success has-feedback";
                    CheckSubmit("ok");
                }
        }
        else
        {
                    document.getElementById("p01").className = "form-group  has-feedback";
                    document.getElementById("p02").className = "form-group  has-feedback";
                    document.getElementById("p03").className = "form-group  has-feedback";
        }
    }
}

var fadeEffect=function(){
    return{
        init:function(id, flag, target){
            this.elem = document.getElementById(id);
            clearInterval(this.elem.si);
            this.target = target ? target : flag ? 100 : 0;
            this.flag = flag || -1;
            this.alpha = this.elem.style.opacity ? parseFloat(this.elem.style.opacity) * 100 : 0;
            this.elem.si = setInterval(function(){fadeEffect.tween()}, 20);
        },
        tween:function(){
            if(this.alpha == this.target){
                clearInterval(this.elem.si);
            }else{
                var value = Math.round(this.alpha + ((this.target - this.alpha) * .05)) + (1 * this.flag);
                this.elem.style.opacity = value / 100;
                this.elem.style.filter = 'alpha(opacity=' + value + ')';
                this.alpha = value
            }
        }
    }
}();

