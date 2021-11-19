/**
 * External dependencies
 */
import { registerPaymentMethod } from '@woocommerce/blocks-registry';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import { getKPServerData } from './kp-utils/utils';
import KPLabel from './payment-methods/KPLabel';
import PaymentMethod from './payment-methods/PaymentMethod';

const kpServerData = getKPServerData();
const { paymentMethodCategories } = kpServerData;

const registerKPPaymentMethod = ( paymentMethod ) => {
	const options = {
		name: paymentMethod.identifier,
		label: (
			<KPLabel
				text={ paymentMethod.name }
				src={ paymentMethod.asset_urls.standard }
			/>
		),
		placeOrderButtonLabel: __(
			'Place Klarna order',
			'klarna-payments-for-woocommerce'
		),
		content: <PaymentMethod method={ paymentMethod.identifier } />,
		edit: <PaymentMethod method={ paymentMethod.identifier } />,
		canMakePayment: () => true,
		paymentMethodId: 'klarna_payments',
		// eslint-disable-next-line @wordpress/i18n-no-variables
		ariaLabel: __( paymentMethod.name, 'klarna-payments-for-woocommerce' ),
		supports: {
			features: [ 'products' ],
		},
	};
	registerPaymentMethod( options );
};
if ( paymentMethodCategories?.length ) {
	paymentMethodCategories.forEach( registerKPPaymentMethod );
}
