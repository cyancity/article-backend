require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('pagination', require('./components/Pagination.vue'));
Vue.component('sidebar', require('./components/Sidebar.vue'));

const app = new Vue({
    el: '#mob'
});

require('./default')
require('./scrolltopcontrol')

require('./pace.min')

require('./jquery.extend')