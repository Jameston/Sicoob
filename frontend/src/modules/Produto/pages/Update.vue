<template>
  <Form url="/api/produto/update" v-if="!loader" :produto="produto" />
</template>

<script>
import Form from "./Form.vue";
import ProdutoMixin from "@/modules/Produto/mixins";

export default {
  name: "app-produto-update",
  mixins: [ProdutoMixin],
  data() {
    return {
      produto: {},
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

        const produto = await this.getProdutoCodigo(codigo);

        if (!produto.id_produto || produto == null) {
          return this.$toast.error("Produto não encontrado!");
        }

        this.produto = await produto;
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
