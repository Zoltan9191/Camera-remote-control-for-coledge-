<?php

$ip="192.168.0.101";

$authent="http://admin:admin@192.168.0.101/";

$Left="http://admin:admin@".$ip."/cgi-bin/operator/ptzset?move=left";
$Right="http://admin:admin@".$ip."/cgi-bin/operator/ptzset?move=right";
$Up="http://admin:admin@".$ip."/cgi-bin/operator/ptzset?move=up";
$Down="http://admin:admin@".$ip."/cgi-bin/operator/ptzset?move=down";

$Stop="http://192.168.0.101/cgi-bin/operator/ptzset?move=stop";
	
if(isset($_POST["left1"])) { post($Left); post($stop); }
if(isset($_POST["right1"])) { post($Right); post($stop); }
if(isset($_POST["up1"])) { post($Up); post($stop); }
if(isset($_POST["down1"])) { post($Down); post($stop); }

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

<link rel="stylesheet" type="text/css" href="FB.css">

<center>

<!-- stream  -->

<script>

updateImage();
var a=1;

function updateImage()
{

if (a==1) {
	var x2= document.getElementById("theText2");
	x2.src="http://192.168.0.101/jpg/image.jpg?" + Math.random();

}
    setTimeout(updateImage, 370);
}

 </script>

 <!-- video -->
 <img id="theText2" src="url">
 
<br><br>

<iframe name="HiddenFrame" style="display:none;"></iframe>

<!-- buttons -->
<form method="post" target="HiddenFrame" >
<input id="a1-div-a" type="submit" name="left1" value="Влево">
<input  id="a1-div-a" type="submit" name="right1" value="Вправо">
<br><br>
<input  id="a1-div-a" type="submit" name="up1" value="Вверх">
<input  id="a1-div-a" type="submit" name="down1" value="Вниз">
</form>


</html>
