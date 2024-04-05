<template>
  <TableApp
    titulo="Clientes"
    subTitulo="Cadastro de Clientes"
    api-url="/api/grupo/"
    :fields="fields"
    classFilterColumn="grupo"
    ref="grupo"
    :perPage="10"
  >
    <template slot="nome" scope="props">
      <span style="width: 250px">
        <div class="d-flex align-items-center">
          <div class="symbol symbol-40 symbol-light-primary flex-shrink-0">
            <span class="symbol-label font-size-h4 font-weight-bold">
              {{ props.rowData.nome.slice(0, 1) }}
            </span>
          </div>
          <div class="ml-4">
            <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
              {{ props.rowData.nome }}
            </div>
            <a href="#" class="text-muted font-weight-bold text-hover-primary">
              {{ props.rowData.nome_fantasia }}
            </a>
          </div>
        </div>
      </span>
    </template>
    <template slot="cpfcnpj" scope="props">
      <span style="width: 110px">
        <div class="font-weight-bolder font-size-lg mb-0">
          {{ props.rowData.cnpj_cpf }}
        </div>
        <div class="font-weight-bold text-muted">
          IE/RG: {{ props.rowData.ie_rg }}
        </div>
      </span>
    </template>
    <template slot="status" scope="props">
      <span
        v-if="props.rowData.status == 'A'"
        class="label label-lg label-inline label-light-success"
        >Ativo</span
      >
      <span v-else class="label label-lg label-inline label-light-danger"
        >Inativo</span
      >
    </template>
    <template slot="actions" scope="props">
      <div class="row-actions" style="text-align: right !important">
        <span style="overflow: visible; position: relative; width: 130px">
          <div class="dropdown dropdown-inline">
            <router-link
              class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2"
              title="Editar"
              :to="{
                name: 'pessoaEditar',
                params: {
                  codigo: props.rowData.codigo
                }
              }"
            >
              <Pencil :size="16" />
            </router-link>
            <button
              @click="excluir(props.rowData)"
              class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2"
              title="Editar"
            >
              <TrashCanIcon :size="16" />
            </button>
          </div>
        </span>
      </div>
    </template>
  </TableApp>
</template>

<script>
import { mapGetters } from "vuex";
import Pencil from "vue-material-design-icons/Pencil.vue";
import TrashCanIcon from "vue-material-design-icons/TrashCan.vue";
import TableApp from "@/components/Table";

export default {
  name: "app-grupo",
  components: { 
    Pencil,
    TrashCanIcon,
    TableApp
  },
  data() {
    return {
      fields: [
        {
          name: "codigo",
          sortField: "codigo",
          title: "#"
        },
        {
          name: "__slot:nome",
          sortField: "nome",
          title: "Nome"
        },
        {
          name: "__slot:cpfcnpj",
          title: "CPF/CNPJ"
        },
        {
          name: "__slot:status",
          title: ""
        },
        {
          name: "__slot:actions",
          title: ""
        }
      ]
    };
  },
  methods: {
    excluir(data) {
      this.$swal
        .fire({
          title: "Excluir o cliente " + data.nome + "?",
          showCancelButton: true,
          confirmButtonText: `Sim`,
          cancelButtonText: `Não`
        })
        .then(async result => {
          if (result.isConfirmed) {
            await this.$http.post("/pessoa/delete", {
              id_pessoa: data.id_pessoa
            });
            this.$refs.pessoa.$refs.vuetable.refresh();
            this.$toast.success("Cliente excluído!");
          }
        });
    }
  },
  computed: {
    ...mapGetters(["layoutConfig"]),
    config() {
      return this.layoutConfig();
    }
  },
};
</script>
