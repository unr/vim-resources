<?php
/**
 * Sitewide Header
 *
 * Using foundation nav.top-bar for now, will update eventually.
 */
?>
<header>
	<nav class='top-bar'>
		<div class='wrapper'>
			<ul class="title-area">
				<li class="name">
					<h1><a href="#"><i class='fa fa-heart-o'></i> vim/resources</a></h1>
				</li>

				<?php /*
				<li class="toggle-topbar menu-icon">
					<a href="#"><span>Menu</span></a>
				</li>
				 */ ?>
			</ul>

			<section class="top-bar-section">
				<ul class="float--right">
					<li class="active"><a href="#">Right Button Active</a></li>
					<li class="has-dropdown">
						<a href="#">Right Button Dropdown</a>
						<ul class="dropdown">
							<li><a href="#">First link in dropdown</a></li>
						</ul>
					</li>
				</ul>

				<ul class="float--left">
					<li><a href="#">Left Nav Button</a></li>
				</ul>
			</section>
		</div>
	</nav>
</header>
