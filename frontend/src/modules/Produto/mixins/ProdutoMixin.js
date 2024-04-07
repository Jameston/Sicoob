export default {
  data() {
    return {
      produto: []
    };
  },
  methods: {
    async getProduto(id) {
      const { data } = await this.$http.get("/api/produto/find", {
        id_produto: id
      });
      this.produto = data;
    },
    async getProdutoNome(nome) {
      const { data } = await this.$http.post("/api/produto/nome", {
        nome
      });
      return data;
    },
    async getProdutoCodigo(codigo) {
      const { data } = await this.$http.post("/api/produto/codigo", {
        codigo
      });
      return data;
    },
    async getGrupoProduto() {
      const { data } = await this.$http.post("/api/produto/grupos/all");
      return data;
    },
    async getUnidadeProduto() {
      const { data } = await this.$http.post("/api/produto/unidade-medidas/all");
      return data;
    },
  }
};
