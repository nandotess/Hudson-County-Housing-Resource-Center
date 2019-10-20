<?php
/**
 * Page not found content
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

global $post;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'hrc-page hrc-page-404' ); ?>>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				<h1><?php esc_html_e( 'Page not found', 'hrc' ); ?></h1>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'hrc' ); ?></a>

				<!--############ -->
				<!-- Style Guide -->
				<!--############ -->

				<!-- Headings -->
				<!-- <hr>
				<h1>Heading 1</h1>
				<h2>Heading 2</h2>
				<h3>Heading 3</h3>
				<h4>Heading 4</h4>
				<h1><a href="#">Heading 1 with link</a></h1>
				<h2><a href="#">Heading 2 with link</a></h2>
				<h3><a href="#">Heading 3 with link</a></h3>
				<h4><a href="#">Heading 4 with link</a></h4> -->

				<!-- Text -->
				<!-- <hr>
				<p class="hrc-text-summary">Lorem ipsum dolor sit amet, <a href="#">consectetur adipiscing elit</a>, sed do eiusmod tempor incididunt ut <strong>labore et dolore magna aliqua</strong>. Ut enim ad minim veniam, quis nostrud exercitation <i>ullamco laboris nisi ut aliquip</i> ex ea commodo consequat. Duis aute irure dolor in reprehenderit <u>in voluptate velit esse cillum</u> dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p> -->

				<!-- Anchors (links) -->
				<!-- <hr>
				<a href="#" class="button">Primary</a>
				<a href="#" class="button secondary">Secondary</a>
				<a href="#" class="button large">Primary Large</a>
				<a href="#" class="button secondary large">Secondary Large</a>

				<div style="background-color:#072c58;padding:30px 30px 15px;margin:0 0 15px 0">
					<button type="button" class="button white">White</button>
					<button type="button" class="button white large">White Large</button>
					<button type="button" class="button white" disabled>White Disabled</button>
				</div> -->

				<!-- Buttons (actions) -->
				<!-- <hr>
				<button type="button" class="button">Save</button>
				<button type="button" class="button secondary">Delete</button> -->
			</div>
		</div>
	</div>
</div>
