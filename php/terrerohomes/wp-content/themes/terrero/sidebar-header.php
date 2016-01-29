<header id="masthead" class="site-header grid-c" role="banner">

  <hgroup class="dark-section">
    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
  </hgroup>
  
  <div class="container">
    <nav role="navigation">
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">Contact us</a></li>
          <li><a href="<?php echo esc_url( home_url( '/our-agents' ) ); ?>">Our Agents</a></li>
          <li><a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>">About Us</a></li>
          <li><a href="<?php echo esc_url( home_url( '/listings' ) ); ?>">Listings</a></li>
          <li>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
            rel="home">Home</a>
          </li>
        </ul>
      </nav>
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
