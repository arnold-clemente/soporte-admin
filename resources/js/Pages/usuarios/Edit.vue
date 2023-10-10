<template>
  <AppLayout>
    <Cristal v-show="loading" />
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        EDITAR USUARIO
      </h1>
      <div
        class="flex items-center text-red-600 font-bold transition-all hover:text-red-800"
      >
        <Link :href="route('usuarios.index')">funcionarios/</Link>
        <span class="text-green-700">{{ user.id }}/</span>
        <span class="text-green-700">editar</span>
      </div>
    </div>

    <!-- formulario para actualizar funcionario -->

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
                  v-model="form.name"
                  placeholder="Escriba el nombre completo"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.name }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Usuario:</label
              >
              <div>
                <input
                  type="text"
                  v-model="form.usuario"
                  placeholder="Escriba los Apellidos"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.usuario }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Email:</label
              >
              <div>
                <input
                  type="email"
                  v-model="form.email"
                  placeholder="Escriba el correo de usuario"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.email }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <Link
          :href="route('usuarios.index')"
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
    user: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      error: [],
      loading: false,
      form: this.user,
      procesoAgregar: false,
    };
  },
  methods: {
    update() {
      this.loading = true;
      axios
        .put(route("usuario.update", this.user), this.form)
        .then((response) => {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Actualizado",
            showConfirmButton: false,
            timer: 2000,
          });
          this.loading = false;
          this.$inertia.visit(route("usuarios.index"));
        })
        .catch((error) => {
          this.error = error.response.data.errors;
          this.loading = false;
        });
    },
  },
};
</script>
  