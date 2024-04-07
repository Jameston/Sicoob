<template>
  <Form url="/api/produto/grupos/update" v-if="!loader" :grupo="grupo" />
</template>

<script>
import Form from "./Form.vue";
import GrupoMixin from "@/modules/Grupo/mixins";

export default {
  name: "app-grupo-update",
  mixins: [GrupoMixin],
  data() {
    return {
      grupo: {},
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

        const grupo = await this.getGrupoCodigo(codigo);

        if (!grupo.id_produto_grupo || grupo == null) {
          return this.$toast.error("Grupo não encontrado!");
        }

        this.grupo = await grupo;
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
