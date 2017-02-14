class Radcheck {

	findBy(username)
	{
        axios.get('/api/hotspot_users/findBy/'+username)
            .then(response => {
            	return response.data;
                // this.showLoader = false;
                // this.search_value = '';
                // this.users = response.data;
            });		
	}

}
export default Radcheck;