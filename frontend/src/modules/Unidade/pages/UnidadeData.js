import { required } from "vuelidate/lib/validators";

export default class PessoaData {
  descricao = "";
  unidade = "";
  status = true;
  
  constructor({
    descricao = "",
    unidade = "",
    status = true,
  }) {
    this.descricao = descricao;
    this.unidade = unidade;
    this.status = status;
  }
}

export const PessoaDataRequired = {
  descricao: {
    required
  },
  unidade: {
    required
  }
};
