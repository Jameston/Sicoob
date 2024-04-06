<template>
  <div>
    <div class="card card-custom gutter-b">
      <div class="card-header card-header-tabs-line">
        <ul
          class="nav nav-dark nav-bold nav-tabs nav-tabs-line"
          role="tablist"
          ref="builder-tab"
        >
          <li class="nav-item">
            <a
              class="nav-link active"
              v-on:click="setActiveTab"
              data-tab="0"
              data-toggle="tab"
              href="#"
              role="tab"
            >
              Cadastro
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              v-on:click="setActiveTab"
              data-tab="1"
              data-toggle="tab"
              href="#"
              role="tab"
            >
              Endereços
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              v-on:click="setActiveTab"
              data-tab="2"
              data-toggle="tab"
              href="#"
              role="tab"
            >
              E-mail
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              v-on:click="setActiveTab"
              data-tab="3"
              data-toggle="tab"
              href="#"
              role="tab"
            >
              Telefones
            </a>
          </li>
        </ul>
      </div>

      <b-form class="form" @submit.stop.prevent="onSubmit">
        <div class="card-body">
          <b-tabs class="hide-tabs" v-model="tabIndex">
            <b-tab active>
              <b-row>
                <b-col>
                  <b-row>
                    <b-col>
                      <b-form-group
                        id="nome"
                        label-for="responsavel"
                        label="Nome"
                      >
                        <b-form-input
                          v-model="$v.form.nome.$model"
                          :state="validateState('nome')"
                        >
                        </b-form-input>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col md="9">
                      <b-form-group
                        id="responsavel"
                        label="Responsável"
                        label-for="responsavel"
                      >
                        <b-form-input
                          id="responsavel"
                          name="responsavel"
                          v-model="form.responsavel"
                          placeholder=""
                        >
                        </b-form-input>
                      </b-form-group>
                    </b-col>
                    <b-col md="3">
                      <b-form-group label="Tipo" label-for="tipo_pessoa">
                        <select
                          name="tipo_pessoa"
                          id="tipo_pessoa"
                          v-model="form.id_pessoa_tipo"
                          class="form-control"
                        >
                          <option
                            v-for="(t, index) in tipoPessoa"
                            :value="t"
                            :key="'tipo_pessoa' + index"
                          >
                            {{ t.descricao }}
                          </option>
                        </select>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col>
                      <b-form-group
                        id="cnpj_cpf"
                        label="CPF/CNPJ"
                        label-for="cnpj_cpf"
                      >
                        <b-form-input
                          id="cnpj_cpf"
                          name="cnpj_cpf"
                          v-model="$v.form.cnpj_cpf.$model"
                          v-mask="['###.###.###-##', '##.###.###/####-##']"
                          :state="validateState('cnpj_cpf')"
                        >
                        </b-form-input>
                      </b-form-group>
                    </b-col>
                    <b-col>
                      <b-form-group id="ie_rg" label="IE/RG" label-for="ie_rg">
                        <b-form-input
                          id="ie_rg"
                          name="ie_rg"
                          v-model="form.ie_rg"
                          placeholder=""
                        >
                        </b-form-input>
                      </b-form-group>
                    </b-col>
                    <b-col>
                      <template v-if="form.cnpj_cpf">
                        <b-form-group
                          v-if="form.cnpj_cpf.length > 14"
                          id="inscricao_municipal"
                          label="Insc. Municípal"
                          label-for="inscricao_municipal"
                        >
                          <b-form-input
                            id="inscricao_municipal"
                            name="inscricao_municipal"
                            v-model="form.inscricao_municipal"
                            placeholder=""
                          >
                          </b-form-input>
                        </b-form-group>
                      </template>
                    </b-col>
                  </b-row>
                  <b-row v-if="form.cnpj_cpf">
                    <b-col>
                      <b-form-group
                        v-if="form.cnpj_cpf.length > 14"
                        id="nome_fantasia"
                        label="Nome Fantasia"
                        label-for="nome_fantasia"
                      >
                        <b-form-input
                          id="nome_fantasia"
                          name="nome_fantasia"
                          v-model="form.nome_fantasia"
                          placeholder=""
                        >
                        </b-form-input>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col>
                      <b-form-group
                        id="observacao"
                        label="Observação"
                        label-for="observacao"
                      >
                        <b-form-textarea
                          id="observacao"
                          name="observacao"
                          v-model="form.observacao"
                          placeholder=""
                        >
                        </b-form-textarea>
                      </b-form-group>
                    </b-col>
                  </b-row>
                </b-col>
              </b-row>
            </b-tab>

            

            <b-tab>
              <b-row>
                <b-col md="3">
                  
                </b-col>
                <b-col md="7">
                
                </b-col>
                <b-col>
                  <button
                    type="button"
                    style="margin-top: 25px"
                    @click="onSubmitEmail"
                    class="btn btn-light-primary btn-bold"
                  >
                    Adicionar
                  </button>
                </b-col>
              </b-row>
              <b-row>
                <b-col md="10">
                 
                </b-col>
              </b-row>
            </b-tab>

            <b-tab>
              <b-row>
                <b-col md="3">
                 
                </b-col>
                <b-col md="7">
                  
                </b-col>
                <b-col>
                  <button
                    type="button"
                    style="margin-top: 25px"
                    @click="onSubmitTelefone"
                    class="btn btn-light-primary btn-bold"
                  >
                    Adicionar
                  </button>
                </b-col>
              </b-row>
              <b-row>
                <b-col md="10">
                 
                </b-col>
              </b-row>
            </b-tab>
          </b-tabs>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-lg-12" style="text-align: center">
              <button
                type="submit"
                ref="submit_nova_pessoa"
                class="btn btn-primary font-weight-bold"
              >
                Salvar
              </button>
              <button
                v-on:click="
                  () => {
                    $router.push({ name: 'pessoaLista' });
                  }
                "
                class="btn btn-clean font-weight-bold"
              >
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
import  PessoaMixin from "@/modules/Pessoa/mixins";
import PessoaData, { PessoaDataRequired } from "./PessoaData";
//import Close from "vue-material-design-icons/Close.vue";
//import VueSelect from "vue-select";
import loadsh from "loadsh";
import "vue-select/dist/vue-select.css";

export default {
  name: "app-pessoa-form-create",
  props: {
    url: {
      type: String
    },
    
  },
  components: {
    //Close,
    //"v-select": VueSelect
  },
  directives: {
    mask
  },
  mixins: [validationMixin, PessoaMixin],
  data() {
    return {
      tabIndex: 0,
      tipoEndereco: [],
      tipoFone: [],
      tipoEmail: [],
      tipoPessoa: [],
      cidades: [],
      emails: [],
      telefones: [],
      enderecos: [],
      form: {},
      cidade: {}
    };
  },
  validations: {
    form: PessoaDataRequired
  },
  mounted() {
    //this.getDataInit();
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

      if (this.pessoa.id_pessoa) {
        this.form = this.pessoa;
        this.emails = this.pessoa.emails;
        this.telefones = this.pessoa.fones;
        this.enderecos = this.pessoa.enderecos;
      }

      this.tipoPessoa = await this.getTipoPessoa();
    },
    validateState(name) {
      const { $dirty, $error } = this.$v.form[name];
      return $dirty ? !$error : null;
    },
    validateStateEmail(name) {
      const { $dirty, $error } = this.$v.formEmail[name];
      return $dirty ? !$error : null;
    },
    validateStateTelefone(name) {
      const { $dirty, $error } = this.$v.formTelefone[name];
      return $dirty ? !$error : null;
    },
    validateStateEndereco(name) {
      const { $dirty, $error } = this.$v.formEndereco[name];
      return $dirty ? !$error : null;
    },
    setActivePreviousTab() {
      this.tabIndex = parseInt(localStorage.getItem("builderTab")) || 0;
      const links = this.$refs["builder-tab"].querySelectorAll(".nav-link");

      for (let i = 0; i < links.length; i++) {
        links[i].classList.remove("active");
      }

      this.$refs["builder-tab"]
        .querySelector(`[data-tab="${this.tabIndex}"]`)
        .classList.add("active");
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
    async onSubmitEmail() {
      this.$v.formEmail.$touch();

      if (this.$v.formEmail.$anyError) {
        return;
      }

      this.emails.push({
        id_tipo_email: 1,
        
        email: 'this.formEmail.email',
        descricao: this.formEmail.descricao
      });

      this.$toast.success("E-mail adicionado!");
      this.$v.formEmail.$reset();

      return;
    },
    async onSubmitTelefone() {
      this.$v.formTelefone.$touch();

      if (this.$v.formTelefone.$anyError) {
        return;
      }

      this.telefones.push({
        id_tipo_email: this.formTelefone.tipo.id_tipo,
        telefone: 'this.formTelefone.telefone',
        descricao: this.formTelefone.descricao
      });

      this.$toast.success("Telefone adicionado!");
      this.$v.formTelefone.$reset();

      return;
    },
    async onSubmitEndereco() {
      this.$v.formEndereco.$touch();

      if (this.$v.formEndereco.$anyError) {
        return;
      }

      if (!this.cidade.id_cidade) {
        return this.$toast.error("Selecione uma cidade!");
      }

      this.enderecos.push({
        numero: this.formEndereco.numero,
        cep: this.formEndereco.cep,
        logradouro: this.formEndereco.logradouro,
        bairro: this.formEndereco.bairro,
        complemento: this.formEndereco.complemento,
        id_endereco_tipo: this.formEndereco.tipo.id_tipo,
        id_cidade: this.cidade.id_cidade,
        cidade: this.cidade,
      });

      this.$toast.success("Endereço adicionado!");
      this.$v.formEndereco.$reset();
      this.cidade = {};

      return;
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
