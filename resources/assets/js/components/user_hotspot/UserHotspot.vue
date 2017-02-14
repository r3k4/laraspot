<template>
 
 <div class="container animated fadeIn">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        <hotspot-user-detail v-bind:dataUser="dataUser"></hotspot-user-detail>


        <default-alert v-if="success_msg">
            <i style="cursor:pointer;" class="fa fa-times pull-right" @click="success_msg = false"></i>
            msg
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
                    <user-hotspot-search   @pressEnter="searchUsers()" v-model="search_value" @search="searchUsers" @reset="fetchUser(null)"></user-hotspot-search>
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
Vue.component('user-hotspot-search', require('./komponen/search.vue'));


import Radcheck from "../../Models/Radcheck.js";

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
                $('#default-modal').appendTo("body").modal('show');
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
