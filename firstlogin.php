<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type='text/css' href="css/style.css">
<style>
.title{
  background:#990000;
  padding:5px;
  color:#fff;
  border-radius:4px;
  text-align:center;
  width:400px;
}
.title2{
  background: #0099FF;
  padding:5px;
  color:#fff;
  border-radius:4px;
  text-align:center;
  width:400px;
}
#forgotpass{
height:auto;
width:440px;
border:solid thin;
border-radius:5px;
}
</style>
<script>
function info(){
alert("Details Saved Successfully"); 
}
</script>
</head>
<body>
<center>
<?php
// define variables and set to empty values
$fnameErr = $snameErr = $hintErr= $conpassErr= $passErr = $combErr= $regErr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
if(isset($_POST['submit'])){
if (empty($_POST["fname"]))
     {$fnameErr = "First name required";}
	  if (empty($_POST["sname"]))
     {$snameErr = "Second name required";}
   if (empty($_POST["pass"]))
     {$passErr = "UserName required";}
	  if (empty($_POST["conpass"]))
     {$conpassErr = "UserName required";}
	 if (empty($_POST["hint"]))
     {$hintErr  = "Hint Required";}
	 if (empty($_POST['regnum'])){
	 $regErr="Registration number required"; }
require_once("connection.php");
$fname=$_POST['fname'];
$sname=$_POST['sname'];
$pass=$_POST['pass'];
$conpass=$_POST['conpass'];
$hint=$_POST['hint'];
$regno=$_POST['regnum'];
if($conpass != $pass){
 $combErr=("Password and Confirm password mismatch");
}
if($conpass==$regno){
$combErr=("Password can not be your registration number");
}
if($conpass==$fname){
$combErr=("Password can not be your first name");
}
if($conpass==$sname){
$combErr=("Password can not be your second name");
}
if($conpass==$hint){
$combErr=("Password can not be your hint");
}
$query=mysql_query("select username from user where username='$regno'");
if($query) {
if(mysql_num_rows($query) > 0){
mysql_query("update user set password='$pass' where username='$regno'");
mysql_query("update user set hint='$hint' where username='$regno'");
mysql_query("update user set firstname='$fname' where username='$regno'");
mysql_query("update user set secondname='$sname' where username='$regno'");
echo "<font face='comic sans ms' size='4'>
	<p class='title2'>Details Saved click<a href='index.php'> LOGIN</a></p>
	</font>";
}
else($conErr="User does not exist");
} 
}
}

?>
<div id="forgotpass">
<font face='comic sans ms' size='4'>
<p class="title">Change Password First</p>
</font>
<font face="Courier New, Courier, monospace"><h3>Fill In Your Details Below</h3></font>
<span class="error">* required field.</span> 
<br>
<span class="error"><?php echo $combErr;?></span> 
<form method="post" action="firstlogin.php">
<table cellspacing="8" cellpadding="0">
<tr>
 <td>  First Name:</td><td> <input type="text" name="fname"></td>
  <td> <span class="error">* <?php echo $fnameErr;?></span></td>
 </tr>
 <tr>
   <td>Second Name:</td><td><input type="text" name="sname"></td>
   <td><span class="error">* <?php echo $snameErr;?></span></td>
  </tr>
  <tr>
  <tr>
   <td>Registration Number:</td><td><input type="text" name="regnum"></td>
   <td><span class="error">* <?php echo $regErr;?></span></td>
  </tr>
  <tr>
   <td>New Password: </td><td><input type="password" name="pass"></td>
  <td> <span class="error">* <?php echo $passErr;?></span></td>
  </tr>
  <tr>
   <td>Confirm Password: </td><td><input type="password" name="conpass"></td>
  <td> <span class="error">* <?php echo $conpassErr;?></span></td>
  </tr>
  <tr>
   <td>Hint:</td> <td> <input type="text" name="hint"></td>
   <td><span class="error">* <?php echo $hintErr;?></span></td>
  </tr>
   </table>
   <table cellpadding="20px">
   <tr>
   <td></td><td><input type="submit" name="submit" value="UPDATE" ></td><td><input type="reset" value="CLEAR"></td>
   </tr>
   </table>
</form>
</div>
</center>
</body>
</html>
