<?php
/**
 * Displays a 'meta-block' with a post date.
 */
?>
<p class='meta-block'>
	<span>Added:</span>
	<?php echo date('F dS, Y', strtotime($post->post_date_gmt)); ?>
</p>
