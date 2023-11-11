<div class="wrap">
<h1>GNews Settings</h1>
	<?php  settings_errors(); ?>

	<form method="post" action="options.php">
		<?php 
			settings_fields( 'news_options_group' );
			do_settings_sections( 'gnews_plugin' );
			submit_button();
		?>
	</form>
</div>