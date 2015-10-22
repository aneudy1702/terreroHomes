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
						Quick Links
					</div>
				</li>
				<li>
					<div class="col">
						Contact
					</div>
				</li>
				<li>
					<div class="col">
						Share
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
		this.duration = 250; //quater of a second by defualt
		this.currentPosition = 0;
		this.init();
	};

	TerreroSlideShow.prototype.swipe = function(direction) {
		var $el = this.$el;
		var direction =  {
			left: true
		};
		var slideWidth = $el.find('li').width();		
		
		if (direction.left) {
			this.currentPosition += slideWidth;
			
		} else {
			this.currentPosition -= slideWidth;
		}

		$el.css(getTransform.call(this));

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
				tranformOptions[prefix + 'transform'] = 'translate('+ currentPosition +'px, 0px, 0px)';
			});

			return tranformOptions;
		}
	};
	TerreroSlideShow.prototype.init = function(first_argument) {
		setTimeout(this.swipe.bind(this), 1000);
	};

	var availableSlideShows = {

	}

	$('.terrero-slideshow').each(function(idx, el) {
		availableSlideShows['slide-'+idx] = new TerreroSlideShow($(el).find('.carousel'));
	});
});

		



</script>



<?php wp_footer(); ?>
</body>
</html>