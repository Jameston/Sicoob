import { required } from "vuelidate/lib/validators";

export default class GrupoData {
  descricao = "";
  status = true;
  constructor({
    descricao = "",
    status = true,
  }) {
    this.descricao = descricao;
    this.status = status;
  }
}

export const GrupoDataRequired = {
  descrica: {
    required
  }
};
