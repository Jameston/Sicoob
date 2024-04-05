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
    Loading
  }
};
</script>

<style>
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
</style>
