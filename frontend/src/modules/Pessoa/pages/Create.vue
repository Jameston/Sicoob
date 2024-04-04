<template>
  <Form url="/pessoa/create" :pessoa="{}" />
</template>

<script>
import Form from "./Form.vue";
import { SET_BREADCRUMB } from "@/core/services/store/breadcrumbs.module";

export default {
  name: "app-pessoa-create",
  components: {
    Form
  },
  mounted() {
    this.$store.dispatch(SET_BREADCRUMB, [
      {
        title: "Clientes"
      }
    ]);
  }
};
</script>
