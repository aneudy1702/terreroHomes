<?php 

// VARIABLES

$address = getMetaAddress();
$listingType = getMetaData('et_er_type');
$paymentType = getMetaData('et_er_adtype');
$secondaryTitle = $listingType .' for ' . $paymentType;
$rentAmount = getMetaData('et_er_rent_price');
$saleAmount = getMetaData('et_er_price');
$paymentAmount = $paymentType == 'Rent' ? $rentAmount : $saleAmount;
$paymentFrequency = getMetaData('et_er_rent_tenure');
$property_imgs_ids = get_property_images_ids();


?>
<div class="banner-container cf">
  <div class="column">
    <div class='title'>
        <?php the_title(); ?>
    </div>

    <div>

      <?php echo $address; ?>
    </div>
  </div>
  
  <div class="column">

    <div class="secondary-title">
      <?php
        echo $secondaryTitle;
      ?>
    </div>

    <div>
      Last updated on <?php the_time('F jS, Y'); ?>
    </div>

  </div>

  

</div>

<div class="two-column-container">

  <div class="col">
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
  </div>  

  <div class="meta-info col">
    <div class="payment-amount">
      <!-- RENT -->
      <!-- rent price -->
      <div>
        <?php echo ET_RE_Currency . $paymentAmount; ?>
      </div>
      <!-- rent price -->

      <!-- rent tenure -->
      <?php if ($paymentType == 'Rent') {?>
        <div>
          <?php echo $paymentFrequency; ?>
        </div>
      <?php } ?>
      
      <!-- rent price -->
      <!-- RENT -->
    </div>
    <div class="small-details">
      <ul>
        <li>some</li>
        <li>details</li>
        <li>here</li>
      </ul>
    </div>
  </div>

</div>