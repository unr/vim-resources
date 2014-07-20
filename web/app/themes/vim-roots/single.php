<?php while (have_posts()) : the_post(); ?>

<div class='section'>
	<article <?php post_class('section-body'); ?> >
		<?php include( Vim::get_template('post-type-bar') ); ?>

		<header>
			<h1 class="post-title"><?php the_title(); ?></h1>
		</header>

		<div class="post-content">
			<?php the_content(); ?>
		</div>

		<footer class="post-footer">
			<?php
				include( Vim::get_template('meta', 'date') );
				include( Vim::get_template('meta', 'source') );
				include( Vim::get_template('meta', 'submitter') );
				include( Vim::get_template('meta', 'tags') );
			?>
		</footer>
	</article>

	<div class='section-side sidebar'>
		hello sidebar
	</div>
</div>

<?php endwhile; ?>
