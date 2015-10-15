<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript" language="JavaScript">
function nameempty()
{
    if ( document.form.first_name.value == '' )
    {
        alert('No Name was entered!')
        return false;
    }
     if(document.form.last_name.value == '')
    {
        alert('No Last name entered!')
        return false;
    }
     if(document.form.address1.value == '')
    {
        alert('No Address entered!')
        return false;
    }
     if(document.form.city.value == '')
    {
        alert('No City entered!')
        return false;
    }
     if(document.form.zip.value == '')
    {
        alert('No Zip code entered!')
        return false;
    }
     if(document.form.state.value == '')
    {
        alert('No State entered!')
        return false;
    }
     if(document.form.country.value == '')
    {
        alert('No Country entered!')
        return false;
    }
 
 
}
</script>

<form action="paypal.php" method="post" name="form" onSubmit="return nameempty();">
Fist Name:<input type="text" name="first_name" value=""><br />
Last Name:<input type="text" name="last_name" value=""><br />
Address1:<input type="text" name="address1" value=""><br />
Address2:<input type="text" name="address2" value=""><br />
City: <input type="text" name="city" value="" /> <br/>
State:<input type="text" name="state" value=""><br />
<input type="hidden" name="item_name" value=""><br/>
<input type="hidden" name="amount" value=""><br/>
Zip:<input type="text" name="zip" value=""><br />
Country:<input type="text" name="country" value=""><br />
 
 
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" >
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</body>
</html>