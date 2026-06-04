<?php
/**
 * Theme core CSS — enqueued as external files for browser caching.
 *
 * Previously inlined (~150KB per page load), now served as cacheable
 * stylesheet files. Browser caches them after first visit.
 *
 * @package SPL
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', 'spl_enqueue_core_css', 1 );

/**
 * Enqueue critical + pages CSS as external files (cacheable).
 */
function spl_enqueue_core_css(): void {
	$ver = THEME_VERSION ?? filemtime( __DIR__ . '/critical.css' );

	wp_enqueue_style(
		'spl-critical',
		get_template_directory_uri() . '/inc/critical.css',
		[],
		$ver
	);

	// Sub-page styles (about, contact, news, single).
	if ( ! is_front_page() ) {
		wp_enqueue_style(
			'spl-pages',
			get_template_directory_uri() . '/inc/pages.css',
			[ 'spl-critical' ],
			$ver
		);
	}
}
