<font face="comic sans ms" size="+1">
<p class='title'>LECTURERS' CONTACTS</p>
</font>
<?php
require_once("connection.php");
$query=mysql_query("SELECT name, telno, email FROM contacts");
echo '<table border="1">';
echo '<tr>';
echo '<td width="120">';
echo "NAME";
echo '</td>';
echo '<td width="140">';
echo "MOBILE NUMBER";
echo '</td>';
echo '<td width="170">';
echo "EMAIL ADDRESS";
echo '</td>';
echo '</tr>';
echo '</table>';
while($result=mysql_fetch_array($query))
{
echo "<table border='1'>";
echo "<tr>";
echo "<td width='120'>";
echo $result['name'];
echo "</td>";
echo "<td width='140'>";
echo $result['telno'];
echo "</td>";
echo "<td width='170'>";
echo $result['email'];
echo "</td>";
echo "</tr>";
echo "</table>";
}
?>