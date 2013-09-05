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
		<hr>
		<div class="left">Login: </div><br>
		<form action="usershopcart.php" method="post">
			<table class="left" id="logintable">
				<tr><td>
				Username:</td><td> <input type="text" name="username"></td></tr>
				 <tr><td>Password:</td><td> <input type="password" name="password"></td></tr>
				<tr><td></td><td><input type="submit" name="login" value="Login"></td></tr>
			</table>
		<br>
	<!--	<form action="account.html" method="post"> -->
			<div class="left">
			<a href="account.html">	Create New Account </a> <!-- <input type="submit" name="create" value="Create"> -->
			</div>
		<hr>
		<br>
	
	
	
	
	
	
	
	
	
	<!--	<form action="submission.php"  method = "post"> -->
		<table class="left" id="picksTable">
		<tr>
		<td>Cart Items:</td>
		</tr>
		<tr><td>
			<?php
			$a = $_POST["lobo"];
			/*$fil = glob("images/*.*");
			$address = $fil[$a];*/
			$query= "SELECT * FROM images WHERE image_id = '$a'"; 
			$result = mysql_query($query) or die ("Error in query: $query " . mysql_error());
			$row = mysql_fetch_array($result); 
			$num_results = mysql_num_rows($result);
			if($num_results == 0)
				echo '<img src="buttons/picframe1.png" height="300" width="400" alt="empty"';
			else
				echo '<img src="'.$row['image_path'].'" alt="frame"  name="spot1">';
		?>
			</td>
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
		url:
		<?php echo '<input type="text" name="uknow" onfocus="blur()" size="30" value="'.$row['image_path'].'">';?>
		</div>
		<br><br>
		</form>
	<!--	<table class="left">
			<tr> <td> First name: </td> <td> <input type="text" name="firstname" id="firstname" /> </td></tr>
			<tr> <td> Last name: </td> <td> <input type="text" name="lastname" id="lastname" /> </td></tr>
			<tr> <td> Province: </td> <td> 	<input type="text" name="province" id="province"> </td></tr>
			<tr> <td> Address: </td> <td> <input type="text" name="address" id="address"> </td></tr>
			<tr> <td> City: </td> <td> <input type="text" name="city" id="city"> </td></tr>
			<tr> <td> Postal code: </td> <td> <input type="text" name="pc" id="pc"> </td></tr>
			<tr> <td> E-mail address: </td> <td> <input type="text" name="email" id="email"> </td></tr> 
			<tr> <td> Credit card: </td> <td> 
					<input type="radio" name="credit" value="visa" /> Visa<br>
					<input type="radio" name="credit" value="mastercard" /> Mastercard</td></tr>
			<tr> <td>  Credit card Number: </td> <td> <input type="text" name="creditcardnumber" id="creditnum"> </td></tr>
			<tr> <td></td><td><div class="right">
				<input type = "submit"  value = "Submit Order"  onClick="checkEmptyBoxes()"/>
					<input type = "reset"  value = "Clear Form" /></div> 
				</td></tr>
		</table>
		</form>
		<br>
		<hr>
		Items total: $<input type="text" id="price" size="4" onFocus="blur()">
		<hr><br>-->
	</body>
</html>

