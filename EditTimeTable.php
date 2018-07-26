<?php
require_once('connection.php');
$Errcode = $Errname = $Errday = $Errtime = $ErrRoom = $ErrCheck1 = $ErrCheck2 = $ErrCheck3 = $Errlecturer = $ErrRunit = "";
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['Add'])){
if(empty($_POST['addcode'])){
$Errcode="Unit Not Added Missing Unit Code!!";}
if(empty($_POST['addname'])){
$Errname="Unit Not Added Missing Unit Name!!";}
if(empty($_POST["addday"])){
$Errday="Unit Not Added Missing Day!!";}
if(empty($_POST['addtime'])){
$Errtime="Unit Not Added Missing Time!!";}
if(empty($_POST['addroom'])){
$ErrRoom="Unit Not Added Missing Room!!";}
if(empty($_POST['addlecturer'])){
$Errlecturer="Unit Not Added Missing Lecturer!!";}
$acode=$_POST['addcode'];
$ucode=strtoupper($acode);
$aname=$_POST['addname'];
$aday=$_POST['addday'];
$atime=$_POST['addtime'];
$aroom=$_POST['addroom'];
$alecturer=$_POST['addlecturer'];
$id=mysql_query("select max(ID) from temptable");
$curid=$id+1;
$i=0;
for ($i=0;$i<2;$i++){
if($i==0){
$check1=mysql_query("select * from temptable where code='$acode'");
if($check1) {
if(mysql_num_rows($check1) > 0) {
$ErrCheck1="Unit is in the TimeTable!!";}
}
$check2=mysql_query("select * from temptable where room='$aroom' and day='$aday' and time='$atime'");
if($check2){
if(mysql_num_rows($check2)>0){
$ErrCheck2="Unit Not Added Room in use the time you choice!!";}
}
$check3=mysql_query("select * from temptable where time='$atime' and day='$aday' and lecturer='$alecturer' ");
if($check3){
if(mysql_num_rows($check3)>0){
$ErrCheck3="Unit Not Added Lecturer busy the time allocated!!";}
}
break;
}
else{
mysql_query("insert into temptable (code,unit,day,time,room,lecturer,ID) values('$ucode','$aname','$aday','$atime','$aroom','$alecturer','$curid')");
}
}
}
if(isset($_POST['remove'])){
if(empty($_POST['removeUnit'])){
$ErrRunit="Unit Code for the Unit to be Deleted Required!!";
}
$Runit=$_POST['removeUnit'];
$unit=strtoupper($Runit);
$sq=mysql_query("DELETE FROM temptable WHERE code='$unit'");
}

}
?>
<html>
<head>
<title>Generated Timetable</title>
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
<script src="js/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#change").click(function(){
  $("#changeT").show("slow");
	$("#timeT").show("slow");
	$("#removeunit").hide("slow");
	$("#disAddUnit").hide("slow");
  });
});
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
$(document).ready(function(){
  $("#addunit").click(function(){
   	$("#timeT").show("slow");
	$("#removeunit").hide("slow");
	$("#disAddUnit").show("slow");
	 $("#changeT").hide("slow");
  });
});
</script>
<script> 
$(document).ready(function(){
  $("#can").click(function(){
	$("#changeT").hide("slow");
	$("#disAddUnit").hide("slow");
  });
});
</script>
<script> 
$(document).ready(function(){
  $("#canc").click(function(){
    $("#removeunit").hide("slow");
    $("#changeT").hide("slow");
	
  });
});
</script>
<script> 
$(document).ready(function(){
  $("#removeU").click(function(){
    $("#removeunit").show("slow");
	$("#timeT").show("slow");
   $("#changeT").hide("slow");
   $("#disAddUnit").hide("slow");
  });
});
</script>
<script>
$(document).ready(function(){
$("#ViewAll").click(function(){
$("#timeT").show("slow");
$("#changeT").show("slow");
$("#Allocation").show("slow");
});
});
</script>
<script>
function allocation(){
alert ("Change unit allocation according to Free rooms and time provided");
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
<h3> Edit Time Table Here</h3>
<table cellpadding="15px">
<tr>
<td><button class="sign" id="addunit" onClick="dispAllocation()">ADD UNIT</button></td>
<td><button class="sign" id="removeU">REMOVE UNIT</button></td>
<td><button class="sign" id="change" onClick="dispAllocation()">CHANGE ALLOCATION</button></td>
</tr>
</table>
<span class="error"><?php echo $Errcode;?> <?php echo $Errname;?><?php echo $Errday;?><?php echo $Errtime;?><?php echo $ErrRoom;?><?php echo $Errlecturer;?><?php echo $ErrCheck1;?><?php echo $ErrCheck2;?><?php echo $ErrCheck3;?><?php echo $ErrRunit;?></span>
<div id="disAddUnit" style="width:auto; height:auto; display:none;">
<form action="EditTimeTable.php" method="post">
<table border="1">
<tr>
<td>Unit Code</td>
<td>Unit Name</td>
<td>Day</td>
<td>Time</td>
<td>Room</td>
<td>Lecturer</td>
</tr>
<tr>
<td><input type="text" name="addcode" size="10"/></td>
<td><input type="text" name="addname"/></td>
<td><input type="text" name="addday" size="15"/></td>
<td><input type="text" name="addtime" size="15"/></td>
<td><input type="text" name="addroom" size="15"/></td>
<td><input type="text" name="addlecturer" /></td>
</tr>
</table>
<br>
<input type="submit" value="ADD UNIT" name="Add"/>
</form>
<button class="sign" id="can">CANCEL</button>
</div>
<div id="removeunit" style="width:auto; height:auto; display:none">
<table cellpadding="15px">
<form action="EditTimeTable.php" method="post">
<tr>
<td>Type Unit Code:</td> <td><input type="text" name="removeUnit"/></td>
<td><input type="submit" value="DELETE" name="remove"/></td>
</tr>
</form>
<tr>
<td>
</td>
<td><button class="sign" id="canc">CANCEL</button></td>
</tr>
</table>
</div>
<div id="changeT" style="width:auto; height:auto; display:none">
<table cellpadding="15px">
<form action="ChangeAllocation.php" method="post">
<tr>
<td>Type Unit Code to Change Allocation:</td> <td><input type="text" name="ChangeAll"/></td>
<td><input type="submit" value="View Allocation" name="ViewAll" id="ViewAll"/></td>
</tr>
</form>
</table>
</div>
<div id="timeT">
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