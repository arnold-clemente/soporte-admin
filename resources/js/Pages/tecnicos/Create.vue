<template>
  <AppLayout>
    <Cristal v-show="loading" />
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        CREAR NUEVO TÉCNICO
      </h1>
      <div
        class="flex items-center text-red-600 font-bold transition-all hover:text-red-800"
      >
        <Link :href="route('tecnicos.index')">tecnicos/</Link>
        <span class="text-green-700">crear</span>
      </div>
    </div>
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
                  v-model="tecnico.nombres"
                  autocomplete="nombres"
                  placeholder="Escriba los nombres"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <div class="mt-3 list-dick list-inside text-sm text-red-600">
                <p>{{ error.nombres }}</p>
              </div>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Apellidos:</label
              >
              <div>
                <input
                  type="text"
                  v-model="tecnico.apellidos"
                  placeholder="Escriba los Apellidos"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <div class="mt-3 list-dick list-inside text-sm text-red-600">
                <p>{{ error.apellidos }}</p>
              </div>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Cedula de Identidad:</label
              >
              <div>
                <input
                  type="number"
                  v-model="tecnico.ci"
                  placeholder="Escriba la cedula de identidad"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <div class="mt-3 list-dick list-inside text-sm text-red-600">
                <p>{{ error.ci }}</p>
              </div>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Cargo:</label
              >
              <div>
                <input
                  type="text"
                  v-model="tecnico.cargo"
                  placeholder="Escriba la cargo"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <div class="mt-3 list-dick list-inside text-sm text-red-600">
                <p>{{ error.cargo }}</p>
              </div>
            </div>
            
            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Usuario:</label
              >
              <div>
                <input
                  type="text"
                  v-model="tecnico.usuario"
                  placeholder="Escriba el nombre de usuario"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <div class="mt-3 list-dick list-inside text-sm text-red-600">
                <p>{{ error.usuario }}</p>
              </div>
            </div>
            
            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Correo:</label
              >
              <div>
                <input
                  type="text"
                  v-model="tecnico.email"
                  placeholder="Escriba el correo electronico unico"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <div class="mt-3 list-dick list-inside text-sm text-red-600">
                <p>{{ error.email }}</p>
              </div>
            </div>
          
          </div>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <Link
          :href="route('tecnicos.index')"
          class="border-1 text-sm font-semibold rounded-md py-2 p-4 text-white bg-red-600"
          >Cancel</Link
        >
        <button
          @click="store"
          class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
        >
          Guardar
        </button>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import Cristal from "@/Components/Cristal.vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  data() {
    return {
      error: [],
      loading: false,
      tecnico: {
        nombres: "",
        apellidos: "",
        ci: "",
        cargo: "",
        usuario: "",
        email: "",
        unidad_id: 1,
      },
    };
  },
  components: {
    AppLayout,
    Link,
    ValidationErrors,
    Cristal,
  },
  methods: {
    store() {
      this.loading = true;
      axios
        .post(route("tecnico.store"), this.tecnico)
        .then((response) => {
          console.log(response.data);
          Swal.fire({
            position: "center",
            icon: "success",
            title: "creado con Exito",
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

