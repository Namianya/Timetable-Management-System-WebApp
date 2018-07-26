<?php
require_once("connection.php");
mysql_query("DELETE from temptable where ID > 0");
?>
<html>
<script>
function created(){
alert("Time table created. Click on timetable to view");
}
</script>
<body>
<form method="post" action="inserttable.php" onSubmit="created()">
<?php
	
		include("C:\wamp\www\main project\include\createtimetable.html");
?>
<table width="300px" cellpadding="2">
<tr>
<td>
<center>
<input type="submit" value="DONE" name="submit" style="cursor:pointer">
</center>
</td>
<td>
<center>
<input type="reset" value="CLEAR" style="cursor:pointer">
</center>
</td>
</tr>
</table>
</form>
<?php
//include("C:\wamp\www\main project\inserttable.php");
?>
</body>
</html>

