import Vue from 'vue';
import App from './App.vue';
import Vue from 'vue'
import vuetify from '@/plugins/vuetify' // path to vuetify export
import 'vuetify/dist/vuetify.min.css';
import { config } from 'bluebird';
Vue.prototype.$http = axios;
Vue.config.productionTip = false;

new Vue({
    vuetify,
  }).$mount('#app')
