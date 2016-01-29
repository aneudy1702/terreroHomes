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
				$imgURl =  ET_RE_URL . '/images/no_property_image.png';
				$property_imgs_ids = get_property_images_ids();

				if ($property_imgs_ids) {
					$imgURl = wp_get_attachment_image_src($property_imgs_ids['property_image1'], 'medium')[0];
				}
				
			?>

			
			<a href="<?php echo $detailURL; ?>" alt="<?php the_title(); ?>">
				<div class="mini-listing">
					<table>
				    <tbody>
				      <tr>

				      	<!-- img -->
				        <td class="mini-col">			          
				          <div class="listing-img" style="background-image:url(<?php echo $imgURl; ?>)"></div>
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

	</div>
	
	
</div>