class Radcheck {

    /**
     * get single record by username
     */
	findBy(username)
	{
       return axios.get('/api/hotspot_users/findBy/'+username);
	}

    /**
     * get all users with pagination
     */
    getAll(url)
    {
        if(url == '' || url == null){
            url = '/api/hotspot_users/';
        }

        return axios.get(url);        
    }

    /**
     * get user with search parameter
     */
    getBy(search_value)
    {
        return axios.get('/api/hotspot_users?search='+search_value);
    }

}
export default Radcheck;