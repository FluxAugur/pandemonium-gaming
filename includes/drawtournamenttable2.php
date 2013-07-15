<?PHP

	//connect to the database
	include("dbconnect.php");
	
	//get the result set from the db based on the current date
	$query = mysql_query($sql);
	
	//start the table draw
	echo '<table width="100%" border="0">';
	
	//*******WHILE LOOP HERE *********
	//start a loop to provess the result set for any upcoming tournaments
	while ($row = mysql_fetch_assoc($query)) {
		
		
		//determine the game logo to display
		$game = $row["game"];
		switch($game){
			case "cod": $image="img/league1.jpg"; break;
		}
		
		//determine the console logo to display
		$platform = $row["platform"];
		switch($platform){
			case "xbox360": $image2="img/league1.jpg"; break;
			case "ps3": $image2="images/gamelogos/ps3.png"; break;
		}
		
		//process the date
		$date = strtotime($row["date"]);
		$date2 = date("F d, Y", $date);	
		
		//draw the game logo cell with the tournament date
		echo "<img src=\"$image2\"  alt=\"game\" />";
		echo '<h1 class="text">';
		echo $date2;
		echo '</h1>';
		
		//draw the information cell
		echo '</td><td width="488" valign="top">';
		echo '<strong>Tournament Information:</strong><br />';
		echo $row["info"];
		echo '&nbsp;<br />&nbsp;<br />';
		echo '<a href="';
		echo $row["bracket"];
		echo '" target=_new>Tournament Bracket</a> -- <a href="';
		echo $row["ruleset"];
		echo '">Tournament Rules</a></td>';
		
		//draw the prize cell with the join link
		echo '<td width="240" align="right" valign="top"><h4>$';
		echo $row["prize"];
		echo ' Grand Prize</h4><strong>';
		echo $row["entryfee"];
		echo ' Credits &nbsp;&nbsp;</strong><a href="jointournament.php?tourn_id=';
		echo $row["id_num"];
		echo '"><strong>Join Tournament</strong></a></td></tr>';
		echo '<tr><td colspan="100$"><hr /></td></tr>';

		//process the team size and entry fee for the tournament
		$teamsize = $row["teamsize"];
		$entryfee = $row["entryfee"];
		$teamentryfee = $teamsize * $entryfee;

	};
	
	
	echo '</table>';
?>