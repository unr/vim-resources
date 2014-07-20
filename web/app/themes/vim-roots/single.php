<?php while (have_posts()) : the_post(); ?>

<div class='section'>
	<article <?php post_class('section-body'); ?> >

		<?php include( Vim::get_template('post-type-bar') ); ?>

		<header>
			<h1 class="post-title"><?php the_title(); ?></h1>
		</header>

		<div class='post-date'>
			<p><strong>Added:</strong> <?php echo date('F dS, Y', strtotime($post->post_date_gmt)); ?></p>
		</div>
		<div class="post-content">
			<?php the_content(); ?>
		</div>
		<footer>
			<?php echo $post->source; ?>
			<?php echo $post->submitter; ?>
			<p>tags, date</p>
		</footer>
	</article>
	<div class='section-side sidebar'>
		hello sidebar
	</div>
</div>

<?php endwhile; ?>
