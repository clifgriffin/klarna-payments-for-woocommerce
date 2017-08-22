<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Klarna_Payments_Form_Fields
 */
class Klarna_Payments_Form_Fields {
	/**
	 * Returns the fields.
	 */
	public static function fields() {
		$base_location = wc_get_base_location();
		$base_country  = $base_location['country'];

		if ( 'US' === $base_country ) {
			$default_title = __( 'Pay Over Time', 'klarna-payments-for-woocommerce' );
		} else {
			$default_title = __( 'Klarna', 'klarna-payments-for-woocommerce' );
		}


		return apply_filters( 'wc_gateway_klarna_payments_settings', array(
			'enabled'     => array(
				'title'       => __( 'Enable/Disable', 'klarna-payments-for-woocommerce' ),
				'label'       => __( 'Enable Klarna Payments', 'klarna-payments-for-woocommerce' ),
				'type'        => 'checkbox',
				'description' => '',
				'default'     => 'no',
			),
			'title'       => array(
				'title'       => __( 'Title', 'klarna-payments-for-woocommerce' ),
				'type'        => 'text',
				'description' => __( 'Title that the customer will see on your checkout.', 'klarna-payments-for-woocommerce' ),
				'default'     => $default_title,
				'desc_tip'    => true,
			),
			'description' => array(
				'title'       => __( 'Description', 'klarna-payments-for-woocommerce' ),
				'type'        => 'textarea',
				'description' => __( 'Description that the customer will see on your website.', 'klarna-payments-for-woocommerce' ),
				'default'     => __( 'Get the flexibility to pay over time with Klarna!', 'klarna-payments-for-woocommerce' ),
				'desc_tip'    => true,
			),

			'allow_multiple_countries' => array(
				'title'    => __( 'Allow Klarna Payments across multiple countries', 'woocommerce-gateway-klarna-payments' ),
				'type'     => 'checkbox',
				'label'    => __( 'If this option is checked Klarna credentials for customer\'s billing country will be used, if available. If those credentials are not available, then Klarna credentials for shop base location country will be used. If the option is unchecked only Klarna credentials for shop base location country will be used.', 'woocommerce-gateway-klarna-payments' ),
				'default'  => 'no',
				'desc_tip' => true,
			),

			'testmode'              => array(
				'title'       => __( 'Test mode', 'woocommerce-gateway-klarna-payments' ),
				'label'       => __( 'Enable Test Mode', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'checkbox',
				'description' => __( 'Place the payment gateway in test mode using test API keys.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => 'yes',
				'desc_tip'    => true,
			),
			'logging'               => array(
				'title'       => __( 'Logging', 'woocommerce-gateway-klarna-payments' ),
				'label'       => __( 'Log debug messages', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'checkbox',
				'description' => __( 'Save debug messages to the WooCommerce System Status log.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => 'no',
				'desc_tip'    => true,
			),
			'float_what_is_klarna'  => array(
				'title'    => __( 'What is Klarna? link', 'woocommerce-gateway-klarna-payments' ),
				'type'     => 'checkbox',
				'label'    => __( 'If checked, What is Klarna? will be floated right.', 'woocommerce-gateway-klarna-payments' ),
				'default'  => 'yes',
				'desc_tip' => true,
			),
			'send_product_urls'     => array(
				'title'    => __( 'Product URLs', 'woocommerce-gateway-klarna-payments' ),
				'type'     => 'checkbox',
				'label'    => __( 'Send product and product image URLs to Klarna', 'woocommerce-gateway-klarna-payments' ),
				'default'  => 'yes',
				'desc_tip' => true,
			),

			// AT.
			'credentials_at'        => array(
				'title' => '<img src="' . plugins_url( 'assets/img/flags/at.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Austria',
				'type'  => 'title',
			),
			'title_at'              => array(
				'title'       => __( 'Title', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'If this option is used, default payment method title will be overriden for AT purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'description_at'        => array(
				'title'       => __( 'Description', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'textarea',
				'description' => __( 'If this option is used, default payment method description will be overriden for AT purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'merchant_id_at'        => array(
				'title'       => __( 'Production Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for AT.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'shared_secret_at'      => array(
				'title'       => __( 'Production Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for AT.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_merchant_id_at'   => array(
				'title'       => __( 'Test Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for AT.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_shared_secret_at' => array(
				'title'       => __( 'Test Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for AT.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),

			// DK.
			'credentials_dk'        => array(
				'title' => '<img src="' . plugins_url( 'assets/img/flags/dk.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Denmark',
				'type'  => 'title',
			),
			'title_dk'              => array(
				'title'       => __( 'Title', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'If this option is used, default payment method title will be overriden for DK purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'description_dk'        => array(
				'title'       => __( 'Description', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'textarea',
				'description' => __( 'If this option is used, default payment method description will be overriden for DK purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'merchant_id_dk'        => array(
				'title'       => __( 'Production Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for DK.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'shared_secret_dk'      => array(
				'title'       => __( 'Production Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for DK.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_merchant_id_dk'   => array(
				'title'       => __( 'Test Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for DK.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_shared_secret_dk' => array(
				'title'       => __( 'Test Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for DK.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),

			// FI.
			'credentials_fi'        => array(
				'title' => '<img src="' . plugins_url( 'assets/img/flags/fi.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Finland',
				'type'  => 'title',
			),
			'title_fi'              => array(
				'title'       => __( 'Title', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'If this option is used, default payment method title will be overriden for FI purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'description_fi'        => array(
				'title'       => __( 'Description', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'textarea',
				'description' => __( 'If this option is used, default payment method description will be overriden for FI purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'merchant_id_fi'        => array(
				'title'       => __( 'Production Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for FI.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'shared_secret_fi'      => array(
				'title'       => __( 'Production Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for FI.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_merchant_id_fi'   => array(
				'title'       => __( 'Test Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for FI.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_shared_secret_fi' => array(
				'title'       => __( 'Test Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for FI.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),

			// DE.
			'credentials_de'        => array(
				'title' => '<img src="' . plugins_url( 'assets/img/flags/de.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Germany',
				'type'  => 'title',
			),
			'title_de'              => array(
				'title'       => __( 'Title', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'If this option is used, default payment method title will be overriden for DE purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'description_de'        => array(
				'title'       => __( 'Description', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'textarea',
				'description' => __( 'If this option is used, default payment method description will be overriden for DE purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'merchant_id_de'        => array(
				'title'       => __( 'Production Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for DE.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'shared_secret_de'      => array(
				'title'       => __( 'Production Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for DE.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_merchant_id_de'   => array(
				'title'       => __( 'Test Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for DE.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_shared_secret_de' => array(
				'title'       => __( 'Test Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for DE.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),

			// NL.
			'credentials_nl'        => array(
				'title' => '<img src="' . plugins_url( 'assets/img/flags/nl.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Netherlands',
				'type'  => 'title',
			),
			'title_nl'              => array(
				'title'       => __( 'Title', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'If this option is used, default payment method title will be overriden for NL purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'description_nl'        => array(
				'title'       => __( 'Description', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'textarea',
				'description' => __( 'If this option is used, default payment method description will be overriden for NL purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'merchant_id_nl'        => array(
				'title'       => __( 'Production Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for NL.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'shared_secret_nl'      => array(
				'title'       => __( 'Production Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for NL.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_merchant_id_nl'   => array(
				'title'       => __( 'Test Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for NL.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_shared_secret_nl' => array(
				'title'       => __( 'Test Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for NL.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),

			// NO.
			'credentials_no'        => array(
				'title' => '<img src="' . plugins_url( 'assets/img/flags/no.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Norway',
				'type'  => 'title',
			),
			'title_no'              => array(
				'title'       => __( 'Title', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'If this option is used, default payment method title will be overriden for NO purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'description_no'        => array(
				'title'       => __( 'Description', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'textarea',
				'description' => __( 'If this option is used, default payment method description will be overriden for NO purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'merchant_id_no'        => array(
				'title'       => __( 'Production Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for NO.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'shared_secret_no'      => array(
				'title'       => __( 'Production Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for NO.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_merchant_id_no'   => array(
				'title'       => __( 'Test Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for NO.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_shared_secret_no' => array(
				'title'       => __( 'Test Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for NO.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),

			// SE.
			'credentials_se'        => array(
				'title' => '<img src="' . plugins_url( 'assets/img/flags/se.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> Sweden',
				'type'  => 'title',
			),
			'description_se'        => array(
				'title'       => __( 'Description', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'textarea',
				'description' => __( 'If this option is used, default payment method description will be overriden for SE purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'title_se'              => array(
				'title'       => __( 'Title', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'If this option is used, default payment method title will be overriden for SE purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'merchant_id_se'        => array(
				'title'       => __( 'Production Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for SE.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'shared_secret_se'      => array(
				'title'       => __( 'Production Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for SE.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_merchant_id_se'   => array(
				'title'       => __( 'Test Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for EU.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_shared_secret_se' => array(
				'title'       => __( 'Test Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for SE.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),

			// UK.
			'credentials_gb'        => array(
				'title' => '<img src="' . plugins_url( 'assets/img/flags/gb.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> United Kingdom',
				'type'  => 'title',
			),
			'description_gb'        => array(
				'title'       => __( 'Description', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'If this option is used, default payment method description will be overriden for UK purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'title_gb'              => array(
				'title'       => __( 'Title', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'textarea',
				'description' => __( 'If this option is used, default payment method title will be overriden for UK purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'merchant_id_gb'        => array(
				'title'       => __( 'Production Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for UK.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'shared_secret_gb'      => array(
				'title'       => __( 'Production Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for UK.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_merchant_id_gb'   => array(
				'title'       => __( 'Test Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for UK.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_shared_secret_gb' => array(
				'title'       => __( 'Test Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for UK.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),

			// US.
			'credentials_us'        => array(
				'title' => '<img src="' . plugins_url( 'assets/img/flags/us.svg', WC_KLARNA_PAYMENTS_MAIN_FILE ) . '" height="12" /> United States',
				'type'  => 'title',
			),
			'title_us'              => array(
				'title'       => __( 'Title', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'If this option is used, default payment method title will be overriden for US purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'description_us'        => array(
				'title'       => __( 'Description', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'textarea',
				'description' => __( 'If this option is used, default payment method description will be overriden for US purchases.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'merchant_id_us'        => array(
				'title'       => __( 'Production Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for US.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'shared_secret_us'      => array(
				'title'       => __( 'Production Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for US.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_merchant_id_us'   => array(
				'title'       => __( 'Test Username', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for US.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'test_shared_secret_us' => array(
				'title'       => __( 'Test Password', 'woocommerce-gateway-klarna-payments' ),
				'type'        => 'text',
				'description' => __( 'Get your API keys from your Klarna Payments merchant account for US.', 'woocommerce-gateway-klarna-payments' ),
				'default'     => '',
				'desc_tip'    => true,
			),

			'iframe_options'           => array(
				'title' => 'Iframe settings',
				'type'  => 'title',
			),
			'background'               => array(
				'title'    => 'Background',
				'type'     => 'color',
				'default'  => '#ffffff',
				'desc_tip' => true,
			),
			'color_button'             => array(
				'title'    => 'Button color',
				'type'     => 'color',
				'default'  => '',
				'desc_tip' => true,
			),
			'color_button_text'        => array(
				'title'    => 'Button text color',
				'type'     => 'color',
				'default'  => '',
				'desc_tip' => true,
			),
			'color_checkbox'           => array(
				'title'    => 'Checkbox color',
				'type'     => 'color',
				'default'  => '',
				'desc_tip' => true,
			),
			'color_checkbox_checkmark' => array(
				'title'    => 'Checkbox checkmark color',
				'type'     => 'color',
				'default'  => '',
				'desc_tip' => true,
			),
			'color_header'             => array(
				'title'    => 'Header color',
				'type'     => 'color',
				'default'  => '',
				'desc_tip' => true,
			),
			'color_link'               => array(
				'title'    => 'Link color',
				'type'     => 'color',
				'default'  => '',
				'desc_tip' => true,
			),
			'color_border'             => array(
				'title'    => 'Border color',
				'type'     => 'color',
				'default'  => '',
				'desc_tip' => true,
			),
			'color_border_selected'    => array(
				'title'    => 'Selected border color',
				'type'     => 'color',
				'default'  => '',
				'desc_tip' => true,
			),
			'color_text'               => array(
				'title'    => 'Text color',
				'type'     => 'color',
				'default'  => '',
				'desc_tip' => true,
			),
			'color_details'            => array(
				'title'    => 'Details color',
				'type'     => 'color',
				'default'  => '',
				'desc_tip' => true,
			),
			'color_text_secondary'     => array(
				'title'    => 'Secondary text color',
				'type'     => 'color',
				'default'  => '',
				'desc_tip' => true,
			),
			'radius_border'            => array(
				'title'    => 'Border radius (px)',
				'type'     => 'number',
				'default'  => '',
				'desc_tip' => true,
			),
		) );
	}
}

