<?php
require_once("connection.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['viewdetails'])){
$viewuser=$_POST['editusername'];
$query=mysql_query("select * from user where username='$viewuser'");
while($view=mysql_fetch_array($query)){
echo "<form action='Editusers.php' method='post'>";
echo "<font face='Courier New, Courier, monospace' size='4'><b>&nbsp &nbsp $viewuser Details</b></font>";
echo "<table cellspacing='10px'>";
echo "<tr>";
echo "<td>";
echo "<b>";
echo "UserName:";
echo "</b>";
echo "</td>";
echo "<td>";
$username=$view['username'];
echo "<input type='text' value='$username'>";
echo "</tr>";
echo "</td>";
echo "<tr>";
echo "<td>";
echo "<b>";
echo "Password";
echo "</b>";
echo "</td>";
echo "<td>";
$password=md5 ($view['password']);
echo $password;
echo "</tr>";
echo "</td>";
echo "<tr>";
echo "<td>";
echo "<b>";
echo "UserGroup";
echo "</b>";
echo "</td>";
echo "<td>";
$id=$view['id'];
echo "<input type='text' value='$id'>";
echo "</tr>";
echo "</td>";
echo "</table>";
echo "<br>";
echo "&nbsp &nbsp";
echo "<input type='submit' value='SAVE DETAILS' name=save''/>";
echo "&nbsp &nbsp &nbsp &nbsp";
echo "<input type='reset' value='CLEAR'/>";
echo "</form>";
}
}
}
?>
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