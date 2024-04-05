export default {
  data() {
    return {
      produto: []
    };
  },
  methods: {
    async getPessoa(id) {
      const { data } = await this.$http.get("/produto/find", {
        id_produto: id
      });
      this.produto = data;
    },
    async getPessoaNome(nome) {
      const { data } = await this.$http.post("/produto/nome", {
        nome
      });
      return data;
    },
    async getPessoaCodigo(codigo) {
      const { data } = await this.$http.post("/produto/codigo", {
        codigo
      });
      return data;
    }
  }
};
