<template>
  <AppLayout>
    <Cristal v-show="loading" />
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        EDITAR TÉCNICO
      </h1>
      <div
        class="flex items-center text-red-600 font-bold transition-all hover:text-red-800"
      >
        <Link :href="route('tecnicos.index')">tecnicos/</Link>
        <span class="text-green-700">{{ tecnico.id }}/</span>
        <span class="text-green-700">editar</span>
      </div>
    </div>

    <!-- formulario para actualizar tecnico -->

    <div>
      <div class="space-y-12 px-6">
        <div class="border-b border-gray-900/10">
          <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Nombres:</label
              >
              <div>
                <input
                  type="text"
                  v-model="form.nombres"
                  placeholder="Escriba los nombres"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.nombres }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Apellidos:</label
              >
              <div>
                <input
                  type="text"
                  v-model="form.apellidos"
                  placeholder="Escriba los Apellidos"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.apellidos }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Cedula de Identidad:</label
              >
              <div>
                <input
                  type="number"
                  v-model="form.ci"
                  placeholder="Escriba la cedula de identidad"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.ci }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Cargo:</label
              >
              <div>
                <input
                  type="text"
                  v-model="form.cargo"
                  placeholder="Escriba la cargo"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.cargo }}</li>
              </ul>
            </div>         
          </div>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <Link
          :href="route('tecnicos.index')"
          class="border-1 text-sm font-semibold rounded-md py-2 p-4 text-black bg-gray-200"
          >Cancel</Link
        >
        <button
          @click.prevent="update"
          class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
        >
          Actualizar
        </button>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import Cristal from "@/Components/Cristal.vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  components: {
    AppLayout,
    Link,
    Cristal,
  },
  props: {
    tecnico: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      error: [],
      loading: false,
      form: this.tecnico,
      procesoAgregar: false,
    };
  },
  methods: {
    update() {
      this.loading = true;
      this.form.activo = 1;
      axios
        .put(route("tecnico.update", this.tecnico), this.form)
        .then((response) => {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Actualizado con Exito",
            showConfirmButton: false,
            timer: 2000,
          });
          this.loading = false;
          this.$inertia.visit(route("tecnicos.index"));
        })
        .catch((error) => {
          this.error = error.response.data.errors;
          this.loading = false;
        });
    },
  },
};
</script>
