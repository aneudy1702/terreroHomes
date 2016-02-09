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