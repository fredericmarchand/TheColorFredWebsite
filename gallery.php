
<!DOCTYPE html>


<?php
  //Connect to the database
  mysql_connect("localhost", "root", "");
  mysql_select_db("db_comp2405");
  //run the sql query and store the results in a variable
  $result = mysql_query("SELECT * FROM images"); 
?>


<html lang="en-US">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="master.css" type="text/css" media="screen" title="no title">
		<script type="text/javascript" src="addtocart.js"></script>
		<title> Gallery | Color Fred  </title>
		
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
		<h1> Photo Gallery </h1><br>
		<table class="center" border="1" id="pictureTable">
			<tr>
				<td> Image </td><td> Description </td><td> Add to Cart</td>
			</tr>
				<?php

						//$files = glob("images/*.*");
						echo '	<form action="shopCart.php" method="post">';
						$i=0;
						while($row = mysql_fetch_array($result)){
					     	echo "<tr>";
					     	echo "<td>";
						 	echo '<img src="'.$row['image_path'].'" alt="'.$row['image_name'].'"  >';
						 	echo "</td>";
						 	echo "<td>".$row['image_name']."</td>";
					     	echo '<td><input type="button" value="Select" onclick="getImageLocation('.$i.')"></td>';
					     	echo "</tr>";
						 	$i++;
					     }
					     //release the variable memory and close the database
					     mysql_free_result($result);
					     mysql_close();
					/*	$tracker = 1;
						for ($i=0; $i<count($files); $i++){
							
							$image_name = substr($files[$i], 7, -4);
							
							echo '<tr><td>';
							$num = $files[$i];
							echo '<img src="'.$num.'"" alt="'.$image_name.'"  /></td><td>';
							print $image_name."</td><td>";
							echo '<input type="button" value="Select" onclick="getImageLocation('.$i.')">';
							echo '</td></tr>';
							$tracker++;
						}*/
						?>
				</table>
				<br>
			
					<input type="text" id="locbox" name="lobo" onfocus="blur()"><input type="submit" value="Add to Cart" >
				<?php echo '</form>';?>
		<br><br>
		
		<h3> Upload An Image </h3>
		
		<form action="upload.php"  method = "post" enctype = "multipart/form-data">
			<input type="file" id="upPic" name="image">
			<br>
			<img src="buttons/picframe1.png" alt="frame" width="400" height="300" id="prevImage"/>
			<br>
			***Make sure to name the picture file name something meaningful***
			<br>
			<br>
			<input type="submit" value="Upload" onClick="checkEmptyUpload()" />
			<br><br>
		</form>
		
		
		
	</body>
</html>

