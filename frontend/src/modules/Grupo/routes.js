export default [
  {
    path: "/grupos",
    component: () => import("@/components/Layout/LayoutAuth.vue"),
    children: [
      {
        name: "grupoLista",
        path: "",
        component: () => import("@/modules/Grupo/pages/Index"),
        meta: { modulo: "Grupos", id_tipo: 1 }
      },
      {
        name: "grupoNova",
        path: "nova",
        component: () => import("@/modules/Grupo/pages/Create"),
        meta: { modulo: "Cadastro de Grupo", id_tipo: 1 }
      },
      {
        name: "grupoEditar",
        path: ":codigo/editar",
        component: () => import("@/modules/Grupo/pages/Update"),
        meta: { modulo: "Editar Grupo", id_tipo: 1 }
      }
    ]
  }
];
