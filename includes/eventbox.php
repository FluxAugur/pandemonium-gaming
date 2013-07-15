<?php
    
	//initialize date variables for date comparison
    $date = time();	
    $day = date('d', $date);								//pull the day value out of date
    $month = date('n', $date);								//pull the month value out of date
    $year = date('Y', $date);	
    $a = 0;
    $thisdate = "$year-$month-$day";
	
	//database connection stream
	include("dbconnect.php");
    
         
            //get the most recent record in the database that is today or later
			$query = "SELECT event_id, name, type, event_date, event_time FROM events WHERE event_id = (SELECT max(event_id) FROM events) and event_date >= '$thisdate'";
            $result = mysql_query($query);
            $line = mysql_fetch_assoc($result);
            
			//check to see if there are any results
            if (mysql_num_rows($result) == 0)
            {
                echo "There are no events currently scheduled.";
            }
			
			else
			{
				//process the date format
				$phpdate = strtotime($line['event_date']);
				$eventdate = date('F d, Y', $phpdate);
				//process the time format
				$phptime = strtotime($line['event_time']);
				$eventtime = date('g:i a', $phptime);
				
				//draw the table with the basic event info and a link to the event details
				echo ''.$eventdate.' '.$eventtime.'<br />';
				echo $line['name'].'<br />';
				echo '<a href="event.php?eventid='.$line['event_id'].'">EVENT DETAILS</a><br />&nbsp;<br />&nbsp;';
			}
      
        mysql_close();			
    ?>