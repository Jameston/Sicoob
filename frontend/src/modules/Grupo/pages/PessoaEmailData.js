import { required, email } from "vuelidate/lib/validators";

export default class PessoaEmailData {
  tipo = {};

  id_tipo_email = 1;

  descricao = "E-mail";

  email = "";

  constructor({
    tipo = {},
    id_tipo_email = 1,
    descricao = "E-mail",
    email = ""
  }) {
    this.tipo = tipo;
    this.id_tipo_email = id_tipo_email;
    this.descricao = descricao;
    this.email = email;
  }
}

export const PessoaEmailRequired = {
  email: {
    required,
    email
  },
  tipo: {
    required
  }
};
