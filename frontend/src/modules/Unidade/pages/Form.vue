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
                  <b-form-group id="descricao" label-for="descricao" label="Descricao">
                    <b-form-input v-model="form.descricao">
                    </b-form-input>
                  </b-form-group>
                </b-col>
                <b-col>
                  <b-form-group id="unidade" label-for="unidade" label="Unidade">
                    <b-form-input v-model="form.unidade">
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
              <button type="submit" ref="submit_nova_unidade" class="btn btn-primary font-weight-bold">
                Salvar
              </button>
              <button v-on:click="() => {
                  $router.push({ name: 'unidadeLista' });
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
import UnidadeMixin from "@/modules/Unidade/mixins";
import UnidadeData, { UnidadeDataRequired } from "./UnidadeData";
import loadsh from "loadsh";
import "vue-select/dist/vue-select.css";

export default {
  name: "app-unidade-form",
  props: {
    url: {
      type: String
    },
    unidade: {
      type: Object,
      requried: true,
      default: () => { }
    }
  },
  directives: {
    mask
  },
  mixins: [validationMixin, UnidadeMixin],
  data() {
    return {
      tabIndex: 0,
      form: {},
    };
  },
  validations: {
    form: UnidadeDataRequired
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
      this.form = new UnidadeData({});
      if (this.unidade) {
        this.form = this.unidade;
      }
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
      const submitButton = this.$refs["submit_nova_unidade"];
      try {
        submitButton.classList.add("spinner", "spinner-light", "spinner-right");

        await this.$http.post(this.url, this.form);

        this.$router.push({ name: "unidadeLista" });
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
