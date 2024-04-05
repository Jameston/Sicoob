<template>
  <div v-if="isLoading" :class="{ 'overlay-loader': overlay }">
    <img
      src="/assets/images/loading.gif"
      class="light-logo"
      alt="Sicoob loading gif"
    />
  </div>
</template>

<script lang="ts">
export default {
  name: "ComponentLoading",
  props: {
    isLoading: {
      default: false,
    },
    overlay: { type: Boolean, default: true },
  },
};
</script>

<style lang="scss">
.light-logo {
  width: 80px !important;
}
.overlay-loader {
  position: fixed;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.1);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 100;
}
</style>
