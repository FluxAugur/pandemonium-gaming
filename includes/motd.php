<?PHP
		
	include("dbconnect.php");
	
	$query = "SELECT * FROM pgcmotd WHERE id = (SELECT max(id) FROM pgcmotd)";
	$result = mysql_query($query);
	$line = mysql_fetch_assoc($result);
	
	echo '<h1>'.$line['motd_title'].'</h1>';
	echo $line['motd_message'];
	echo '</div><div id="t"><a href="register.php">REGISTER TODAY</a></div>';
	


?>