<?php 

// VARIABLES
$title = the_title();
$address = getMetaAddress();
$listingType = getMetaData('et_er_type');
$paymentType = getMetaData('et_er_adtype');
$secondaryTitle = $listingType .' for ' . $paymentType;
$postedTime = the_time('F jS, Y');

?>
<div class="banner-container cf">
  <div class="column">
    <div class='title'>
        <?php echo $title; ?>
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
      Last updated on <?php echo $postedTime; ?>
    </div>

  </div>

  

</div>

<div class="two-column-container">

  <div class="multimedia"></div>

  <div class="meta-info">

  </div>

</div>