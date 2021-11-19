/**
 * External dependencies
 */
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import { getKPServerData } from '../kp-utils/utils';

const KPLabel = ( props ) => {
	const { hideWhatIsKlarna } = getKPServerData();

	const labelStyle = {
		display: 'flex',
		justifyContent: 'space-between',
		width: '90%',
	};

	// eslint-disable-next-line @wordpress/i18n-no-variables
	const labelText = __(
		`${ props.text }`,
		'klarna-payments-for-woocommerce'
	);

	const whatIsKlarna = ( e ) => {
		e.preventDefault();
		window.open(
			'https://www.klarna.com',
			'WIKlarna',
			'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'
		);
		return false;
	};
	return (
		<div style={ labelStyle }>
			<div>{ labelText }</div>

			<div id="wc-kp-payment">
				{ hideWhatIsKlarna === 'no' && (
					<div>
						<a
							className="hide-kp-link"
							onClick={ whatIsKlarna }
							href="https://www.klarna.com"
						>
							{ __(
								'What is Klarna?',
								'klarna-payments-for-woocommerce'
							) }
						</a>
					</div>
				) }

				<div>
					<img src={ props.src } alt={ props.text } />
				</div>
			</div>
		</div>
	);
};

export default KPLabel;
