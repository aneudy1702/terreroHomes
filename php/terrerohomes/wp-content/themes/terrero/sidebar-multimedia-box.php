<div class="multimedia photo">
  <div class="photo-slider-container">
    <?php get_sidebar('img-slideshow-tmpl'); ?>
  </div>
  <div class="map-container">
    <?php get_sidebar('detail-map'); ?> 
  </div>    
</div>
<div class="multimedia-nav">
  <a class="nav-toggle active" data-which-tab="photo" href="javascript:;">
    <!-- photos -->
    Photos (<?php echo count($property_imgs_ids); ?>)
  </a>
  <a class="nav-toggle" data-which-tab="map" href="javascript:;">        
    Map
  </a>
</div>