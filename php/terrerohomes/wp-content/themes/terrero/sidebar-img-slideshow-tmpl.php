<?php

$property_imgs_ids = get_property_images_ids();

$imgUrls = array();

foreach ($property_imgs_ids as $imgId) {
  $url = getIMGUrl($imgId);
  if ($url) {
    array_push($imgUrls, $url);  
  }      
}

?>
<div class="image-slide-show-container">
  <div class="slide-show terrero-slideshow">
    <div class="carousel">
      <ul>  
        <?php echo $imgUrls ?>
        <?php foreach ($imgUrls as $imgURL) { ?>

        <li>            
          <div class="carousel-img" style="background-image: url(<?php echo $imgURL; ?>)"></div>
        </li>
        
        <?php } ?>

      </ul>
    </div>
  </div>
</div>