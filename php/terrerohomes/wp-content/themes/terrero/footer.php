<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">

		<section class="bottom-container">
			<ul>
				<li>
					<div class="col">
						<a href="/">
							<div>Home</div>
						</a>
						<a href="/listings">
							<div>Listings</div>
						</a>
						<a href="/contactus">
							<div>Contact us</div>
						</a>
					</div>
				</li>
				<li>
					<div class="col">
						<div>Jose Terrero</div>
						<div>jose@terrerohomes.com</div>
						<div>HERE YOUR ADDRESS</div>
					</div>
				</li>
				<li>
					<div class="col">
						Share
						??
					</div>
				</li>
			</ul>
		</section>
		
		<div class="site-info">			
			<a href="http://aneudyabreu.com" title="aneudybreu.com">Developed by aneudyabreu.com from Web Solutions</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<script type="text/javascript">
var $ = $ || jQuery;
$(function(){
	var w = $(window).width(),
	    toggle 		= $('#toggle-menu'),
	    menu 		= $('nav ul'),
	    hasChild = $('.has-child'),
	    dropdown = $('.dropdown');
	
	$(toggle).on('click', function(e) {
		e.preventDefault();
		menu.toggle();
	});

	$(hasChild).click(function(e) {
		// e.preventDefault();
		dropdown.toggle();
	});	

	$(window).resize(function(){
	  if(w > 320 && menu.is(':hidden')) {
	    menu.removeAttr('style');}
	});

	function TerreroSlideShow($el) {
		this.$el = $el || $('.slide-show');
		this.$carousel = this.$el.find('.carousel');
		this.duration = 250; //quater of a second by defualt
		this.currentPosition = 0;
		this.init();
	};

	// get transform will get hoisted to the top of the function scope
	function getTransform() {
		var prefixes = [
			'',
			'-webkit-',
			'-moz-',
			'-ms-'
		];
		
		var tranformOptions = {};
		var currentPosition = this.currentPosition;
		
		$.each(prefixes, function (i, prefix) {
			tranformOptions[prefix + 'transform'] = 'translate3d('+ currentPosition +'px, 0px, 0px)';
		});

		return tranformOptions;
	}

	TerreroSlideShow.prototype.nextSlide = function() {
		
		var $el = this.$el;				
		this.currentPosition -= this.viewerWidth;		
		
		this.$el.addClass('transition');

		this.swipe();
		
	};

	TerreroSlideShow.prototype.swipe = function() {

		this.$carousel.css(getTransform.call(this));
		
	};

	TerreroSlideShow.prototype.onTransitionEnd = function(evt) {
		console.log(this.currentPosition, this.slideShowLength, this.viewerWidth);
		if (this.currentPosition <= - (this.slideShowLength - this.viewerWidth)) {
			this.currentPosition = 0;
			this.$el.removeClass('transition');
			this.swipe();
		}
		
	};
	
	TerreroSlideShow.prototype.stop = function() {
		clearInterval(this.nowPlaying);
	};

	TerreroSlideShow.prototype.init = function(first_argument) {	
		this.viewerWidth = this.$el.width();
		this.slides = this.$el.find('li');
		this.slideShowLength = this.slides.length * this.viewerWidth;

		this.$carousel.on('transitionend webkitTransitionEnd oTransitionEnd', this.onTransitionEnd.bind(this));

		this.nowPlaying = setInterval(this.nextSlide.bind(this), 3000);
	};

	var availableSlideShows = {

	}

	$('.terrero-slideshow').each(function(idx, el) {
		availableSlideShows['slide-'+idx] = new TerreroSlideShow($(el));		
	});
});

		



</script>



<?php wp_footer(); ?>
</body>
</html>