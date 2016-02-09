<?php
get_header();

// $p_detail_sidebar = get_option('p_detail_sidebar');

// global $post;


$post = get_post($_GET['p_id']);

setup_postdata( $post );

?>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "72af30ed-8290-4178-b5d1-3fdb0b5c43a3", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script type="text/javascript">
jQuery(window).load(function() {
	jQuery('#inq_form').submit(function(){
		if(jQuery('#inq_name').val()==""){
			alert('<?php _e( 'Please enter your name', 'wp-realestate' ); ?>');
			jQuery('#inq_name').focus();
			return false;
		}
		if(jQuery('#inq_email').val()==""){
			alert('<?php _e( 'Please enter your email', 'wp-realestate' ); ?>');
			jQuery('#inq_email').focus();
			return false;
		} else {
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var emailaddressVal = jQuery('#inq_email').val();
			if(!emailReg.test(emailaddressVal)) {
				alert("<?php _e( 'Invalid Email', 'wp-realestate' ); ?>");
				jQuery('#inq_email').focus();
				return false;
			}	
		}
		if(jQuery('#inq_phone').val()==""){
			alert('<?php _e( 'Please enter your phone number', 'wp-realestate' ); ?>');
			jQuery('#inq_phone').focus();
			return false;
		}
		if(jQuery('#inq_message').val()==""){
			alert('<?php _e( 'Please enter your message', 'wp-realestate' ); ?>');
			jQuery('#inq_message').focus();
			return false;
		}
		return true;
	});
	

});
</script>

<!-- new detail page. terrero homes -->

<div id="content" class="site-content listing-detail" role="main">
	
	<!-- slide show and quick details section -->
  <section class="">
		<?php get_sidebar('detail-upper-container'); ?>
  </section>
  <!-- slide show and quick details section -->
	
	
	<!-- Details section -->
	<section>	
		<?php get_sidebar('detail-meta'); ?>
	</section>
	<!-- Details Section -->

  
  <!-- description section -->
  <section>
  	<?php get_sidebar('detail-description'); ?>
  </section>  
	<!-- description section -->

	
	<!-- features and amenities  section -->
	<section>
		<?php get_sidebar('detail-amenities'); ?>
	</section>
	<!-- features and amenities  section -->
	
	
	<!-- map section -->
	<section>
		<?php get_sidebar('detail-map'); ?>
		
	</section>
	<!-- map section -->

</div>

<div class="contact-agent-form">

	<?php  get_sidebar('contact-agent-form'); ?>

</div>
<?php 

// Reset Query
wp_reset_query();

get_footer(); ?>