
<?php
if(isset($_GET['createtimetable'])){
		$createtimetable = $_GET['createtimetable'];
		$home= NULL;
		$contacts=NULL;
		$edittimetable=NULL;
		}
		elseif(isset($_GET['home'])){
		$createtimetable= NULL;
		$home=$_GET['home'];
		$contacts=NULL;
		$edittimetable=NULL;
		}
		else
		{
		$createtimetable = NULL;
		$home= NULL;
		$edittimetable=NULL;
		}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Computer Science Timetable</title>
<link rel="stylesheet" type='text/css' href="css/style.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.8.1.min.js"></script>
<script src="js/script.js"></script>
<style>
.title{
  background:#990000;
  padding:5px;
  color:#fff;
  border-radius:4px;
  text-align:center;
  width:700px;
}
.title2{
  background: #0099FF;
  padding:2px;
  color:#fff;
  border-radius:4px;
  text-align:center;
  width:696px;
 }
</style>
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
<script>
function instruction(){
alert("Timetable created initially will be deleted in the Database");
}
</script>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
function changemysize(myvalue)
// this function is called by the user clicking on a text size choice
{
// find the div to apply the text resizing to
var div = document.getElementById("internal");
// apply the text size change
div.style.fontSize = myvalue + "px";
// store the text size choice into a cookie
document.cookie="mysize=" + myvalue;
}
</script>
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
<h3>Increase or Decrease Font:&nbsp&nbsp
<a href="javascript:void(0);" title="Increase font" onClick="changemysize(17); "><img src="image/increase.jpg" height="30" width="30"/></a>&nbsp
<a href="javascript:void(0);"title="Decrease font" onClick="changemysize(12);"><img src="image/decrease.jpg" height="30" width="30"/></a>
&nbsp&nbsp&nbsp
Background Themes:&nbsp&nbsp
<img src="image/Default.jpg" style="cursor:pointer"; id="bw" onClick="ChangeTheme(bw);"/>&nbsp
<img src="image/BB.jpg" style="cursor:pointer" id="bb" onClick="ChangeTheme(bb);">&nbsp
<img src="image/main-bg.jpg" style="cursor:pointer" id="defaulttheme" onClick="ChangeTheme(defaulttheme);" height="25" width="25" title="Default Background">&nbsp
</h3>
</div>
<div id="icon_search" style="margin-top:20px">
<form action="search.php" method="post">
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
<li><a href="admin.php?home"> HOME</a></li>
<li><a href="#">HELP</a></li>
<li><a href="logout.php">LOGOUT</a></li>
</ul>
</div><br /><br />
<h3>
<div id="fli" title="Click to open menus">
Timetable</div>
<div id="link0">
<a href="admin.php?createtimetable" onClick="instruction()">Create Timetable</a><br />
<hr/>
<a href="EditTimeTable.php"> Edit Timetable</a>
<hr /></div>
<div id="flip" title="Click to open menus">View</div>
<div id="link1">
<a href="#" onClick="disptimetable()"> Timetable</a><br />
<hr/>
<a href="users.php">System Users</a>
<hr />
</div>
<div id="flips" title="click to  open menus">Account</div>
<div id="link2">
<a href="logout.php">Logout</a><br />
<hr/>
<a href="adminChangepassword.php">Change Password</a>
<hr />
</div>
<div id="fliper"  title="click to open menus">Events</div>
<div id="link3">
<a href="#">IBM training</a><br />
<hr />
<a href="#">Interdisplinary week</a>
<hr />
</div>
<br />
<a href="viewQuery.php"> Query</a>
<hr><br>
<?php
$day= date("d M Y");
$time=date("h:i A");
	echo $day;
	echo "<br>";
	echo $time;
?>
</div></h3>
<div id="content">
<?php
require_once("connection.php");
$result=mysql_query("select * from query");
echo "<font face='comic sans ms' size='4'>
<p class='title'>QUERIES SEND AFTER THE LAST CHECK</p>
</font>";
$counter=0;
while($query=mysql_fetch_array($result))
{
$counter=$counter+1;
$sender=$query['sender'];
$subject=$query['subject'];
$q=$query['Query'];
$result2=mysql_query("select firstname,secondname from user where username='$sender'");
while($query2=mysql_fetch_array($result2)){
$fname=$query2['firstname'];
$sname=$query2['secondname'];
}
echo "<div class='dis' style='border:solid thin; width:700px; border-radius:5px;'>";
echo "<font face='comic sans ms' size='4'><div class='title2'>";
echo "QUERY";
echo "&nbsp";
echo "$counter";
echo "</div>";
echo "</font>";
echo "<table border='0'>";
echo "<tr>";
echo "<td>";
echo "<b>";
echo "From:";
echo "</b>";
echo "</td>";
echo "<td>";
echo $fname;
echo "&nbsp";
echo $sname;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "<b>";
echo "About:";
echo "</b>";
echo "</td>";
echo "<td>";
echo $subject;
echo "</td>";
echo "<tr>";
echo "</tr>";
echo "<td>";
echo "<b>";
echo "Query:";
echo "</b>";
echo "</td>";
echo "<td>";
echo $q;
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
echo"</br>";

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
