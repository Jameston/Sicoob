export default [
  {
    path: "/clientes",
    component: () => import("@/components/Layout/VueBootstrap.vue"),
    children: [
      {
        name: "pessoaLista",
        path: "",
        component: () => import("@/modules/Pessoa/pages/Index"),
        meta: { menu: "Cadastros", id_tipo: 1 }
      },
      {
        name: "pessoaNova",
        path: "nova",
        component: () => import("@/modules/Pessoa/pages/Create"),
        meta: { menu: "Cadastros", id_tipo: 1 }
      },
      {
        name: "pessoaEditar",
        path: ":codigo/editar",
        component: () => import("@/modules/Pessoa/pages/Update"),
        meta: { menu: "Cadastros", id_tipo: 1 }
      }
    ]
  }
];
