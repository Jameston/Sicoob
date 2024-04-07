<template>
  <Form url="/api/produto/create" :produto="null" />
</template>

<script>
import Form from "./Form.vue";

export default {
  name: "app-produto-create",
  components: {
    Form
  },
};
</script>
