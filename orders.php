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
			$username = $_POST["userr"];
			echo $username.'\'s purchases <br><br>';
			
			$query= "SELECT * FROM orders WHERE user_id = '$username'"; 
			$result = mysql_query($query) or die ("Error in query: $query " . mysql_error()); 
			echo '<table class="center" border="1"><tr><td>Invoice</td><td>Image</td><td>Size</td><td>Price</td></tr>';
			while($row = mysql_fetch_array($result)){
				echo '<tr><td>'.$row['invoice'].'</td><td><img src="'.$row['image'].'" alt="'.$row['image'].'"></td><td>'.$row['dimension'].'</td>
					<td>'.$row['price'].'$</td></tr>';
				
			}
			echo '</table>';
			
				
		?>
	


	</body>
</html>

