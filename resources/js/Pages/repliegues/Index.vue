<template>
  <AppLayout>
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        LISTA DE INFORME DE REPLIEGUE
      </h1>
    </div>
    <div class="w-full flex items-center justify-end px-6">
      <div
        class="ml-4 px-4 py-2 bg-red-700 hover:bg-red-600 transition-all rounded-md text-white font-bold"
      >
        <Link :href="route('repliegue.create')" class="flex items-center">
          <i class="bx bx-plus"></i>
          <span>Nuevo</span>
        </Link>
      </div>
    </div>
    <div class="table-resposive px-6">
      <table
        class="table table-hover table-bordered table-striped"
        id="sampleTable"
      >
        <thead>
          <tr>
            <th>Acción</th>
            <th>#</th>
            <th>Codigo</th>
            <th>Informe</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="repliegue in repliegues" :key="repliegue.id">
            <td>
              <Link
                :href="route('repliegues.index', repliegue.id)"
                class="bg-green-700 hover:bg-green-500 transition-all px-2 py-1 rounded-md text-white text-lg"
              >
                <i class="bx bx-edit"></i>
              </Link>
            </td>
            <td>{{ repliegue.id }}</td>
            <td>{{ repliegue.codigo }}</td>           
            <td>{{ repliegue.informe.cite }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </AppLayout>
</template>
  
  <script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import DataTable from "datatables.net-vue3";
import DataTablesCore from "datatables.net-bs5";
import "datatables.net-responsive";
import select from "datatables.net-select";
import $ from "jquery";

DataTable.use(DataTablesCore);
DataTable.use(select);

export default {
  components: {
    AppLayout,
    Link,
  },
  props: {
    repliegues: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {};
  },
  mounted() {
    this.modalDispositivo = true;
    this.$nextTick(() => {
      $("#sampleTable").DataTable({
        order: [[1, "desc"]],
        pageLength: 5,
        // dom: 'Bfrtip',
        responsive: true,
        autoWidth: false,
        language: {
          decimal: "",
          search: "Buscar",
          info: "Mostrando el _START_ a _END_ de _TOTAL_ registros",
          infofiltered: "(filtrados de _MAX_ registros.)",
          infoPostFix: "",
          thousands: ",",
          processing: "Procesando... ",
          loadingRecords: "Cargando...",
          lengthMenu: "Mostrar _MENU_ registros",
          zeroRecords: "No se encontraron resultados",
          emptyTable: "Ningún dato disponible en esta tabla",
          infoEmpty:
            "Mostrando registros del 0 al 0 de un total de 0 registros",
          infoFiltered: "(filtrado de un total de _MAX_ registros) ",
          paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "Ultimo",
            pagingType: { simple: "bg-red-400" },
          },
        },
      });
    });
  },
};
</script>
  <style>
@import "datatables.net-dt";
</style>
  