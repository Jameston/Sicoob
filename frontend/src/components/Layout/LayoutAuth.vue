<template>
  <transition name="fade-in-up">
    <div class="content-wrapper">
      <nav
        class="main-header navbar navbar-expand-md navbar-light navbar-white"
      >
        <div class="container">
          <a href="/#/" class="navbar-brand">
            <img
              src="/assets/images/logo.png"
              alt="Logo"
              class="brand-image"
              style="opacity: 0.8"
            />
          </a>
          <button
            class="navbar-toggler order-1"
            type="button"
            data-toggle="collapse"
            data-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="/#/clientes" class="nav-link">Clientes</a>
              </li>
              <li class="nav-item">
                <a href="/#/produtos" class="nav-link">Produtos</a>
              </li>
              <li class="nav-item">
                <a href="/#/grupos" class="nav-link">Grupos</a>
              </li>
              <li class="nav-item">
                <a href="/#/unidade-de-medida" class="nav-link"
                  >Unidade de medida</a
                >
              </li>
            </ul>
          </div>
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
              <a href="/#/login" class="nav-link">Sair</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">
                <small>{{ modulo != null ? modulo : "Sicoob" }}</small>
              </h1>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container">
          <router-view></router-view>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
import { VERIFY_AUTH } from "@/core/services/store/auth.module";

export default {
  name: "LayoutAuth",
  data() {
    return {
      modulo: null,
    };
  },
  methods: {
    setTitle() {
      const router = this.$router.history.current;
      this.modulo = router.meta?.modulo ?? null;
    },
  },
  updated() {
    this.setTitle();
  },
  async mounted() {
    this.setTitle();
    this.$root.isLoading = true;
    await this.$store.dispatch(VERIFY_AUTH);
    this.$root.isLoading = false;
  },
};
</script>
