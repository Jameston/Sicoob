<template>
  <div id="app">
    <Loading :isLoading="$root.isLoading" />
    <router-view></router-view>
  </div>
</template>

<script>
import Loading from "@/components/Loading/Loading.vue";

export default {
  name: "App",
  components: {
    Loading,
  },
};
</script>

<style>
html,
body {
  height: 100%;
  margin: 0px;
  padding: 0px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  font-size: 13px !important;
  font-weight: 400;
  font-family: Roboto, Helvetica, "sans-serif";
}

.btn-primary {
  background-color: #00ae9d !important;
  border-color: #00ae9d !important;
}

.btn-primary:hover {
  background-color: #00e0ca !important;
  border-color: #00e0ca !important;
}

a {
  color: #00ae9d !important;
}

a:hover {
  color: #00e0ca !important;
}

.brand-image {
  height: 30px;
}

body {
  background-color: #ebeeee !important;
}

nav a,
.main-header .nav-link {
  color: #181c32 !important;
  font-weight: 300 !important;
  font-size: 14px !important;
  line-height: 1.5rem !important;
  margin-left: 1rem !important;
}

nav a:hover {
  color: #00ae9d !important;
}
</style>
