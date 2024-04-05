<template>
  <Form url="/grupo/create" :grupo="{}" />
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
