/**
 * External dependencies
 */
import { getSetting } from '@woocommerce/settings';
import { __ } from '@wordpress/i18n';
import $ from 'jquery';

/**
 * KP data comes from the server passed on a global object.
 *
 * @return {Object} KP server data.
 */
const getKPServerData = () => {
	const kpServerData = getSetting( 'klarna_payments_data', null );
	if ( ! kpServerData ) {
		throw new Error(
			__(
				'KP initialization data is not available',
				'klarna-payments-for-woocommerce'
			)
		);
	}
	return kpServerData;
};

const load = ( id = 'pay_now' ) => {
	const klarnaPaymentsContainerSelectorId = '#' + `kp_${ id }`;
	if ( klarnaPaymentsContainerSelectorId ) {
		const $defer = $.Deferred();
		const klarnaLoadedInterval = setInterval( () => {
			let Klarna = false;
			try {
				Klarna = window.Klarna;
			} catch ( e ) {
				console.debug( e );
			}
			if ( Klarna && Klarna.Payments ) {
				clearInterval( klarnaLoadedInterval );
				clearTimeout( klarnaLoadedTimeout );
				const options = {
					container: klarnaPaymentsContainerSelectorId,
					payment_method_category: id,
				};
				Klarna.Payments.load( options, ( response ) => {
					$defer.resolve( response );
				} );
			}
		}, 100 );
		const klarnaLoadedTimeout = setTimeout( () => {
			clearInterval( klarnaLoadedInterval );
			$defer.reject();
		}, 3000 );
		return $defer.promise();
	}
};

export { getKPServerData, load };
