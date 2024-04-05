<template>
  <Form url="/pessoa/create" :pessoa="{}" />
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
