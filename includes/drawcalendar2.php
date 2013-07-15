<?php

	//initialize variables to their necessary assigned values
	$date = time();											//current date
	$day = date('d', $date);								//pull the day value out of date
	$month = date('n', $date);								//pull the month value out of date
	$year = date('Y', $date);								//pull the year value out of date
	$first_day = mktime(0,0,0,$month, 1, $year);			//first day of the month
	$title = date('F', $first_day);							//name of the month
	$day_of_week = date('D', $first_day);					//day of week that first of month is on
	$days_in_month = cal_days_in_month(0, $month, $year);	//number of days in the month
	$day_count = 1;											//counts the days in the week
	$day_num = 1;											//first day of the month

	
	//This connects to the mysql DB selects the database
	include("dbconnect.php");
	
	//switch statement to determine the value of blank cells to insert to the HTML table for first of month
	switch($day_of_week)
	{
		case "Sun": $blank = 0; break;
		case "Mon": $blank = 1; break;
		case "Tue": $blank = 2; break;
		case "Wed": $blank = 3; break;
		case "Thu": $blank = 4; break;
		case "Fri": $blank = 5; break;
		case "Sat": $blank = 6; break;
	}
	
	if ($month == 12)
	{
		$newYear = $year + 1;
	}
	
	//build the table
	echo "<table width=\"100%\" align=\"center\" border=\"1\"><tr><td colspan=7 align=\"center\"><h1><a href=\"previousMonth.php?month=$month&year=$year\"><</a> $title $year <a href=\"nextMonth.php?month=$month&year=$year\">></a></h1></td></tr>";
	echo "<tr><td>Sun</td><td>Mon</td><td>Tue</td><td>Wed</td><td>Thur</td><td>Fri</td><td>Sat</td></tr>";
	
	//take care of the blank days at the start of the month
	while ($blank > 0)
	{
		echo "<td></td>";
		$blank = $blank - 1;
		$day_count++;
	}
	
	//count up the days until the last day of the month
	
	while ( $day_num <= $days_in_month )
	{
		echo "<td> $day_num <br />";
		
		//execute a query to determine if this day has an event scheduled on it
		$thisdate = "$year-$month-$day_num";
		$query = "SELECT event_id, name FROM events WHERE event_date = '$thisdate'";
		$result = mysql_query($query);
		$numrows = mysql_num_rows($result);
		$array = mysql_fetch_array($result);
		$counter = 0;											//counter variable to parse the result array
			
		//confirm that there are records in the resultset		
		if($numrows > 0){
			
			//parse through the records that were contained in the result set.
			while ($counter < $numrows)
			{
				$this_event = mysql_result($result, $counter, 'event_id');
				$this_name = mysql_result($result, $counter, 'name');
	
				echo '<a href=event.php?eventid=';
				echo $this_event;
				echo '>';
				echo $this_name;
				echo '</a><br />&nbsp;';
				
				$counter++;
			}
			
		} else {
			echo '<br />&nbsp;';
			echo '<br />&nbsp;';
			echo '<br />&nbsp;';
		}
		
		
		echo "</td>";
		
		$day_num++;
		$day_count++;
		
		if ($day_count > 7)					//check to see if its the end of a week
		{
			echo "</tr><tr>"; 
			$day_count = 1;
		}
			
	}
	
	//pad the end of the table with blank cells if necessary
	
	while ($day_count > 1 && $day_count <=7 )
	{
		echo "<td> </td>";
		$day_count++;
	}
	
	echo "</tr></table>";
?>