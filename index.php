<?php
require 'gallery.php';
$gallery = new Gallery();
$gallery->setPath('img'); //path to the image folder
$images = $gallery->getImages(array('JPG','PNG','jpg')); //array of possible image extensions (useful if you have mixed galleries)
$row_counter = 0; //don't change that
$img_no_caption = " "; //default caption for image that don't have one
$img_no_date = 

$page_title="PHP-Gallery"; //changes the <title> attribute AND the logo in top left corner
$no_images_warning="Ooops! No images in gallery!"; //Display the text when $gallery->setPath directory is empty.
$col_md_x = 6; //Bootstrap - choose either 2,3,4 or 6 to have 6,4,3 or 2 pics per line respectively
//----------------------------------------------

$row_x = 12 / $col_md_x; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lightbox/css/lightbox.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
 
    <script src="lightbox/js/jquery-1.11.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lightbox/js/lightbox.min.js"></script>
  </head>
  
  <body>
    <?php include 'navigation.php'; ?>
    <br />
    <div class="container">
      <div class="row">
     
	<?php if($images): ?>

	    <?php foreach($images as $image):
	       
	    $row_counter++;
	    ?>
	    <div class="col-md-<?php echo $col_md_x; ?>">
	      <div class="picture_card">
		 
	    <a href="<?php echo $image['full']; ?>" data-lightbox="bmw" ><img src="<?php echo $image['thumb']; ?>"></a>
	    <br />
	      <div class="picture_card_description">
	    <span class="glyphicon glyphicon-time"></span>&nbsp;<span class="picture_card_description_date"></span>
	    <br />
	      </div>
		  
	      </div>
	    </div>
	    <?php
	    
	    
	      if ($row_counter % $row_x == 0) {
	      echo '</div><br /><div class="row">';
	      }
	      
	    endforeach; ?>
	    
	<?php else: ?>
	<div id=no_images><?php echo $no_images_warning; ?></div>

    	<?php endif; ?>
    	
      </div>	
    </div>
    <br/>
  </body>
</html>
