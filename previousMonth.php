<?php
session_start();

include("includes/checklogout.php"); //checks for the logout session variable to kill if logged out

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Pandemonium Gaming</title>
    <meta name="description" content="Eat Play Game">
    <meta name="viewport" content="width=device-width">
    <?PHP include("includes/loginerror.php"); ?>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <script src="jquery.js"></script>
    <script src="cory.js"></script>
    <script src="modernizr.js"></script>
    <link rel="stylesheet" href="css/keyframes.css"/>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div id="head">
        <div class="wrapper">
            <div id="login">
            <?php 
            
            if($_SESSION['loggedIn'] > 0)
            {
                include("includes/usernavloggedin.php");
            }
            else
            {
                //loginform
                echo "<form id=\"form1\" name=\"form1\" method=\"POST\" action=\"includes/processLogin.php\">Username:<input type=\"text\" name=\"name\" size=\"9px\" id=\"name\"/>Password: <input type=\"password\" name=\"password\" size=\"9px\" id=\"password\"/></td><td><input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Submit\" class=\"button\"/></form>";
            }
            
            ?>
            </div> <!--End login div-->
        <a href="index.php"><img class ="logo" src="img/head.png"></a>
        </div><!--End wrapper div-->
    </div><!--End head div-->
    
    <?PHP include("includes/topnav.php"); ?>
    
    <div class="wrapper">
        <div class="calendar">
            <?php
            
                //initialize variables to their necessary passed values
                $month = $_GET['month'];
                $year = $_GET['year'];
                
                //set the new month and year variables
                if ($month == 1)
                {
                    $month = 12;
                    $year = $year - 1;	
                } else {
                    $month = $month - 1;
                }
                
                
                //find the information to draw the calendar
                $first_day = mktime(0,0,0,$month, 1, $year);			//first day of the month
                $title = date('F', $first_day);							//name of the month
                $day_of_week = date('D', $first_day);					//day of week that first of month is on
                $days_in_month = cal_days_in_month(0, $month, $year);	//number of days in the month
                $day_count = 1;											//counts the days in the week
                $day_num = 1;											//first day of the month
                
                
                //This connects to the mysql DB selects the database
				include("includes/dbconnect.php");
				
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
    		<div id="twitter"><img src = "img/twitter.png"><script>$.getJSON("https://api.twitter.com/1/statuses/user_timeline/jctpandemonium.json?count=1&include_rts=1&callback=?", function(data) { $("#twitter").html(data[0].text);
            });</script></div> <!--End twitter div-->
            
            <div id="content" >
                <?PHP include("includes/boxes.php"); ?>
            </div> <!--End content div-->
            
            <div id="bottom" class="clearfix">
                <?PHP include("includes/bottomnav.php"); ?>
            </div> <!--end bottom div-->
        
        </div> <!--end show div-->
    </div> <!--end wrapper div-->
</body>
</html>

