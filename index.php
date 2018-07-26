<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Computer Science Timetable</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
$usernameErr = $credentialErr = $passwordErr="";
if($_SERVER['REQUEST_METHOD']=="POST"){
if(empty($_POST['username']))
{$usernameErr="Missing Username!!";}
if(empty($_POST['password']))
{$passwordErr="Missing Password!!";}
require_once('connection.php');
if(isset($_POST['log'])){
$username=$_POST['username'];
$pass=$_POST['password'];
$usergroup=$_POST['group'];
$qry="SELECT * FROM user WHERE username='$username' AND password='$pass' AND id='$usergroup'";
$result=mysql_query($qry);
if($result) {
if(mysql_num_rows($result) > 0) {
if($pass=='1234'){
header("location: firstlogin.php");
}
else{
if($usergroup=='administrator'){
header("location: admin.php");
}
if($usergroup=='lecturer'){
header("location: lecturer.php");
}
if($usergroup=='student'){
header("location: student.php");
}
exit();
}
}
else{$credentialErr="Invalid Log in credential";}
}
}
}
?>
<center><br /><br /><br /><br /><br /><br />
<div id="login">
<div id="title1"><div id="words">
<h3>Computer Science Timetable</h3></div>
<div id="logo1">
<img src="image/Logo.jpg" height="45" width="50"/>
</div>
</div>
<span class="error"><?php echo $usernameErr;?> <?php echo $passwordErr;?><?php echo $credentialErr;?></span>
<form method="post" action="index.php">
<div id="details">
Please enter or select your System Login Credentials below and press the "Login" button to proceed.
<table border="0"><tr><td>
<img src="image/login.jpg"/></td><td>
<table border="0" cellspacing="10">
<tr><td><b> Registration Number #:</b> </td><td><input type="text" name="username"/></td></tr>
<tr><td><b> Password:</b></td><td><input type="password" name="password" /></td></tr>
<tr><td><b> User Group:</b></td><td><select name="group">
<option value="---Select Your Group---">---Select Your Group---</option>
<option value="student">Student</option>
<option value="lecturer">Lecturer</option>
<option value="administrator">Administrator</option>
</select></td></tr>
</table>
</td></tr></table>
If you have forgotten your password, please<a href="forgotpass.php"> Click here</a>
</div><br />
<div id="access">
<div id="log">
<input type="submit" value="Log In" name="log" style="cursor:pointer"/>
</div>
<div id="cancel">
<input type="reset" value="Cancel" name="clear" style="cursor:pointer"/>
</div>
</div></form>
<div id="title1"><center>
<table border="0"><tr><td>
<h3>CUEA</h3></td><td><h4>TechniSoft@2014</h4> </td></tr></table></center>
</div>
</div>
</center>
</body>
</html>
