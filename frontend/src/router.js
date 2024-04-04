// @ts-nocheck
/* eslint-disable */

import Vue from "vue";
import Router from "vue-router";
import LoginRouter from "@/modules/Login";
import PessoaRouter from "@/modules/Pessoa";
import SistemaRouter from "@/modules/Sistema";

Vue.use(Router);

export default new Router({
  routes: [
    ...LoginRouter,
    ...PessoaRouter,
    ...SistemaRouter,
    {
      path: "*",
      redirect: "/404",
    },
    {
      path: "/",
      redirect: "/clientes",
    },
  ],
});
