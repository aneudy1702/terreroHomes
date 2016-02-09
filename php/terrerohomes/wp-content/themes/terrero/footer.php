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
	<!-- <footer id="colophon" role="contentinfo">

		
		<div class="site-info">			
			<a href="http://aneudyabreu.com" title="aneudybreu.com">Developed by aneudyabreu.com from Web Solutions</a>
		</div><!.site-info -->
	<!--</footer><! #colophon -->
</div><!-- #page -->

<footer>
  <div class="dark-section">
    <div class="inner-container">


      <div class="f_right">
        <div
        	class="font-size-90 bold">TerreroHomes.com</div>
        <div class="font-size-85" style="">
          Specializing in
          <br>Residential & Commercial Listings
        </div>
      </div>


      <table>
        <tbody>
          <tr>
            <td style="vertical-align: top;">
              <div style="padding-bottom: 8px; color: #ffffff;" class="bold font-size-90">
                Company
              </div>
              <div style="color: #ffffff;" class="font-size-85">
                <div>
                  <a style="text-decoration: none; color: #dddddd;" href="/about">About</a>
                </div>
                <div style="padding-top: 4px;">
                  <a style="text-decoration: none; color: #dddddd;" href="http://www.renthop.com/blog">Blog</a>
                </div>
              </div>
            </td>
            <td style="vertical-align: top; padding-left: 60px;">
              <div style="padding-bottom: 8px; color: #ffffff;" class="bold font-size-90">
                Jobs
              </div>
              <div style="color: #ffffff;" class="font-size-85">
                <div>
                  <a style="text-decoration: none; color: #dddddd;" href="/jobs">We're Hiring!</a>
                </div>
              </div>
            </td>
            <td style="vertical-align: top; padding-left: 60px;">
              <div style="padding-bottom: 8px; color: #ffffff;" class="bold font-size-90">
                Discover
              </div>
              <div style="color: #ffffff;" class="font-size-85">
                <div>
                  <a style="text-decoration: none; color: #dddddd;" href="/cities/new-york-city-ny">NYC Popular Areas</a>
                </div>
                <div style="padding-top: 4px;">
                  <a style="text-decoration: none; color: #dddddd;" href="/nyc/buildings">NYC Rental Buildings</a>
                </div>
                <div style="padding-top: 4px;">
                  <a style="text-decoration: none; color: #dddddd;" href="/rental-stats-and-trends">Stats and Trends</a>
                </div>
              </div>
            </td>
            <td style="vertical-align: top; padding-left: 60px;">
              <div style="padding-bottom: 8px; color: #ffffff;" class="bold font-size-90">
                Legal
              </div>
              <div style="color: #ffffff;" class="font-size-85">
                <div>
                  <a style="text-decoration: none; color: #dddddd;" href="/faq">FAQ</a>
                </div>
                <div style="padding-top: 4px;">
                  <a style="text-decoration: none; color: #dddddd;" href="/terms">Terms</a>
                </div>
              </div>
            </td>
            <td style="vertical-align: top; padding-left: 60px;">
              <div style="padding-bottom: 8px; color: #ffffff;" class="bold font-size-90">
                Connect
              </div>
              <div style="color: #ffffff;" class="font-size-85">
                <div style="padding-top: 0px;">
                  <a style="text-decoration: none; color: #dddddd;" href="https://plus.google.com/+RentHop"
                  rel="publisher">Google+</a>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <div style="clear: both;"></div>
    </div>
  </div>
</footer>



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
		// this.init();
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
		// console.log(this.currentPosition, this.slideShowLength, this.viewerWidth);
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