<section class="featured-item">

<?php $featuredItems = getTreatedFeaturedListing(); ?>

<?php foreach ($featuredItems as $post) { ?>
<!-- for each start -->    
  <?php setup_postdata( $post ); ?>


  <?php    

    // $pro_ad_type = get_post_meta(get_the_ID(), 'et_er_adtype', true);
    
    $detailURL = '/terrerohomes/property/?p_id='. get_the_ID(); 
    $address = '';
    
    $meta_address = getMetaData('et_er_address');
    $meta_location = getMetaData('et_er_area_location');
    $meta_city = getMetaData('et_er_city');
    $meta_zip_code = getMetaData('et_er_zipcode');

    if ($meta_address) {

      $address .= $meta_address . ', '; 

    }

    if ($meta_location) {

      $address .= $meta_location . ', ';

    }

    $address .=  $meta_city . ' ' . $meta_zip_code; 
    
    $property_imgs_ids = get_property_images_ids();

    $imgUrls = array();

    foreach ($property_imgs_ids as $imgId) {
      $url = getIMGUrl($imgId);
      if ($url) {
        array_push($imgUrls, $url);  
      }      
    }
  ?>



<a href="<?php echo $detailURL; ?>">
  
  <!-- slide show -->
  <div class="hotel-details-view-container">

    <div class="image-slide-show-container">
      <div class="slide-show terrero-slideshow">
        <div class="carousel">
          <ul>

            <?php foreach ($imgUrls as $imgURL) { ?>

            <li>            
              <div class="carousel-img" style="background-image: url(<?php echo $imgURL; ?>)"></div>
            </li>
            
            <?php } ?>

          </ul>
        </div>
      </div>
    </div>

    <!-- slide info -->
    <div>
      <table style="width: 100%;">
        <tbody>
          <tr>
            <td>
              <div style="font-size: 1.45em; width: 400px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                <?php the_title(); ?>
              </div>
              <div style="font-size: 0.95em; margin-top: 4px; color: #666666; width: 400px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                <?php echo $address; ?>
              </div>
            </td>
            <td>
              <div style="font-size: 1.45em; color: #005826; text-align: right;">
                $4,365
              </div>
              <div style="font-size: 0.95em; margin-top: 4px; color: #666666; text-align: right;">
                Per Month
              </div>
            </td>
            <td style="width: 20px;">
            </td>
            <td style="padding-left: 20px; border-left: 1px solid #eeeeee;">
              <div class="font-size-90 bold view-details-button">
                <a href="/terrerohomes/property/?p_id=44">View Details</a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- slide info -->

</a>





<?php } ?>


</section>

<?php wp_reset_query(); ?>