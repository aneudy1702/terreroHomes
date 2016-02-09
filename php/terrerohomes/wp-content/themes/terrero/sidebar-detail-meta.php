
	<div id="content" class="site-content" role="main">  	

		<?php  if (get_option('p_share_buttons') == 1) {?>

      <!-- fb -->
      <span class='st_fblike_hcount' displayText='<?php _e( ' Facebook Like ', 'wp-realestate' ); ?>'></span>
      <!-- twt -->
      <span class='st_twitter_hcount' displayText='<?php _e( ' Tweet ', 'wp-realestate
      ' ); ?>'></span>
      <!-- g+ -->
      <span class='st_googleplus_hcount' displayText='<?php _e( ' Google+ ', 'wp-realestate
      ' ); ?>'></span>

    <?php } ?>
           

		<div id="ProDescription">

			<div class="heading">
				<?php _e( 'Details', 'wp-realestate' ); ?>
			</div>

		  


		  <div class="SpecLabel">		  	
		  	<?php _e( 'Property Name', 'wp-realestate' ); ?>:
		      <br>
		    <?php _e( 'Property Address', 'wp-realestate' ); ?>:
		  </div>

		  <div class="SpecInfo">
        <?php 
					echo get_post_meta($post->ID, 'et_er_property_name', true).'<br>'; 
					echo get_post_meta($post->ID, 'et_er_address', true).', '.get_post_meta($post->ID, 'et_er_area_location', true).', '.get_post_meta($post->ID, 'et_er_city', true).' '.get_post_meta($post->ID, 'et_er_zipcode', true).' '.get_post_meta($post->ID, 'et_er_state', true);
				?>
    	</div> 


      <div>
        
        <!-- Ren or Sale -->
        <div class="SpecLabel">
          <?php _e( 'Property Type', 'wp-realestate' ); ?>:
        </div>

        <div class="SpecInfo">
          <?php echo get_post_meta($post->ID, 'et_er_type', true).'<br />'; ?>
        </div>
        

        <!-- Sale Price -->
        <?php if (get_post_meta($post->ID, 'et_er_price', true) <> '0') { ?>

	        <div class="SpecLabel">
	          <?php _e( 'Price', 'wp-realestate' ); ?>:
	        </div>

          <div class="SpecInfo">
            <?php echo ET_RE_Currency.get_post_meta($post->ID, 'et_er_price', true).'<br />'; ?>
          </div>

        <?php } ?>
				
        <!-- Rent Price -->
				<?php if (get_post_meta($post->ID, 'et_er_rent_price', true) <> 0) { ?>
          <div class="SpecLabel">
            <?php _e( 'Rent', 'wp-realestate' ); ?>: </div>
          <div class="SpecInfo">
            <?php echo ET_RE_Currency.get_post_meta($post->ID, 'et_er_rent_price', true).' '. get_post_meta($post->ID, 'et_er_rent_tenure', true) .'<br />'; ?>
          </div>
        <?php } ?>
				


      	<!-- Year Built in -->
				<?php if (get_post_meta($post->ID, 'et_er_built_size', true) <> '0') { ?>
	        <div class="SpecLabel">
	          <?php _e( 'Built up', 'wp-realestate' ); ?>: </div>
	        <div class="SpecInfo">
	          <?php echo get_post_meta($post->ID, 'et_er_built_size', true).'<br />'; ?>
	        </div>
      	<?php } ?>


      	<!-- Land Size -->
				<?php if (get_post_meta($post->ID, 'et_er_land_size', true) <> '0') { ?>
					<div class="SpecLabel">
						<?php _e( 'Land area', 'wp-realestate' ); ?>: </div>
					<div class="SpecInfo">
						<?php echo get_post_meta($post->ID, 'et_er_land_size', true).'<br />'; ?>
					</div>
				<?php } ?>
				


				<!-- Bedrooms -->
				<?php if (get_post_meta($post->ID, 'et_er_bedroom', true) <> '0') { ?>
          <div class="SpecLabel">
            <?php _e( 'Bedroom', 'wp-realestate' ); ?>: </div>
          <div class="SpecInfo">
            <?php echo get_post_meta($post->ID, 'et_er_bedroom', true).'<br />'; ?>
          </div>
        <?php } ?>
				

        <!-- BathRoom -->
				<?php if (get_post_meta($post->ID, 'et_er_bathroom', true) <> '0') { ?>
          <div class="SpecLabel">
            <?php _e( 'Bathroom', 'wp-realestate' ); ?>: </div>
          <div class="SpecInfo">
            <?php echo get_post_meta($post->ID, 'et_er_bathroom', true).'<br />'; ?>
          </div>
        <?php } ?>


        <!-- Furnishing -->
				<?php if (get_post_meta($post->ID, 'et_er_furnishing', true) <> __( 'Not Applicable', 'wp-realestate' )) { ?>
					<div class="SpecLabel">
					  <?php _e( 'Furnishing', 'wp-realestate' ); ?>: </div>
					<div class="SpecInfo">
					  <?php echo get_post_meta($post->ID, 'et_er_furnishing', true).'<br />'; ?>
					</div>
        <?php } ?>
				

        <!-- Monthly or weekly -->
				<?php if (get_post_meta($post->ID, 'et_er_tenure', true) <> __( 'Not Applicable', 'wp-realestate' )) { ?>
	        <div class="SpecLabel">
	          <?php _e( 'Tenure', 'wp-realestate' ); ?>: </div>
	        <div class="SpecInfo">
	          <?php echo get_post_meta($post->ID, 'et_er_tenure', true).'<br />'; ?>
	        </div>
        <?php } ?>
				

        <!-- Date available -->
				<?php if (get_post_meta($post->ID, 'et_er_date_vacant', true) <> '0') { ?>
	        <div class="SpecLabel">
	          <?php _e( 'Date Available', 'wp-realestate' ); ?>: </div>
	        <div class="SpecInfo">
	          <?php echo get_post_meta($post->ID, 'et_er_date_vacant', true).'<br />'; ?>
	        </div>
        <?php } ?>
				
  		</div>
  	</div>

