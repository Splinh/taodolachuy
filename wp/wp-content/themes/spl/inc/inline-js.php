<?php
/**
 * Core UI JavaScript — enqueued as external cacheable file.
 *
 * Previously inlined (~25KB per page), now served as a cacheable
 * script file. Browser caches after first visit.
 *
 * @package SPL
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', 'spl_enqueue_core_ui_js', 99 );

/**
 * Enqueue core UI interactions (mobile menu, reveal, tabs, etc.) as external file.
 */
function spl_enqueue_core_ui_js(): void {
	$file = __DIR__ . '/core-ui.js';
	$ver  = THEME_VERSION ?? filemtime( $file );

	wp_enqueue_script(
		'spl-core-ui',
		get_template_directory_uri() . '/inc/core-ui.js',
		[],
		$ver,
		[ 'strategy' => 'defer', 'in_footer' => true ]
	);
}
