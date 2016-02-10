<section class="featured-item">

<?php $featuredItems = getTreatedFeaturedListing(); ?>

<?php foreach ($featuredItems as $post) { ?>
<!-- for each start -->    
  <?php setup_postdata( $post ); ?>


  <?php    

    // $pro_ad_type = get_post_meta(get_the_ID(), 'et_er_adtype', true);
    
    $detailURL = '/terrerohomes/property/?p_id='. get_the_ID(); 
    $address = getMetaAddress(); 

  ?>



<a href="<?php echo $detailURL; ?>">
  
  <!-- slide show -->
  <div class="hotel-details-view-container">

    <?php get_sidebar('img-slideshow-tmpl'); ?>

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
                <?php echo getPrice(); ?>
              </div>
              <div style="font-size: 0.95em; margin-top: 4px; color: #666666; text-align: right;">
                <?php echo getMetaData('et_er_rent_tenure'); ?>
              </div>
            </td>
            <td style="width: 20px;">
            </td>
            <td style="padding-left: 20px; border-left: 1px solid #eeeeee;">
              <div class="font-size-90 bold view-details-button">
                <a href="/terrerohomes/property/?p_id=<?php echo get_the_ID(); ?>">View Details</a>
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