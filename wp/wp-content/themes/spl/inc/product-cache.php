<?php
/**
 * Product Cache Invalidation — clear homepage product transients
 * when any product is created, updated, or deleted.
 *
 * @package SPL
 */

defined( 'ABSPATH' ) || exit;

add_action( 'woocommerce_update_product', 'spl_clear_product_transients' );
add_action( 'woocommerce_new_product', 'spl_clear_product_transients' );
add_action( 'woocommerce_delete_product', 'spl_clear_product_transients' );
add_action( 'woocommerce_trash_product', 'spl_clear_product_transients' );

/**
 * Delete all spl_products_* and spl_flash_sale_* transients.
 */
function spl_clear_product_transients(): void {
	global $wpdb;

	$wpdb->query(
		"DELETE FROM {$wpdb->options}
		 WHERE option_name LIKE '_transient_spl_products_%'
		    OR option_name LIKE '_transient_timeout_spl_products_%'
		    OR option_name LIKE '_transient_spl_flash_sale_%'
		    OR option_name LIKE '_transient_timeout_spl_flash_sale_%'"
	);
}
