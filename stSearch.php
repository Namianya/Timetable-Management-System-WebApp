<?php
if(isset($_GET['home'])){
		$home=$_GET['home'];
		$contacts=NULL;
		}
		elseif(isset($_GET['contacts'])){
		$home= NULL;
		$contacts=$_GET['contacts'];
		}
		else
		{
		$home= NULL;
		$contacts=NULL;
		}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Computer Science Timetable</title>
<link rel="stylesheet" type='text/css' href="css/style.css">
<link rel="stylesheet" type='text/css' href="css/menu.css" />
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
<script> 
function show(){
$(document).ready(function(){
	$("#link0").slideToggle("slow");
	$("#link1").slideToggle("slow");
	$("#link2").slideToggle("slow");
	$("#link3").slideToggle("slow");
	});
}
</script>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}</script>
<style>
.title2{
  background: #0099FF;
  padding:2px;
  color:#fff;
  border-radius:4px;
  text-align:center;
  width:740px;
 }
</style>
</head>
<body background="image/page_background.jpg" onLoad="show()">
<center>
<div id="container" style="background-image:url(image/main-bg.jpg)">
<div id="banner">
<div id="logo2">
<img src="image/Logo.jpg" height="170" width="200" />
</div>
<div id="title2">
<div id="special">
<img src="image/Title.png" height="70" width="600" />
<h3>Increase or Decrease Font:
<a href="javascript:void(0);" title="Increase font" onClick="changemysize(17); "><img src="image/increase.jpg" height="30" width="30"/></a>
<a href="javascript:void(0);"title="Decrease font" onClick="changemysize(12);"><img src="image/decrease.jpg" height="30" width="30"/></a>
Themes:
<input type="button" style="background-color:#FF0033" title=""/>
<input type="button" style="background-color:#0099FF" title=""/>
<input type="button" style="background-color:#330099" title=""/></h3>
</div>
<div id="icon_search" style="margin-top:20px">
<form action="stSearch.php" method="post">
              <input type="text" value="Type Unit Code" name="keyword" id="keyword" title="enter search query here" 
              				onfocus="clearText(this)" onBlur="clearText(this)" class="txt_field">
              <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn">
</form>
</div>
</div>
</div>
<hr />
<div id="internal">
<div id="links">
<div id="menus">
<ul>
<li><a href="student.php?home"> HOME</a></li>
<li><a href="#">HELP</a></li>
<li><a href="logout.php">LOGOUT</a></li>
</ul>
</div><br /><br />
<h3>
<div id="flip">View</div>
<div id="link1">
<a href="#" onClick="disptimetable()"> Timetable</a><br />
<hr/>
</div>
<div id="flips">Account</div>
<div id="link2">
<a href="logout.php">Logout</a><br />
<hr />
<a href="changepassword.php">Change Password</a>
<hr />
</div>
<div id="fliper">Events</div>
<div id="link3">
<a href="#">IBM training</a><br />
<hr />
<a href="#">Interdisplinary week</a>
<hr />
</div>
<br />
</div></h3>
<div id="content"><?php
require_once("connection.php");
$key=$_POST['keyword'];
$query=mysql_query("SELECT * FROM temptable where code='$key'");
if($query){
while($result=mysql_fetch_array($query))
{
echo "<font face='comic sans ms' size='4'><p class='title2'>RESULT FROM YOUR SEARCH</p></font>";
echo '<table border="1">';
echo '<tr>';
echo '<td width="330">';
echo "UNIT";
echo '</td>';
echo '<td width="80">';
echo "DAY";
echo '</td>';
echo '<td width="75">';
echo "TIME";
echo '</td>';
echo '<td width="100">';
echo "ROOM";
echo '</td>';
echo '<td width="120">';
echo "LECTURER";
echo '</td>';
echo '</tr>';
echo '</table>';
echo '<table border="1">';
echo '<tr>';
echo '<td width="330">';
echo $result['code'];
echo "&nbsp";
echo $result['unit'];
echo '<td width="80">';
$days=$result["day"];
echo $days;
echo '</td>';
echo '<td width="75">';
$time=$result['time'];
echo $time;
echo '</td>';
echo '<td width="100">';
$room=$result['room'];
echo $room;
echo '</td>';
echo '<td width="120">';
$lecturer=$result['lecturer'];
echo $lecturer;
echo '</td>';
echo '</tr>';
echo '</table>';
}
}
else{
echo "result not found";
}
?>
</div>
</div>
<div id="footer">
<center>
<table border="0"><tr><td>
<h3>CUEA</h3></td><td><h4>TechniSoft@2014</h4> </td></tr></table></center><br /><br />
</div>
</div>
</center>
</body>
</html>
