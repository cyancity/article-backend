require('./bootstrap');

// import VueRouter from 'vue-router';
// import routes from './routes'
window.Vue = require('vue');
// Vue.use(VueRouter)

// const router = new VueRouter({
//     routes
// })


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//
// Vue.component('pagination', require('./components/Pagination.vue'));
// Vue.component('sidebar', require('./components/Sidebar.vue'));
Vue.component('dropdown-menu',require('./components/DropdownMenu.vue'));

const app = new Vue({
    el: '#mob'
});

require('./custom');

