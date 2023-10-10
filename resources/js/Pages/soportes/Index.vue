<template>
  <AppLayout>
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        LISTA DE SOPORTES
      </h1>
    </div>

    <div class="table-resposive px-6">
      <table class="table table-hover table-bordered table-striped" id="sampleTable">
        <thead>
          <tr>
            <th>#</th>
            <th>codigo</th>
            <th>funcionario</th>
            <th>usuario</th>
            <th>nota</th>
            <th>informe</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="soporte in soportes" :key="soporte.id">
            <td>
              <div class="flex items-center">
                <div v-if="soporte.informe_id === null">
                  <Link :href="route('soporte.create', soporte.id)"
                    class="bg-red-700 hover:bg-red-500 transition-all px-2 py-1 rounded-md text-white text-lg">
                  <i class='bx bx-support'></i>
                  </Link>
                </div>
                <div v-else>
                  <Link :href="route('soporte.edit', soporte.id)"
                    class="bg-green-700 hover:bg-green-500 transition-all px-2 py-1 rounded-md text-white text-lg">
                  <i class="bx bx-edit"></i>
                  </Link>
                </div>

              </div>
            </td>
            <td>{{ soporte.codigo }}</td>
            <td>{{ soporte.funcionario.nombres + " " + soporte.funcionario.apellidos }}</td>
            <td>{{ soporte.tecnico.nombres + " " +  soporte.tecnico.apellidos}}</td>
            <td>{{ soporte.nota.cite }}</td>
            <td>
              <span v-if="soporte.informe_id !== null">{{ soporte.informe.cite }}</span>
              <span v-else>En Reparacion</span>
            </td>
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
    soportes: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
    };
  },
  mounted() {
    this.modalDispositivo = true;
    this.$nextTick(() => {
      $('#sampleTable').DataTable({
        "order": [[0, 'desc']],
        pageLength: 5,
        // dom: 'Bfrtip',
        responsive: true,
        autoWidth: false,
        language: {
          decimal: "",
          search: 'Buscar',
          info: 'Mostrando el _START_ a _END_ de _TOTAL_ registros',
          infofiltered: '(filtrados de _MAX_ registros.)',
          infoPostFix: "",
          thousands: ",",
          processing: 'Procesando... ',
          loadingRecords: "Cargando...",
          lengthMenu: 'Mostrar _MENU_ registros',
          zeroRecords: 'No se encontraron resultados',
          emptyTable: 'Ningún dato disponible en esta tabla',
          infoEmpty: 'Mostrando registros del 0 al 0 de un total de 0 registros',
          infoFiltered: '(filtrado de un total de _MAX_ registros) ',
          paginate: {
            first: 'Primero',
            previous: 'Anterior',
            next: 'Siguiente',
            last: 'Ultimo',
            pagingType: { simple: 'bg-red-400', },
          }
        }
      }
      );
    });
  },
}
</script>
<style>
@import 'datatables.net-dt';
</style>
