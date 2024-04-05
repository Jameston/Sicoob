<template>
  <TableApp
    subTitulo="Cadastro de Clientes"
    api-url="/api/produto/grupos/"
    :fields="fields"
    classFilterColumn="grupo"
    ref="grupo"
    :perPage="10"
  >
    <template slot="descricao" scope="props">
      <span style="width: 250px">
        <div class="d-flex align-items-center">
          <div class="ml-4">
            <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
              {{ props.rowData.descricao }}
            </div>
          </div>
        </div>
      </span>
    </template>
    <template slot="status" scope="props">
      <span
        v-if="props.rowData.status == true"
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
          name: "__slot:descricao",
          sortField: "descricao",
          title: "Nome"
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
