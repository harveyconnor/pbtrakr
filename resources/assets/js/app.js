
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('sweetalert');
require('slug');
var modal = require('vue-strap/src/Modal.vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('country', require('./components/Country.vue'));
Vue.component('results-create', require('./components/Results/Create.vue'));
Vue.component('results-index', require('./components/Results/Index.vue'));
// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('content');

const app = new Vue({
    el: '#app',
    components: {
        modal: modal
    }
});
