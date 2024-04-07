<template>
  <Form url="/api/produto/unidade-medidas/update" v-if="!loader" :unidade="unidade" />
</template>

<script>
import Form from "./Form.vue";
import UnidadeMixin from "@/modules/Unidade/mixins";

export default {
  name: "app-unidade-update",
  mixins: [UnidadeMixin],
  data() {
    return {
      unidade: {},
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

        const unidade = await this.getUnidadeCodigo(codigo);

        if (!unidade.id_uni_medida || unidade == null) {
          return this.$toast.error("Unidade de Medida não encontrado!");
        }

        this.unidade = await unidade;
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
