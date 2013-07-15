
               <table width="100%" border="0">
    <tr>
    	<td width="75%" align="left" valign="top">
       	  <h1>Register With PGC:</h1><br />
       	  <p>Get signed up with our website for event updates online tournaments!</p>
       	  <form id="reg" name="reg" method="post" action="process.php">
        	<table width="100%" border="0">
       	      <tr>
        	      <td width="15%">Username:</td>
        	      <td width="15%"><input type="text" name="username" id="username" value="<?php echo $_SESSION['username']; ?>"/></td>
        	      <td width="70%">6+ characters, A-Z, 0-9, @</td>
      	      </tr>
        	    <tr>
        	      <td>Password:</td>
        	      <td><input type="password" name="password" id="password" value="<?php echo $_SESSION['password']; ?>"/></td>
        	      <td>8+ characters, A-Z, 0-9, @</td>
      	      </tr>
        	    <tr>
        	      <td>Repeat Password:</td>
        	      <td><input type="password" name="password2" id="password2" value="<?php echo $_SESSION['password2']; ?>"/></td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>First Name:</td>
        	      <td><input type="text" name="first_name" id="first_name" value="<?php echo $_SESSION['firstname']; ?>"/></td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>Last Name:</td>
        	      <td><input type="text" name="last_name" id="last_name" value="<?php echo $_SESSION['lastname']; ?>"/></td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>Email:</td>
        	      <td><input type="text" name="email" id="email" value="<?php echo $_SESSION['email']; ?>"/></td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>Gender:</td>
        	      <td><input type="radio" name="gender" id="gender2" value="M" />
        	        <label for="gender">Male</label>
                    <input type="radio" name="gender" id="gender" value="F" />
                  <label for="gender">Female</label></td>
        	      <td><div style="color:red"></div></td>
      	      </tr>
        	    <tr>
        	      <td>Date of Birth:</td>
        	      <td>
                  	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
				  	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  					<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
                    <link rel="stylesheet" href="/resources/demos/style.css" />
                    <script>
                  		$(function() {
	                    $( "#datepicker" ).datepicker();
    	              	});
        	        </script>
                  	  <input type="text" id="datepicker" />
                  </td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>PSN Gamertag:*</td>
        	      <td><input type="text" name="psntag" id="psntag" value="<?php echo $_SESSION['psntag']; ?>"/></td>
        	      <td>*Optional Field</td>
      	      </tr>
        	    <tr>
        	      <td>Xbox Gamertag:*</td>
        	      <td><input type="text" name="xboxtag" id="xboxtag" value="<?php echo $_SESSION['xboxtag']; ?>"/></td>
        	      <td>*Optional Field (Required for online tournaments)</td>
      	      </tr>
              <tr>
              	<td>T-shirt Size:</td>
                <td>
                	<select name="shirtsize" >
                    	<option value="s">Small</option>
                    	<option value="m">Medium</option>
                    	<option value="l">Large</option>
                    	<option value="xl">X-Large</option>
                    	<option value="xxl">XX-Large</option>
                    	<option value="xxxl">XXX-Large</option>
                    </select>
                
                </td>
                <td><div style="color:red"></div></td>
              </tr>
                
        	    <tr>
        	      <td>Security Question</td>
        	      <td><input type="text" name="secquestion" id="secquestion" value="Favorite Pet Name"/></td>
        	      <td>Create a Security question in case you forget your password. (no symbols)</td>
      	      </tr>
        	    <tr>
        	      <td>Security Answer</td>
        	      <td><input type="text" name="secanswer" id="secanswer" value="<?php echo $_SESSION['secanswer']; ?>"/></td>
        	      <td>Create an answer to your security question. (no symbols)</td>
      	      </tr>
        	    <tr>
        	      <td></td>
        	      <td><input type="submit" name="submit" id="submit" value="Submit" class="button" /></td>
                  <td>&nbsp;</td>
      	      	</tr>
              </table>