export default {
  data() {
    return {
      grupo: []
    };
  },
  methods: {
    async getGrupo(id) {
      const { data } = await this.$http.get("/api/produto/grupos/find", {
        id_produto_grupo: id
      });
      this.grupo = data;
    },
    async getGrupoNome(nome) {
      const { data } = await this.$http.post("/api/produto/grupos/nome", {
        nome
      });
      return data;
    },
    async getGrupoCodigo(codigo) {
      const { data } = await this.$http.post("/api/produto/grupos/codigo", {
        codigo
      });
      return data;
    }
  }
};
