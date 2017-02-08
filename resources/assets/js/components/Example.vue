<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        
                    <table>
                        <tr>
                            <td width="150px">
                                Nama
                            </td>
                            <td width="10px">:</td>
                            <td>{{ nama }}</td>
                        </tr>
                        <tr>
                            <td width="150px">
                                Level
                            </td>
                            <td width="10px">:</td>
                            <td>{{ level }}</td>
                        </tr>

                    </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.fetchUser();
            console.log('Component mounted.')
        },
        data() {
            return {
                nama : "",
                level : ""
            }
        },
        methods: {

            fetchUser(){
                    axios.get('/api/user')
                            .then(response => {
                                this.nama = response.data.fk__mst_data_user;
                                this.level = response.data.ref_user_level_id;
                                // this.clients = response.data;
                            });
                // axios.get('/api/user')
                //   .then(function (response) {
                //     console.log(response);
                //   })
                //   .catch(function (error) {
                //     console.log(error);
                //   });                    
            }

        }
    }
</script>
