// @ts-nocheck
/* eslint-disable */

import Vue from "vue";
import Router from "vue-router";
import LoginRouter from "@/modules/Login";
import PessoaRouter from "@/modules/Pessoa";
import ProdutoRouter from "@/modules/Produto";
import GrupoRouter from "@/modules/Grupo";
import UnidadeRouter from "@/modules/Unidade";

Vue.use(Router);

export default new Router({
  routes: [
    ...LoginRouter,
    ...PessoaRouter,
    ...ProdutoRouter,
    ...GrupoRouter,
    ...UnidadeRouter,
    {
      path: "*",
      redirect: "/404",
    },
    {
      path: "/",
      redirect: "/clientes",
    },
    {
      path: "/produtos",
      redirect: "/produtos",
    },
    {
      path: "/grupos",
      redirect: "/grupos",
    },
    {
      path: "/unidade-de-medida",
      redirect: "/unidade-de-medida",
    },
  ],
});
