<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package komorebi
 */

if ( ! is_active_sidebar( 'news-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="news-sidebar">
	<?php dynamic_sidebar( 'news-sidebar' ); ?>
</aside><!-- #secondary -->
