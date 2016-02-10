<?php 
		  
  $terms = get_the_terms( 'facility' );
	
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