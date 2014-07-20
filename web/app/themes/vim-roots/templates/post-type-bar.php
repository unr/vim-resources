<?php
/**
 * Post Type Bar
 *
 * Displays the category, and type of post as buttons.
 */
?>
<div class='post-type'>
	<?php if (!empty($post->category)) : ?>
		<a href="<?php echo $post->category->url; ?>" class='button button--border'>
			<?php if (!empty($post->category->icon)) : ?>
				<span class="fa <?php echo $post->category->icon; ?>"></span>
			<?php endif; ?>
			<?php echo $post->category->name; ?>
		</a>
	<?php endif; ?>

	<a href="<?php echo get_post_type_archive_link($post->post_type); ?>" class='button button--border button--grey float--right'>
		<i class="fa <?php echo Vim::get_icon($post->post_type); ?>"></i>
		<?php echo $post->post_type; ?>
	</a>
</div>
