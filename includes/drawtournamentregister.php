<br />
            	  <form id="tourny" name="tourny" method="post" action="">
            	    <table width="980" border="0">
            	      <tr>
            	        <td width="216" align="right">Teammates:</td>
            	        <td width="329">
            	          <input type="text" name="partners" id="partners" width="325px"/>
            	          <br />
            	          Please Let us Know who your teammates are.<br />
          	            </td>
            	        <td width="421" rowspan="2"><br /><input type="submit" class="button" name="submit" id="submit" value="Join the Tournament" /><br />By submitting this you confirm your credit transaction<br />to join the tournament.</td>
          	        </tr>
            	      <tr>
            	        <td align="right">PGC Credits Option:</td>
            	        <td>
            	          <input type="radio" name="radio" id="payment" value="<?php echo $entryfee; ?>" />
            	          Enter as an Individual <b>(<?php echo $entryfee; ?> Credits)</b><br />
            	          <input type="radio" name="radio" id="payment" value="<?php echo $teamentryfee; ?>" />
            	          Enter as a Team <b>(<?php echo $teamentryfee; ?> Credits)</b><br />
                          <input type="hidden" name="id" id="id" value="<?PHP echo $id; ?>" />
						  <input type="hidden" name="user" id="user" value="<?PHP echo $username; ?>" />
                        </td>
           	          </tr>
          	      </table>
            	  </form>