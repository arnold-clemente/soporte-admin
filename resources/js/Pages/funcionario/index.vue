<template>
  <AppLayout>
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        LISTA DE FUNCIONARIOS
      </h1>
    </div>
    <div class="w-full flex items-center justify-end px-6">
      <div
        class="ml-4 px-4 py-2 bg-red-700 hover:bg-red-600 transition-all rounded-md text-white font-bold"
      >
        <Link :href="route('funcionario.create')" class="flex items-center">
          <i class="bx bx-plus"></i>
          <span>Nuevo</span>
        </Link>
      </div>
    </div>

    <div class="table-resposive">
      <table
        class="table table-hover table-bordered table-striped"
        id="sampleTable"
      >
        <thead>
          <tr>
            <th>ACCION</th>
            <th>#</th>
            <th>NOMBRE</th>
            <th>CEDULA</th>
            <th>CARGO</th>
            <th>UNIDAD</th>
            <th>DEPENDENCIA</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="funcionario in funcionarios" :key="funcionario.id">
            <td>
              <div class="flex items-center space-x-1">
                <Link
                  :href="route('funcionario.edit', funcionario)"
                  class="bg-green-700 hover:bg-green-500 transition-all px-2 py-1 rounded-md text-white text-lg"
                >
                  <i class="bx bxs-edit"></i>
                </Link>
                <button v-if="funcionario.activo === 1"
                  @click.prevent="destroy(funcionario)"
                  class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                >
                  <i class="bx bx-x"></i>
                </button>
              </div>
            </td>
            <td>{{ funcionario.id }}</td>
            <td>{{ funcionario.nombres + " " + funcionario.apellidos }}</td>
            <td>{{ funcionario.ci }}</td>
            <td>{{ funcionario.cargo }}</td>
            <td>{{ funcionario.unidad.nombre }}</td>
            <td>{{ funcionario.unidad.dependencia }}</td>
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
import axios from "axios";
import Swal from "sweetalert2";

DataTable.use(DataTablesCore);
DataTable.use(select);

export default {
  components: {
    AppLayout,
    Link,
  },
  props: {
    funcionarios: {
      type: Object,
      required: true,
    },
  },
  methods: {
    destroy($funcionario) {
      Swal.fire({
        title: "¿Estas seguro",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Sí, bórralo!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .delete(route("funcionario.destroy", $funcionario))
            .then((response) => {
              console.log(response.data)
              Swal.fire({
                position: "center",
                icon: "success",
                title: "Eliminado",
                showConfirmButton: false,
                timer: 2000,
              });
              this.loading = false;
              this.$inertia.visit(route("funcionarios.index"));
            })
            .catch((error) => {
              this.error = error.response.data.errors;
            });
        }
      });
    },
  },
  mounted() {
    this.modalDispositivo = true;
    this.$nextTick(() => {
      $("#sampleTable").DataTable({
        order: [[1, "desc"]],
        pageLength: 10,
        // dom: "Bfrtip",
        responsive: true,
        select: true,
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
