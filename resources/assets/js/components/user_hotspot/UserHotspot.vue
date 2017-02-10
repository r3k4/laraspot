<template>
 
 <div>
     

    <div class="row">
        <div class="col-md-5 col-md-offset-7">
            <input type="text" class="form-control" name="search" @keydown.13="searchUsers()" v-model="search_value">
        </div>
    </div> 

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-center" width="10px">No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Profile</th>
                <th>Usage</th>
                <th class="text-center" width="100px"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users.data">
                <td> </td>
                <td>{{ user.nama }}</td>
                <td>{{ user.username }}</td>
                <td>-</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>                        
 
 </div>
 
</template>

<script>
    export default {
        mounted() {
            this.fetchUser();
            // console.log('User Hotspot Component mounted.')
        },
        data() {
            return {
                search_value : "",
                users : [],
            }
        },
        methods: {
        searchUsers(){
                axios.get('/api/hotspot_users?search='+this.search_value)
                    .then(response => {
                        this.users = response.data;
                        // this.level = response.data.ref_user_level_id;
                        // this.users = response.data;
                    });            
        },
        fetchUser(){
                axios.get('/api/hotspot_users')
                    .then(response => {
                        this.users = response.data;
                        // this.level = response.data.ref_user_level_id;
                        // this.users = response.data;
                    });
             
        }

        }
    }
</script>
