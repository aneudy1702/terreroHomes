<?php 
if(!isset($_SESSION)){session_start();}
get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


$catproperty = $_REQUEST['cid'];

$pro_search = $_REQUEST['key'];

$p_list_sidebar = get_option('p_list_sidebar');

$et_re_adv_flds = get_option('et_re_adv_flds');

$p_pro_id_display = get_option('p_pro_id_display');


?>
<!-- LISTINGS HEADER -->
<h1>
	<div class="color-fg-black listings-header">
		Property Listings  
	</div>
</h1>
<!-- LISTINGS HEADER END -->
<div id="content" class="site-content agtpglist clear-bgX">	
	
	<!-- CHECK IF COMING FROM A FORM -->
	<?php

		$adv_frm = $_REQUEST['adv_frm'];

		if($_REQUEST['state']!=""){
			$adv_frm = 1;
			$p_list_type = '-1';
		}

		if($_POST){
			unset($_SESSION['adv_frm']);
		} else {
			if($_REQUEST['frm']=="adv"){
				if($_SERVER['HTTP_REFERER']!="" && $_SESSION['adv_frm']!=""){
					$adv_frm = 1;	
				}
			}
		}

		if($_REQUEST['frm']=="adv"){
			if(empty($_SERVER['HTTP_REFERER'])){
				unset($_SESSION['adv_frm']);
				$adv_frm = '';
			}
		}
		
		if ($adv_frm == 1) {
			global $wpdb;
			$sbpn = $_POST['sbpn'];
			$p_type = $_POST['p_type'];
			$p_list_type = $_POST['p_list_type'];
			$p_location = $_POST['p_location'];
			$p_bedrooms = $_POST['p_bedrooms'];
			$p_bathrooms = $_POST['p_bathrooms'];
			$p_furnishing = $_POST['p_furnishing'];
			$p_state = $_POST['p_state'];
			$p_tenure = $_POST['p_tenure'];
			$p_minsize = $_POST['p_minsize'];
			$p_maxsize = $_POST['p_maxsize'];
			$p_minprice = $_POST['p_minprice'];
			$p_maxprice = $_POST['p_maxprice'];
			$p_psf_minprice = $_POST['p_psf_minprice'];
			$p_psf_maxprice = $_POST['p_psf_maxprice'];
			$p_constructed_min = $_POST['p_constructed_min'];
			$p_constructed_max = $_POST['p_constructed_max'];
			
			if($_POST){
				$_SESSION['adv_frm'] = $_POST;
			}

			if($_REQUEST['frm']=="adv"){

				if($_SERVER['HTTP_REFERER']!=""){

					if($_SESSION['adv_frm']){

						$sbpn = $_SESSION['adv_frm']['sbpn'];
						$p_type = $_SESSION['adv_frm']['p_type'];
						$p_list_type = $_SESSION['adv_frm']['p_list_type'];
						$p_location = $_SESSION['adv_frm']['p_location'];
						$p_bedrooms = $_SESSION['adv_frm']['p_bedrooms'];
						$p_bathrooms = $_SESSION['adv_frm']['p_bathrooms'];
						$p_furnishing = $_SESSION['adv_frm']['p_furnishing'];
						$p_state = $_SESSION['adv_frm']['p_state'];
						$p_tenure = $_SESSION['adv_frm']['p_tenure'];
						$p_minsize = $_SESSION['adv_frm']['p_minsize'];
						$p_maxsize = $_SESSION['adv_frm']['p_maxsize'];
						$p_minprice = $_SESSION['adv_frm']['p_minprice'];
						$p_maxprice = $_SESSION['adv_frm']['p_maxprice'];
						$p_psf_minprice = $_SESSION['adv_frm']['p_psf_minprice'];
						$p_psf_maxprice = $_SESSION['adv_frm']['p_psf_maxprice'];
						$p_constructed_min = $_SESSION['adv_frm']['p_constructed_min'];
						$p_constructed_max = $_SESSION['adv_frm']['p_constructed_max'];
					}
				}
			}

			if($_REQUEST['state']!=""){
				$adv_frm = 1;
				$p_state = $_REQUEST['state'];
				$p_list_type = '-1';
			}
			
			$search_pricemin = "";
			if ($p_minprice!="") {
				$search_pricemin = $p_minprice;
			} else {
				$search_pricemin = '0';
			}
		
			$search_pricemax = "";
			if ($p_maxprice!="") {
				$search_pricemax = $p_maxprice;
			} else {
				$search_pricemax = '99999999999999';
			}
			
			$search_sizemin = "";
			if ($p_minsize!="") {
				$search_sizemin = $p_minsize;
			} else {
				$search_sizemin = '0';
			}
		
			$search_sizemax = "";
			if ($p_maxsize!="") {
				$search_sizemax = $p_maxsize;
			} else {
				$search_sizemax = '99999999999999';
			}

			$query = "SELECT * FROM ".$wpdb->prefix."posts";
			
			if($et_re_adv_flds != ""){
			if (in_array("p_type", $et_re_adv_flds)) {
				if($p_type != ""){
					$query .= " INNER JOIN ".$wpdb->prefix."postmeta m2 ON ( ".$wpdb->prefix."posts.ID = m2.post_id )";
				}
			}
			if (in_array("p_location", $et_re_adv_flds)) {
				if($p_location != ""){
					$query .= " INNER JOIN ".$wpdb->prefix."postmeta m3 ON ( ".$wpdb->prefix."posts.ID = m3.post_id )";
				}
			}
			if (in_array("p_bedrooms", $et_re_adv_flds)) {
				if($p_bedrooms != ""){
					$query .= " INNER JOIN ".$wpdb->prefix."postmeta m5 ON ( ".$wpdb->prefix."posts.ID = m5.post_id )";
				}
			}
			if (in_array("p_bathrooms", $et_re_adv_flds)) {
				if($p_bathrooms != ""){
					$query .= " INNER JOIN ".$wpdb->prefix."postmeta m10 ON ( ".$wpdb->prefix."posts.ID = m10.post_id )";
				}
			}
			if (in_array("p_furnishing", $et_re_adv_flds)) {
				if($p_furnishing != ""){
					$query .= " INNER JOIN ".$wpdb->prefix."postmeta m14 ON ( ".$wpdb->prefix."posts.ID = m14.post_id )";
				}
			}
			if (in_array("p_state", $et_re_adv_flds)) {
				if($p_state != ""){
					$query .= " INNER JOIN ".$wpdb->prefix."postmeta m15 ON ( ".$wpdb->prefix."posts.ID = m15.post_id )";
				}
			}
			if (in_array("p_list_type", $et_re_adv_flds)) {
				if($p_list_type != "-1"){
					$query .= " INNER JOIN ".$wpdb->prefix."postmeta m13 ON ( ".$wpdb->prefix."posts.ID = m13.post_id )";
				}
			}
			if (in_array("p_tenure", $et_re_adv_flds)) {
				if($p_tenure != ""){
					$query .= " INNER JOIN ".$wpdb->prefix."postmeta m11 ON ( ".$wpdb->prefix."posts.ID = m11.post_id )";
				}
			}
			if (in_array("p_size", $et_re_adv_flds)) {
				if($search_sizemin != "" || $search_sizemax != ""){
					$query .= " INNER JOIN ".$wpdb->prefix."postmeta m8 ON ( ".$wpdb->prefix."posts.ID = m8.post_id )";
				}
			}
			if (in_array("p_price", $et_re_adv_flds)) {
				if($search_pricemin != "" || $search_pricemax != ""){
					$query .= " INNER JOIN ".$wpdb->prefix."postmeta m9 ON ( ".$wpdb->prefix."posts.ID = m9.post_id )";
				}
			}
			}
			
			$qry_property_name = "SELECT * FROM ".$wpdb->prefix."posts INNER JOIN ".$wpdb->prefix."postmeta m12 ON ( ".$wpdb->prefix."posts.ID = m12.post_id )  WHERE ".$wpdb->prefix."posts.post_status = 'publish' AND post_type = 'property' AND ( m12.meta_key = 'et_er_property_name' AND m12.meta_value LIKE '%".$sbpn."%' )";
			$chk_property_name = $wpdb->get_results($qry_property_name);
			if(!empty($chk_property_name)){
				$query .= " INNER JOIN ".$wpdb->prefix."postmeta m12 ON ( ".$wpdb->prefix."posts.ID = m12.post_id )";
			} elseif(empty($chk_property_name)){
				$qry_development_name = "SELECT * FROM ".$wpdb->prefix."posts INNER JOIN ".$wpdb->prefix."postmeta m6 ON ( ".$wpdb->prefix."posts.ID = m6.post_id )  WHERE ".$wpdb->prefix."posts.post_status = 'publish' AND post_type = 'property' AND ( m6.meta_key = 'et_er_address' AND m6.meta_value LIKE '%".$sbpn."%' )";
				$chk_development_name = $wpdb->get_results($qry_development_name);
				if(!empty($chk_development_name)){
					$query .= " INNER JOIN ".$wpdb->prefix."postmeta m6 ON ( ".$wpdb->prefix."posts.ID = m6.post_id )";
				}
			} elseif(empty($chk_development_name)){
				$qry_postal_code = "SELECT * FROM ".$wpdb->prefix."posts INNER JOIN ".$wpdb->prefix."postmeta m7 ON ( ".$wpdb->prefix."posts.ID = m7.post_id )  WHERE ".$wpdb->prefix."posts.post_status = 'publish' AND post_type = 'property' AND ( m7.meta_key = 'et_er_zipcode' AND m7.meta_value LIKE '%".$sbpn."%' )";
				$chk_postal_code = $wpdb->get_results($qry_postal_code);
				if(!empty($chk_postal_code)){
					$query .= " INNER JOIN ".$wpdb->prefix."postmeta m7 ON ( ".$wpdb->prefix."posts.ID = m7.post_id )";
				}
			}
			
			$query .= " WHERE ".$wpdb->prefix."posts.post_status = 'publish' AND post_type = 'property'";
			if($et_re_adv_flds != ""){
			if (in_array("p_type", $et_re_adv_flds)) {
				if($p_type != ""){
					$query .= " AND ( m2.meta_key = 'et_er_type' AND m2.meta_value = '".$p_type."' )";
				}
			}
			if (in_array("p_location", $et_re_adv_flds)) {
				if($p_location != ""){
					$query .= " AND ( m3.meta_key = 'et_er_area_location' AND m3.meta_value = '".$p_location."' )";
				}
			}
			if (in_array("p_bedrooms", $et_re_adv_flds)) {
				if($p_bedrooms != ""){
					$query .= " AND ( m5.meta_key = 'et_er_bedroom' AND m5.meta_value = '".$p_bedrooms."' )";
				}
			}
			if (in_array("p_bathrooms", $et_re_adv_flds)) {
				if($p_bathrooms != ""){
					$query .= " AND ( m10.meta_key = 'et_er_bathroom' AND m10.meta_value = '".$p_bathrooms."' )";
				}
			}
			if (in_array("p_furnishing", $et_re_adv_flds)) {
				if($p_furnishing != ""){
					$query .= " AND ( m14.meta_key = 'et_er_furnishing' AND m14.meta_value = '".$p_furnishing."' )";
				}
			}
			if (in_array("p_state", $et_re_adv_flds)) {
				if($p_state != ""){
					$query .= " AND ( m15.meta_key = 'et_er_state' AND m15.meta_value = '".$p_state."')";
				}
			}
			if (in_array("p_list_type", $et_re_adv_flds)) {
				if($p_list_type != "-1"){
					$query .= " AND ( m13.meta_key = 'et_er_adtype' AND m13.meta_value = '".$p_list_type."' )";
				}
			}
			if (in_array("p_tenure", $et_re_adv_flds)) {
				if($p_tenure != ""){
					$query .= " AND ( m11.meta_key = 'et_er_tenure' AND m11.meta_value = '".$p_tenure."' )";
				}
			}
			if (in_array("p_size", $et_re_adv_flds)) {
				if($search_sizemin != "" || $search_sizemax != ""){
					$query .= " AND ( m8.meta_key = 'et_er_built_size' AND convert(m8.meta_value, signed) BETWEEN '".$search_sizemin."' AND '".$search_sizemax."' )";
				}
			}
			if (in_array("p_price", $et_re_adv_flds)) {
				if($search_pricemin != "" || $search_pricemax != ""){
					$query .= " AND ( m9.meta_key = 'et_er_price' AND convert(m9.meta_value, signed) BETWEEN '".$search_pricemin."' AND '".$search_pricemax."' )";
				}
			}
			}
			if(!empty($chk_property_name)){
				$query .= " AND (m12.meta_key = 'et_er_property_name' AND m12.meta_value LIKE '%".$sbpn."%')";
			} elseif(!empty($chk_development_name)){
				$query .= " AND (m6.meta_key = 'et_er_address' AND m6.meta_value LIKE '%".$sbpn."%')";
			} elseif(!empty($chk_postal_code)){
				$query .= " AND (m7.meta_key = 'et_er_zipcode' AND m7.meta_value LIKE '%".$sbpn."%')";
			} else {
				if($sbpn != '')
				{
				$sbpn = trim($sbpn);
					if($query!=""){
						$qry_sbpn = "SELECT * FROM ".$wpdb->prefix."posts WHERE ".$wpdb->prefix."posts.post_status = 'publish' AND post_type = 'property' AND post_title Like '%".$sbpn."%'";
						$chk_sbpn = $wpdb->get_results($qry_sbpn);
						if(!empty($chk_sbpn)){
							$query .= " AND post_title Like '%".$sbpn."%'";
						}
					} else {
						$query .= "SELECT * FROM ".$wpdb->prefix."posts WHERE ".$wpdb->prefix."posts.post_status = 'publish' AND post_type = 'property' AND post_title Like '%".$sbpn."%'";
					}
				}
			}
			
			$query .= " ORDER BY ".$wpdb->prefix."posts.post_date DESC";
			$countsqlQuery = $wpdb->get_results($query);
			if(get_query_var('paged') > 1){
				$limit = get_query_var('paged') ? (get_query_var('paged') * 1) : 0;
				$query .= " LIMIT ".($limit - 1).", ".$et_re_pp_listing."";
			} else {
				$query .= " LIMIT ".$et_re_pp_listing."";
			}
			//echo $query;
			$sqlQuery = $wpdb->get_results($query);

			foreach($sqlQuery as $propertyQuery){
				$pro_ad_type2 = get_post_meta($propertyQuery->ID, 'et_er_adtype', true);
			?>

			<!-- Property item -->
			<div class="Propertylstview">
				<div class="prlimage">

					<?php $property_imgs = get_property_images_ids(true, $propertyQuery->ID);
					if ($property_imgs) {?>
					<a href="<?php echo get_permalink($propertyQuery->ID); ?>" title="<?php echo $propertyQuery->post_title; ?>"> <?php echo wp_get_attachment_image($property_imgs['property_image1'], 'thumbnail'); ?></a> 
					<?php } else { ?>
					<img src="<?php echo ET_RE_URL; ?>/images/no_property_image.png"  />
					<?php } ?>

				</div>
				
				<div class="prlinfo">
					<h2><a href="<?php echo get_permalink($propertyQuery->ID); ?>">
					<?php echo $propertyQuery->post_title; ?>
					</a></h2>
					<h3><?php if ($pro_ad_type2 == 'Rent' ) { ?>
					<?php _e( 'For Rent', 'wp-realestate' ); ?> : <?php echo ET_RE_Currency.get_post_meta($propertyQuery->ID, 'et_er_rent_price', true).' '.get_post_meta(get_the_ID(), 'et_er_rent_tenure', true); ?>
					<?php } else {  ?>
					<?php _e( 'For Sale', 'wp-realestate' ); ?> : <?php echo ET_RE_Currency.get_post_meta($propertyQuery->ID, 'et_er_price', true); ?><br>
					<?php } ?></h3>
					<ul>
					<?php if (get_post_meta($propertyQuery->ID, 'et_er_built_size', true) <> '0') { ?>
					<li><?php _e( 'Built Up', 'wp-realestate' ); ?>: <?php echo get_post_meta($propertyQuery->ID, 'et_er_built_size', true); ?></li>
					<?php } ?>
					<?php if (get_post_meta($propertyQuery->ID, 'et_er_bedroom', true) <> '0') { ?>
					<li class="prlinfobed"><?php _e( 'Bedrooms', 'wp-realestate' ); ?>: <?php echo get_post_meta($propertyQuery->ID, 'et_er_bedroom', true); ?></li>
					<?php }
					if (get_post_meta($propertyQuery->ID, 'et_er_bathroom', true) <> '0') { ?>
					<li class="prlinfobath"><?php _e( 'Bathrooms', 'wp-realestate' ); ?>: <?php echo get_post_meta($propertyQuery->ID, 'et_er_bathroom', true); ?></li>
					<?php } ?>

					</ul>
					<div style="clear:both"></div>
					<a href="<?php echo get_permalink($propertyQuery->ID); ?>" class="prlviewbtn"><?php _e( 'View Details', 'wp-realestate' ); ?></a>
				</div>

				<br style="clear:both;">

			</div>
  <?php
  } 
  ?>
  <div style="clear:both"></div>
  <?php
  $big = 999999999; // need an unlikely integer
	echo paginate_links(array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => ceil( count($countsqlQuery) / $et_re_pp_listing )
	));
} else {
	
// THIS MEANS IT IS COMING FROM A GET REQUEST OR JUST HITTING THE URL


// Aneudy starts here
// $city = isset($_GET['city']) ? $_GET['city'] : null;
$args_property = array(
	'post_type'=> 'property',
	// 'posts_per_page' => $et_re_pp_listing,
	'paged' => get_query_var('paged'),
	's' => $_POST['sbpn']
);

?>


<?php 
	
	$posts = get_posts($args_property);
	$amountOfPosts = count($posts);
?>
	<div class="mini-meta-header">
		<span class="number-results">
			<?php echo $amountOfPosts; ?> Rentals Found
		</span>
	</div>
<?php
	

	class PostsByCity {
		public $postByCities = array();	
		
		function sortPost($post){
			$listingCity = strtolower(get_post_meta($post->ID, 'et_er_city', true));
			// check if the city already exists		
			
			if (!$this->postByCities[$listingCity]) {
				
				$this->postByCities[$listingCity] = array();
			}

			array_push($this->postByCities[$listingCity], $post);
		}
	}
	
	$postSorter = new PostsByCity();

	foreach ($posts as $post) {
		$postSorter->sortPost($post);
	}

	// print_r(['brooklyn']);
	
?>

<div id="search-results-box" style="min-height: 600px;">
<?php

function formImgStyle($imgs, $whichOne){
	$styleString = '';
	if ($imgs) {
		$id = $imgs['property_image' . $whichOne];
		$url = wp_get_attachment_image_src($id, 'medium')[0];
		$styleString = 'background-image: url(' . $url .')';		
	}	
	return $styleString;
}

if ( count($postSorter->postByCities) > 0 ) {
foreach ($postSorter->postByCities as $city => $posts) {
?>
	
	<div class="region" data-region="<?php echo $city; ?>">
		<!-- div.region-header -->
		<div class="region-header">
			<h2><?php echo $city; ?></h2>
		</div>
		<!-- div.region-header -->

<?php
	foreach ($posts as $post) {
		setup_postdata( $post );

		$pro_ad_type = get_post_meta(get_the_ID(), 'et_er_adtype', true);
		$listing_city = get_post_meta(get_the_ID(), 'et_er_city', true);
		$detailURL = '/terrerohomes/property/?p_id='. get_the_ID();
		$noImgUrl = ET_RE_URL . '/images/no-image.jpg';
?>

		<!-- LISTING TEMPLATE -->		
		  <div class="search-listing" listing_id="<?php get_the_ID() ?>" onmouseover="" latitude="42.3286" longitude="-71.0637">
		    <table>
		      <tbody>
		        <tr>


							<!--********* listing images here **********-->
							<?php
															
								$property_imgs = get_property_images_ids();
								$imgClass = 'img';
								
								if (!$property_imgs) {
									$imgClass .= ' no-image';
								}

							?>

							<a href="<?php echo $detailURL ?>" title="<?php the_title(); ?>">
								<?php 
									for ($i=1; $i <= 2; $i++) { ?>

										<td class="img-cont">
											<div
												class="<?php echo $imgClass; ?>"
												style="<?php echo formImgStyle($property_imgs, $i); ?>">
											</div>
										</td>
								<?php
									}
								?>
							</a>
		          <!--********** listing images here **************-->



		          <!--********** here it is where the meta info leaves **********-->
		            <td style="padding-left: 20px; vertical-align: top; width: 360px;">
		              
		              <!-- Listing Title -->
		                <div class="font-size-100 bold" style="padding-bottom: 1px; margin-top: -2px;">
		                  <!-- title anchor -->
		                  <a 
		                    class="listing-title-link"
		                    style=""
		                    href="<?php echo $detailURL ?>"
		                    title="<?php echo the_title(); ?>"
		                  >
		                    <!-- title name -->
		                    <?php echo the_title(); ?>
		                  </a>
		                </div>
		              <!-- Listing Title -->

		              <!-- Listing city -->
		                <div class="font-size-80" style="width: 330px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
		                  <?php echo $listing_city; ?>
		                </div>
		              <!-- Listing city -->

		              <!-- Listing subsection -->
		                <div style="padding-top: 11px; padding-bottom: 11px;">
		                  <table>
		                    <tbody>
		                      <!-- single row -->
		                        <tr>

		                          <!-- Price Col -->
		                          <td style="width: 75px; border-right: 1px solid #eeeeee;">
		                            <div class="bold color-fg-green font-size-100" style="padding-bottom: 0px;">
		                              <?php echo ET_RE_Currency.get_post_meta(get_the_ID(), 'et_er_rent_price', true) ?>
		                            </div>
		                            <div class="font-size-80" style="color: #666666;">
		                              Per Month
		                            </div>
		                          </td>
		                          <!-- Price Col -->

		                          <!-- Unknown Col -->
		                          <td style="width: 75px; padding-left: 15px; border-right: 1px solid #eeeeee;">
		                            <div fs="100" qs="93" ms="62" rs="100" class="color-fg-blue bold font-size-100" style="padding-bottom: 0px; position: relative; cursor: pointer;">
		                              optional
		                            </div>
		                            <div class="font-size-80" style="color: #666666;">
		                              Column
		                            </div>
		                          </td>
		                          <!-- Unknown Col -->

		                          <!-- Posted Date -->
		                          <td style="padding-left: 15px; vertical-align: bottom;">
		                            <div class="bold font-size-100" style="">
		                              <?php the_time('F jS, Y') ?>
		                              <!-- <span class="font-size-80">mins ago</span> -->
		                            </div>
		                            <div>
		                              <div class="font-size-80" style="color: #666666;">
		                                Posted on
		                              </div>
		                              <!-- More units at
		                              <br><a class="color-fg-blue" href="/boston/building/871-beacon-street-boston-massachusetts-02215">871 Beacon Street</a> -->
		                            </div>
		                          </td>
		                          <!-- Posted Date -->
		                        </tr>
		                      <!-- single row -->
		                    </tbody>
		                  </table>
		                </div>
		              <!-- Listing subsection -->

		              <div class="font-size-90 bold view-details-button" style="margin-right: 10px; text-align: center; width: 155px; padding-top: 8px; padding-bottom: 8px; cursor: pointer; margin-top: 2px; display: inline-block;">
		                <a href="<?php echo $detailURL ?>">View Details</a>
		              </div>

		            </td>
		          <!--********** here it is where the meta info leaves **********-->

		        </tr>
		      </tbody>
		    </table>
		  </div>
		<!-- LISTING TEMPLATE -->

	<?php } ?>
	<!-- closing div to div.region -->
	</div>	  
<?php } ?>

</div>


<div id="sticky-right" style="">
  <div id="sticky-map" style="width: 300px; z-index: 2; padding-top: 4px;">
    <div id="map" style="width: 298px; height: 298px; border: 1px solid rgb(170, 170, 170); position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);">
      
    </div>

    <div style="margin-top: 10px; margin-bottom: -5px;" class="font-size-85">
      <div style="display: inline-block">
        <a class="color-fg-blue" style="text-decoration: none;" href="/states"><span class="color-fg-blue">States</span></a> &nbsp;»&nbsp;
      </div>
      <div style="display: inline-block" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a itemprop="url" class="color-fg-blue" style="text-decoration: none;" href="/states/massachusetts-apartments"><span class="color-fg-blue" itemprop="title">MA</span></a> &nbsp;»&nbsp;
      </div>
      <div style="display: inline-block" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" itemprop="child">
        <a itemprop="url" class="color-fg-blue" style="text-decoration: none;" href="/cities/boston-ma"><span class="color-fg-blue" itemprop="title">Boston, MA</span></a>
      </div>
    </div>


    <div style="margin-top: 35px; border: 1px solid #bbbbbb; padding: 20px 22px 22px 22px;">
      
    </div>

    <div style="margin-top: 35px; border: 1px solid #bbbbbb; padding: 20px 22px 22px 22px;" class="font-size-85">
      
    </div>

  </div>
</div>



<!-- pagination -->
<div style="clear:both"></div>
<?php
$big = 999999999; // need an unlikely integer
echo paginate_links(array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
));
wp_reset_query();
?>
  <?php 
} else {
_e( 'no results', 'wp-realestate' );
}}
 ?>
</div>
<?php 
if ($p_detail_sidebar == 1) {
get_sidebar();
} ?>
<?php get_footer(); ?>
