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
                  <b-form-group label="Tipo" label-for="tipo_endereco">
                    <select
                      name="tipo_endereco"
                      id="tipo_endereco"
                      v-model="formEndereco.tipo"
                      class="form-control"
                    >
                      <option
                        v-for="(t, index) in tipoEndereco"
                        :value="t"
                        :key="'tipo_endereco' + index"
                      >
                        {{ t.descricao }}
                      </option>
                    </select>
                  </b-form-group>
                </b-col>
                <b-col md="3">
                  <b-form-group label="CEP" label-for="formEndereco.cep">
                    <b-form-input
                      ref="cep"
                      id="formEndereco.cep"
                      name="formEndereco.cep"
                      v-model="$v.formEndereco.cep.$model"
                      :state="validateStateEndereco('cep')"
                      v-mask="['#####-###']"
                      @change="consultaCep"
                      aria-describedby="formEndereco.cep"
                    >
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col md="2">
                  <b-form-group label="Número" label-for="formEndereco.numero">
                    <b-form-input
                      id="formEndereco.numero"
                      name="formEndereco.numero"
                      v-model="formEndereco.numero"
                      aria-describedby="formEndereco.numero"
                    >
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col md="3">
                  <b-form-group label="Bairro" label-for="formEndereco.bairro">
                    <b-form-input
                      id="formEndereco.bairro"
                      name="formEndereco.bairro"
                      v-model="formEndereco.bairro"
                      aria-describedby="formEndereco.bairro"
                    >
                    </b-form-input>
                  </b-form-group>
                </b-col>
              </b-row>
              <b-row>
                <b-col>
                  <b-form-group
                    label="Logradouro"
                    label-for="formEndereco.logradouro"
                  >
                    <b-form-input
                      id="formEndereco.logradouro"
                      name="formEndereco.logradouro"
                      v-model="formEndereco.logradouro"
                      aria-describedby="formEndereco.logradouro"
                    >
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col md="4">
                  <b-form-group
                    label="Complemento"
                    label-for="formEndereco.complemento"
                  >
                    <b-form-input
                      id="formEndereco.complemento"
                      name="formEndereco.complemento"
                      v-model="formEndereco.complemento"
                      aria-describedby="formEndereco.complemento"
                    >
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col md="4">
                  <b-form-group label="Cidade" label-for="formEndereco.cidade">
                    <v-select
                      label="id_cidade"
                      @input="setCidade"
                      :filterable="false"
                      :options="cidades"
                      @search="onSearch"
                    >
                      <template slot="no-options">
                        Informe o nome da cidade
                      </template>
                      <template slot="option" slot-scope="option">
                        <div class="d-center">
                          {{ option.cidade + " - " + option.uf }}
                        </div>
                      </template>
                      <template slot="selected-option" slot-scope="option">
                        <div class="selected d-center">
                          {{ option.cidade + " - " + option.uf }}
                        </div>
                      </template>
                    </v-select>
                  </b-form-group>
                </b-col>
                <b-col md="1">
                  <button
                    type="button"
                    style="margin-top: 25px"
                    @click="onSubmitEndereco"
                    class="btn btn-light-primary btn-bold"
                  >
                    Adicionar
                  </button>
                </b-col>
              </b-row>
              <b-row>
                <b-col md="11">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Tipo</th>
                        <th>CEP</th>
                        <th>Logradouro</th>
                        <th>Bairro</th>
                        <th>Número</th>
                        <th>Complemento</th>
                        <th>Cidade</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(e, index) in enderecos"
                        :key="'endereco_' + index"
                      >
                        <td>{{ e.tipo == null ? "" : e.tipo.descricao }}</td>
                        <td>{{ e.cep }}</td>
                        <td>{{ e.logradouro }}</td>
                        <td>{{ e.bairro }}</td>
                        <td>{{ e.numero }}</td>
                        <td>{{ e.complemento }}</td>
                        <td>
                          {{
                            e.cidade == null
                              ? ""
                              : e.cidade.cidade + " - " + e.cidade.uf
                          }}
                        </td>
                        <td align="right">
                          <button
                            @click="
                              () => {
                                $toast.error('Endereço excluído');
                                enderecos.splice(index, 1);
                              }
                            "
                            class="btn btn-light-primary btn-sm btn-bold"
                          >
                            <Close :size="16" />
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </b-col>
              </b-row>
            </b-tab>

            <b-tab>
              <b-row>
                <b-col md="3">
                  <b-form-group label="Tipo" label-for="tipo_pessoa">
                    <select
                      name="tipo_pessoa"
                      id="tipo_pessoa"
                      v-model="$v.formEmail.tipo.$model"
                      :state="validateStateEmail('tipo')"
                      class="form-control"
                    >
                      <option
                        v-for="(t, index) in tipoEmail"
                        :value="t"
                        :key="'tipo_email' + index"
                      >
                        {{ t.descricao }}
                      </option>
                    </select>
                  </b-form-group>
                </b-col>
                <b-col md="7">
                  <b-form-group
                    id="email"
                    label="E-mail"
                    label-for="formEmail.email"
                  >
                    <b-form-input
                      id="formEmail.email"
                      name="formEmail.email"
                      v-model="$v.formEmail.email.$model"
                      :state="validateStateEmail('email')"
                      aria-describedby="formEmail.email"
                    >
                    </b-form-input>
                  </b-form-group>
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
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Tipo</th>
                        <th>E-mail</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(e, index) in emails" :key="'email_' + index">
                        <td>{{ e.tipo == null ? "" : e.tipo.descricao }}</td>
                        <td>
                          {{ e.email }}
                        </td>
                        <td align="right">
                          <button
                            @click="
                              () => {
                                $toast.error('E-mail excluído');
                                emails.splice(index, 1);
                              }
                            "
                            class="btn btn-light-primary btn-sm btn-bold"
                          >
                            <Close :size="16" />
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </b-col>
              </b-row>
            </b-tab>

            <b-tab>
              <b-row>
                <b-col md="3">
                  <b-form-group label="Tipo" label-for="tipo_telefone">
                    <select
                      name="tipo_telefone"
                      id="tipo_telefone"
                      v-model="$v.formTelefone.tipo.$model"
                      :state="validateStateTelefone('tipo')"
                      class="form-control"
                    >
                      <option
                        v-for="(t, index) in tipoFone"
                        :value="t"
                        :key="'tipo_telefone' + index"
                      >
                        {{ t.descricao }}
                      </option>
                    </select>
                  </b-form-group>
                </b-col>
                <b-col md="7">
                  <b-form-group
                    id="telefone"
                    label="Telefone"
                    label-for="example-input-0"
                  >
                    <b-form-input
                      v-mask="['(##) #### ####', '(##) # #### ####']"
                      v-model="$v.formTelefone.telefone.$model"
                      :state="validateStateTelefone('telefone')"
                      aria-describedby="input-0-live-feedback"
                    >
                    </b-form-input>
                  </b-form-group>
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
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Tipo</th>
                        <th>Telefone</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(e, index) in telefones"
                        :key="'fone_' + index"
                      >
                        <td>{{ e.tipo == null ? "" : e.tipo.descricao }}</td>
                        <td>
                          {{ e.fone }}
                        </td>
                        <td align="right">
                          <button
                            @click="
                              () => {
                                $toast.error('E-mail excluído');
                                telefones.splice(index, 1);
                              }
                            "
                            class="btn btn-light-primary btn-sm btn-bold"
                          >
                            <Close :size="16" />
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
import { SistemaMixin } from "@/modules/Sistema/mixins";
import PessoaEmailData, { PessoaEmailRequired } from "./PessoaEmailData";
import PessoaData, { PessoaDataRequired } from "./PessoaData";
import PessoaTelefoneData, {
  PessoaTelefoneDataRequired
} from "./PessoaTelefoneData";
import PessoaEnderecoData, {
  PessoaEnderecoDataRequired
} from "./PessoaEnderecoData";
import Close from "vue-material-design-icons/Close.vue";
import VueSelect from "vue-select";
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
      default: () => {}
    }
  },
  components: {
    Close,
    "v-select": VueSelect
  },
  directives: {
    mask
  },
  mixins: [validationMixin, SistemaMixin],
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
      formEmail: {},
      formTelefone: {},
      formEndereco: {},
      form: {},
      cidade: {}
    };
  },
  validations: {
    form: PessoaDataRequired,
    formEmail: PessoaEmailRequired,
    formTelefone: PessoaTelefoneDataRequired,
    formEndereco: PessoaEnderecoDataRequired
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

      if (this.pessoa.id_pessoa) {
        this.form = this.pessoa;
        this.emails = this.pessoa.emails;
        this.telefones = this.pessoa.fones;
        this.enderecos = this.pessoa.enderecos;
      }

      this.formEmail = new PessoaEmailData({});
      this.formTelefone = new PessoaTelefoneData({});
      this.formEndereco = new PessoaEnderecoData({});

      this.tipoEndereco = await this.getTipoEndereco();
      this.tipoFone = await this.getTipoFone();
      this.tipoEmail = await this.getTipoEmail();
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
        id_tipo_email: this.formEmail.tipo.id_tipo,
        tipo: this.formEmail.tipo,
        email: this.formEmail.email,
        descricao: this.formEmail.descricao
      });

      this.$toast.success("E-mail adicionado!");
      this.$v.formEmail.$reset();
      this.formEmail = new PessoaEmailData({});

      return;
    },
    async onSubmitTelefone() {
      this.$v.formTelefone.$touch();

      if (this.$v.formTelefone.$anyError) {
        return;
      }

      this.telefones.push({
        id_tipo_email: this.formTelefone.tipo.id_tipo,
        tipo: this.formTelefone.tipo,
        telefone: this.formTelefone.telefone,
        descricao: this.formTelefone.descricao
      });

      this.$toast.success("Telefone adicionado!");
      this.$v.formTelefone.$reset();
      this.formTelefone = new PessoaTelefoneData({});

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
        tipo: this.formEndereco.tipo
      });

      this.$toast.success("Endereço adicionado!");
      this.$v.formEndereco.$reset();
      this.cidade = {};
      this.formEndereco = new PessoaEnderecoData({});

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
