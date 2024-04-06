<template>
  <Form url="/api/pessoa/create" :pessoa="{}" />
</template>

<script>
import Form from "./FormCreate.vue";

export default {
  name: "app-pessoa-create",
  components: {
    Form
  },
};
</script>
