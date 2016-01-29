<header id="masthead" class="site-header grid-c" role="banner">

  <hgroup class="dark-section">
    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
  </hgroup>

  <nav style="display:none;" id="site-navigation" class="main-navigation" role="navigation">
    <button class="menu-toggle">
      <?php _e( 'Menu', 'twentytwelve' ); ?>
    </button>
    <a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>">
      <?php _e( 'Skip to content', 'twentytwelve' ); ?>
    </a>
    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
  </nav>
  <!-- #site-navigation -->


  <div class="full-size-menu">

    <div id="test-nav" class="container">
      <div class="row-">
        <nav role="navigation">
          <span class="entypo-menu" id="toggle-menu"></span>
          <!-- <a href="http://localhost:8888/terrerohomes">
						<div class="logo">
							<span class="entypo-compass"></span>
							Terrero Homes
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div>
		      </a> -->

          <ul>
            <li><a href="http://localhost:8888/terrerohomes/contact-us">Contact us</a></li>
            <li><a href="http://localhost:8888/terrerohomes/our-agents">Our Agents</a></li>
            <li><a href="http://localhost:8888/terrerohomes/about-us">About Us</a></li>
            <li class="has-child"><a href="http://localhost:8888/terrerohomes/listings">Listings</a>
              <!--  <ul class="dropdown">
		            <li><a href="http://localhost:8888/terrerohomes/listings?city=bronx">Bronx</a></li>
		            <li><a href="http://localhost:8888/terrerohomes/listings?city=manhattan">Manhattan</a></li>
		            <li><a href="http://localhost:8888/terrerohomes/listings?city=queens">Queens</a></li>
		            <li><a href="http://localhost:8888/terrerohomes/listings?city=brooklyn">Brooklyn</a></li>
		          </ul> -->
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
              rel="home">Home</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>


  <!-- <div class="feat-img-cont">
		<img
			class="skyline-img size-medium wp-image-24"
			src="/terrerohomes/wp-content/uploads/2015/10/skyline-night.jpg"
			alt="nyc-skyline"
			width="100%"
		/>
	</div> -->
</header>
<!-- #masthead -->
