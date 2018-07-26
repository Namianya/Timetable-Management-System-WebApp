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
<?php
require_once("connection.php");
$Err = $Errname ="";
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['adduser'])){
for($i=0; $i<2; $i++){
if($i==0){
if(empty($_POST['addusername'])){
$Errname="Username Required!!";
break;
}
if($_POST['group']=='---Select Your Group---'){
$Err="Select user group!!";
break;
}
}
else{
$userName=$_POST['addusername'];
$userGroup=$_POST['group'];
$userPassword=$_POST['adduserpassword'];
$query=mysql_query("insert into user (username, password,id) values ('$userName','$userPassword','$userGroup')");
}
}
}
if(isset($_POST['delete'])){
if(empty($_POST['removeusername'])){
$Errname="Username Required!!";
}
$removeUserName=$_POST['removeusername'];
$query=mysql_query("delete from user where username='$removeUserName'");
}
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
<script> 
$(document).ready(function(){
  $("#cancel1").click(function(){
   	$("#adduser").hide("slow");
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
  $("#cancel2").click(function(){
	$("#removeuser").hide("slow");
  });
});
</script>
<script> 
$(document).ready(function(){
  $("#cancel3").click(function(){
	$("#changeudetails").hide("slow");
  });
});
</script>
<script> 
$(document).ready(function(){
  $("#addUser").click(function(){
   	$("#adduser").show("slow");
	$("#removeuser").hide("slow");
	$("#changeudetails").hide("slow");
  });
});
</script>
<script> 
$(document).ready(function(){
  $("#removeUser").click(function(){
   	$("#adduser").hide("slow");
	$("#removeuser").show("slow");
	$("#changeudetails").hide("slow");
  });
});
</script>
<script> 
$(document).ready(function(){
  $("#changeUDetail").click(function(){
   	$("#adduser").hide("slow");
	$("#removeuser").hide("slow");
	$("#changeudetails").show("slow");
  });
});
</script>
<style>
.title{
 background: #0099FF;
  padding:5px;
  color:#fff;
  border-radius:4px;
  text-align:center;
  width:630px;
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
<font face="Courier New, Courier, monospace" size="+3"><p class="title"><b>CURRENT SYSTEM USERS</b></p></font>
<span class="error"><?php echo $Err; ?> <?php echo $Errname;?></span>
<?PHP
require_once("connection.php");
$query=mysql_query("select username, password, id from user");
echo "<table border='1'>";
echo "<tr>";
echo "<td  width='180'>";
echo "<b>";
echo "UserName";
echo "</b>";
echo "</td>";
echo "<td  width='300'>";
echo "<b>";
echo "Password";
echo "</b>";
echo "</td>";
echo "<td  width='130'>";
echo "<b>";
echo "UserGroup";
echo "</b>";
echo "</td>";
echo "</tr>";
echo "</table>";
while($result=mysql_fetch_array($query)){
echo "<table border='1'>";
echo "<tr>";
echo "<td width='180'>";
echo $result['username'];
echo "</td>";
echo "<td width='300'>";
$pass=$result['password'];
$enpass=md5($pass);
echo $enpass;
echo "</td>";
echo "<td width='130'>";
echo $result['id'];
echo "</td >";
echo "</tr>";
echo "</table>";
}	
?>
<table cellpadding="10px">
<tr>
<td><button class="sign" id="addUser">ADD USER</button></td>
<td><button class="sign" id="removeUser">REMOVE USER</button></td>
</tr>
</table>
<div id="adduser" style="width:auto; height:auto; display:none; ">
<font face="Courier New, Courier, monospace">ENTER NEW USER DETAILS</font>
<form method="post" action="users.php">
<table border='1'>
<tr>
<td  width='180'>UserName</td>
<td  width='130'>Password</td>
<td  width='130'>UserGroup</td>
</tr>
<tr>
<td><input type="text" name="addusername" width="180"></td>
<td><input type="text" name="adduserpassword" value="1234" width="130"></td>
<td><select name="group">
<option value="---Select Your Group---">---Select User Group---</option>
<option value="student">Student</option>
<option value="lecturer">Lecturer</option>
<option value="admin">Administrator</option>
</select></td>
</tr>
</table>
<br>
<input type="submit" value="ADD USER" name="adduser">
</form>
<button class="sign" id="cancel1" style="width:115">CANCEL</button>
</div>
<div id="removeuser" style="width:auto; height:auto; display:none;">
<font face="Courier New, Courier, monospace">DELETE USER FROM THE SYSTEM</font>
<form method="post" action="users.php">
<table>
<tr><td width="110">Type Usename:</td><td><input type="text" name="removeusername" width="180"></td></tr></table>
<br>
<input type="submit" value="DELETE USER" name="delete">
</form>
<button class="sign" id="cancel2" style="width:115">CANCEL</button>
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
