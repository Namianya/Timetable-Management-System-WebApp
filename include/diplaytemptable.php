<html>
<head>
<title>Generated Timetable</title>
<link href="file:///C|/wamp/www/main project/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="unit">
<?php
require_once('connection.php');
$query=mysql_query("SELECT * FROM temptable");
echo '<table border="1">';
echo '<tr>';
echo '<td width="330">';
echo "UNIT";
echo '</td>';
echo '<td width="80">';
echo "DAY";
echo '</td>';
echo '<td width="75">';
echo "TIME";
echo '</td>';
echo '<td width="100">';
echo "ROOM";
echo '</td>';
echo '<td width="120">';
echo "LECTURER";
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
</body>
</html>