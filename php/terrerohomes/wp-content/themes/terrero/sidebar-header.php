<header id="masthead" class="site-header grid-c" role="banner">

  <hgroup class="dark-section">
    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
  </hgroup>
  
  <div class="container">
    <?php get_sidebar('nav-menu') ?>
  </div> 


  <!-- template navigation here -->

  <nav style="display:none;" id="site-navigation" class="main-navigation" role="navigation">
    <button class="menu-toggle">
      <?php _e( 'Menu', 'twentytwelve' ); ?>
    </button>
    <a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>">
      <?php _e( 'Skip to content', 'twentytwelve' ); ?>
    </a>
    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
  </nav>

  <!-- template navigation here -->

</header>

<?php 

  function getTerreoListings($featured = false, $popular = false, $amount = null){
    $args_property = array(
      'post_type'=> 'property'
      
      // 'paged' => get_query_var('paged'),
      // 's' => $_POST['sbpn']
    );

    if ($amount) {
      $args_property['posts_per_page'] = $amount;
    }

    if ($featured) {
      $args_property['posts_per_page'] = 1;
    }  

    return get_posts($args_property);

  }

  // mimicate _.map or JS native map
  function terrero_map($arr, $predicate){
    $mapList = array();
    
    foreach ($arr as $item) {
      if ($predicate($item)){
        array_push($mapList, $item);
      }
    }

    return $mapList;
  }

  // get the meta featured state
  function featuredState($id){
    return getMetaData('et_er_featured', $id);
  }

  // filter listing by featured flag
  function getFeaturedItems($listings = array()) {    

    $filterFeatured = function($listing){
      $state = featuredState($listing->ID);
      echo $state;
      return $state == 'on';
    };

    $featuredItems = terrero_map($listings, $filterFeatured);

    return $featuredItems;
  } 

  // add a fallback for when there is not featured items
  function getTreatedFeaturedListing() {    
    $listings = getTerreoListings();    
    $featuredItems = getFeaturedItems($listings);
    $featuredItem = array();


    if (count($featuredItems) == 0) {

      array_push($featuredItem, $listings[0]);
      
    } else {

      array_push($featuredItem, $featuredItems[0]);
      
    }

    return $featuredItem;
  }

  class ImageObj {
    function ImageObj($data) {
      $this->data = $data;
    }

    public function getData() {
      return $this->data;
    }
  }

  $defaultUrl =  ET_RE_URL . '/images/no_property_image.png';

  function getIMGUrl($imgId) {
    return wp_get_attachment_image_src($imgId, 'medium')[0];
  }

  function getMetaData($prop, $ID = null){
    $id = $ID ? $ID : get_the_ID();

    return get_post_meta($id, $prop, true);
  }

?>