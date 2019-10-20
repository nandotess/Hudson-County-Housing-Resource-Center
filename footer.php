<?php
/**
 * Footer
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

?>

				<?php
					$hrc_post_id = get_the_id();

					/**
					 * Functions hooked in to hrc_after_content add_action
					 *
					 * @see hrc_after_content_post_related - 10
					 */
					do_action( 'hrc_after_content', $hrc_post_id );
				?>
			</div>

			<footer id="footer" class="hrc-footer">
				<?php
					/**
					 * Functions hooked into hrc_footer action
					 *
					 * @see hrc_footer_all - 10
					 */
					do_action( 'hrc_footer' );
				?>
			</footer>
		</div>

		<?php
			/**
			 * Functions hooked into hrc_body_end action
			 */
			do_action( 'hrc_body_end' );
		?>

		<?php wp_footer(); ?>
	</body>
</html>
