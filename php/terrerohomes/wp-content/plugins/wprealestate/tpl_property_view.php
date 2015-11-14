<?php
get_header();

$p_detail_sidebar = get_option('p_detail_sidebar');

// global $post;


$post = get_post($_GET['p_id']);
// the_post();

// if ($_POST) {

// $get_property_user = get_userdata($post->post_author);
// if (get_option('et_re_sent_copy_email') == '') {
// 	$et_re_sent_copy_email = get_option('admin_email');
// } else {	
// 	$et_re_sent_copy_email = get_option('et_re_sent_copy_email');
// }

// if (file_exists( ET_RE_PATH . 'pro/pro_tpl_property_view.php')) { include ET_RE_PATH . 'pro/pro_tpl_property_view.php'; }

// 	$inq_msg = __( 'An inquiry received from your site', 'wp-realestate' ). ' '.bloginfo('name').'<br /><br />';
// 	$inq_msg .= __( 'Property URL', 'wp-realestate' ).': '.get_permalink($post->ID).'<br />';
// 	$inq_msg .= __( 'Name', 'wp-realestate' ).': '.$_REQUEST['inq_name'].'<br />';
// 	$inq_msg .= __( 'Email', 'wp-realestate' ).': '.$_REQUEST['inq_email'].'<br />';
// 	$inq_msg .= __( 'Phone', 'wp-realestate' ).': '.$_REQUEST['inq_phone'].'<br />';
// 	$inq_msg .= __( 'Message', 'wp-realestate' ).': '.$_REQUEST['inq_message'].'<br />';
// 	$inq_msg .= __( 'User IP', 'wp-realestate' ).': '.$_SERVER['REMOTE_ADDR'].'<br />';
	
// 	sendmail($_REQUEST['inq_name'], $et_re_sent_copy_email, $_REQUEST['inq_email'], __( 'Message from', 'wp-realestate' ).' '.bloginfo('name'),$inq_msg);
	
// 	global $wp_rewrite;
// 	if ($wp_rewrite->permalink_structure == ''){
// 		wp_redirect( get_permalink($post->ID).'&msg=1');
// 	} else {
// 		wp_redirect( get_permalink($post->ID).'?msg=1');
// 	}
// 	exit;
// }
?>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "72af30ed-8290-4178-b5d1-3fdb0b5c43a3", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script type="text/javascript">
jQuery(window).load(function() {
	jQuery('#inq_form').submit(function(){
		if(jQuery('#inq_name').val()==""){
			alert('<?php _e( 'Please enter your name', 'wp-realestate' ); ?>');
			jQuery('#inq_name').focus();
			return false;
		}
		if(jQuery('#inq_email').val()==""){
			alert('<?php _e( 'Please enter your email', 'wp-realestate' ); ?>');
			jQuery('#inq_email').focus();
			return false;
		} else {
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var emailaddressVal = jQuery('#inq_email').val();
			if(!emailReg.test(emailaddressVal)) {
				alert("<?php _e( 'Invalid Email', 'wp-realestate' ); ?>");
				jQuery('#inq_email').focus();
				return false;
			}	
		}
		if(jQuery('#inq_phone').val()==""){
			alert('<?php _e( 'Please enter your phone number', 'wp-realestate' ); ?>');
			jQuery('#inq_phone').focus();
			return false;
		}
		if(jQuery('#inq_message').val()==""){
			alert('<?php _e( 'Please enter your message', 'wp-realestate' ); ?>');
			jQuery('#inq_message').focus();
			return false;
		}
		return true;
	});
	
//   // The slider being synced must be initialized first
//   jQuery('#carousel').flexslider({
//     animation: "slide",
//     controlNav: false,
//     animationLoop: false,
//     slideshow: false,
//     itemWidth: 155,
//     itemMargin: 5,
//     asNavFor: '#slider'
//   });
   
//   jQuery('#slider').flexslider({
//     animation: "slide",
//     controlNav: false,
//     animationLoop: false,
//     slideshow: false,
//     sync: "#carousel"
//   });
});
</script>

<!-- new detail page. terrero homes -->

<div id="content" class="site-content listing-detail" role="main">
	<!-- slide show and quick details section -->
  <section class="">
    <!-- slide show -->
    <div class="hotel-details-view-container">
      <div class="image-slide-show-container">
        <div class="slide-show terrero-slideshow">
          <div class="carousel">
            <ul>
              <li>
                <img src="http://photos.renthop.com/2/6062434_249b2a352e9fe9227c07701671a2d1ac.jpg"
                alt="" />
              </li>
              <li>
                <img src="http://photos.renthop.com/2/6062434_249b2a352e9fe9227c07701671a2d1ac.jpg"
                alt="" />
              </li>
              <li>
                <img src="http://photos.renthop.com/2/6062434_249b2a352e9fe9227c07701671a2d1ac.jpg"
                alt="" />
              </li>
              <li>
                <img src="http://photos.renthop.com/2/6062434_249b2a352e9fe9227c07701671a2d1ac.jpg"
                alt="" />
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- slide info -->
      <div class="info-container">
        <table style="width: 100%;">
          <tbody>
            <tr>
              <td>
              	<div class="slide-show-address-box">
              		<!-- post title -->
              		<div>
	                  <?php the_title(); ?>
	                </div>
	                <!-- post title -->

	                <!-- listing address -->
	                <div>
	                  <?php 

	                  	$address = '';

											if (get_post_meta($post->ID, 'et_er_address', true)) {
												$address .= get_post_meta($post->ID, 'et_er_address', true).', '; 
											}
											if (get_post_meta($post->ID, 'et_er_area_location', true)) {
												$address .= get_post_meta($post->ID, 'et_er_area_location', true).', ';
											}
											$address .= get_post_meta($post->ID, 'et_er_city', true).' '.get_post_meta($post->ID, 'et_er_zipcode', true); 

											echo $address;									
										?>
	                </div>
	                <!-- listing address -->

              	</div>
                
              </td>
              <td>

              	<!-- RENT -->
              	<?php if (get_post_meta($post->ID, 'et_er_rent_price', true) <> 0) { ?>
              		
              		<!-- rent price -->
	                <div style="font-size: 1.45em; color: #005826; text-align: right;">
	                  <?php echo ET_RE_Currency.get_post_meta($post->ID, 'et_er_rent_price', true); ?>
	                </div>
	                <!-- rent price -->
	                
	                <!-- rent tenure -->
	                <div style="font-size: 0.95em; margin-top: 4px; color: #666666; text-align: right;">
	                  <?php echo get_post_meta($post->ID, 'et_er_rent_tenure', true); ?>
	                </div>
	                <!-- rent price -->

                <?php } ?>
                <!-- RENT -->

              </td>
              <td style="width: 20px;">
              </td>
              <td style="padding-left: 20px; border-left: 1px solid #eeeeee;">
                <div class="font-size-90 bold view-details-button" style="
	              		margin-right: 10px;
	              		text-align: center;
	              		width: 155px;
	              		padding-top: 8px;
	              		padding-bottom: 8px;
	              		cursor: pointer;
	              		margin-top: 2px;
	              		display: inline-block;">
                  <a href="#availabilityForm">Check Availability</a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <!-- slide show and quick details section -->




<!-- Details section -->
<section>
	<div id="content" class="site-content" role="main">
  	<div class="SpacerDiv"></div>
  	

  	<?php $property_imgs = get_property_images_ids(false, $post->ID);
 
		if ($property_imgs) { ?>
    	<div class="ProPhotos">
      	<!-- Place somewhere in the <body> of your page -->
      	<div id="slider" class="flexslider">
        	<ul class="slides">
          	<?php foreach ($property_imgs as $img_id) { ?>
            	<li>
              	<?php echo wp_get_attachment_image($img_id, 'full'); ?>
            	</li>
          	<?php } ?>
            <!-- items mirrored twice, total of 12 -->
        	</ul>
      	</div>


      	<?php

      	$property_arr_size = count($property_imgs);

				if ($property_arr_size > 1) {

				?>
        
	        <div id="carousel" class="flexslider">
	          <ul class="slides">
	            <?php 

	            foreach ($property_imgs as $img_id) {

	          	?>
	              <li>
	                <?php

	                	echo wp_get_attachment_image($img_id);

	              	?>
	              </li>
	              
	            <?php

	      			}

	    				?>

	          <!-- items mirrored twice, total of 12 -->
	          </ul>
	        </div>
       	<?php } ?>
    	</div>
    <?php } ?>
		


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
        
    <div class="SpacerDiv"></div>

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



      <div class="SpacerDiv"></div>



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
				
				<?php
					$terms = get_the_terms( $post->ID, 'facility' );
					if ( $terms && ! is_wp_error( $terms ) ) {
				?>
          <div class="SpecLabel">
            <?php _e( 'Facilities', 'wp-realestate' ); ?>: </div>
          <div class="SpecInfo">
            <?php the_terms( $post->ID, 'facility', '', ', ', ' ' ).'<br />'; ?>
          </div>
        <?php } ?>
  		</div>
      


      <div class="SpacerDiv"></div>

  	</div>

</section>
<!-- Details Section -->




  <!-- description section -->
  <div style="width: 642px; margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #f2f2f2;">
	  <div id="ProDescription">
			<div class="heading">
				<?php _e( 'Description', 'wp-realestate' ); ?>
			</div>
			<?php the_content(); ?>
		</div>
	</div>
	<!-- description section -->




	<!-- features and amenities  section -->
	<section>
		<?php 
		  
		  $terms = get_the_terms( $post->ID, 'facility' );
			
			if ( $terms && ! is_wp_error( $terms ) ) {
		?>
			<div style="width: 642px; margin-bottom: 35px; padding-bottom: 25px; border-bottom: 1px solid #f2f2f2;">
			  <div class="bold" style="padding-bottom: 20px; font-size: 1.10em;">
			    <?php _e( 'Facilities', 'wp-realestate' ); ?>
			  </div>

			  <div class="" style="width: 640px;">
			  	<!-- facilities iteration -->
			    <?php 
						foreach ($terms as $term) { 
					?>
					<!-- facility template -->
						<div style="width: 210px; display: inline-block; padding-bottom: 12px; vertical-align: top;">
				      <table>
				        <tbody>
				          <tr>
				            <td style="vertical-align: top;">
				              <img src="/terrerohomes/wp-content/themes/terrero/images/feature-check.png">
				            </td>
				            <td style="vertical-align: top; padding-left: 8px;" class="font-size-90">
				              <?php echo $term->name ?>
				            </td>
				          </tr>
				        </tbody>
				      </table>
				    </div>
					<?php
						}
					?>					
			  </div>
			</div>
			<!-- end of if ( $terms && ! is_wp_error( $terms ) ) { -->
		<?php } ?>
	</section>
	<!-- features and amenities  section -->
	

	<!-- map section -->
	<section>
		<div style="margin-bottom: 25px; font-weight: bold; font-size: 1.10em;">
			On the Map
		</div>
		<div id="map_canvas" style="width:640px; height:500px"></div>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
		<script type="text/javascript">
		  var geocoder;
		  var map;
		  var address ='<?php echo $address ?>';
		  function initialize() {
		    geocoder = new google.maps.Geocoder();
		    var latlng = new google.maps.LatLng(-34.397, 150.644);
		    var myOptions = {
		      zoom: 17,
		      center: latlng,
		    	mapTypeControl: true,
					scrollwheel: false,
			    navigationControl: false,
			    mapTypeControl: false,
			    scaleControl: false,
			    draggable: false,
		    	navigationControl: true,
		      mapTypeId: google.maps.MapTypeId.ROADMAP
		    };
		    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		    if (geocoder) {
		      geocoder.geocode( { 'address': address}, function(results, status) {
		        if (status == google.maps.GeocoderStatus.OK) {
		          if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
		          map.setCenter(results[0].geometry.location);

		            var infowindow = new google.maps.InfoWindow(
		                { content: '<b>'+address+'</b>',
		                  size: new google.maps.Size(150,50)
		                });

		            var marker = new google.maps.Marker({
		                position: results[0].geometry.location,
		                map: map, 
		                title:address
		            }); 
		            google.maps.event.addListener(marker, 'click', function() {
		                infowindow.open(map,marker);
		            });

		          } else {
		            alert("No results found");
		          }
		        } else {
		          alert("Geocode was not successful for the following reason: " + status);
		        }
		      });
		    }
		  }
		  jQuery(initialize);
		</script>
		
	</section>
	<!-- map section -->

</div>


<div class="SpacerDiv"></div>
<div class="SpacerDiv"></div>

<!--<div id="ProDescription">
<div class="heading">Map</div>
<iframe src="https://www.google.com/maps/embed?location=London" width="600" height="450" frameborder="0" style="border:0"></iframe>
</div>-->
<div id="divAgent"></div>
<div id="ProDescription">
<?php if ($_REQUEST['msg'] == 1) { ?>
<div style="color:#060; font-weight:bold; margin:5px;"><?php _e( 'Inquiry has been sent to the Agent', 'wp-realestate' ); ?></div>
<?php } ?>
<form name="inq_form" id="inq_form" method="post">
<div class="heading"><?php _e( 'Send an inquiry to the agent', 'wp-realestate' ); ?></div>
<div class="SpacerDiv"></div>
<div class="SpecLabel"><?php _e( 'Your Name', 'wp-realestate' ); ?>*</div>
<div class="SpecInfo"><input name="inq_name" id="inq_name" type="text"></div>
<div class="SpacerDiv"></div>
<div class="SpecLabel"><?php _e( 'Your Email', 'wp-realestate' ); ?>*</div>
<div class="SpecInfo"><input name="inq_email" id="inq_email" type="text"></div>
<div class="SpacerDiv"></div>
<div class="SpecLabel"><?php _e( 'Your Phone', 'wp-realestate' ); ?>*</div>
<div class="SpecInfo"><input name="inq_phone" id="inq_phone" type="text"></div>
<div class="SpacerDiv"></div>
<div class="SpecLabel"><?php _e( 'Message', 'wp-realestate' ); ?>*</div>
<div class="SpecInfo"><textarea name="inq_message" id="inq_message"></textarea></div>
<div class="SpacerDiv"></div>
<div class="SpacerDiv"></div>
<div class="SpecLabel">&nbsp;</div>
<div class="SpecInfo"><input name="submit" type="submit" value="<?php _e( 'Send Inquiry', 'wp-realestate' ); ?>"></div>
<div class="SpacerDiv"></div>
</form>
</div>
</div>
</div>
<?php 

// Reset Query
wp_reset_query();
if ($p_detail_sidebar == 1) {
get_sidebar();
} ?>
<?php get_footer(); ?>