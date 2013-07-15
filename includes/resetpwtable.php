<table width="100%" border="0">
    <tr>
    	<td align="center">
        	<form id="resetpw" name="resetpw" method="post" action="<?PHP echo $_SERVER['../PHP_SELF'];?>">
            <table width="100%">
            	<tr>
            		<td align="right" width="27%">Username: </td>
                    <td align="left" width="40%"><input type="text" name="username" id="username" value="<?PHP echo $_SESSION['username'];?>"/></td>
                    <td align="left" width="33%">6+ characters, A-Z, 0-9, @</td>
    			</tr>
                 <tr>
                   <td align="right">Security Question:</td>
                   <td align="left"><?PHP echo $secquestion; ?></td>
                 <tr>
                 	<td align="right" width="27%">Security Answer: </td>
                    <td align="left" width="40%"><input type="text" name="secanswer" id="secanswer" /></td>
                 <tr>
                 
                 	<td align="right" width="27%"><br />
               	   New Password: </td>
                    <td align="left" width="40%"><br /><input type="password" name="newpw" id="newpw" /></td>  
                    <td><br />8+ characters, A-Z, 0-9, @</td>
                 </tr>
                 <tr>
                 	<td align="right" width="27%">Re Type New Password: </td>
                    <td align="left" width="40%"><input type="password" name="newpw2" id="newpw2" /></td> 
                 </tr>
                 <tr>
                 	<td align="right" width="27%"></td>
                 	<td align="left" width="40%"><input type="submit" id="submit2" class="button" name="submit2"  value="Submit" /></td>
            
       	</td>
			</form>
    			</tr>
    </table>

