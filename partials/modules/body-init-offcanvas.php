<?php
/**
 * Off-canvas Menu
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

?>

<div class="hrc-off-canvas off-canvas position-top" id="off-canvas" data-off-canvas aria-hidden="true">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-middle">
			<div class="cell shrink">
				<!-- Main navigation (mobile) close link/button -->
				<button class="hrc-off-canvas-close-button close-button" aria-label="Close menu" type="button" data-close>
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>

		<div class="grid-x grid-padding-x">
			<div class="cell auto">
				<!-- Main navigation (mobile) -->
				<nav class="hrc-nav-main hrc-nav-main-mobile" aria-label="Main navigation (mobile screens)">
					<?php hrc_nav_primary( 'vertical' ); ?>
				</nav>

				<!-- Buttons (mobile) -->
				<?php hrc_nav_primary_buttons(); ?>
			</div>
		</div>
	</div>
</div>
