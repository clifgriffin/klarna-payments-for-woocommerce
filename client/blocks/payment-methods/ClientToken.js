/**
 * Internal dependencies
 */
import { getKPServerData } from '../kp-utils/utils';

const { clientToken } = getKPServerData();
const ClientToken = () => {
	return <input type="hidden" value={ clientToken } />;
};

export default ClientToken;
