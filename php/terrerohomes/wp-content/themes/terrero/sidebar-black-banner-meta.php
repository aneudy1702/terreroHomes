<div class="banner-container cf">
  <div class="column">
    <div class='title'>
        <?php the_title(); ?>
    </div>

    <div>

      <?php echo getMetaAddress(); ?>
    </div>
  </div>
  
  <div class="column">

    <div class="secondary-title">
      <?php
        echo getMetaData('et_er_type') .' for ' . getMetaData('et_er_adtype');
      ?>
    </div>

    <div>
      Last updated on <?php the_time('F jS, Y'); ?>
    </div>

  </div>

  

</div>

<div class="two-column-container">

  <div class="multimedia"></div>

  <div class="meta-info"></div>

</div>