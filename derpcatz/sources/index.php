<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>¯\_(ツ)_/¯ DerpCatz, for all your derpy cat pictures ¯\_(ツ)_/¯ </title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
      	pre {
      		color: blue;
      		font-weight: bold;
			}
      </style>
	</head>
    
	<body>
		<pre color="blue">
 =================================================================
  _____  ______ _____  _______     __   _____       _______ ______
 |  __ \|  ____|  __ \|  __ \ \   / /  / ____|   /\|__   __|___  /
 | |  | | |__  | |__) | |__) \ \_/ /  | |       /  \  | |     / /
 | |  | |  __| |  _  /|  ___/ \   /   | |      / /\ \ | |    / /  
 | |__| | |____| | \ \| |      | |    | |____ / ____ \| |   / /__
 |_____/|______|_|  \_\_|      |_|     \_____/_/    \_\_|  /_____|

 =================================================================
</pre>
		<p> I'm so sorry! Peoplpe tried to hack my site, so I temporarily closed the upload function. I am trying to setup a database to make it more secure...
		<p>
		<?php

		if( isset( $_POST[ 'Upload' ] ) ) {
		    // Where are we going to be writing to?
		    $target_path  = "/var/www/html/mysecretphpadminfolder/uploads/";
		    $target_path .= basename( $_FILES[ 'uploaded' ][ 'name' ] );

		    // File information
		    $uploaded_name = $_FILES[ 'uploaded' ][ 'name' ];
		    $uploaded_type = $_FILES[ 'uploaded' ][ 'type' ];
		    $uploaded_size = $_FILES[ 'uploaded' ][ 'size' ];

		    // Is it an image?
		    if( ( $uploaded_type == "image/jpeg" || $uploaded_type == "image/png" ) &&
		        ( $uploaded_size < 100000 ) ) {

		        // Can we move the file to the upload folder?
		        if( !move_uploaded_file( $_FILES[ 'uploaded' ][ 'tmp_name' ], $target_path ) ) {
		            // No
		            echo '<pre>Your image was not uploaded.</pre>';
		        }
		        else {
		            // Yes!
		            echo "<pre>Your image is succesfully uploaded!</pre>";
		        }
		    }
		    else {
		        // Invalid file
		        echo '<pre>Hey! What ya doing! Derpcatz is for derpy cat images, so we only allow JPEG or PNG images.</pre>';
		    }
		}
		?>

		<form enctype="multipart/form-data" action="#" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
			<b>Choose an image to upload:</b><br /><br />
			<input name="uploaded" type="file" /><br />
			<br />
			<input type="hidden" name="Upload" value="Upload" />
		</form>
		<p> Due to copyright issues the uploaded images are being checked first. This can take days, because I have to manualy check and copy the images from one directory to the other (I'm sorry!)
		<p>
		<br /><br />
		<?php 
			$dirname = "uploads/";
			$images = scandir($dirname);
			$ignore = Array(".", "..");
			foreach($images as $curimg){
			if(!in_array($curimg, $ignore)) {
			echo "<img src='uploads/$curimg' /><br>\n";
			};
			}
		?>
	</body>
</html>

