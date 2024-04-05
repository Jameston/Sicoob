<template>
  <b-form-group
    id="fieldset-filtro"
    label-cols-sm="4"
    label-cols-lg="3"
    content-cols-sm
    content-cols-lg="7"
    label=""
    style="margin-bottom: 0px!important"
    label-for="input-filtro"
  >
    <b-input-group style="right: 15px">
      <b-form-input
        id="input-filtro"
        @keyup.enter="doFilter"
        v-model="filterText"
      ></b-form-input>
      <template #append>
        <button
          class="btn btn-primary btn-filtro"
          type="button"
          @click="doFilter"
        >
          <i class="fa fa-search"></i>
        </button>
      </template>
    </b-input-group>
  </b-form-group>
</template>

<script>
export default {
  name: 'ComponentFilter',
  props: {
    perPage: {
      default: 10
    },
    filtrar: {
      type: Function
    },
    limpar: {
      type: Function
    },
    filtarPagina: {
      type: Function
    },
    loadFilter: {
      default: true
    }
  },
  data() {
    return {
      optionsFilter: [],
      filterText: "",
      perPages: this.perPage
    };
  },
  methods: {
    doFilter() {
      this.filtrar({
        filtertext: this.filterText,
        optionfilter: this.optionsFilter
      });
    },
    resetFilter() {
      this.filterText = "";
      this.limpar();
    },
    doFilterPage() {
      this.filtarPagina({
        filtertext: this.filterText,
        optionfilter: this.optionsFilter,
        perPage: this.perPages
      });
    }
  }
};
</script>

<style>
.btn-filtro {
  background: transparent;
  border: 0px;
}
</style>
