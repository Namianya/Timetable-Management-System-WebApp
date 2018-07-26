
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
  width:470px;
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
<form action="lecSearch.php" method="post">
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
<li><a href="lecturer.php?home"> HOME</a></li>
<li><a href="#">HELP</a></li>
<li><a href="logout.php">LOGOUT</a></li>
</ul>
</div><br /><br />
<h3>
<div id="flip" title="Click to open menus">View</div>
<div id="link1">
<a href="#"onClick="disptimetable()"> Timetable</a><br />
<hr/>
</div>
<div id="flips" title="click to  open menus">Account</div>
<div id="link2">
<a href="logout.php">Logout</a><br />
<hr />
<a href="changepassword.php">Change Password</a>
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
<a href="query.php" title="click to write query">Query</a>
</div></h3>
<div id="content">
<form method="post" action="query.php">
<font face="Courier New, Courier, monospace"><h3 class="title2">Fill The Form Below To Send  A Query</h3></font>
<table cellpadding="10">
<tr>
<td>
UserName:
</td>
<td>
<input type="text" name="Username" />
</td>
</tr>
<tr>
<td>
Subject:
</td>
<td>
<select name="subject">
<option>--Select--</option>
<option> Unit ReAllocation</option>
<option> Unit Allocation</option>
<option>Other</option></select>
</td>
</tr>
<tr>
<td>
Query:
</td>
<td>
<textarea name="query" style="size:100"></textarea>
</td>
</tr>
<tr>
<td>
<input type="submit" value="SEND" name="submit2" />
</td>
<td>
<input type="reset" value="CLEAR" />
</td>
</tr>
</table>
</form>
<?php
$userErr = $subjectErr = $queryErr = $save= "";
if($_SERVER['REQUEST_METHOD']=="POST"){
if (isset($_POST['submit2'])){
for ($i=0;$i<4;$i++){
if($i==0){
if(empty($_POST['Username'])){
$userErr="UseName Required!!";
break;
}
if($_POST['subject']=='--Select--'){
$subjectErr="Select Subject First!!";
break;
}
if(empty($_POST['query'])){
$queryErr="Type Query First";
break;
}
}
if($i==2){
require_once("connection.php");
$user=$_POST['Username'];
$subject=$_POST['subject'];
$q=$_POST['query'];
$query=mysql_query("select * from user where username='$user'");
if($query){
if(mysql_num_rows($query)>0){
mysql_query("insert into query (sender,query,subject) values('$user','$q','$subject')");
}
else{
$userErr="User does not EXIST";
break;}
}
}
if($i==3){
$save="Query is Submitted";
}
}
}
}
?>
<span class="error"><?php echo $userErr;?><?php echo $subjectErr;?><?php echo $queryErr;?></span>
<span class="info"><?php echo  $save;?></span>
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

