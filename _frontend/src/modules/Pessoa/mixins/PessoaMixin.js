export default {
  data() {
    return {
      pessoa: []
    };
  },
  methods: {
    async getPessoa(id) {
      const { data } = await this.$http.get("/pessoa/find", {
        id_pessoa: id
      });
      this.pessoa = data;
    },
    async getPessoaNome(nome) {
      const { data } = await this.$http.post("/pessoa/nome", {
        nome
      });
      return data;
    },
    async getPessoaCodigo(codigo) {
      const { data } = await this.$http.post("/pessoa/codigo", {
        codigo
      });
      return data;
    }
  }
};
