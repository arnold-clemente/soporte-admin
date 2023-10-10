<template>
  <AppLayout>
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        LISTA DE USUARIOS
      </h1>
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
            <th>USUARIO</th>
            <th>CORREO</th>
            <th>TIPO</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>
              <div class="flex items-center space-x-1">
                <Password v-bind:user="user" />
                <button
                  @click.prevent="reset(user)"
                  class="rounded-md bg-yellow-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                >
                  <i class="bx bx-reset"></i>
                </button>
                <Link
                  :href="route('usuario.edit', user)"
                  class="bg-green-700 hover:bg-green-500 transition-all px-2 py-1 rounded-md text-white text-lg"
                >
                  <i class="bx bxs-edit"></i>
                </Link>
              </div>
            </td>
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.usuario }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.tipo }}</td>
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
import Password from "./Password.vue";
import axios from "axios";
import Swal from "sweetalert2";

DataTable.use(DataTablesCore);
DataTable.use(select);

export default {
  components: {
    AppLayout,
    Link,
    Password,
  },
  props: {
    users: {
      type: Object,
      required: true,
    },
  },
  methods: {
    reset($user) {
      Swal.fire({
        title: "¿Estas seguro",
        text: "¡Restablecer la contraseña!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Sí, Restablecer!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .post(route("usuario.password", $user), {
              password: $user.id,
            })
            .then((response) => {
              Swal.fire({
                position: "center",
                icon: "success",
                title: response.data,
                showConfirmButton: false,
                timer: 2000,
              });
              this.loading = false;
              this.$inertia.reload({ only: ["user"] });
            })
            .catch((error) => {
              this.error = error.response.data.errors;
              this.loading = false;
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
