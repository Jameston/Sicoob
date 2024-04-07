import { required } from "vuelidate/lib/validators";

export default class PessoaData {
  descricao = "";
  preco = "";
  status = true;
  quantidade = "";
  id_uni_medida = "";
  id_produto_grupo = "";

  constructor({
    descricao = "",
    preco = "",
    status = true,
    quantidade = "",
    id_uni_medida = "",
    id_produto_grupo = "",
  }) {
    this.descricao = descricao;
    this.preco = preco;
    this.status = status;
    this.quantidade = quantidade;
    this.id_uni_medida = id_uni_medida;
    this.id_produto_grupo = id_produto_grupo;
  }
}

export const ProdutoDataRequired = {
  descricao: {
    required
  },
  preco: {
    required
  }
};
