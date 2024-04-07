export default {
  data() {
    return {
      unidade: []
    };
  },
  methods: {
    async getUnidade(id) {
      const { data } = await this.$http.get("/api/produto/unidade-medidas/find", {
        id_unidade: id
      });
      this.unidade = data;
    },
    async getUnidadeNome(nome) {
      const { data } = await this.$http.post("/api/produto/unidade-medidas/nome", {
        nome
      });
      return data;
    },
    async getUnidadeCodigo(codigo) {
      const { data } = await this.$http.post("/api/produto/unidade-medidas/codigo", {
        codigo
      });
      return data;
    }
  }
};
