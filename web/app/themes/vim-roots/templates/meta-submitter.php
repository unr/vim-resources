<?php
/**
 * Displays a 'meta-block' with a post submitter.
 */
if(!empty($post->submitter)):
?>
<p class='meta-block'>
	<span>Original Submitter:</span>
	<?php echo $post->submitter; ?>
</p>
<?php endif; ?>
