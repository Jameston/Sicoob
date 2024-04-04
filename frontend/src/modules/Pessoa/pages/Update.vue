<template>
  <Form url="/pessoa/update" v-if="!loader" :pessoa="pessoa" />
</template>

<script>
import Form from "./Form.vue";
import { SET_BREADCRUMB } from "@/core/services/store/breadcrumbs.module";
import { PessoaMixin } from "@/modules/Application";

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

        const pessoa = await this.getPessoaCodigo(codigo);

        if (!pessoa.id_pessoa || pessoa == null) {
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
    this.$store.dispatch(SET_BREADCRUMB, [
      {
        title: "Pessoas"
      }
    ]);
    this.getInit();
  }
};
</script>
