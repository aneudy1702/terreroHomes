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
    <?php get_sidebar('multimedia-box'); ?>
  </div>  

  <div class="meta-info col">
    <div class="payment-amount">
      <!-- RENT -->
      <!-- rent price -->
      <div>
        <?php echo ET_RE_Currency . $paymentAmount; ?> 
        <?php if ($paymentType == 'Rent') {?>
        
          <?php echo '/ ' . $paymentFrequency; ?>
        
        <?php } ?>
      </div>
      <!-- rent price -->

      <!-- rent tenure -->
      
      
      <!-- rent price -->
      <!-- RENT -->
    </div>
    <div class="small-details">
      <?php get_sidebar('meta-box'); ?>
    </div>
  </div>

</div>