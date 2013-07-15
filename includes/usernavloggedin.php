<?php
//Session already established

echo "<table width=\"100%\"><tr><td width=\"25%\" align=\"center\">Welcome: <i>".$_SESSION['username']."</i></td><td width=\"50%\" align=\"center\"></td><td align=\"center\" width=\"25%\"><form><input type=\"button\" value=\"User Profile\" class=\"button\"onClick=\"location.href='userProfile.php'\"><input type=\"button\" value=\"Logout\" class=\"button\"onClick=\"location.href='index.php?logOut=logOut'\"></form></td></tr></table>";
	
?>


