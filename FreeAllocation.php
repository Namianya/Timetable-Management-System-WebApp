 <?php
     require_once("connection.php");
	$q=mysql_query("Select * from allocation");
	echo"<font face='comic sans ms' size='4'>
    <p class='title'>Free Allocations That Can Used. <b>NOTE ALLOCATION DOWN BEFORE CLOSING</p>
</font>";
	echo "<center>";
	echo"<table border='1'>";
	echo "<tr>";
	echo "<td width='50'>";
	echo "<b>";
	echo "ROOM";
	echo "</b>";
	echo "</td>";
	echo "<td width='90'>";
	echo "<b>";
	echo "DAY";
	echo "</b>";
	echo "</td>";
	echo "<td width='90'>";
	echo "<b>";
	echo "TIME";
	echo "</b>";
	echo "</td>";
	echo "</table>";
	echo "</center>";
	while($result=mysql_fetch_array($q)){
	$room=$result['Room'];
	$day=$result['Day'];
	$time=$result['Time'];
	$qu=mysql_query("Select * from temptable where room='$room' and day='$day' and time='$time'");
	if($qu) {
    if(mysql_num_rows($qu) > 0) {
	}
	else{
	echo "<center>";
	echo"<table border='1'>";
	echo "<tr>";
	echo "<td width='50'>";
	echo $room;
	echo "</td>";
	echo "<td width='90'>";
	echo $day;
	echo "</td>";
	echo "<td width='90'>";
	echo $time;
	echo "</td>";
	echo "</tr>";
	echo "<table>";
    echo "</center>";
	}
	}
	}
	?>
	 
	