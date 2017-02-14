class Radcheck {

	findBy(username)
	{
       return axios.get('/api/hotspot_users/findBy/'+username);
	}

    getAll(url)
    {
        if(url == '' || url == null){
            url = '/api/hotspot_users/';
        }

        return axios.get(url);        
    }

    getBy(search_value)
    {
        return axios.get('/api/hotspot_users?search='+search_value);
    }

}
export default Radcheck;