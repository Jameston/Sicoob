<template>
  <Form url="/api/pessoa/create" :pessoa="null" />
</template>

<script>
import Form from "./Form.vue";

export default {
  name: "app-pessoa-create",
  components: {
    Form
  },
};
</script>
