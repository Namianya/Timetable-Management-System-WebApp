<?php
require_once('connection.php');
$Err="";
if(isset($_POST['submit'])){
$unit=$_POST['unit'];
$days= array('monday','tuesday','wednesday','thursday','friday');
$time=array('8am-11am','11am-2pm','2pm-5pm');
$rooms= array('Oh 11','Oh 13','Oh 14','Oh 22','Oh Lab','Th Lab A','Jh Upper Lab');
$id=0;
$r=0;
$m=1;
$d=0;
$y=1;
$t=0;
if(isset($_POST['cmt102'])){
$code[]="CMT 102";
$name[]="Fundamentals Of Computing";
$lecturers []=$_POST['cmt102'];
}
if(isset($_POST['cmt100'])){
$code[]="CMT 100";
$name[]="Physics For Computer Science I";
$lecturers []=$_POST['cmt100'];
}
if(isset($_POST['cmt108'])){
$code[]="CMT 108";
$name[]="Internet Technology";
$lecturers []=$_POST['cmt108'];
}
if(isset($_POST['cmt106'])){
$code[]="CMT 106";
$name[]="Elements Of Accounting";
$lecturers []=$_POST['cmt106'];
}
if(isset($_POST['cmt104'])){
$code[]="CMT 104";
$name[]="Entrepreneurship";
$lecturers []=$_POST['cmt104'];
}
if(isset($_POST['cmt101'])){
$code[]="CMT 101";
$name[]="Hardware And Software Maintainance";
$lecturers []=$_POST['cmt101'];
}
if(isset($_POST['cmt103'])){
$code[]="CMT 103";
$name[]="Programming Methodology";
$lecturers []=$_POST['cmt103'];
}
if(isset($_POST['cmt105'])){
$code[]="CMT 105";
$name[]="Programming Methodology Lab";
$lecturers []=$_POST['cmt105'];
}
if(isset($_POST['cmt107'])){
$code[]="CMT 107";
$name[]="Computer Networks";
$lecturers []=$_POST['cmt107'];
}
if(isset($_POST['cmt109'])){
$code[]="CMT 109";
$name[]="Database Systems";
$lecturers []=$_POST['cmt109'];
}
if(isset($_POST['cmt200'])){
$code[]="CMT 200";
$name[]="Semi-Conductor Theory";
$lecturers []=$_POST['cmt200'];
}
if(isset($_POST['cmt202'])){
$code[]="CMT 202";
$name[]="Object Oriented Programming I";
$lecturers []=$_POST['cmt202'];
}
if(isset($_POST['cmt204'])){
$code[]="CMT 204";
$name[]="Object Oriented Programming II Lab";
$lecturers []=$_POST['cmt204'];
}
if(isset($_POST['cmt203'])){
$code[]="CMT 203";
$name[]="Introduction To System Administration";
$lecturers []=$_POST['cmt203'];
}
if(isset($_POST['cmt208'])){
$code[]="CMT 208";
$name[]="Introduction To Artificial Intelligence";
$lecturers []=$_POST['cmt208'];
}
if(isset($_POST['cmt205'])){
$code[]="CMT 205";
$name[]="Computer Architecture";
$lecturers []=$_POST['cmt205'];
}
if(isset($_POST['cmt301'])){
$code[]="CMT 301";
$name[]="Research Methodology";
$lecturers []=$_POST['cmt301'];
}
if(isset($_POST['cmt302'])){
$code[]="CMT 302";
$name[]="Advance Database Systems";
$lecturers []=$_POST['cmt302'];
}
if(isset($_POST['cmt303'])){
$code[]="CMT 303";
$name[]="Object Oriented Programming II";
$lecturers []=$_POST['cmt303'];
}
if(isset($_POST['cmt304'])){
$code[]="CMT 304";
$name[]="Data Structure and Algorithms";
$lecturers []=$_POST['cmt304'];
}
if(isset($_POST['cmt305'])){
$code[]="CMT 305";
$name[]="Object Oriented Programming II Lab";
$lecturers []=$_POST['cmt305'];
}
if(isset($_POST['cmt306'])){
$code[]="CMT 306";
$name[]="System Analysis and Design";
$lecturers []=$_POST['cmt306'];
}
if(isset($_POST['cmt307'])){
$code[]="CMT 307";
$name[]="Visual Programming II (VB.NET)";
$lecturers []=$_POST['cmt307'];
}
if(isset($_POST['cmt308'])){
$code[]="CMT 308";
$name[]="Distributed Systems";
$lecturers []=$_POST['cmt308'];
}
if(isset($_POST['cmt309'])){
$code[]="CMT 309";
$name[]="Design and Analysis of Algorithms";
$lecturers []=$_POST['cmt309'];
}
if(isset($_POST['cmt311'])){
$code[]="CMT 311";
$name[]="Fundamental of Software Engineering";
$lecturers []=$_POST['cmt311'];
}
if(isset($_POST['cmt401'])){
$code[]="CMT 401";
$name[]="Human Computer Interface";
$lecturers []=$_POST['cmt401'];
}
if(isset($_POST['cmt411'])){
$code[]="CMT 411";
$name[]="Decision Support Systems";
$lecturers []=$_POST['cmt411'];
}
if(isset($_POST['cmt420'])){
$code[]="CMT 420";
$name[]="Systems Programming";
$lecturers []=$_POST['cmt420'];
}
if(isset($_POST['cmt417'])){
$code[]="CMT 417";
$name[]="Advance Web Development";
$lecturers []=$_POST['cmt417'];
}
if(isset($_POST['cmt418'])){
$code[]="CMT 418";
$name[]="Multimedia Systems";
$lecturers []=$_POST['cmt418'];
}
if(isset($_POST['cmt405'])){
$code[]="CMT 405";
$name[]="Information Systems Security";
$lecturers []=$_POST['cmt405'];
}
if(isset($_POST['cmt403'])){
$code[]="CMT 403";
$name[]="Managemant Information Systems";
$lecturers []=$_POST['cmt403'];
}
if(isset($_POST['cmt423'])){
$code[]="CMT 423";
$name[]="E-Commerce";
$lecturers []=$_POST['cmt423'];
}
if(isset($_POST['cmt406'])){
$name[]="ICT and Society";
$code[]="CMT 406";
$lecturers []=$_POST['cmt406'];
}
if(isset($_POST['cmt404'])){
$name[]="Computer Graphics";
$code[]="CMT 404";
$lecturers []=$_POST['cmt404'];
}
for ($i=0; $i<sizeof($unit);$i++){
$lecturer=$lecturers[$i];
$unitcode=$code[$i];
$unitname=$name[$i];
$id=$id+1;
if($m<=15){
$room=$rooms[$r];
}
elseif($m>15 && $m<=30){
$room=$rooms[$r];
}
elseif($m>30 && $m<=45){
$room=$rooms[$r];
}
elseif($m>45 && $m<=60){
$room=$rooms[$r];
}
elseif($m>60 && $m<=75){
$room=$rooms[$r];
}
elseif($m>75 && $m<=80){
$room=$rooms[$r];
}
elseif($m>80 && $m<=95){
$room=$rooms[$r];
}
if($y<=3){
$day=$days[$d];
}
elseif($y>3 && $y<=6){
$day=$days[$d];
}
elseif($y>6 && $y<=9){
$day=$days[$d];
}
elseif($y>9 && $y<=12){
$day=$days[$d];
}
elseif($y>12 && $y<=15){
$day=$days[$d];
}
if($day=="thursday" && $t==1){
$t=$t+1;
}
$daytime=$time[$t];
$sql = mysql_query("INSERT INTO temptable(code,unit,day,time,room,lecturer,ID) VALUES('$unitcode','$unitname','$day','$daytime','$room','$lecturer','$id')");
//mysql_query($sql,$db) or die(mysql_error());
$result = mysql_query($sql);
$m=$m+1;
$y=$y+1;
$t=$t+1;
if($y==16){
$d=0;
$y=1;
}
if($t==3){
$t=0;
}
if($y==4){
$d=$d+1;
}
elseif($y==7){
$d=$d+1;
}
elseif($y==10){
$d=$d+1;
}
elseif($y==13){
$d=$d+1;
}
if($m==16){
$r=$r+1;
}
elseif($m==31){
$r=$r+1;
}
elseif($m==46){
$r=$r+1;
}
if($m==61){
$r=$r+1;
}
if($m==76){
$r=$r+1;
}
if($m==91){
$r=$r+1;
}
}
//echo "WORKING FOR A.......";
//include("C:\wamp\www\main project\include\diplaytemptable.php");
//echo "ONE STEP DONE TOWARDS GETTING A";
}
?>
<?php
if(isset($_GET['home'])){
		$createtimetable= NULL;
		$home=$_GET['home'];
		$contacts=NULL;
		$changepassword=NULL;
		$timetable=NULL;
		}
		elseif(isset($_GET['contacts'])){
		$home= NULL;
		$createtimetable = NULL;
		$contacts=$_GET['contacts'];
		$changepassword=NULL;
		$timetable=NULL;
		}
		elseif(isset($_GET['changepassword'])){
		$home= NULL;
		$createtimetable = NULL;
		$contacts=$_GET['changepassword'];
		$changepassword=NULL;
		$timetable=NULL;
		}
		elseif(isset($_GET['timetable'])){
		$home= NULL;
		$createtimetable = NULL;
		$contacts=NULL;
		$changepassword=NULL;
		$timetable=$_GET['timetable'];
		}
		else
		{
		$changepassword=NULL;
		$createtimetable = NULL;
		$home= NULL;
		$contacts=NULL;
		$timetable=NULL;
		}
?>
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
<style>
.title{
  background:#990000;
  padding:5px;
  color:#fff;
  border-radius:4px;
  text-align:center;
  width:730px;
}
</style>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.8.1.min.js"></script>
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
}</script>
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
<div id="content"><?php
echo "<font face='comic sans ms' size='4'>
<p class='title'>TIMETABLE GENERATED BY THE SYSTEM</p>
</font>";
				include("C:\wamp\www\main project\include\diplaytemptable.php");
				
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


