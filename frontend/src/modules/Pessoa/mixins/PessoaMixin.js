export default {
  data() {
    return {
      pessoa: []
    };
  },
  methods: {
    async getPessoa(id) {
      const { data } = await this.$http.get("/api/pessoa/find", {
        id_pessoa: id
      });
      this.pessoa = data;
    },
    async getPessoaNome(nome) {
      const { data } = await this.$http.post("/api/pessoa/nome", {
        nome
      });
      return data;
    },
    async getPessoaCodigo(codigo) {
      const { data } = await this.$http.post("/api/pessoa/codigo", {
        codigo
      });
      return data;
    },
    async getTipoPessoa() {
      const { data } = await this.$http.post("/api/pessoa/tipo");
      return data;
    },
  }
};
