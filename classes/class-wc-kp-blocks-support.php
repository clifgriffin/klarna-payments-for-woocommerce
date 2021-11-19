<?php
use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;
use Automattic\WooCommerce\Blocks\Payments\PaymentResult;
use Automattic\WooCommerce\Blocks\Payments\PaymentContext;

defined( 'ABSPATH' ) || exit;

/**
 * WC_KCO_Blocks_Support class.
 *
 * @extends AbstractPaymentMethodType
 */
final class WC_KP_Blocks_Support extends AbstractPaymentMethodType {
	/**
	 * Payment method name defined by payment methods extending this class.
	 *
	 * @var string
	 */
	protected $name = 'klarna_payments';

	/**
	 * Class constructor.
	 */
	public function __construct() {
		add_action( 'woocommerce_rest_checkout_process_payment_with_context', array( $this, 'add_payment_request_order_meta' ), 8, 2 );

	}


	/**
	 * Init payment method.
	 */
	public function initialize() {
		$this->settings = get_option( 'woocommerce_klarna_payments_settings', array() );
	}

	/**
	 * @return string[]
	 */
	public function get_payment_method_script_handles() {
		$asset_path   = WC_KLARNA_PAYMENTS_PLUGIN_PATH . '/build/index.asset.php';
		$version      = WC_KLARNA_PAYMENTS_VERSION;
		$dependencies = array();
		if ( file_exists( $asset_path ) ) {
			$asset        = require $asset_path;
			$version      = $asset['version'] ?? $version;
			$dependencies = $asset['dependencies'] ?? $dependencies;
		}
		wp_register_script(// phpcs:ignore WordPress.WP.EnqueuedResourceParameters
			'klarnaPayments',
			'https://x.klarnacdn.net/kp/lib/v1/api.js',
			null,
			null,
			true
		);
		wp_register_script(
			'wc-kp-blocks-integration',
			plugins_url( 'build/index.js', WC_KLARNA_PAYMENTS_MAIN_FILE ),
			$dependencies,
			$version,
			true
		);

		return array( 'wc-kp-blocks-integration', 'klarnaPayments' );
	}
	/**
	 * Returns if this payment method should be active. If false, the scripts will not be enqueued.
	 *
	 * @return boolean
	 */
	public function is_active() {
		return 'yes' === $this->settings['enabled'];
	}
	/**
	 * Returns the Stripe Payment Gateway JavaScript configuration object.
	 *
	 * @return array  the JS configuration from the Stripe Payment Gateway.
	 */
	private function get_gateway_javascript_params() {
		return array();
	}

	/**
	 * Returns an array of key=>value pairs of data made available to the payment methods script.
	 *
	 * @return array
	 */
	public function get_payment_method_data() {


		$hide_what_is_klarna = $this->settings['hide_what_is_klarna'];
		if ( ! is_admin() ) {
			kp_maybe_create_session_cart();
			return array_merge_recursive(
				$this->get_gateway_javascript_params(),
				// $this->get_payment_request_javascript_params(),
				// Blocks-specific options
				array(
					'title'                   => $this->get_title(),
					'supports'                => $this->get_supported_features(),
					'paymentMethodCategories' => WC()->session->get( 'klarna_payments_categories' ),
					'clientToken'             => WC()->session->get( 'klarna_payments_client_token' ),
					'placeOrderUrl'           => WC_AJAX::get_endpoint( 'kp_wc_place_order' ),
					'placeOrderNonce'         => wp_create_nonce( 'kp_wc_place_order' ),
					'hideWhatIsKlarna'        => $hide_what_is_klarna,
				)
			);
		}
		return array();
	}

	/**
	 * Returns an array of supported features.
	 *
	 * @return string[]
	 */
	public function get_supported_features() {
		$gateway = new WC_Gateway_Klarna_Payments();
		return apply_filters( 'wc_klarna_payments_supports', $gateway->supports );
	}

	/**
	 * Returns the title string to use in the UI (customisable via admin settings screen).
	 *
	 * @return string Title / label string
	 */
	private function get_title() {
		return $this->settings['title'] ?? __( 'Klarna', 'klarna-payments-for-woocommerce' );
	}

	/**
	 * Add payment request data to the order meta as hooked on the
	 * woocommerce_rest_checkout_process_payment_with_context action.
	 *
	 * @param PaymentContext $context Holds context for the payment.
	 * @param PaymentResult  $result  Result object for the payment.
	 */
	public function add_payment_request_order_meta( PaymentContext $context, PaymentResult $result ) {
		if ( 'klarna_payments' === $context->payment_method ) {

			$gateway         = new WC_Gateway_Klarna_Payments();
			$payment_details = $result->payment_details;

			$payment_details['redirect_url'] = $gateway->get_return_url( $context->order );
			$result->set_payment_details( $payment_details );
			$result->set_status( 'success' );
		}

	}
}
