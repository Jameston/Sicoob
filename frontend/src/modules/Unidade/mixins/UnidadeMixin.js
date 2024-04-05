export default {
  data() {
    return {
      unidade: []
    };
  },
  methods: {
    async getPessoa(id) {
      const { data } = await this.$http.get("/unidade/find", {
        id_unidade: id
      });
      this.unidade = data;
    },
    async getPessoaNome(nome) {
      const { data } = await this.$http.post("/unidade/nome", {
        nome
      });
      return data;
    },
    async getPessoaCodigo(codigo) {
      const { data } = await this.$http.post("/unidade/codigo", {
        codigo
      });
      return data;
    }
  }
};
