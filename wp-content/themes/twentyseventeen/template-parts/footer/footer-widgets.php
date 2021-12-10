<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php if(is_active_sidebar( 'sidebar-4' )): ?>

	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'twentyseventeen' ); ?>">
		<div class="widget-column footer-widget-4">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div>
	</aside>

<?php endif; ?>
