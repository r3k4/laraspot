<template>
 
 <div class="container animated fadeIn">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

    <default-modal>
        <form @submit.prevent="onSubmit">
            <div class="form-group">
                <input type="text" v-model="form.nama" class="form-control" placeholder="nama...">
            </div>   
            <button class="btn btn-info">
                submit
            </button>         
        </form>
    </default-modal>


        <default-alert v-if="success_msg">
            <i style="cursor:pointer;" class="fa fa-times pull-right" @click="success_msg = false"></i>
            d asdasd asdas
        </default-alert>


            <div class="panel panel-default">
                <div class="panel-heading"> 
                    <span class="pull-right">
                        Total : {{ users.total }}
                    </span>
                    <i v-show="showLoader" class="fa fa-refresh fa-spin fa-4x pull-right"></i>
                    <h3>
                        <i class="fa fa-th-list"></i> User Profile
                    </h3> 
                </div>

                <div class="panel-body">      
                            <div class="row">
                                   <div class="form-group col-md-7">
                                        <input type="text" class="form-control" placeholder="search..." name="search" @keydown.13="searchUsers()" v-model="search_value">                
                                   </div>
                                   <div class="form-group col-md-5">
                                        <button  v-show="search_value!=''" class="btn btn-danger pull-right" @click="fetchUser(null)">
                                            <i class="fa fa-refresh"></i> reset
                                        </button>            
                                        <button @click="searchUsers()" class="btn btn-info pull-right">
                                            <i class="fa fa-search"></i> Search
                                        </button>               
                                   </div>
                            </div> 
                        <hr>
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
                                <tr v-for="(user, index) in users.data">
                                        <td class="text-center">{{ users.from + index }} </td>
                                        <td>{{ user.nama }}</td>
                                        <td>{{ user.username }}</td>
                                        <td></td>
                                        <td>
                                            {{ Fungsi.size(user.c__total_usage) }}
                                        </td>
                                        <td class="text-center">-</td>
                                    </tr>
                                </tbody>
                            </table>  

                         
                        <nav aria-label="...">
                          <ul class="pager">
                            <li class="previous">
                                <a v-if="users.prev_page_url != null" 
                                   @click.prevent="fetchUser(users.prev_page_url)" 
                                   href="#">
                                    <i class="fa fa-arrow-left"></i> Previous
                                </a>
                            </li>
                            <li class="next">
                                <a v-if="users.next_page_url != null" 
                                   @click.prevent="fetchUser(users.next_page_url)" 
                                   href="#">
                                    Next <i class="fa fa-arrow-right"></i>
                                </a>
                            </li>
                          </ul>
                        </nav>    


    <button @click="showModal">
        modal
    </button>
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
            // console.log('User Hotspot Component mounted.')
        },
        data() {
            return {
                form : new Form({ nama : '' }),
                success_msg : false,
                showLoader : false,
                Fungsi : new Fungsi,
                search_value : "",
                users : [],
            }
        },
        methods: {

        onSubmit(){
            this.form.post('/api/hotspot_users/create').then(success_msg => swal('done'));
        },

        showModal(){
            $('#default-modal').appendTo("body").modal('show');
        },
        searchUsers(){
            this.showLoader = true;
            if(this.search_value == ''){
                this.showLoader = false;
                return false;
            } 
            axios.get('/api/hotspot_users?search='+this.search_value)
                .then(response => {
                    this.users = response.data;
                    this.showLoader = false;
             });            
        },
        fetchUser(url){
            this.showLoader = true;
            if(url == null || url == ''){
                var url = '/api/hotspot_users';
            } 
                axios.get(url)
                    .then(response => {
                        this.showLoader = false;
                        this.search_value = '';
                        this.users = response.data;
                    });
             
        }

        }
    }
</script>
