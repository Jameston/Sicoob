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
import { VERIFY_AUTH } from "@/core/services/store/auth.module";

const routesNotAuth = ["register", "login"];

router.beforeEach((to, from, next) => {
  if (routesNotAuth.indexOf(from.name) == "-1") {
    store.dispatch(VERIFY_AUTH).then(() => {
      return next;
    });
  }
  next();
  setTimeout(() => {
    window.scrollTo(0, 0);
  }, 100);
});

Vue.config.productionTip = false;

Vue.prototype.$http = http;

Vue.use(VueToast);
Vue.use(VueSweetalert2);

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
