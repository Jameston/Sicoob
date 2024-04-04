import { required } from "vuelidate/lib/validators";

export default class PessoaEnderecoData {
  cep = "";

  logradouro = "";

  numero = "";

  complemento = "";

  bairro = "";

  id_cidade = null;

  id_tipo = 1;

  constructor({
    cep = "",
    logradouro = "",
    numero = "",
    complemento = "",
    bairro = "",
    id_cidade = null,
    id_tipo = ""
  }) {
    this.cep = cep;
    this.logradouro = logradouro;
    this.numero = numero;
    this.complemento = complemento;
    this.bairro = bairro;
    this.id_cidade = id_cidade;
    this.id_tipo = id_tipo;
  }
}

export const PessoaEnderecoDataRequired = {
  cep: {
    required
  }
};
