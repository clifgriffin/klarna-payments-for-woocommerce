/**
 * External dependencies
 */
import { useState, useEffect } from '@wordpress/element';
import $ from 'jquery';
/**
 * Internal dependencies
 */
import ClientToken from './ClientToken';
import { getKPServerData, load } from '../kp-utils/utils';

const PaymentMethod = ( props ) => {
	const { eventRegistration, billing, shippingData, method } = props;
	const { billingData } = billing;
	const { shippingAddress } = shippingData;
	const { clientToken, placeOrderUrl, placeOrderNonce } = getKPServerData();

	const {
		onCheckoutAfterProcessingWithSuccess,
		onCheckoutAfterProcessingWithError,
		onCheckoutBeforeProcessing,
	} = eventRegistration;
	const loadKP = async () => {
		window.klarnaInitData = {
			client_token: clientToken,
		};
		window.Klarna.Payments.init( window.klarnaInitData );
		await load( method );
	};
	const id = `kp_${ method }`;
	const [ shouldCallLoad, setShouldCallLoad ] = useState( true );
	const [ isSetOnCheckoutSuccess, setIsSetOnCheckoutSuccess ] = useState(
		false
	);
	const [ isSetOnCheckoutError, setIsSetOnCheckoutError ] = useState( false );
	const [
		isSetOnCheckoutBeforeProcessing,
		setIsOnCheckoutBeforeProcessing,
	] = useState( false );

	let authorizationResponse = {};

	const authorizeKlarnaOrder = ( orderId ) => {
		authorize( method ).done( ( response ) => {
			if ( 'authorization_token' in response ) {
				$.ajax( placeOrderUrl, {
					type: 'POST',
					dataType: 'json',
					async: true,
					data: {
						order_id: orderId,
						auth_token: authorizationResponse.authorization_token,
						nonce: placeOrderNonce,
					},
					success( kpResponse ) {
						// Log the success.
						console.log( 'kp_place_order success' );
						console.log( kpResponse );
					},
					error( kpResponse ) {
						// Log the error.
						console.log( 'kp_place_order error' );
						console.log( kpResponse );
					},
					complete( kpResponse ) {
						if ( kpResponse.responseJSON.success === true ) {
							window.location.href = kpResponse.responseJSON.data;
						}
					},
				} );
			}
		} );
	};

	const authorize = () => {
		const $defer = $.Deferred();
		const address = {
			billing_address: {
				given_name: billingData.first_name,
				family_name: billingData.last_name,
				email: billingData.email,
				phone: billingData.phone,
				country: billingData.country,
				region: '',
				postal_code: billingData.postcode,
				city: billingData.city,
				street_address: billingData.address_1,
				street_address2: billingData.address_2,
				organization_name: '',
			},
			shipping_address: {
				given_name: billingData.first_name,
				family_name: billingData.last_name,
				email: billingData.email,
				phone: billingData.phone,
				country: billingData.country,
				region: '',
				postal_code: billingData.postcode,
				city: billingData.city,
				street_address: billingData.address_1,
				street_address2: billingData.address_2,
				organization_name: '',
			},
		};

		try {
			window.Klarna.Payments.authorize(
				address,
				{
					payment_method_category: method,
				},
				( response ) => {
					authorizationResponse = response;
					$defer.resolve( response );
				}
			);
		} catch ( e ) {
			console.log( e );
		}

		return $defer.promise();
	};

	useEffect( () => {
		if ( ! isSetOnCheckoutSuccess ) {
			onCheckoutAfterProcessingWithError(
				( processingResponseErrData ) => {
					console.error( processingResponseErrData );
				}
			);
			setIsSetOnCheckoutError( true );
		}
	}, [ isSetOnCheckoutError ] );
	useEffect( () => {
		if ( ! isSetOnCheckoutSuccess ) {
			onCheckoutAfterProcessingWithSuccess(
				( processingResponseData ) => {
					const {
						orderId,
						processingResponse,
					} = processingResponseData;
					const {
						paymentDetails,
						paymentStatus,
					} = processingResponse;

					authorizeKlarnaOrder( orderId );
				}
			);
			setIsSetOnCheckoutSuccess( true );
		}
	}, [ isSetOnCheckoutSuccess ] );
	useEffect( () => {
		if ( shouldCallLoad ) {
			loadKP();
			setShouldCallLoad( false );
		}
	}, [ shouldCallLoad ] );

	useEffect( () => {
		if ( ! isSetOnCheckoutBeforeProcessing ) {
			onCheckoutBeforeProcessing( ( data ) => {} );
			setIsOnCheckoutBeforeProcessing( true );
		}
	}, [ isSetOnCheckoutBeforeProcessing ] );
	return (
		<div id={ id }>
			<ClientToken />
		</div>
	);
};

export default PaymentMethod;
