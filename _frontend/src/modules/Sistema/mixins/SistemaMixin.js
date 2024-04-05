import axios from "axios";
import moment from "moment";

export default {
  methods: {
    async getTipoPessoa() {
      const { data } = await this.$http.post("/sistema/tipo/pessoa");
      return data;
    },
    async getUnidadeMedidas() {
      const { data } = await this.$http.get(
        "/produto/unidade-medidas?per_page=150"
      );
      return data.data;
    },
    async getGrupos() {
      const { data } = await this.$http.get("/grupos?per_page=150");
      return data.data;
    },
    async getCidade(filtro) {
      const { data } = await this.$http.post("/sistema/cidade", {
        filtro
      });
      return data;
    },
    async getCep(cep) {
      const { data } = await axios.post(
        "http://clippservice.com.br/api/correios/cep/consulta",
        {
          cep
        },
        {
          headers: {
            Accept: "application/json"
          }
        }
      );
      return data.status ? data.data : [];
    },
    numberToReal(valor, casas = 2) {
      var positivo = true;
      var sifrao = false;

      if (valor) {
        if (valor < 0) {
          positivo = false;
          valor = valor * -1;
        }

        var numero = parseFloat(valor);
        numero = numero.toFixed(casas).split(".");

        if (sifrao) {
          numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join(".");
        } else {
          numero[0] = numero[0].split(/(?=(?:...)*$)/).join(".");
        }

        if (positivo == false) {
          return "-" + numero.join(",");
        }

        return numero.join(",");
      }

      return "0,00";
    },
    formatDate(value, fmt = "DD/MM/YYYY ") {
      return value == null
        ? ""
        : moment(value, "YYYY-MM-DD HH:mm:ss").format(fmt);
    }
  }
};
