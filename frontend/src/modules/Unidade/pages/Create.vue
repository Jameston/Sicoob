<template>
  <Form url="/api/produto/unidade-medidas/create" :unidade="null" />
</template>

<script>
import Form from "./Form.vue";

export default {
  name: "app-unidade-create",
  components: {
    Form
  },
};
</script>
