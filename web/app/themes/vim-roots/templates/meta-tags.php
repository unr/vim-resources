<?php
/**
 * Displays a 'meta-block' with a list of tags within a post.
 *
 * Should be at the footer of a single post.
 */

$tags = wp_get_post_tags($post->ID);
if (!empty($tags)):
?>
<p class='meta-block meta-block--tags'>
	<?php foreach($tags as $tag): ?>
		<a href="<?php echo get_tag_link($tag->term_id); ?>" class="button button--border-small button--grey">
			<i class="fa fa-tag"></i> <?php echo $tag->name; ?>
		</a>
	<?php endforeach; ?>
</p>
<?php endif; ?>
