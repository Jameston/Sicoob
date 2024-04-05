<template>
  <Form url="/unidade/create" :unidade="{}" />
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
