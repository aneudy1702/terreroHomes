<?php /** * The main template file * * This is the most generic template file in a WordPress theme * and one of the two required files for a theme (the other being style.css). * It is used to display a page when nothing more specific matches a query.
* For example, it puts together the home page when no home.php file exists. * * @link https://codex.wordpress.org/Template_Hierarchy * * @package WordPress * @subpackage Terrero * @since Twenty Twelve 1.0 */ get_header( 'main-page'); ?>
<?php //if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>


<div id="primary" class="site-content home-page">
  <div id="content" role="main">
    <table class="page-layout-holder">
      <tbody>
        <tr>

          <td class="col">            
            <?php get_sidebar('featured-item'); ?>
          </td>
            
          <td class="col sidebar">
            <?php get_sidebar(); ?>
          </td>

        </tr>
      </tbody>
    </table>
    

  </div>
    <!-- #content -->
</div>


<!-- #primary -->
<?php get_footer(); ?>