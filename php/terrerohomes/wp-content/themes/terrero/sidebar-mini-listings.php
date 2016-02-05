<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	
<!-- TODO: create dynamic list of mini lisitings -->

<div class="mini-listing-list">
	<header class="listing-title">
		<span>
			Popular istings
		</span>
	</header>
	<!-- repeat this item bellow -->
	<div class="list">

		<?php $popularListings = getTerreoListings(false, true, 4); ?>

		<?php foreach ($popularListings as $post) { ?>
		<!-- for each start -->
			
			<?php setup_postdata( $post ); ?>

			<?php
				// $pro_ad_type = get_post_meta(get_the_ID(), 'et_er_adtype', true);
				// $listing_city = get_post_meta(get_the_ID(), 'et_er_city', true);
				$detailURL = '/terrerohomes/property/?p_id='. get_the_ID();		
				$imgURl = null;
				$property_imgs_ids = get_property_images_ids();
				$miniListingClass = 'listing-img ';
				$imgStyle = '';
				
				if ($property_imgs_ids) {

					$imgURl = wp_get_attachment_image_src($property_imgs_ids['property_image1'], 'medium')[0];
					$imgStyle = 'background-image:url(' . $imgURl . ')';
					
				}
			?>

			
			<a id="" href="<?php echo $detailURL; ?>" alt="<?php the_title(); ?>">
				<div class="mini-listing">
					<table>
				    <tbody>
				      <tr>

				      	<!-- img -->
				        <td class="mini-col">			          
				          <div class="<?php echo $miniListingClass; ?>" style="<?php echo $imgStyle ?>"></div>
				        </td>

				        <!-- mini description -->
				        <td class="mini-col mini-description">
				          <div class="title">
				            <span><?php the_title(); ?></span>
				          </div>
				        </td>

				      </tr>
				    </tbody>
				  </table>	
				</div> 
			</a>			

		<!-- for each end -->
		<?php } ?>
		<?php wp_reset_query(); ?>
	</div>
	
	
</div>