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
		<title> Submission | Color Fred  </title>
		
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


<?php

// Get form data values

  $size = $_POST["size"];
  $wraptype = $_POST["wraptype"];
  $fullname = $_POST["fullname"];
  $province = $_POST["province"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $pc = $_POST["pc"];
  $email = $_POST["email"];
  $credit = $_POST["credit"];
  $cdtnum = $_POST["creditcardnumber"];
  $clear = $_POST["clear"];

  $user = $_POST["userd"];


//	$directory = "/comp2405/orders/";
 //   $dir_path = $_SERVER['DOCUMENT_ROOT'].$directory;
    
    //check to see if directory specified by dir_path
    //exists and if not create it
   // if(!is_dir($dir_path)){
       //create the directory 
  //     if(!mkdir($dir_path, 0777, TRUE)){
          //make dir failed so throw exception
          //the TRUE paramater above allows recursion or nested folders
    //      throw new Exception("Could not create directory");
  //     }
  //  }

  //  $file_path = $directory;
    
    //$absolute_path = $_SERVER['DOCUMENT_ROOT'].$file_path;



	//write customer data to a .txt text file
  //   $order_file_name = $firstname; //use customer name as file name
  //   $order_file_path = $dir_path.$firstname.$lastname.".txt";

     
 //    $order_file = fopen($order_file_path, "w") or die("Could not open order file for writing");
    // echo "writing customer data to file..."."<br/>";
     
     //note \r character is printed below for the sake of notepad
  /*   fwrite($order_file, $fullname."\r\n");
	 fwrite($order_file, $address."\r\n");
	 fwrite($order_file, $city."\r\n");
     fwrite($order_file, $province."\r\n");
     fwrite($order_file, $pc."\r\n");
	 fwrite($order_file, $email."\r\n");
	 fwrite($order_file, $credit."\r\n");
	 fwrite($order_file, $cdtnum."\r\n");
	 fwrite($order_file, $wraptype."\r\n");
	 fwrite($order_file, $bf."\r\n");
     fclose($order_file);

*/
// Compute the item cost

  $image_cost = ((0.25 * $size) +10);
  $image_cost *= 1.13;

  $ba = $_POST["uknow2"];

		$con = mysql_connect("localhost","root","");
		if (!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  }

		mysql_select_db("db_comp2405", $con);
	
		$sql="INSERT INTO orders (user_id, image, dimension, price)
		VALUES
		('$user','$ba','$size','$image_cost')";

		if (!mysql_query($sql,$con))
		  {
		  die('Error: ' . mysql_error());
		  }
		



echo '<div class="left">';
echo '<h1> Shipping Information </h1>';

  print ("$fullname <br> $address <br> $city <br> $province <br> $pc <br> $email <br> $credit<br>");



echo 'Image Selected:<br>';


echo '<img src="'.$ba.'" alt="frame" name="spot2">';


echo '<br>';

 print("Requested Size:  ");
 print($size);
 print(" sq. inches");
echo '<br><br>';
 print("Selected Wrap Type:  ");
 print($wraptype);
echo '<br><br>';

echo 'Price:'; 
 printf ("$ %4.2f", $image_cost); 




echo '</div>';
?>
</body>
</html>

