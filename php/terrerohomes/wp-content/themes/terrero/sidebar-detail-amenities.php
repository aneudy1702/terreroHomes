<?php 
		  
  $haveTerms = get_the_terms(get_the_ID(), 'facility' );
	
	if ( $haveTerms && ! is_wp_error( $haveTerms ) ) {
		$terms = get_the_terms(get_the_ID(), 'facility');
?>
	<div>
	  <div class="heading">
			<?php _e( 'Amenities', 'wp-realestate' ); ?>
		</div>

	  <div class="" style="width: 640px;">
	  	<!-- facilities iteration -->
	    <?php 
				foreach ($terms as $term) { 
			?>
			<!-- facility template -->
			<div class="amenity">
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