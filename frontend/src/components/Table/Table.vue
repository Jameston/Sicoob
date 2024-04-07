<template>
  <div>
    <div class="card card-custom card-stretch gutter-b">
      <div class="card-header border-0 py-5" v-if="titulo != null">
        <h3 class="card-title align-items-start flex-column">
          <span class="card-label font-weight-bolder text-dark">{{
            titulo
          }}</span>
          <span class="text-muted mt-3 font-weight-bold font-size-sm">{{
            subTitulo
          }}</span>
        </h3>
        <div class="card-toolbar">
          <filter-bar
            v-if="filtro"
            :perPage="NumberPerPage"
            :filtrar="onFilterSet"
            :limpar="onFilterReset"
            :filtarPagina="onPerPage"
            :loadFilter="loadFilter"
          >
          </filter-bar>
          <router-link
            v-if="acaoBtn == 'pessoa'"
            :to="{ name: 'pessoaNova'}"
            class="btn btn-primary btn-novo font-weight-bolder font-size-sm"
            >{{ textoBtn }}</router-link
          >
          <router-link
            v-if="acaoBtn == 'produto'"
            :to="{ name: 'produtoNova'}"
            class="btn btn-primary btn-novo font-weight-bolder font-size-sm"
            >{{ textoBtn }}</router-link
          >
          <router-link
            v-if="acaoBtn == 'grupo'"
            :to="{ name: 'grupoNova'}"
            class="btn btn-primary btn-novo font-weight-bolder font-size-sm"
            >{{ textoBtn }}</router-link
          >
          <router-link
            v-if="acaoBtn == 'unidade'"
            :to="{ name: 'unidadeNova'}"
            class="btn btn-primary btn-novo font-weight-bolder font-size-sm"
            >{{ textoBtn }}</router-link
          >
        </div>
      </div>
      <div class="card-body pt-0 pb-3">
        <div class="tab-content">
          <loader v-if="loaderTable"></loader>
          <div class="table-responsive">
            <Vuetable
              ref="vuetable"
              :apiUrl="this.apiUrl"
              :httpOptions="{
                baseURL: baseUrl,
                headers: {
                  Authorization: 'Bearer ' + token
                }
              }"
              :fields="fields"
              :loadOnStart="true"
              :css="css.table"
              :noDataTemplate="css.translate.noDataTemplate"
              :paginationPath="''"
              :perPage="NumberPerPage"
              :multiSort="true"
              :sortOrder="sortOrder"
              :appendParams="moreParams"
              :detailRowComponent="detailRowComponent"
              :rowClass="DatarowClass"
              @vuetable:cell-clicked="this.onCellClicked"
              @vuetable:pagination-data="this.onPaginationData"
              @vuetable:row-dblclicked="this.dblclick"
              @vuetable:row-clicked="this.rowClicked"
              @vuetable:loaded="this.onLoaded"
              @vuetable:loading="this.onLoader"
            >
              <template
                :slot="slotName"
                scope="props"
                v-for="slotName in $scopedSlots
                  ? Object.keys($scopedSlots)
                  : null"
              >
                <slot
                  :name="slotName"
                  :row-data="props.rowData"
                  :row-index="props.rowIndex"
                  :row-field="props.rowField"
                >
                </slot>
              </template>
            </Vuetable>
            <VuetablePagination
              ref="pagination"
              @vuetable-pagination:change-page="this.onChangePage"
              :css="css.pagination"
            >
            </VuetablePagination>
            <!--            <VuetablePaginationInfo 
              info-template="Spanish text {from} to {to} of {total} records"
              ref="paginationInfo">
            </VuetablePaginationInfo>-->
            <VuetablePaginationInfo
              info-template=""
              noDataTemplate=""
              ref="paginationInfo"
            >
            </VuetablePaginationInfo>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from "vue";
import Vuetable from "vuetable-2/src/components/Vuetable";
import VuetablePagination from "vuetable-2/src/components/VuetablePagination";
import VuetablePaginationInfo from "vuetable-2/src/components/VuetablePaginationInfo";
import FilterBar from "./Filter.vue";
import Loading from "@/components/Loading";
import TokenService from "@/core/services/token.service";
//import { SYSTEM_VARIABLE } from "@/modules/Sistema/mixins";
import "vue-loading-overlay/dist/vue-loading.css";

export default {
  name: "table-app",
  components: {
    Vuetable,
    VuetablePagination,
    VuetablePaginationInfo,
    "filter-bar": FilterBar,
    loader: Loading
  },
  props: {
    titulo: {
      type: String,
      default: null
    },
    subTitulo: {
      type: String,
      default: null
    },
    acaoBtn: {
      type: String,
      default: null
    },
    textoBtn: {
      type: String,
      default: "Novo"
    },
    rowClicked: {
      type: Function,
      default: () => {}
    },
    dblclick: {
      type: Function,
      default: () => {}
    },
    classe: {
      type: String,
      default:
        "table table-head-custom table-vertical-center table-head-bg table-borderless"
    },
    apiUrl: {
      type: String,
      required: true
    },
    rowClass: {
      default: "onRowClass"
    },
    classFilterColumn: {
      type: String,
      default: "idColuna"
    },
    fields: {
      type: Array,
      required: true
    },
    sortOrder: {
      type: Array,
      default() {
        return [];
      }
    },
    filtroSelect: {
      type: Array,
      default() {
        return [];
      }
    },
    appendParams: {
      type: Object,
      default() {
        return {};
      }
    },
    detailRowComponent: {
      type: String
    },
    filtro: {
      type: Boolean,
      default: true
    },
    selectRow: {
      type: Boolean,
      default: false
    },
    perPage: {
      default: 10
    }
  },
  async created() {
    this.baseUrl = await `http://127.0.0.1:8000/`;
    this.token = await TokenService.getToken();
    this.loaderTable = false;
  },
  data() {
    return {
      baseUrl: "http://127.0.0.1:8000/",
      token: null,
      loaderTable: true,
      selectFilter: this.filtroSelect,
      loadFilter: this.filtro,
      NumberPerPage: this.perPage,
      ViewNumberPerPage: this.selectRow,
      DatarowClass: this.rowClass,
      moreParams: this.appendParams,
      css: {
        tableClass: this.classe,
        loadingClass: "loading",
        handleIcon: "glyphicon glyphicon-menu-hamburger",
        pagination: {
          infoClass: "pull-left",
          wrapperClass: "vuetable-pagination pull-right",
          activeClass: "btn btn btn-sm btn-primary",
          disabledClass: "disabled",
          pageClass: "btn btn btn-sm btn-default",
          linkClass: "btn btn btn-sm btn-default",
          icons: {
            first: "flaticon2-fast-back",
            prev: "flaticon2-back",
            next: "flaticon2-next",
            last: "flaticon2-fast-next"
          }
        },
        table: {
          tableClass: this.classe,
          ascendingIcon: "fa fa-arrow-up",
          descendingIcon: "fa fa-arrow-down"
        },
        translate: {
          noDataTemplate: "Nenhum registro encontrado.",
          paginationInfoTemplate:
            "Showing: {from} - {to} out of {total} records"
        }
      }
    };
  },
  methods: {
    onLoader: function() {
      this.loaderTable = true;
    },
    onLoaded: function() {
      this.loaderTable = false;
    },
    onPaginationData(paginationData) {
      var $this = this;
      var data = {};
      data.tabela = $this.classFilterColumn;
      data.valor = paginationData.total;

      this.$refs.pagination.setPaginationData(paginationData);
      this.$refs.paginationInfo.setPaginationData(paginationData);
    },
    onChangePage(page) {
      this.$refs.vuetable.changePage(page);
    },
    onCellClicked(data) {
      this.$refs.vuetable.toggleDetailRow(data.id);
    },
    async onFilterSet(filterText) {
      if (filterText.filtertext) {
        filterText.filtertext = filterText.filtertext.trim();
      }

      // if (filterText.filtertext == "" || filterText.filtertext == null) {
      //   return this.$toast.warning(
      //     "Informe um valor a ser filtrado!",
      //     "Atenção"
      //   );
      // }

      this.moreParams.filter = filterText.filtertext;
      this.moreParams.optionsFilter = filterText.optionfilter;
      Vue.nextTick(() => this.$refs.vuetable.refresh());
    },
    onFilterReset() {
      this.moreParams = {};
      Vue.nextTick(() => this.$refs.vuetable.refresh());
    },
    onPerPage(filterText) {
      this.moreParams.filter = filterText.filtertext;
      this.moreParams.optionsFilter = filterText.optionfilter;
      this.NumberPerPage = parseInt(filterText.perPage);
      Vue.nextTick(() => this.$refs.vuetable.refresh());
    }
  }
};
</script>

<style>
.btn-novo:hover {
  color: #FFF!important;
}
.vuetable-pagination {
  margin-top: 20px;
  margin-bottom: 20px;
  text-align: center;
}

.btn-primary {
  color: #fff !important;
  background-color: #0069b4;
}

.vuetable-pagination a {
  margin-right: 5px;
  display: inline-block;
}

.table thead th,
.table thead td {
  font-size: 1rem;
  border-bottom-width: 1px;
  padding-top: 1rem;
  padding-bottom: 1rem;
  color: #b5b5c3;
  font-size: 0.9rem;
  text-transform: uppercase;
  font-weight: 600;
  letter-spacing: 0.1rem;
}

.table th,
.table td {
  vertical-align: middle;
  display: table-cell;
}
</style>
