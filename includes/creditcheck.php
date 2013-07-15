<?PHP
	include("dbconnect.php");
	$cusername = $_SESSION['username'];
	
	$cquery = "select credits from playerlist where username = '$cusername'";
	$cresult = mysql_query($cquery);
	$cline = mysql_fetch_assoc($cresult);
	
	echo "Current Credits: " . $cline['credits'];
	
?>