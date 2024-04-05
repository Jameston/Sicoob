<template>
  <div class="vld-parent">
    <loading
      :active.sync="isLoading"
      :can-cancel="false"
      loader="dots"
      :on-cancel="onCancel"
      color="#0069b4"
      background-color="#E9ECF1"
      :opacity="0.3"
      :is-full-page="fullPage"
    >
    </loading>
  </div>
</template>

<script>
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

export default {
  name: 'ComponentLoading',
  data() {
    return {
      isLoading: true,
      fullPage: true
    };
  },
  props: {
    active: {
      type: Boolean,
      default: false
    }
  },
  components: {
    Loading
  },
  watch: {
    active(newValue, oldValue) {
      if (newValue !== oldValue) {
        this.isLoading = newValue;
      }
    }
  },
  methods: {
    onCancel() {}
  }
};
</script>
