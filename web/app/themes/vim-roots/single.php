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

		<footer class="post-footer">
			<p class='meta-block'>
				<span>External Source:</span>
				<?php echo $post->source; ?>
			</p>
			<p class='meta-block'>
				<span>Original Submitter:</span>
				<?php echo $post->submitter; ?>
			</p>
			<p class='meta-block meta-block--tags'>
				<a href="" class="button button--border-small button--grey">
					<i class="fa fa-tag"></i> Some Tag
				</a>
				<a href="" class="button button--border-small button--grey">
					<i class="fa fa-tag"></i> Some Tag
				</a>
				<a href="" class="button button--border-small button--grey">
					<i class="fa fa-tag"></i> Some Tag
				</a>
				<a href="" class="button button--border-small button--grey">
					<i class="fa fa-tag"></i> Some Tag
				</a>
				<a href="" class="button button--border-small button--grey">
					<i class="fa fa-tag"></i> Some Tag
				</a>
				<a href="" class="button button--border-small button--grey">
					<i class="fa fa-tag"></i> Some Tag
				</a>
				<a href="" class="button button--border-small button--grey">
					<i class="fa fa-tag"></i> Some Tag
				</a>
				<a href="" class="button button--border-small button--grey">
					<i class="fa fa-tag"></i> Some Tag
				</a>
				<a href="" class="button button--border-small button--grey">
					<i class="fa fa-tag"></i> Some Tag
				</a>
				<a href="" class="button button--border-small button--grey">
					<i class="fa fa-tag"></i> Some Tag
				</a>
				<a href="" class="button button--border-small button--grey">
					<i class="fa fa-tag"></i> Some Tag
				</a>
			</p>
		</footer>
	</article>

	<div class='section-side sidebar'>
		hello sidebar
	</div>
</div>

<?php endwhile; ?>
