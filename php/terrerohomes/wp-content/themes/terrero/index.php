<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Terrero
 * @since Twenty Twelve 1.0
 */

	get_header('main-page'); ?>
	<?php //if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>				

	
	<div id="primary" class="site-content home-page grid-c">		
		<div id="content" role="main">			

			<section class="featured-item">
				<div class="hotel-details-view-container">
					<div class="image-slide-show-container">
						<div class="slide-show terrero-slideshow">							
							<div class="carousel">
								<ul>
									<li>
										<img src="http://photos.renthop.com/2/6062434_249b2a352e9fe9227c07701671a2d1ac.jpg" alt="" />
									</li>
									<li>
										<img src="http://photos.renthop.com/2/6062434_249b2a352e9fe9227c07701671a2d1ac.jpg" alt="" />
									</li>
									<li>
										<img src="http://photos.renthop.com/2/6062434_249b2a352e9fe9227c07701671a2d1ac.jpg" alt="" />
									</li>
									<li>
										<img src="http://photos.renthop.com/2/6062434_249b2a352e9fe9227c07701671a2d1ac.jpg" alt="" />
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>			

			<!-- cities -->
			<!-- <section>
				<center>
					<h1>Get Listings by cities</h1>
				</center>
				<div class="cities-container">
					<ul>
						<li class="city-item">
							<a href="">
								<div class="city-content">
									<div>
										<img src="/terrerohomes/wp-content/uploads/2015/10/bronx.jpg">
										<div class="city-name">											
											Bronx											
										</div>
									</div>
								</div>
							</a>							
						</li>
						<li class="city-item">
							<a href="">
								<div class="city-content">
									<div>
										<img src="/terrerohomes/wp-content/uploads/2015/10/nyc-manhattan.jpg">
										<div class="city-name">											
											Manhattan
										</div>
									</div>
								</div>
							</a>							
						</li>
						<li class="city-item">
							<a href="">
								<div class="city-content">
									<div>
										<img src="/terrerohomes/wp-content/uploads/2015/10/queens.jpg">
										<div class="city-name">											
											Queens											
										</div>
									</div>
								</div>
							</a>							
						</li>
					</ul>
				</div>
			</section> -->
			<!-- cities -->
		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?> 
<?php get_footer(); ?>
