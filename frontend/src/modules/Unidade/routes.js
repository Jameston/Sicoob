export default [
  {
    path: "/unidade-de-medida",
    component: () => import("@/components/Layout/LayoutAuth.vue"),
    children: [
      {
        name: "unidadeLista",
        path: "",
        component: () => import("@/modules/Unidade/pages/Index"),
        meta: { modulo: "Unidades", id_tipo: 1 }
      },
      {
        name: "unidadeNova",
        path: "nova",
        component: () => import("@/modules/Unidade/pages/Create"),
        meta: { modulo: "Unidades", id_tipo: 1 }
      },
      {
        name: "unidadeEditar",
        path: ":codigo/editar",
        component: () => import("@/modules/Unidade/pages/Update"),
        meta: { modulo: "Unidades", id_tipo: 1 }
      }
    ]
  }
];
