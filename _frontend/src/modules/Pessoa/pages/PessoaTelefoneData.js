import { required } from "vuelidate/lib/validators";

export default class PessoaTelefoneData {
  id_tipo_fone = 1;

  descricao = "Telefone";

  telefone = "";

  constructor({ id_tipo_fone = 1, descricao = "Telefone", telefone = "" }) {
    this.id_tipo_fone = id_tipo_fone;
    this.descricao = descricao;
    this.telefone = telefone;
  }
}

export const PessoaTelefoneDataRequired = {
  telefone: {
    required
  },
  tipo: {
    required
  }
};
