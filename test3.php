<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>val demo</title>

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<input type="text" value="some text" name="top" id="top">
<p></p>
 
<script>
$( "input" )
  .keyup(function() {
    var value = $( this ).val();
    $( "p" ).text( value );
  })
  .keyup();
</script>
 
</body>
</html>