<div class="un-thankyou">
	<h2 style="color: #625B55"><?php echo un_get_option(UN_THANKYOU_TITLE, __('Thank you', 'usernoise')) ?></h2>
	<p style="color: #625B55">
		<?php echo un_get_option(UN_THANKYOU_TEXT, __('Your feedback has been received.', 'usernoise')) ?>
	</p>
	<a href="#" id="un-reset-feedback"><img src="<?php echo usernoise_url('/images/ok.png')?>" id="un-thankyou-image"></a>
</div>