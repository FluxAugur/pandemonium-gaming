<?PHP
	
	//catch the data
	$eventid = $_GET['eventid']; 		//get the event ID from the link
		
	// database connection
	include("dbconnect.php");
	
	//start building the table
	echo '<table border="1" align="center">';
	echo '<tr>';
	echo '<td colspan="2" align="center"><h1>';
	
	//mysql query to pull information from the database
	$result = mysql_query("SELECT * FROM events WHERE event_id = '$eventid';");
	$numrows = mysql_num_rows($result);
	$online_id = mysql_result($result, 0, 'online_id');
		
	//draw the table of the event information
	//write the name of the event
	echo mysql_result($result, 0, 'name');
	echo '</h1></td></tr>';
	echo '<tr>';
	
	echo '<td align="left">';
	echo 'Location: </td>';
	
	//write the location
	echo '<td align="right">';
	echo mysql_result($result, 0, 'location');
	echo '</td></tr>';
	
	echo '<td align="left">';
	echo 'City/State: </td>';
	
	//write the city/state
	echo '<td align="right">';
	echo mysql_result($result, 0, 'city');
	echo ',';
	echo strtoupper(mysql_result($result, 0, 'state'));
	echo '</td></tr>';
	
	echo '<tr><td align="left">';
	echo 'Time: </td>';
	
	//write the event time
	echo '<td align="right">';
	$time = mysql_result($result, 0, 'event_time');
	echo date("g:i a", strtotime("$time"));
	echo '</td></tr>';
	
	echo '<tr><td align="left">';
	echo 'Type: </td>';

	//write the event type
	echo '<td align="right">';
	echo mysql_result($result, 0, 'type');
	echo '</td>';
	
	//check to see if online_id is not null
	if (!is_null($online_id))
	{
		echo '<tr><td align="left">';
		echo 'Information: </td>';
		
		//write the hyperlink from event info
		echo '<td align="right"><a href="';
		echo mysql_result($result, 0, 'info');
		echo '">Tournament Info & Rules</a></td></tr>';
		
		echo '<tr><td align="left">';
		echo 'Bracket: </td>';
		
		//write the hyperlink from bracket info
		echo '<td align="right"><a href="';
		echo mysql_result($result, 0, 'bracket');
		echo '">Tournament Bracket</a></td></tr>';
	}
	
	//draw the back button
	echo '<tr><td colspan="2" align="center">';
	echo '<FORM><INPUT TYPE="button" CLASS="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM></td></tr></table>';
		
?>
