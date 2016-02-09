<div id="divAgent"></div>

<div id="ProDescription">
	<?php if ($_REQUEST['msg'] == 1) { ?>
		<div style="color:#060; font-weight:bold; margin:5px;">
			<?php _e( 'Inquiry has been sent to the Agent', 'wp-realestate' ); ?>
		</div>
	<?php } ?>
</div>

<form name="inq_form" id="inq_form" method="post">
	<div class="heading"><?php _e( 'Send an inquiry to the agent', 'wp-realestate' ); ?></div>
	
	<div class="SpecLabel"><?php _e( 'Your Name', 'wp-realestate' ); ?>*</div>
	<div class="SpecInfo"><input name="inq_name" id="inq_name" type="text"></div>
	
	<div class="SpecLabel"><?php _e( 'Your Email', 'wp-realestate' ); ?>*</div>
	<div class="SpecInfo"><input name="inq_email" id="inq_email" type="text"></div>
	
	<div class="SpecLabel"><?php _e( 'Your Phone', 'wp-realestate' ); ?>*</div>
	<div class="SpecInfo"><input name="inq_phone" id="inq_phone" type="text"></div>
	
	<div class="SpecLabel"><?php _e( 'Message', 'wp-realestate' ); ?>*</div>
	<div class="SpecInfo"><textarea name="inq_message" id="inq_message"></textarea></div>
	
	
	<div class="SpecLabel">&nbsp;</div>
	<div class="SpecInfo"><input name="submit" type="submit" value="<?php _e( 'Send Inquiry', 'wp-realestate' ); ?>"></div>
	
</form>