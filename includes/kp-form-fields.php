<?php
/**
 * Adds the form fields for the payment gateway.
 *
 * @package WC_Klarna_Payments/Includes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$settings = array(
	'enabled'               => array(
		'title'       => __( 'Enable/Disable', 'klarna-payments-for-woocommerce' ),
		'label'       => __( 'Enable Klarna Payments', 'klarna-payments-for-woocommerce' ),
		'type'        => 'checkbox',
		'description' => '',
		'default'     => 'no',
	),
	'title'                 => array(
		'title'       => __( 'Title (not applicable to checkout)', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Payment method title. Changes what the payment method is called on the order recieved page aswell as the email that is sent to the customer.', 'klarna-payments-for-woocommerce' ),
		'default'     => 'Klarna',
		'desc_tip'    => true,
	),
	'testmode'              => array(
		'title'       => __( 'Test mode', 'klarna-payments-for-woocommerce' ),
		'label'       => __( 'Enable Test Mode', 'klarna-payments-for-woocommerce' ),
		'type'        => 'checkbox',
		'description' => __( 'Place the payment gateway in test mode using test API keys.', 'klarna-payments-for-woocommerce' ),
		'default'     => 'yes',
		'desc_tip'    => true,
	),
	'logging'               => array(
		'title'       => __( 'Logging', 'klarna-payments-for-woocommerce' ),
		'label'       => __( 'Log debug messages', 'klarna-payments-for-woocommerce' ),
		'type'        => 'checkbox',
		'description' => __( 'Save debug messages to the WooCommerce System Status log.', 'klarna-payments-for-woocommerce' ),
		'default'     => 'no',
		'desc_tip'    => true,
	),
	'hide_what_is_klarna'   => array(
		'title'    => __( 'Hide What is Klarna? link', 'klarna-payments-for-woocommerce' ),
		'type'     => 'checkbox',
		'label'    => __( 'If checked, What is Klarna? will not be shown.', 'klarna-payments-for-woocommerce' ),
		'default'  => 'no',
		'desc_tip' => true,
	),
	'float_what_is_klarna'  => array(
		'title'    => __( 'Float What is Klarna? link', 'klarna-payments-for-woocommerce' ),
		'type'     => 'checkbox',
		'label'    => __( 'If checked, What is Klarna? will be floated right.', 'klarna-payments-for-woocommerce' ),
		'default'  => 'yes',
		'desc_tip' => true,
	),
	'send_product_urls'     => array(
		'title'    => __( 'Product URLs', 'klarna-payments-for-woocommerce' ),
		'type'     => 'checkbox',
		'label'    => __( 'Send product and product image URLs to Klarna', 'klarna-payments-for-woocommerce' ),
		'default'  => 'yes',
		'desc_tip' => true,
	),
	'add_to_email'          => array(
		'title'    => __( 'Add Klarna Urls to order email', 'klarna-payments-for-woocommerce' ),
		'type'     => 'checkbox',
		'label'    => __( 'This will add Klarna urls to the order emails that are sent. You can read more about this here: ', 'klarna-payments-for-woocommerce' ) . '<a href="https://docs.klarna.com/guidelines/klarna-payments-best-practices/post-purchase-experience/order-confirmation/" target="_blank">Klarna URLs</a>',
		'default'  => 'no',
		'desc_tip' => true,
	),
	'customer_type'         => array(
		'title'       => __( 'Customer type', 'klarna-payments-for-woocommerce' ),
		'type'        => 'select',
		'label'       => __( 'Customer type', 'klarna-payments-for-woocommerce' ),
		'description' => __( 'Select the customer for the store.', 'klarna-payments-for-woocommerce' ),
		'options'     => array(
			'b2c' => __( 'B2C', 'klarna-payments-for-woocommerce' ),
			'b2b' => __( 'B2B', 'klarna-payments-for-woocommerce' ),
		),
		'default'     => 'b2c',
		'desc_tip'    => true,
	),
	// AU.
	'credentials_au'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/au.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Australia',
		'type'  => 'title',
	),
	'merchant_id_au'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_au'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_au'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_au' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// AT.
	'credentials_at'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/at.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Austria',
		'type'  => 'title',
	),
	'merchant_id_at'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_at'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_at'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_at' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// BE.
	'credentials_be'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/be.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Belgium',
		'type'  => 'title',
	),
	'merchant_id_be'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_be'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_be'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => true,
	),
	'test_shared_secret_be' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// CA.
	'credentials_ca'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/ca.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Canada',
		'type'  => 'title',
	),
	'merchant_id_ca'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_ca'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_ca'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_ca' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// DK.
	'credentials_dk'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/dk.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Denmark',
		'type'  => 'title',
	),
	'merchant_id_dk'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_dk'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_dk'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_dk' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// DE.
	'credentials_de'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/de.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Germany',
		'type'  => 'title',
	),
	'merchant_id_de'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_de'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_de'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_de' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// FI.
	'credentials_fi'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/fi.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Finland',
		'type'  => 'title',
	),
	'merchant_id_fi'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_fi'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_fi'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_fi' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// FR.
	'credentials_fr'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/fr.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> France',
		'type'  => 'title',
	),
	'merchant_id_fr'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_fr'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_fr'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_fr' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// IE.
	'credentials_ie'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/ie.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Ireland',
		'type'  => 'title',
	),
	'merchant_id_ie'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_ie'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_ie'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_ie' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// IT.
	'credentials_it'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/it.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Italy',
		'type'  => 'title',
	),
	'merchant_id_it'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_it'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_it'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_it' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// NL.
	'credentials_nl'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/nl.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Netherlands',
		'type'  => 'title',
	),
	'merchant_id_nl'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_nl'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_nl'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_nl' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// NO.
	'credentials_no'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/no.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Norway',
		'type'  => 'title',
	),
	'merchant_id_no'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_no'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_no'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_no' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// NZ.
	'credentials_nz'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/nz.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> New Zealand',
		'type'  => 'title',
	),
	'merchant_id_nz'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_nz'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_nz'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_nz' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// PL.
	'credentials_pl'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/pl.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Poland',
		'type'  => 'title',
	),
	'merchant_id_pl'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_pl'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_pl'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_pl' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// SE.
	'credentials_se'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/se.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Sweden',
		'type'  => 'title',
	),
	'merchant_id_se'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_se'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_se'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_se' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// Spain/ES.
	'credentials_es'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/es.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Spain',
		'type'  => 'title',
	),
	'merchant_id_es'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_es'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_es'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_es' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// CH.
	'credentials_ch'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/ch.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Switzerland',
		'type'  => 'title',
	),
	'merchant_id_ch'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_ch'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_ch'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_ch' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// UK.
	'credentials_gb'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/gb.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> United Kingdom',
		'type'  => 'title',
	),
	'merchant_id_gb'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_gb'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_gb'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_gb' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	// US.
	'credentials_us'        => array(
		'title' => '<img src="' . plugins_url( 'assets/img/flags/us.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> United States',
		'type'  => 'title',
	),
	'merchant_id_us'        => array(
		'title'       => __( 'Production Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'shared_secret_us'      => array(
		'title'       => __( 'Production Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_merchant_id_us'   => array(
		'title'       => __( 'Test Klarna API username', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API username you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'test_shared_secret_us' => array(
		'title'       => __( 'Test Klarna API password', 'klarna-payments-for-woocommerce' ),
		'type'        => 'text',
		'description' => __( 'Use the API password you downloaded in the Klarna Merchant Portal. Don’t use your email address.', 'klarna-payments-for-woocommerce' ),
		'default'     => '',
		'desc_tip'    => false,
	),
	'iframe_options'        => array(
		'title' => 'Iframe settings',
		'type'  => 'title',
	),
	'color_border'          => array(
		'title'    => 'Border color',
		'type'     => 'color',
		'default'  => '',
		'desc_tip' => true,
	),
	'color_border_selected' => array(
		'title'    => 'Selected border color',
		'type'     => 'color',
		'default'  => '',
		'desc_tip' => true,
	),
	'color_text'            => array(
		'title'    => 'Text color',
		'type'     => 'color',
		'default'  => '',
		'desc_tip' => true,
	),
	'color_details'         => array(
		'title'    => 'Details color',
		'type'     => 'color',
		'default'  => '',
		'desc_tip' => true,
	),
	'color_text'            => array(
		'title'    => 'Text color',
		'type'     => 'color',
		'default'  => '',
		'desc_tip' => true,
	),
	'radius_border'         => array(
		'title'    => 'Border radius (px)',
		'type'     => 'number',
		'default'  => '',
		'desc_tip' => true,
	),
);

return apply_filters( 'wc_gateway_klarna_payments_settings', $settings );
