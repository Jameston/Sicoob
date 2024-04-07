export default [
  {
    path: "/clientes",
    component: () => import("@/components/Layout/LayoutAuth.vue"),
    children: [
      {
        name: "pessoaLista",
        path: "",
        component: () => import("@/modules/Pessoa/pages/Index"),
        meta: { modulo: "Pessoas", id_tipo: 1 }
      },
      {
        name: "pessoaNova",
        path: "nova",
        component: () => import("@/modules/Pessoa/pages/Create"),
        meta: { modulo: "Nova Pessoa", id_tipo: 1 }
      },
      {
        name: "pessoaEditar",
        path: ":codigo/editar",
        component: () => import("@/modules/Pessoa/pages/Update"),
        meta: { modulo: "Editar Pessoa", id_tipo: 1 }
      }
    ]
  }
];
