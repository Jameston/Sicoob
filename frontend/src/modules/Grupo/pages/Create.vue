<template>
  <Form url="/api/produto/grupos/create" :grupo="null" />
</template>

<script>
import Form from "./Form.vue";

export default {
  name: "app-grupo-create",
  components: {
    Form
  },
};
</script>


