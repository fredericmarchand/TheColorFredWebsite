<!DOCTYPE html>

<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("db_comp2405");
?>

<html lang="en-US">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="master.css" type="text/css" media="screen" title="no title">
		<script type="text/javascript" src="addtocart.js"></script>
		<title> Shopping Cart | Color Fred  </title>
		
	</head>
	<body onLoad="displayPage()">
		<table class="center">
			<tr>
			<td><a href="index.html"><img src="buttons/tcf_logo.gif" alt="The Color Fred" width="270" height="150"/></a></td>
			<td><a href="aboutArt.html"><img src="buttons/aboutArt.gif" alt="About the Art"></a></td>
			<td><a href="gallery.php"><img src="buttons/Gallery.gif" alt="Gallery"></a></td>
			<td><a href="contact.html"><img src="buttons/contact.gif" alt="Contact"></a></td>
			<td><a href="shopCart.php"><img src="buttons/ShopCart.gif" alt="Shopping Cart"></a></td>
			</tr>
		</table>
		<h1> Shopping Cart </h1>
	
	
		<?php
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			$query= "SELECT * FROM users WHERE user_id = '$username' AND password = '$password'"; 
			$result = mysql_query($query) or die ("Error in query: $query " . mysql_error()); 
			$row = mysql_fetch_array($result); 
			$num_results = mysql_num_rows($result);
			
			if($num_results == 0){
				echo 'Invalid username or password, click <a href="shopcart.php">here</a>';
			}
			else{
			
				echo '<form action="orders.php" method="post"><div class="right"> ';
				echo '<input type="hidden" name="userr" value="'.$username.'">';
				echo '<input type="submit" name="submi" value="'.$username.'\'s Orders">';
				echo '</div></form>';
	
	
		echo '<form action="submission.php"  method = "post">';
		echo'<table class="left" id="picksTable">
		<tr>
		<td>Cart Items:</td>
		</tr>
		<tr><td>';
			$img = $_POST["uknow"];
			if($img == "")
				echo '<img src="buttons/picframe1.png" height="300" width="400" alt="empty"';
			else
				echo '<img src="'.$img.'" alt="majin" name="pictu">';
		
		echo '	</td>
		<td> 				Requested image size: 
								<input type="text" size="5" name="size" id="size" onChange="getPrice()"> sq. inches<br>
								<table><tr>
								<td>Wrap type: </td>
								<td><input type="radio" name="wraptype" value="Gallery Wrap" /> Gallery wrap <br>
							 	<input type="radio" name="wraptype" value="Museum Wrap" /> Museum wrap</td>
							</tr></table> 
			</td>	
		</tr>
		</table>
		<div class="left">
		url: ';
		 echo '<input type="text" name="uknow2" onfocus="blur()" size="30" value="'.$img.'">';
	echo '	</div>
		<br><br>
		<table class="left">';
		
			if($num_results <= 0){
				echo 'The username you have entered is invalid <br> <br> Click <a href="gallery.php">Here</a><br><br>';
			}
			else{
				echo '<tr> <td> Username: </td> <td>  <input type="text" name="userd" size="30" onFocus="blur()" value="'.$username.'" />  
				</td></tr>';
				echo '<tr> <td> Name: </td> <td>  <input type="text" name="fullname" size="30"  id="name" onFocus="blur()" value="'.$row['name'].'" />  
				</td></tr>';
				echo '<tr> <td> Province: </td> <td> <input type="text" name="province" size="30" id="province" onFocus="blur()" value="'.$row['province'].'">  
					</td></tr>';
				echo '<tr> <td> Address: </td> <td> <input type="text" name="address" size="30" id="address" onFocus="blur()" value="'.$row['street'].'">  
					</td></tr>';
				echo '<tr> <td> City: </td> <td>  <input type="text" name="city" size="30" id="city" onFocus="blur()" value="'.$row['city'].'">  </td></tr>';
				echo '<tr> <td> Postal code: </td> <td>  <input type="text" name="pc" size="30" id="pc" onFocus="blur()" value="'.$row['postal_code'].'">  
					</td></tr>';
				echo '<tr> <td> E-mail address: </td> <td>  <input type="text" name="email" size="30" id="email" onFocus="blur()" value="'.$row['email'].'">  
					</td></tr>';
				

			echo '<tr> <td> Credit card: </td> <td> ';
					echo '<input type="radio" name="credit" value="visa" /> Visa<br>';
					echo '<input type="radio" name="credit" value="mastercard" /> Mastercard</td></tr>';
			echo '<tr> <td>  Credit card Number: </td> <td> <input type="text" name="creditcardnumber" id="creditnum"> </td></tr>';
			echo '<tr> <td></td><td><div class="right">';
			echo	'<input type = "submit"  value = "Submit Order"  onClick="checkEmptyBoxes()"/>';
			echo	'<input type = "reset"  value = "Clear Form" /></div>';
			echo	'</td></tr>';
			echo '</table>
		</form>
		<br>
		<hr>
		Items total: $<input type="text" id="price" size="4" onFocus="blur()">
		<hr><br>';
			}
		}
		?>
	</body>
</html>

