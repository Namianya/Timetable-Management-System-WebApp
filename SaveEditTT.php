<?php
require_once('connection.php');
if(isset($_POST['submit'])){
$Runit=$_POST['removeUnit'];
echo $Runit;

$sq=mysql_query("DELETE FROM temptable WHERE code='$Runit'");
}
?>