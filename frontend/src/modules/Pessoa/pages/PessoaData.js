import { required } from "vuelidate/lib/validators";

export default class PessoaData {
  nome = "";
  status = true;
  cnpj_cpf = "";
  ie_rg = "";
  id_pessoa_tipo = [];
  email = "";
  telefone = "";
  cep = "";
  logradouro = "";
  bairro = "";
  numero = "";
  cidade = "";
  complemento = "";

  constructor({
    nome = "",
    status = true,
    cnpj_cpf = "",
    ie_rg = "",
    id_pessoa_tipo = [],
    email = "",
    telefone = "",
    cep = "",
    logradouro = "",
    bairro = "",
    numero = "",
    cidade = "",
    complemento = "",
  }) {
    this.nome = nome;
    this.status = status;
    this.cnpj_cpf = cnpj_cpf;
    this.ie_rg = ie_rg;
    this.id_pessoa_tipo.id_pessoa_tipo = id_pessoa_tipo;
    this.email = email;
    this.telefone = telefone;
    this.cep = cep;
    this.logradouro = logradouro;
    this.bairro = bairro;
    this.numero = numero;
    this.cidade = cidade;
    this.complemento = complemento;

  }
}

export const PessoaDataRequired = {
  nome: {
    required
  },
  cnpj_cpf: {
    required
  }
};
