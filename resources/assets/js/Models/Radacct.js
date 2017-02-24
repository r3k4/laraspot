class Radacct {

	/**
	 * ambil data user yg paling aktif selama 1bln terakhir
	 * @return {[type]} [description]
	 */
	getMostActiveUserThisMonth(){
		return axios.get('/api/hotspot_users/getMostActiveUserThisMonth');
	}

	getMostUserOnlineThisMonth(){
		return axios.get('/api/hotspot_users/getMostUserOnlineThisMonth');
	}


}

export default Radacct;