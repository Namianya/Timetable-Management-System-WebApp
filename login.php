<?php
//Start session
session_start();
 
//Include database connection details
require_once('connection.php');
 
//Array to store validation errors
$errmsg_arr = array();
 
//Validation error flag
$errflag = false;
 
//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
$str = @trim($str);
if(get_magic_quotes_gpc()) {
$str = stripslashes($str);
}
return mysql_real_escape_string($str);
}
 
//Sanitize the POST values
$username = clean($_POST['username']);
$password = clean($_POST['password']);
$usergroup= clean($_POST['group']);
 
//Create query
$qry="SELECT * FROM user WHERE username='$username' AND password='$password' AND id='$usergroup'";
$result=mysql_query($qry);
 
//Check whether the query was successful or not
if($result) {
if(mysql_num_rows($result) > 0) {
if($usergroup=='admin'){
header("location: admin.php");
}
if($usergroup=='lecturer'){
header("location: lecturer.php");
}
if($usergroup=='student'){
header("location: student.php");
}
exit();
}else {
echo "login()";
header("location: index.php");
}
}else {
die("Query failed");
}
?>