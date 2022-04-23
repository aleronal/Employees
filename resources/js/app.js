require('./bootstrap');
import VueRouter from 'vue-router';
import { routes } from './routes';
import VueTabulator from 'vue-tabulator';

window.Vue = require('vue').default;

Vue.use(VueRouter);
Vue.use(VueTabulator);

Vue.component('employees-email', require('./components/emails/Emails.vue').default);



const router = new VueRouter({
    mode:'history',
    routes: routes
})
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: router
});
