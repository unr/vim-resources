<?php while (have_posts()) : the_post(); ?>


<div class='section'>
	<article <?php post_class('section-body'); ?> >

		<div class='entry-type'>
			<?php if (!empty($post->category)) : ?>
				<a href="<?php echo $post->category->url; ?>" class='button button--category button--border'>
					<?php if (!empty($post->category->icon)) : ?>
						<span class="fa <?php echo $post->category->icon; ?>"></span>
					<?php endif; ?>
					<?php echo $post->category->name; ?>
				</a>
			<?php endif; ?>

			<a href="<?php echo get_post_type_archive_link($post->post_type); ?>" class='button button--type button--border'>
				<i class="fa <?php echo Vim::get_icon($post->post_type); ?>"></i>
				<?php echo $post->post_type; ?>
			</a>
		</div>

		<header>
		  <h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<div class="entry-meta">
			<?php echo $post->source; ?>
			<?php echo $post->submitter; ?>
		</div>
		<div class="entry-content">
		  <?php the_content(); ?>
		</div>
		<footer>
			tags, date
		</footer>
	</article>
	<div class='section-side sidebar'>
		hello sidebar
	</div>
</div>

<?php endwhile; ?>
