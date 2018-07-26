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
</h3>
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
<?php
require_once("connection.php");
$result= mysql_query("select max(id) from query");
while($query=mysql_fetch_array($result)){
$addq=$query['max(id)'];
}
?>
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
$ErrViewAll= "";
require_once('connection.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['ViewAll'])){
$Allcode=$_POST['ChangeAll'];
if(empty($_POST['ChangeAll'])){
$ErrViewAll="Unit Code for the Unit to be Reallocated Required!!";
}
$qry="SELECT * FROM temptable WHERE code='$Allcode'";
$result=mysql_query($qry);
if($result) {
if(mysql_num_rows($result) > 0) {
}
else{
$ErrViewAll="Unit Code not in the timetable!!";
}
}
$result=mysql_query("select * from temptable where code='$Allcode'");
while($view=mysql_fetch_array($result)){
$Alllecturer=$view['lecturer'];
$Allcode=$view['code'];
$Allname=$view['unit'];
$Allday=$view['day'];
$Alltime=$view['time'];
$Allroom=$view['room'];
echo "<form action='ChangeAllocation.php' method='post'>";
echo "<table cellspacing='10px'>";
echo "<tr>";
echo "<td>";
echo "<b>";
echo "Unit Code:";
echo "</b>";
echo "&nbsp";
echo "</td>";
echo "<td>";
echo"<input type='text' name='Allcode' value='$Allcode'>";
echo "<br>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "<b>";
echo "Unit Name:";
echo "</b>";
echo "&nbsp";
echo "</td>";
echo "<td>";
echo $Allname;
echo "<br>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "<b>";
echo "Day Allocated:";
echo "</b>";
echo "&nbsp";
echo "</td>";
echo "<td>";
echo "<input type='text' name='Allday' value='$Allday'>";
echo "<br>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "<b>";
echo "Time Allocated:";
echo "</b>";
echo "&nbsp";
echo "</td>";
echo "<td>";
echo "<input type='text' name='Alltime' value='$Alltime'>";
echo "<br>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "<b>";
echo "Room Allocated:";
echo "</b>";
echo "&nbsp";
echo "</td>";
echo "<td>";
echo "<input type='text' name='Allroom' value='$Allroom'>";
echo "<br>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "<b>";
echo "Lecturer Allocated:";
echo "</b>";
echo "&nbsp";
echo "</td>";
echo "<td>";
echo "<input type='text' name='Alllecturer' value='$Alllecturer'>";
echo "<br>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";
echo "<input type='Submit' value='ReAllocate' name='Reallocate'>";
echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";
echo "<input type='button' value='Cancel' name='cancel'>";
echo "</form>";
}
}
$Err="";
if(isset($_POST['Reallocate'])){
if(empty($_POST['Allday'])){
$Err="Allocation day can not be blank";
}
if(empty($_POST['Alltime'])){
$Err="Allocation time can not be blank";
}
if(empty($_POST['Allroom'])){
$Err="Allocation room can not be blank";
}
if(empty($_POST['Alllecturer'])){
$Err="Allocation Lecturer can not be blank";
}
$Allcode=$_POST['Allcode'];
$Allday=$_POST['Allday'];
$Alltime=$_POST['Alltime'];
$Allroom=$_POST['Allroom'];
$Alllecturer=$_POST['Alllecturer'];
for ($i=0;$i<2;$i++){
if($i==0){
$check2=mysql_query("select * from temptable where room='$Allroom' and day='$Allday' and time='$Alltime'");
if($check2){
if(mysql_num_rows($check2)>0){
$Err="Room in use!!";
break;
}
}
}
else{
$query=mysql_query("select code from temptable where code='$Allcode'");
if(mysql_num_rows($query) > 0){
mysql_query("update temptable set day='$Allday' where code='$Allcode'");
mysql_query("update temptable set time='$Alltime' where code='$Allcode'");
mysql_query("update temptable set room='$Allroom' where code='$Allcode'");
mysql_query("update temptable set lecturer='$Alllecturer' where code='$Allcode'");
}
}
}
}
}
?>
<span class="error"><?php echo $Err; ?> <?php echo $ErrViewAll;?></span>
<?php
require_once('connection.php');
$query=mysql_query("SELECT * FROM temptable");
echo '<table border="1">';
echo '<tr>';
echo '<td width="330">';
echo "<b>";
echo "UNIT";
echo "</b>";
echo '</td>';
echo '<td width="80">';
echo "<b>";
echo "DAY";
echo "</b>";
echo '</td>';
echo '<td width="75">';
echo "<b>";
echo "TIME";
echo "</b>";
echo '</td>';
echo '<td width="100">';
echo "<b>";
echo "ROOM";
echo "</b>";
echo '</td>';
echo '<td width="120">';
echo "<b>";
echo "LECTURER";
echo "</b>";
echo '</td>';
echo '</tr>';
echo '</table>';
while($result=mysql_fetch_array($query))
{
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
