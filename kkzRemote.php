<?php

$ip="192.168.0.101";

$authent="http://admin:admin@192.168.0.101/";

$Left="http://admin:admin@".$ip."/cgi-bin/operator/ptzset?move=left";
$Right="http://admin:admin@".$ip."/cgi-bin/operator/ptzset?move=right";
$Up="http://admin:admin@".$ip."/cgi-bin/operator/ptzset?move=up";
$Down="http://admin:admin@".$ip."/cgi-bin/operator/ptzset?move=down";
$Stop="http://192.168.0.101/cgi-bin/operator/ptzset?move=stop";
	
if(isset($_POST["left1"]))  { post($Left); post($stop); }
if(isset($_POST["right1"])) { post($Right); post($stop); }
if(isset($_POST["up1"]))    { post($Up); post($stop); }
if(isset($_POST["down1"]))  { post($Down); post($stop); }

postauth($authent);

function postauth($Direction = null) {
    $c = curl_init($Direction); 
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); 
}
function post($Direction = null) {
    $c = curl_init($Direction); 
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); 
    $content = curl_exec($c);
    echo $content;
} 
?>

<html>
  <!-- stream  -->
  <head>
     <link rel="stylesheet" type="text/css" href="FB.css">  
    <script>
      var pictureFrame= document.getElementById("pictureTagId");
      (function updateImage() {
	pictureFrame.src="http://192.168.0.101/jpg/image.jpg?" + Math.random();  //Math.rand as query to change photo
        setTimeout(updateImage, 370);
       })()
     </script>
   </head>
   <!-- video -->
  <body>
    <center>
    <img id="pictureTagId" src="">
    <br><br>
    <!-- Hidden frame for post w/o page refresh -->
    <iframe name="HiddenFrame" style="display:none;"></iframe>

    <!-- buttons -->
    <form method="post" target="HiddenFrame" >
        <input id="a1-div-a" type="submit" name="left1" value="Влево">
        <input  id="a1-div-a" type="submit" name="right1" value="Вправо">
        <br><br>
        <input  id="a1-div-a" type="submit" name="up1" value="Вверх">
        <input  id="a1-div-a" type="submit" name="down1" value="Вниз">
    </form>
  <body>
</html>
