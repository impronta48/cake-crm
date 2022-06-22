import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueSweetalert2 from 'vue-sweetalert2';
import Notifications from 'vue-notification';
import { BootstrapVue, IconsPlugin} from 'bootstrap-vue'

import { routes } from './routes';
import App from './views/App.vue';
import Header from './components/Header.vue';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Vue.use(VueSweetalert2);
Vue.use(Notifications);

Vue.use(VueRouter);
Vue.component('app', App);

import vSelect from 'vue-select';
Vue.component('v-select', vSelect); 
import 'vue-select/dist/vue-select.css';

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

const app = new Vue({
  el: '#app',
  components: {
    App,
    'top-header': Header,
  },
  router: routes
});