export default {
  data() {
    return {
      grupo: []
    };
  },
  methods: {
    async getPessoa(id) {
      const { data } = await this.$http.get("/grupo/find", {
        id_grupo: id
      });
      this.grupo = data;
    },
    async getPessoaNome(nome) {
      const { data } = await this.$http.post("/grupo/nome", {
        nome
      });
      return data;
    },
    async getPessoaCodigo(codigo) {
      const { data } = await this.$http.post("/grupo/codigo", {
        codigo
      });
      return data;
    }
  }
};
