<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	
<!-- TODO: create dynamic list of mini lisitings -->

<div class="mini-listing-list">
	<header class="listing-title">
		<span>
			Popular Listings
		</span>
	</header>
	<!-- repeat this item bellow -->
	<div class="mini-listing">
		<table>
	    <tbody>
	      <tr>
	      	<!-- img -->
	        <td class="mini-col">
	          <a href="#" alt="link to listing">
	            <div class="listing-img"></div>
	          </a>
	        </td>

	        <!-- mini description -->
	        <td class="mini-col mini-description">
	          <div class="title">
	            <a alt="link to listing" href="#">listing title here</a>
	          </div>
	        </td>
	      </tr>
	    </tbody>
	  </table>	
	</div> 
	<!-- repeat this item above  -->
	
</div>