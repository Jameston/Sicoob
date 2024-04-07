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
                  <b-form-group id="nome" label-for="responsavel" label="Nome">
                    <b-form-input v-model="$v.form.nome.$model" :state="validateState('nome')">
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col md="3">
                  <b-form-group label="Tipo" label-for="tipo_pessoa">
                    <select name="tipo_pessoa" id="tipo_pessoa" v-model="form.id_pessoa_tipo" class="form-control">
                      <option v-for="(t, index) in tipoPessoa" :value="t.id_pessoa_tipo" :key="'tipo_pessoa' + index">
                        {{ t.descricao }}
                      </option>
                    </select>
                  </b-form-group>
                </b-col>
              </b-row>
              <b-row>
                <b-col>
                  <b-form-group id="email" label-for="email" label="E-mail">
                    <b-form-input v-model="$v.form.email">
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col>
                  <b-form-group id="telefone" label-for="telefone" label="Telefone">
                    <b-form-input v-model="$v.form.telefone" v-mask="['(##) #####-####', '(##) ####-####']">
                    </b-form-input>
                  </b-form-group>
                </b-col>
              </b-row>
              <b-row>
                <b-col>
                  <b-form-group id="cnpj_cpf" label="CPF/CNPJ" label-for="cnpj_cpf">
                    <b-form-input id="cnpj_cpf" name="cnpj_cpf" v-model="$v.form.cnpj_cpf.$model"
                      v-mask="['###.###.###-##', '##.###.###/####-##']" :state="validateState('cnpj_cpf')">
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col>
                  <b-form-group id="ie_rg" label="IE/RG" label-for="ie_rg">
                    <b-form-input id="ie_rg" name="ie_rg" v-model="form.ie_rg" placeholder="">
                    </b-form-input>
                  </b-form-group>
                </b-col>
              </b-row>
              <b-row>
                <b-col md="2">
                  <b-form-group id="cep" label="CEP" label-for="cep">
                    <b-form-input id="cep" name="cep" v-model="$v.form.cep"
                      v-mask="['#####-###']">
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col md="3">
                  <b-form-group id="logradouro" label="Logradouro" label-for="logradouro">
                    <b-form-input id="logradouro" name="logradouro" v-model="form.logradouro" placeholder="">
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col md="1">
                  <b-form-group id="numero" label="Número" label-for="numero">
                    <b-form-input id="numero" name="numero" v-model="form.numero" placeholder="">
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col md="3">
                  <b-form-group id="bairro" label="Bairro" label-for="bairro">
                    <b-form-input id="bairro" name="bairro" v-model="form.bairro" placeholder="">
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col md="3">
                  <b-form-group id="complemento" label="Complemento" label-for="complemento">
                    <b-form-input id="complemento" name="complemento" v-model="form.complemento" placeholder="">
                    </b-form-input>
                  </b-form-group>
                </b-col>
              </b-row>
              <b-row>
                <b-col md="3">
                  <b-form-group id="cidade" label="Cidade" label-for="cidade">
                    <b-form-input id="cidade" name="cidade" v-model="$v.form.cidade">
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
              <button type="submit" ref="submit_nova_pessoa" class="btn btn-primary font-weight-bold">
                Salvar
              </button>
              <button v-on:click="() => {
                  $router.push({ name: 'pessoaLista' });
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
import PessoaMixin from "@/modules/Pessoa/mixins";
import PessoaData, { PessoaDataRequired } from "./PessoaData";
import loadsh from "loadsh";
import "vue-select/dist/vue-select.css";

export default {
  name: "app-pessoa-form",
  props: {
    url: {
      type: String
    },
    pessoa: {
      type: Object,
      requried: true,
      default: () => { }
    }
  },
  directives: {
    mask
  },
  mixins: [validationMixin, PessoaMixin],
  data() {
    return {
      tabIndex: 0,
      tipoPessoa: [],
      cidades: [],
      form: {},
      cidade: {}
    };
  },
  validations: {
    form: PessoaDataRequired
  },
  mounted() {
    this.getDataInit();
  },
  methods: {
    setCidade(cidade) {
      this.cidade = cidade;
    },
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
    async consultaCep() {
      const cep = await this.getCep(this.formEndereco.cep);
      this.formEndereco.logradouro = cep.data.street;
      this.formEndereco.bairro = cep.data.district;

      const city = await this.getCidade(cep.data.city);

      this.cidades = city;
    },
    async getDataInit() {
      this.form = new PessoaData({});
      if (this.pessoa) {
        this.form = this.pessoa;
      }

      this.tipoPessoa = await this.getTipoPessoa();
    },
    validateState(name) {
      const { $dirty, $error } = this.$v.form[name];
      return $dirty ? !$error : null;
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
      const submitButton = this.$refs["submit_nova_pessoa"];

      try {
        this.$v.form.$touch();

        if (this.$v.form.$anyError) {
          return;
        }

        submitButton.classList.add("spinner", "spinner-light", "spinner-right");

        await this.$http.post(this.url, this.form);

        this.$router.push({ name: "pessoaLista" });
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
