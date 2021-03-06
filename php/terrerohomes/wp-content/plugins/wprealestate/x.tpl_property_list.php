<?php get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$catproperty = $_REQUEST['cid'];
$pro_search = $_REQUEST['key'];
$p_list_sidebar = get_option('p_list_sidebar');
$et_re_adv_flds = get_option('et_re_adv_flds');
$p_pro_id_display = get_option('p_pro_id_display');
?>
<div id="PropertyMainDiv" <?php if ($p_list_sidebar == 1) { ?> style="width:612px;" <?php } ?>>
<h1><?php _e( 'Property Listing', 'wp-realestate' ); ?> <?php if ($catproperty) { echo '- '.$catproperty; } ?></h1>
<div class="SpacerDiv"></div>
<div class="SpacerDiv"></div>
<?php
if (get_option('et_re_pp_listing') == '') {
	$et_re_pp_listing = '10';
} else {	
	$et_re_pp_listing = get_option('et_re_pp_listing');
}

$adv_frm = $_REQUEST['adv_frm'];


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
	$sqlQuery = $wpdb->get_results($query);

	foreach($sqlQuery as $propertyQuery){
		$pro_ad_type2 = get_post_meta($propertyQuery->ID, 'et_er_adtype', true);
	?>
		<div id="PropertyQuickView">
		  <div class="QVImage">
		  <?php $property_imgs = get_property_images_ids(true,$propertyQuery->ID);?>
		  <a href="<?php echo get_permalink($propertyQuery->ID); ?>" title="<?php echo $propertyQuery->post_title; ?>"> <?php echo wp_get_attachment_image($property_imgs['property_image1'], 'thumbnail'); ?></a>
		</div>
		<div class="QVProInfo">
		<h2><a href="<?php echo get_permalink($propertyQuery->ID); ?>"><?php echo $propertyQuery->post_title; ?></a></h2>
		      <?php 
			  if ($p_pro_id_display == 1) { ?>
		      <?php _e( 'Property ID', 'wp-realestate' ); ?>: <?php echo $propertyQuery->ID; ?><br>
		      <?php } ?>
		      <?php if (get_post_meta($propertyQuery->ID, 'et_er_built_size', true) <> '0') { ?>
		      <?php _e( 'Built Up', 'wp-realestate' ); ?>: <?php echo get_post_meta($propertyQuery->ID, 'et_er_built_size', true); ?><br>
		      <?php }
			  if (get_post_meta($propertyQuery->ID, 'et_er_rent_price', true) <> '0') { ?>
		      <?php _e( 'For Rent', 'wp-realestate' ); ?> : <?php echo ET_RE_Currency.get_post_meta($propertyQuery->ID, 'et_er_rent_price', true).' '.get_post_meta($propertyQuery->ID, 'et_er_rent_tenure', true); ?><br>
		      <?php } ?>
			  <?php if (get_post_meta($propertyQuery->ID, 'et_er_price', true) || get_post_meta(get_the_ID(), 'et_er_price', true) <> '0') { ?>
		      <?php _e( 'For Sale', 'wp-realestate' ); ?> : <?php echo ET_RE_Currency.get_post_meta($propertyQuery->ID, 'et_er_price', true); ?><br>
		      <?php } ?>
		      <?php if (get_post_meta($propertyQuery->ID, 'et_er_bedroom', true) || get_post_meta(get_the_ID(), 'et_er_bedroom', true) <> '0') {?>
		      <?php _e( 'Bedrooms', 'wp-realestate' ); ?>: <?php echo get_post_meta($propertyQuery->ID, 'et_er_bedroom', true); ?><br>
		      <?php }
			  if (get_post_meta($propertyQuery->ID, 'et_er_bathroom', true) || get_post_meta(get_the_ID(), 'et_er_bathroom', true) <> '0') {?>
		      <?php _e( 'Bathrooms', 'wp-realestate' ); ?>: <?php echo get_post_meta($propertyQuery->ID, 'et_er_bathroom', true); ?><br>
		      <?php } ?>
		      <div style="float:left; width:100px; bottom:0px;"><a href="<?php echo get_permalink($propertyQuery->ID); ?>"><img src="<?php echo ET_RE_URL; ?>/images/view_details_button.png" /></a></div>
		  </div>
		<br style="clear:both;" />
		<div class="SpacerDiv"></div>
		</div>
		<?php } 
} else {
	$args_property = array(
		'post_type'=> 'property',
		'posts_per_page' => $et_re_pp_listing,
		'paged' => get_query_var('paged'),
		's' => $_POST['sbpn']
	);


	query_posts( $args_property );
if ( have_posts() ) {

		while ( have_posts() ) : the_post(); 
		$pro_ad_type = get_post_meta(get_the_ID(), 'et_er_adtype', true);
?>
	
		<div id="PropertyQuickView">

			<div class="QVImage">
				<?php $property_imgs = get_property_images_ids();?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php echo wp_get_attachment_image($property_imgs['property_image1'], 'thumbnail'); ?></a>
			</div>

			<div class="QVProInfo">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>      
				<?php 
				if ($p_pro_id_display == 1) { ?>
				<?php _e( 'Property ID', 'wp-realestate' ); ?>: <?php echo get_the_ID(); ?><br>
				<?php } ?>
				<?php if (get_post_meta(get_the_ID(), 'et_er_built_size', true) <> '0') { ?>
				<?php _e( 'Built Up', 'wp-realestate' ); ?>: <?php echo get_post_meta(get_the_ID(), 'et_er_built_size', true); ?><br>
				<?php } ?>
				<?php _e( 'For', 'wp-realestate' ); ?> <?php echo $pro_ad_type; ?> : <?php echo ET_RE_Currency.get_post_meta(get_the_ID(), 'et_er_price', true); ?><br>
				<?php if (get_post_meta(get_the_ID(), 'et_er_bedroom', true) <> 'Not Applicable') { ?>
				<?php _e( 'Bedrooms', 'wp-realestate' ); ?>: <?php echo get_post_meta(get_the_ID(), 'et_er_bedroom', true); ?><br>
				<?php }
				if (get_post_meta(get_the_ID(), 'et_er_bathroom', true) <> 'Not Applicable') { ?>
				<?php _e( 'Bathrooms', 'wp-realestate' ); ?>: <?php echo get_post_meta(get_the_ID(), 'et_er_bathroom', true); ?><br>
				<?php } ?>
				<div style="float:left; width:100px; bottom:0px;"><a href="<?php the_permalink(); ?>"><img src="<?php echo ET_RE_URL; ?>/images/view_details_button.png" /></a></div>
			</div>

			<br style="clear:both;" />
			<div class="SpacerDiv"></div>
		</div>
	<!-- pagination -->
	<?php 
	endwhile;
	
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
if ($p_list_sidebar == 1) {
// get_sidebar();
} ?>
<?php get_footer(); ?>