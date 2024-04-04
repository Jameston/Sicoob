// @ts-nocheck
/* eslint-disable */

import Vue from "vue";
import Router from "vue-router";
import Pessoa from "@/modules/Pessoa";
import Configuracoes from "@/modules/Configuracoes";
import Renovacoes from "@/modules/Renovacoes";

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: "/",
      redirect: "/renovacoes",
      component: () => import("@/view/layout/Layout"),
      children: [...Configuracoes, ...Renovacoes],
    },
    ...Pessoa,
    {
      path: "/permissao-negada",
      name: "permissaoNegada",
      component: () => import("@/view/pages/error/Error-6.vue"),
    },
    {
      path: "*",
      redirect: "/404",
    },
    {
      path: "/404",
      name: "404",
      component: () => import("@/view/pages/error/Error-1.vue"),
    },
  ],
});
