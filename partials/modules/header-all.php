<?php
/**
 * All header elements
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

?>

<div class="grid-container">
	<div class="grid-x grid-padding-x align-middle">
		<div class="cell shrink grid-x align-middle">
			<!-- Main navigation (mobile) link/button -->
			<div class="hrc-nav-main-mobile-toggle hide-for-large" data-toggle="off-canvas">
				<button class="menu-icon" type="button" aria-label="Open or close menu"></button>
			</div>

			<!-- Logo -->
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" tile="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="hrc-header-logo"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a>
		</div>

		<div class="cell auto grid-x align-right">
			<!-- Main navigation (desktop) -->
			<nav class="hrc-nav-main hrc-nav-main-desktop hide-for-small-only hide-for-medium-only hide-for-tablet-only" aria-label="Main navigation">
				<?php hrc_nav_primary( 'align-right align-middle' ); ?>
			</nav>

			<!-- Buttons (desktop) -->
			<?php hrc_nav_primary_buttons(); ?>
		</div>
	</div>
</div>
