<template>
  <div>
    <div class="card card-custom gutter-b">
      <div class="card-header card-header-tabs-line">
        <ul class="nav nav-dark nav-bold nav-tabs nav-tabs-line" role="tablist" ref="builder-tab">
          <li class="nav-item">
            <a class="nav-link active" v-on:click="setActiveTab" data-tab="0" data-toggle="tab" href="#" role="tab">
              Cadastro
            </a>
          </li>
        </ul>
      </div>
      <b-form class="form" @submit.stop.prevent="onSubmit">
        <div class="card-body">
          <b-row>
            <b-col>
              <b-row>
                <b-col>
                  <b-form-group id="nome" label-for="responsavel" label="Descrição">
                    <b-form-input v-model="$v.form.descricao.$model">
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col md="3">
                  <b-form-group label="Grupo" label-for="id_produto">
                    <select name="id_produto" id="id_produto" v-model="form.id_produto_grupo" class="form-control">
                      <option v-for="(t, index) in grupoProduto" :value="t.id_produto_grupo" :key="'id_produto' + index">
                        {{ t.descricao }}
                      </option>
                    </select>
                  </b-form-group>
                </b-col>
              </b-row>
              <b-row>
                <b-col>
                  <b-form-group id="quantidade" label-for="quantidade" label="Quantidade">
                    <b-form-input v-model="form.quantidade">
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col>
                  <b-form-group id="preco" label-for="preco" label="Preço">
                    <b-form-input v-model="form.preco">
                    </b-form-input>
                  </b-form-group>
                </b-col>
              </b-row>
            </b-col>
          </b-row>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-lg-12" style="text-align: center">
              <button type="submit" ref="submit_novo_produto" class="btn btn-primary font-weight-bold">
                Salvar
              </button>
              <button v-on:click="() => {
                  $router.push({ name: 'produtoLista' });
                }
                " class="btn btn-clean font-weight-bold">
                Cancelar
              </button>
            </div>
          </div>
        </div>
      </b-form>
    </div>
  </div>
</template>

<script>
import { validationMixin } from "vuelidate";
import { mask } from "vue-the-mask";
import ProdutoMixin from "@/modules/Produto/mixins";
import ProdutoData, { ProdutoDataRequired } from "./ProdutoData";
import loadsh from "loadsh";
import "vue-select/dist/vue-select.css";

export default {
  name: "app-produto-form",
  props: {
    url: {
      type: String
    },
    produto: {
      type: Object,
      requried: true,
      default: () => { }
    }
  },
  directives: {
    mask
  },
  mixins: [validationMixin, ProdutoMixin],
  data() {
    return {
      tabIndex: 0,
      grupoProduto: [],
      form: {},
    };
  },
  validations: {
    form: ProdutoDataRequired
  },
  mounted() {
    this.getDataInit();
  },
  methods: {
    onSearch(search, loading) {
      if (search.length) {
        loading(true);
        this.search(loading, search, this);
      }
    },
    search: loadsh.debounce(async (loading, search, vm) => {
      const city = await vm.getCidade(search);
      vm.cidades = city;
      loading(false);
    }, 350),
    async getDataInit() {
      this.form = new ProdutoData({});
      if (this.produto) {
        this.form = this.produto;
      }

      this.grupoProduto = await this.getGrupoProduto();
      this.unidadeProduto = await this.getUnidadeProduto();
    },
    setActiveTab(event) {
      const tab = event.target.closest('[role="tablist"]');
      const links = tab.querySelectorAll(".nav-link");

      for (let i = 0; i < links.length; i++) {
        links[i].classList.remove("active");
      }

      this.tabIndex = parseInt(event.target.getAttribute("data-tab"));

      event.target.classList.add("active");
    },
    async onSubmit() {
      const submitButton = this.$refs["submit_novo_produto"];

      try {
        
        submitButton.classList.add("spinner", "spinner-light", "spinner-right");

        await this.$http.post(this.url, this.form);

        this.$router.push({ name: "produtoLista" });
      } catch (error) {
        submitButton.classList.remove(
          "spinner",
          "spinner-light",
          "spinner-right"
        );
      }
    }
  }
};
</script>

<style>
.vs__dropdown-toggle {
  border: 2px solid #dedede;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  border-radius: 6px;
  outline: none;
  height: 38px;
}
</style>
