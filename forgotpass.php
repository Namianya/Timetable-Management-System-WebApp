<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type='text/css' href="css/style.css">
<style>
.title2{
  background: #0099FF;
  padding:5px;
  color:#fff;
  border-radius:4px;
  text-align:center;
  width:400px;
}
.title{
  background:#990000;
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
function closewindow(){
alert("Password has be reset to 1234"); 
window.close();
}
</script>
</head>
<body>
<center>
<?php
// define variables and set to empty values
$fnameErr = $snameErr = $usernameErr = $hintErr=$conErr= "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
if (empty($_POST["fname"]))
     {$fnameErr = "First name required";}
	  if (empty($_POST["sname"]))
     {$snameErr = "Second name required";}
   if (empty($_POST["username"]))
     {$usernameErr = "UserName required";}
	 if (empty($_POST["hint"]))
     {$hintErr  = "Hint Required";}
if(isset($_POST['submit'])){
require_once("connection.php");
$fname=$_POST['fname'];
$sname=$_POST['sname'];
$username=$_POST['username'];
$hint=$_POST['hint'];
$pass=1234;
$query=mysql_query("select username,hint,firstname,secondname from user where username='$username' and hint='$hint' and firstname='$fname' and secondname='$sname'");
if($query) {
if(mysql_num_rows($query) > 0){
mysql_query("update user set password='$pass' where username='$username'");
echo "<font face='comic sans ms' size='4'>
<p class='title2'>Password has been reset to 1234 click<a href='index.php'> LOGIN</a></p>
</font>";
}
else($conErr="Incorrect Details Combination");
} 
}
}

?>
<div id="forgotpass">
<font face='comic sans ms' size='4'>
<p class="title">FORGOT PASSWORD</p>
</font>
<font face="Courier New, Courier, monospace"><h3>Fill In Your Details Below</h3></font>
<span class="error">* required field.</span> 
<br>
<span class="error"><?php echo $conErr;?></span> 
<form method="post" action="forgotpass.php">
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
   <td>UserName: </td><td><input type="text" name="username"></td>
  <td> <span class="error">* <?php echo $usernameErr;?></span></td>
  </tr>
  <tr>
   <td>Hint:</td> <td> <input type="text" name="hint"></td>
   <td><span class="error">* <?php echo $hintErr;?></span></td>
  </tr>
   </table>
   <table cellpadding="20px">
   <tr>
   <td></td><td><input type="submit" name="submit" value="RESET PASSWORD" ></td><td><input type="reset" value="CLEAR"></td>
   </tr>
   </table>
</form>
</div>
</center>
</body>
</html>
