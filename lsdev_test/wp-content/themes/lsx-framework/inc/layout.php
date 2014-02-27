<?php
/**
 * Layout hooks
 *
 * @package lsx
 */

function lsx_add_footer_sidebar_area() {
	?>
	<section id="footer-widgets" class="container">
		<div class="row">
			<?php dynamic_sidebar( 'sidebar-footer' ); ?>
		</div>
	</section>
	<?php
}
add_action( 'lsx_footer_before', 'lsx_add_footer_sidebar_area' );

function lsx_set_post_meta_options( $post_info ) {
	$post_info = lsx_get_option('post_meta');
}
add_filter( 'lsx_filter_post_meta', 'lsx_set_post_meta_options' );