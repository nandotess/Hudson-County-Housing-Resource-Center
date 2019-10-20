<?php
/**
 * All footer elements
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

?>

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div class="cell">
			<div class="hrc-comp">
				<div class="grid-x grid-padding-x">
					<div class="cell">
						<p class="h1"><?php esc_html_e( 'HRC', 'hrc' ); ?></p>
					</div>

					<!-- <div class="cell small-12 large-3"> -->
					<div class="cell small-12 tablet-6">
						<h4><?php esc_html_e( 'Contact Us', 'hrc' ); ?></h4>

						<div class="grid-x grid-padding-x">
							<div class="cell small-12 tablet-6">
								<?php /* translators: %1$s: <br> */ ?>
								<p><?php printf( esc_html__( '830 Bergen Ave %1$s Suite 5A %1$s Jersey City, NJ %1$s 07306', 'hrc' ), '<br>' ); ?></p>
							</div>

							<div class="cell small-12 tablet-6">
								<?php /* translators: %1$s: <br> */ ?>
								<p><?php printf( esc_html__( 'Tel: 201-795-5615 %1$s Fax: 201-795-1091', 'hrc' ), '<br>' ); ?></p>
								<p><a href="mailto:<?php esc_html_e( 'info@hudsonhrc.org', 'hrc' ); ?>"><?php esc_html_e( 'info@hudsonhrc.org', 'hrc' ); ?></a></p>
							</div>
						</div>
					</div>

					<!-- <div class="cell small-12 large-3"> -->
					<div class="cell small-12 tablet-6">
						<h4><?php esc_html_e( 'Navigate', 'hrc' ); ?></h4>
						<?php hrc_nav_footer( 'vertical' ); ?>
					</div>

					<!-- <div class="cell small-12 large-3"> -->
					<div class="cell">
						<?php /* translators: %1$s: Year */ ?>
						<p class="hrc-footer-copyright"><?php printf( esc_html__( '@ %1$s Hudson County Housing Resource Center, Inc.', 'hrc' ), esc_html( $year ) ); ?></p>
					</div>

					<!-- <div class="cell large-6 large-offset-6">
						<?php /* translators: %1$s: Year */ ?>
						<p class="hrc-footer-copyright"><?php printf( esc_html__( '@ %1$s Hudson County Housing Resource Center, Inc.', 'hrc' ), esc_html( $year ) ); ?></p>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div>
