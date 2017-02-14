<template>
 
 <div class="container animated fadeIn">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        <hotspot-user-detail v-bind:idModal="idModal" v-bind:dataUser="dataUser"></hotspot-user-detail>

 
        <default-alert v-if="success_msg">
            <i style="cursor:pointer;" class="fa fa-times pull-right" @click="success_msg = false"></i>
            msg
        </default-alert>


            <div class="panel panel-default">
                <div class="panel-heading"> 

                    <span class="pull-right">
                        Total : {{ users.total }}
                    </span>
  
                    <h3>
                        <i class="fa fa-th-list"></i> User Profile
                    </h3> 
                </div>

               <div class="panel-body">      
                   
                   <!-- search -->
                      <div class="row">
                        <i v-show="showLoader" class="fa fa-refresh fa-spin fa-2x pull-left"></i>
                           <div class="col-md-7 col-md-offset-2">
                                <input type="text" class="form-control" placeholder="search..." name="search" @keydown.13="searchUsers()" v-model="search_value">                
                           </div>
                           <div class="col-md-2">
                                <button @click="searchUsers" class="btn btn-info pull-right">
                                    <i class="fa fa-search"></i> Search 
                                </button>               
                                <button  v-show="search_value!=''" class="btn btn-danger pull-right" @click="fetchUser(null)">
                                    <i class="fa fa-times"></i>  
                                </button>     
                           </div>
                    </div> 
                    <!-- end of search -->



                        <hr>

                    <user-hotspot-list-data @getDetail="showDetail" v-bind:users="users" v-bind:Fungsi="Fungsi"></user-hotspot-list-data>

                         
                    <user-hotspot-pagination @getPrevPage="fetchUser(users.prev_page_url)" @getNextPage="fetchUser(users.next_page_url)" v-bind:users="users"></user-hotspot-pagination>   
 
                </div>
            </div>
        </div>
    </div>
 
</div>
 
</template>

<script>
Vue.component('hotspot-user-detail', require('./popup/hotspotUserDetail.vue'));
Vue.component('user-hotspot-pagination', require('./komponen/pagination.vue'));
Vue.component('user-hotspot-list-data', require('./listData.vue'));
 

import Radcheck from "../../Models/Radcheck.js";

    export default {
        mounted() {            
            this.fetchUser();
            // console.log('User Hotspot Component mounted.')
        },
        data() {
            return {
                idModal : 'idModal',
                idModal2 : '',
                form : new Form({ nama : '' }),
                success_msg : false,
                showLoader : false,
                Fungsi : new Fungsi,
                Radcheck : new Radcheck,
                search_value : "",
                users : [],
                dataUser: [],
                users_total : 0
            }
        },
        methods: {

            onSubmit(){
                this.form.post('/api/hotspot_users/create')
                .then(success_msg => swal('done'))
                 .catch(function (error) {
                    console.log(error);
                 });                 
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
                this.Radcheck.getBy(this.search_value)
                    .then(response => {
                        this.users = response.data;
                        this.showLoader = false;
                 })
                 .catch(function (error) {
                    console.log(error);
                 });                             
            },
            fetchUser(url){
                this.showLoader = true;
                this.users = this.Radcheck.getAll(url)
                        .then(response => {
                            this.showLoader = false;
                            this.search_value = '';
                            this.users = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });                  
            },
            showDetail(username){
                $('#idModal').appendTo("body").modal('show');
                this.Radcheck.findBy(username).then(response => {
                    this.dataUser = response.data;
                    // console.log(response.data);
                });
                
                // this.dataUser = Radcheck.findBy(username);
            }

        }, //methods
        props: [
            // 'modalTitle'
        ]
    }
</script>
