<?php

namespace Packetery\Module\Commands;

class GenerateDemoOrdersConfig {

	public const CUSTOMER_EMAIL = 'john.packeta@example.cz';

	public const LIST_DISABLED_EMAILS = [
		'woocommerce_low_stock',
		'woocommerce_no_stock',
		'woocommerce_product_on_backorder',
		'woocommerce_order_status_pending_to_processing',
		'woocommerce_order_status_pending_to_completed',
		'woocommerce_order_status_processing_to_cancelled',
		'woocommerce_order_status_pending_to_failed',
		'woocommerce_order_status_pending_to_on-hold',
		'woocommerce_order_status_failed_to_processing',
		'woocommerce_order_status_failed_to_completed',
		'woocommerce_order_status_failed_to_on-hold',
		'woocommerce_order_status_cancelled_to_processing',
		'woocommerce_order_status_cancelled_to_completed',
		'woocommerce_order_status_cancelled_to_on-hold',
		'woocommerce_order_status_on-hold_to_processing',
		'woocommerce_order_status_on-hold_to_cancelled',
		'woocommerce_order_status_on-hold_to_failed',
		'woocommerce_order_status_completed',
		'woocommerce_order_status_failed',
		'woocommerce_order_fully_refunded',
		'woocommerce_order_partially_refunded',
		'woocommerce_new_customer_note',
		'woocommerce_created_customer',
	];
}
