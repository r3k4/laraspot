
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
// Vue.component('alert', require('./components/Alert.vue'));

Vue.component('hotspot-users', require('./components/user_hotspot/UserHotspot.vue'));


// halaman depan
Vue.component('hotspot-most-active-users-this-month', require('./components/home/MostActiveUserThisMonth.vue'));
Vue.component('hotspot-top-user-online-this-month', require('./components/home/TopUserOnlineThisMonth.vue'));




Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);


// default
Vue.component('default-alert', require('./components/default/Alert.vue'));
Vue.component('default-modal', require('./components/default/Modal.vue'));


const app = new Vue({
    el: '#app'
});
