import Vue from 'vue'
import VueToast from "vue-toast-notification";
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
import "vue-toast-notification/dist/theme-default.css";
import "@/core/plugins/bootstrap-vue";
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import App from './App.vue'
import router from "./router";
import store from "@/core/services/store";
import { http } from "@/core/services/api.service";

Vue.config.productionTip = false;

Vue.prototype.$http = http;

Vue.use(VueToast);
Vue.use(VueSweetalert2);

new Vue({
  router,
  store,
  render: h => h(App),
  data() {
    return {
      isLoading: false
    }
  }
}).$mount('#app')
