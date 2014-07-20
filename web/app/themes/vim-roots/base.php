<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

	<!--[if lt IE 8]>
		<div class="alert alert-warning">
			<?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
		</div>
	<![endif]-->

	<?php include( Vim::get_template('header') ); ?>

	<div class='wrapper'>
		<?php include roots_template_path(); ?>
	</div>

	<?php include( Vim::get_template('footer') ); ?>

</body>
</html>
