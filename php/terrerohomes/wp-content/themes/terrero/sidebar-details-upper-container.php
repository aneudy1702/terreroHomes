<div class="hotel-details-view-container">

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
  <!-- slide info -->


	<!-- slide show -->
  <div class="image-slide-show-container">
    <div class="slide-show terrero-slideshow">
      <div class="carousel">
        <ul>

    			<?php 

						$property_imgs = get_property_images_ids(false, $post->ID);

						if ($property_imgs) { 
						
						foreach ($property_imgs as $img_id) {
						?>
							
							<li>
                <img
                src="<?php echo wp_get_attachment_image_src($img_id, 'full')[0]; ?>"
                alt=""
            	/>
              </li>
    				
  	
					<?php 

						}
					}

					?>              
        </ul>
      </div>
    </div>
  </div>
  <!-- slide show -->   



</div>