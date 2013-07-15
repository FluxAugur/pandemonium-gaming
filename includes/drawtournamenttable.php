<?PHP

	//connect to the database
	include("dbconnect.php");
	
	//get the result set from the db based on the current date
	$query = mysql_query($sql);
	
	//section counter
	$seccounter = 1;
	
	//*******WHILE LOOP HERE *********
	//start a loop to process the result set for any upcoming tournaments
	while ($row = mysql_fetch_assoc($query)) {
		
		
		
		//determine the game logo to display
		$game = $row["game"];
		switch($game){
			case "bo2": $image="img/league1.jpg"; $section="Call of Duty"; $game1="Black Ops 2 - "; break;
		}
		
		//determine the console logo to display
		$platform = $row["platform"];
		switch($platform){
			case "xbox360": $image2="img/gamelogos/xbox360.png"; break;
			case "ps3": $image2="img/gamelogos/ps3.png"; break;
		}
		
		//process the date
		$date = strtotime($row["date"]);
		$date2 = date("F d, Y", $date);	
		
		//draw the game logo cell
		echo '<section id="'.$section.'">';
		echo '<a href="#'.$section.$seccounter.'"><h1 class="text">'.$game1.' '.$date2.'</h1><img src="'.$image.'"/></a>';
		
		//draw the float column
		echo '<div id="rules" class="float">';
		echo '<h2>Rules and Regulations</h2>';
		echo '<ul><li> <a href="rules/pgcgeneralrules.pdf">PGC General Rules</a></li>';
		echo "<li> <a href=\"".$row['ruleset']."\">Tournament Rules</a></li>";
		echo "<li> <a href=\"".$row['bracket']."\">Tournament Bracket </a></li></ul>";
		echo '<h2>Tournament Entry</h2>';
		echo '<ul><li><strong>'.$row['entryfee'].' Credits per team member</strong></li>';
		echo "<li><form><input type=\"button\" class=\"button\" value=\"Join Tournament\" onClick=\"jointournament.php?tournament_id=".$row['id_num']."\"></form></li></ul></div>";
		
		//draw the main column
		echo '<div id="rules">';
		echo '<h2>Grand Prize</h2>';
		echo '<ul><li><strong>$'.$row['prize'].'</strong></li></ul>';
		echo '<h2>Tournament Information</h2>';
		echo '<ul><li>Teamsize: '.$row['teamsize'].' members per team</li>';
		echo '<li>Number of teams: '.$row['maxteams'].' maxiumum</li>';
		echo '<li>Platform: <img src="'.$image2.'" /></li></ul></div></section>';


		//process the team size and entry fee for the tournament
		$teamsize = $row["teamsize"];
		$entryfee = $row["entryfee"];
		$teamentryfee = $teamsize * $entryfee;
		
		$seccounter = $seccounter + 1;

	}; //end while loop

?>