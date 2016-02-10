<div id="meta-box">
	<h2>property information</h2>

	<?php 
		$detailInfo = array(
			'Property Name' => 'et_er_property_name',
			'Space' => 'et_er_land_size',
			'Bedroom' => 'et_er_bedroom',
			'Bathroom' => 'et_er_bathroom',
			'Furnishing' => 'et_er_furnishing',
			'Tenure' => 'et_er_tenure',
			'Date Available' => 'et_er_date_vacant'

		);
	?>

	<ul>
		<?php
			foreach ($detailInfo as $key => $value) {
				if ($value){ ?>
					<li class="cf">
						<label><?php echo $key ?>:</label>
						<span><?php echo getMetaData($value); ?></span>
					</li>			
		
				<?php }  
			}
		?>
		
	</ul>
</div>