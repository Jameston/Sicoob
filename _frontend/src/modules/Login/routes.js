export default [
  {
    path: "/login",
    component: () => import("@/components/Layout/VueBootstrap.vue"),
    children: [
      {
        name: "login",
        path: "",
        component: () => import("@/modules/Login/pages/Index"),
        meta: { menu: "Login", id_tipo: 1 }
      },
    ]
  }
];
