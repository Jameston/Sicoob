<template>
  <Form url="/pessoa/update" v-if="!loader" :pessoa="pessoa" />
</template>

<script>
import Form from "./Form.vue";
import PessoaMixin from "../mixins/index";

export default {
  name: "app-pessoa-update",
  mixins: [PessoaMixin],
  data() {
    return {
      pessoa: {},
      loader: true
    };
  },
  components: {
    Form
  },
  methods: {
    async getInit() {
      try {
        const codigo = this.$route.params.codigo;

        const pessoa = this.getPessoaCodigo(codigo);
        if (!pessoa || pessoa == null) {
          return this.$toast.error("Cliente não encontrado!");
        }

        this.pessoa = await pessoa;
        this.loader = false;
      } catch (error) {
        console.log(error);
      }
    }
  },
  mounted() {
    this.getInit();
  }
};
</script>
