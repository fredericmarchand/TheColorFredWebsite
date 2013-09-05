<!DOCTYPE html>


<?php
  //Connect to the database
  mysql_connect("localhost", "root", "");
  mysql_select_db("db_comp2405");
  //run the sql query and store the results in a variable
  //$query = mysql_query("SELECT * FROM users"); 
?>



<html lang="en-US">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="master.css" type="text/css" media="screen" title="no title">
		<script type="text/javascript" src="addtocart.js"></script>
		<title> Create Account | Color Fred  </title>
		
	</head>
	<body>
		<table class="center">
			<tr>
			<td><a href="index.html"><img src="buttons/tcf_logo.gif" alt="The Color Fred" width="270" height="150"/></a></td>
			<td><a href="aboutArt.html"><img src="buttons/aboutArt.gif" alt="About the Art"></a></td>
			<td><a href="gallery.php"><img src="buttons/Gallery.gif" alt="Gallery"></a></td>
			<td><a href="contact.html"><img src="buttons/contact.gif" alt="Contact"></a></td>
			<td><a href="shopCart.php"><img src="buttons/ShopCart.gif" alt="Shopping Cart"></a></td>
			</tr>
		</table>
		<h1> Create Account </h1>




		<?php

		// Get form data values

		  $userid = $_POST["username"];
		  $pword = $_POST["password"];
		  $name = $_POST["name"];
		  $province = $_POST["province"];
		  $address = $_POST["address"];
		  $city = $_POST["city"];
		  $pc = $_POST["pc"];
		  $email = $_POST["email"];
		  
		
		
		
		
		 // $query = "SELECT * FROM users WHERE user_id LIKE ".$userid."";
		  //$result = mysql_query($query);
		 // $num_rows = mysql_fetch_array($result);
		
	//	if($num_rows > 1){
			//echo 'The username you selected is already taken. <br> <a href="account.html">Choose new username</a>';
	//	}
	//	else{
		
		$query= "SELECT * FROM users WHERE user_id = '$userid'"; 
		$result = mysql_query($query) or die ("Error in query: $query " . mysql_error()); 
		$row = mysql_fetch_array($result); 
		$num_results = mysql_num_rows($result); 
		if ($num_results > 0){ 
			echo 'The username you selected is taken by someone else.' ;
		}
		else{ 
			
						$con = mysql_connect("localhost","root","");
						if (!$con)
						  {
						  die('Could not connect: ' . mysql_error());
						  }

						mysql_select_db("db_comp2405", $con);
					
						$sql="INSERT INTO users (user_id, password, name, street, city, province, postal_code, email)
						VALUES
						('$userid', '$pword','$name','$province','$address','$city','$pc','$email')";

						if (!mysql_query($sql,$con))
						  {
						  die('Error: ' . mysql_error());
						  }
						
						echo 'Your account was successfully added to our databases.';
		}

		

	

		?>



<!--


		<br>
		<form action="shopCart.php" method="post">
		<table class="left">
			<tr> <td> Username: </td> <td> <input type="text" name="username" /> </td></tr>
			<tr> <td> Password: </td> <td> <input type="password" name="password" /> </td></tr>
			<tr> <td> Full name: </td> <td> <input type="text" name="name" id="name" /> </td></tr>
			<tr> <td> Province: </td> <td> 	<input type="text" name="province" id="province"> </td></tr>
			<tr> <td> Address: </td> <td> <input type="text" name="address" id="address"> </td></tr>
			<tr> <td> City: </td> <td> <input type="text" name="city" id="city"> </td></tr>
			<tr> <td> Postal code: </td> <td> <input type="text" name="pc" id="pc"> </td></tr>
			<tr> <td> E-mail address: </td> <td> <input type="text" name="email" id="email"> </td></tr>
			<tr> <td></td><td><div class="right">
				<input type = "submit"  value = "Submit"  onClick="checkEmptyBoxes()"/>
					<input type = "reset"  value = "Clear Form" /></div> 
				</td></tr>
		</table>
		</form>
-->
	</body>
</html>

