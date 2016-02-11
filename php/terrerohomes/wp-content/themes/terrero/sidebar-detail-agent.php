<div class="agent">
	<label class="banner">Agent Direct Contact</label>
	<?php
		$id = $post->post_author;
		$agentMeta = get_user_meta($id);
		$name = $agentMeta['first_name'][0]. ' ' .$agentMeta['last_name'][0];
		$msg = $agentMeta['description'][0];
		$email = get_the_author_meta('email');
		$angentFields = array(
			'Name' => $name,
			'Email' => $email,
			'' => $msg
		);
	?>
	<div class="contact-details">
		<div class="col agent-pic">
			<?php echo get_avatar($id) ?>
		</div>

		
		
		<div class="col agent-info">
			<ul>

				<?php foreach ($angentFields as $fieldName => $fieldValue) { ?>
					<li>
						<label><?php echo $fieldName ?></label>
						<span><?php echo $fieldValue ?></span>
					</li>
				<?php } ?>
			</ul>
			
		</div>
	</div>			
</div>