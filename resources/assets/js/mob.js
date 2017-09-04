require('./bootstrap');

window.Vue = require('vue')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//
Vue.component('pagination', require('./components/Pagination.vue'));
Vue.component('dropdown',require('./components/DropdownMenu.vue'));
Vue.component('tab', require('./components/Tab.vue'));
Vue.component('tab-bar', require('./components/Tabbar.vue'));

import VueRouter from 'vue-router'

Vue.use(VueRouter);

const routes = [
    {path: '/:id',component: require('./components/Pagination.vue')},
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    router,
    el: '#mob'
});

require('./custom');

