<?php
/**
 * Displays a 'meta-block' with a post source.
 */
if(!empty($post->source)):
?>
<p class='meta-block'>
	<span>External Source:</span>
	<?php echo $post->source; ?>
</p>
<?php endif; ?>
