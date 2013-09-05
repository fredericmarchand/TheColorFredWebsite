
<!DOCTYPE html>


<?php
  //Connect to the database
  mysql_connect("localhost", "root", "");
  mysql_select_db("db_comp2405");
  //run the sql query and store the results in a variable
  $results = mysql_query("SELECT * FROM images"); 
?>



<html lang="en-US">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="master.css" type="text/css" media="screen" title="no title">
		<script type="text/javascript" src="addtocart.js"></script>
		<title> Upload | Color Fred  </title>
		
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
		<h1> Upload Successful </h1><br>
	<!--	<table class="center" border="1" id="pictureTable" >
			<tr>
				<td> Image </td><td> Description </td><td> Add to Cart</td>
			</tr>-->
	
		
<?php


	$image_name = $_FILES['image']['name'];
    $mime_type = $_FILES['image']['type'];
    $tmp_location = $_FILES['image']['tmp_name'];
    $err_code = $_FILES['image']['error'];
    $file_size = $_FILES['image']['size'];
    
    //this will be used if the image is resized
    $new_image_name = $image_name;
    
    
    //IMPORTANT: this code assumes your images are to be stored
    //in the hardcoded director below
    //If the directory does not exist it will be created
    
    $directory = "/comp2405/images/";
    $dir_path = $_SERVER['DOCUMENT_ROOT'].$directory;
    
    //check to see if directory specified by dir_path
    //exists and if not create it
    if(!is_dir($dir_path)){
       //create the directory 
       if(!mkdir($dir_path, 0777, TRUE)){
          //make dir failed so throw exception
          throw new Exception("Could not create directory");
       }
    }
    
    $file_path = $directory.$image_name;
    $resized_file_path = $directory.$new_image_name;
    //create the path to store the images      
    $absolute_path = $_SERVER['DOCUMENT_ROOT'].$file_path;
    //use this path if the image is resized
    $resized_absolute_path = $_SERVER['DOCUMENT_ROOT'].$resized_file_path;
    
    
    //Resize the image if necessary
   
    //get the image info
    //info will contain size and type information
    $info = getimagesize($tmp_location);
    
          
    //determine if the uploaded file is a jpeg, gif, or png
    //set the required image creation and resampling
    //functions (Note php has dedicated functions for
    //each format)

    $format = "invalid"; //image format
    $image_create_fn;  //image resource create function
    $image_save_fn;    //image save function
    
    switch($info['mime']){
       case 'image/jpeg':
       case 'image/pjpeg':
           $format = "jpeg";
           $image_create_fn = imagecreatefromjpeg;
           $image_save_fn = imagejpeg;
           break;
       case 'image/gif':
           $format = "gif";
           $image_create_fn = imagecreatefromgif;
           $image_save_fn = imagegif;
           break;
       case 'image/png':
           $format = "png";
           $image_create_fn = imagecreatefrompng;
           $image_save_fn = imagepng;
           break;
       default:
           $format = "invalid";             
           break;
    }
    


    if($format !== "invalid"){

    //define the max dimension a picture is allowed to have
    //hardcode max size
    $max_width = 400; //max allowed width
    $max_height = 400; //max allowed height
    
    //get current image size
    $image_width = $info[0];  //current image width
    $image_height = $info[1]; //current image height
    
    $new_width;  //new image width 
    $new_height; //new image height

    //determine if resizing is necessary
    $resize_required = false;
    $scale_factor = 1.0;
    if($image_width > $max_width || $image_height > $max_height){
      $resize_required = true;
      $scale_factor = min($max_width/$image_width, $max_height/$image_height);
      $new_width = round($image_width * $scale_factor);
      $new_height = round($image_height * $scale_factor);
      
    }
    
    $resampled = false;
    if($resize_required){
       
       //create image resources for resampling
       $src_img = $image_create_fn($tmp_location); 
       $new_img = imagecreatetruecolor($new_width, $new_height);
       
       //resample the image
       if(imagecopyresampled($new_img, $src_img, 
           0,0,0,0,
           $new_width,$new_height,$image_width,$image_height
          )){
          
          $resampled = true;
          imagedestroy($src_img);
       }
       else{
          throw new Exception("Could not resample image");
       }
    
    } //end proceeding with resize

    } //end image size check
    
    
    
    //Save the original image by moving it to the destination
    //directory by making use of the move_uploaded_file 
    //function

    
    if(!move_uploaded_file($tmp_location, $absolute_path)){
		throw new Exception("Could not save the image");
	}


				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

				mysql_select_db("db_comp2405", $con);
				$blah = substr($resized_absolute_path, 47);
				$blah2 = substr($blah, 7, -4);
				$sql="INSERT INTO images (image_path, image_name)
				VALUES
				('$blah', '$blah2')";

				if (!mysql_query($sql,$con))
				  {
				  die('Error: ' . mysql_error());
				  }

    
    //if the image was resized and resampled 
    //save the new image as well
    //NOTE: in a real situation you might destroy
    //the original image and only save the new one instead
    //of saving the original as well
    //It would depend on the situation
    
    if($resampled === true){
       if($image_save_fn($new_img, $resized_absolute_path)){
		 		
         imagedestroy($new_img);
                    
       }
       else{
         throw new Exception("Failed to save resampled image");
       }
    }

?>
		
<?php

	/*	$files = glob("images/*.*");
		echo '	<form action="shopCart.php" method="post">';
		
			$i=0;
			while($row = mysql_fetch_array($results)){
		     	echo "<tr>";
		     	echo "<td>";
			 	echo '<img src="'.$row['image_path'].'" alt="'.$row['image_name'].'" >';
			 	echo "</td>";
			 	echo "<td>".$row['image_name']."</td>";
		     	echo '<td><input type="button" value="Select" onclick="getImageLocation('.$i.')"></td>';
		     	echo "</tr>";
			 	$i++;
		     }*/
		     //release the variable memory and close the database
			 echo '<img src="'.$blah.'" alt="pict">';
			 echo '<br><br>Back to <a href="gallery.php">Gallery</a><br><br>';
		     mysql_free_result($results);
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
<!--</table>
<br>

	<input type="text" id="locbox" name="lobo" onfocus="blur()"><input type="submit" value="Add to Cart" >
	<?php// echo '</form>';?>
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
		<input type="submit" value="Upload" onClick="checkEmptyUpload()"/>
		<br><br>
	</form>
		-->
		
	</body>
</html>

