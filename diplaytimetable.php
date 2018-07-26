<html>
<head>
<title>Generated Timetable</title>
<link href="file:///C|/wamp/www/main project/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body style="overflow:hidden;">
<font face='comic sans ms' size='4'>
<p class='title3'>THIS SEMISTER'S FINAL TIMETABLE</p>
</font>
<center>
<?php
require_once('connection.php');
$query=mysql_query("SELECT * FROM temptable");
echo '<table border="1">';
echo '<tr>';
echo '<td width="330">';
echo "<b>";
echo "UNIT";
echo "/<b>";
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
echo '</td>';
echo '<td width="80">';
$days=$result["day"];
echo $days;
echo '</td>';
echo '<td width="75">';
$time=$result['time'];
echo  $time;
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
</center>
</body>
</html>