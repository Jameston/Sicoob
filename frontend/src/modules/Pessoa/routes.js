export default [
  {
    path: "/clientes",
    component: () => import("@/view/pages/vue-bootstrap/VueBootstrap.vue"),
    children: [
      {
        name: "pessoaLista",
        path: "",
        component: () => import("@/modules/Pessoa/pages/Index"),
        meta: { menu: "Cadastros", interno: true }
      },
      {
        name: "pessoaNova",
        path: "nova",
        component: () => import("@/modules/Pessoa/pages/Create"),
        meta: { menu: "Cadastros", interno: true }
      },
      {
        name: "pessoaEditar",
        path: ":codigo/editar",
        component: () => import("@/modules/Pessoa/pages/Update"),
        meta: { menu: "Cadastros", interno: true }
      }
    ]
  }
];
