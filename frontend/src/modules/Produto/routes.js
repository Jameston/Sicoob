export default [
  {
    path: "/produtos",
    component: () => import("@/components/Layout/LayoutAuth.vue"),
    children: [
      {
        name: "produtoLista",
        path: "",
        component: () => import("@/modules/Produto/pages/Index"),
        meta: { modulo: "Produtos", id_tipo: 1 }
      },
      {
        name: "produtoNova",
        path: "novo",
        component: () => import("@/modules/Produto/pages/Create"),
        meta: { modulo: "Cadatro de Produto", id_tipo: 1 }
      },
      {
        name: "produtoEditar",
        path: ":codigo/editar",
        component: () => import("@/modules/Produto/pages/Update"),
        meta: { modulo: "Editar Produto", id_tipo: 1 }
      }
    ]
  }
];
