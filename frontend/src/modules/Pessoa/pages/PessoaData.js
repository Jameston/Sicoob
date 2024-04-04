import { required } from "vuelidate/lib/validators";

export default class PessoaData {
  nome = "";

  responsavel = "";

  status = "A";

  observacao = "";

  cnpj_cpf = "";

  ie_rg = "";

  inscricao_municipal = "";

  nome_fantasia = "";

  id_empresa = 1;

  id_pessoa_tipo = 1;

  email = [];

  endereco = [];

  telefone = [];

  constructor({
    nome = "",
    responsavel = "",
    status = "A",
    observacao = "",
    cnpj_cpf = "",
    ie_rg = "",
    inscricao_municipal = "",
    nome_fantasia = "",
    id_empresa = 1,
    id_pessoa_tipo = 1,
    email = [],
    endereco = [],
    telefone = []
  }) {
    this.nome = nome;
    this.responsavel = responsavel;
    this.status = status;
    this.observacao = observacao;
    this.cnpj_cpf = cnpj_cpf;
    this.ie_rg = ie_rg;
    this.inscricao_municipal = inscricao_municipal;
    this.nome_fantasia = nome_fantasia;
    this.id_empresa = id_empresa;
    this.id_pessoa_tipo = id_pessoa_tipo;
    this.email = email;
    this.endereco = endereco;
    this.telefone = telefone;
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
