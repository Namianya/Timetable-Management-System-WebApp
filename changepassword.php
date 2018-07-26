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
<script>
function instruction(){
alert("You will be required to logIn again if Successful");
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
  width:500px;
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
<div id="flip" title="Click to open menus"><p>View</p></div>
<div id="link1">
<a href="#" onClick="disptimetable()"> Timetable</a><br />
<hr/>
</div>
<div id="flips" title="click to  open menus"><p>Account</p></div>
<div id="link2">
<a href="logout.php">Logout</a><br />
<hr />
<a href="#" onClick="dispchangepass()">Change Password</a>
<hr />
</div>
<div id="fliper"  title="click to open menus"><p>Events</p></div>
<div id="link3">
<a href="#">IBM training</a><br />
<hr />
<a href="#">Interdisplinary week</a>
<hr />
</div>
<br />
</div></h3>
<div id="content">
<?php
// define variables and set to empty values
$usernameErr = $passwordErr = $newpasswordErr = $confirmpasswordErr = $mismatchErr = $detailErr="";
require_once("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	  if (empty($_POST["username"]))
     {$usernameErr = "UserName required";}
   if (empty($_POST["password"]))
     {$passwordErr = "Password required";}
     if (empty($_POST["newpassword"]))
     {$newpasswordErr  = "New password is required";}
	 if (empty($_POST["confirmpassword"]))
     {$confirmpasswordErr  = "Confirm password first";}
	 if (isset($_POST['submit'])){
	 $user=$_POST['username'];
	 $pass=$_POST['password'];
	 $newpass=$_POST['newpassword'];
	 $conpass=$_POST['confirmpassword'];
	 if( $newpass != $conpass){
	 $mismatchErr="New password and Confirm password Mismatch";
	 }
	 if($newpass ==$user){
	  $mismatchErr="Password matches UserName";
	 }
	 $qry="SELECT * FROM user WHERE username='$user' AND password='$pass'";
     $result=mysql_query($qry);
	 if($result) {
     if(mysql_num_rows($result) > 0) {
	mysql_query("update user set password='$conpass' where username='$user'");
	header("location: index.php");
	}
	else{ $mismatchErr="User does not exist";}
	}
	}
	}
?>
<font face="Courier New, Courier, monospace"> <h3 class="title2">FILL DETAILS BELOW</h3></font>
<span class="error">* required field.</span><br>
<span class="error"><?php echo $mismatchErr;?></span>
<form method="post" action="changepassword.php">
<table cellspacing="10">
 <tr>
   <td>UserName:</td><td><input type="text" name="username"></td>
   <td><span class="error">* <?php echo $usernameErr;?></span></td>
  </tr>
  <tr>
   <td>Password: </td><td><input type="password" name="password"></td>
  <td> <span class="error">* <?php echo $passwordErr;?></span></td>
  </tr>
  <tr>
   <td>New Password:</td> <td> <input type="password" name="newpassword"></td>
   <td><span class="error">* <?php echo $newpasswordErr;?></span></td>
  </tr>
  <tr>
   <td>Confirm Password:</td><td> <input type="password" name="confirmpassword"></td>
   <td><span class="error">* <?php echo $confirmpasswordErr;?></span></td>
   </tr>
   </table>
   <table cellpadding="20px">
   <tr>
   <td></td><td><input type="submit" name="submit" value="Change Password" onClick="instruction()"></td><td><input type="reset" value="CLEAR"></td>
   </tr>
   </table>
</form>
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
