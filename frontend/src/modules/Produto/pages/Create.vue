<template>
  <Form url="/produto/create" :produto="{}" />
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
