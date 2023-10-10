<template>
  <AppLayout>
    <Cristal v-show="loading" />
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        ACTUALIZAR DISPOSITIVO
      </h1>
      <div
        class="flex items-center text-red-600 font-bold transition-all hover:text-red-800"
      >
        <Link :href="route('dispositivos.index')">dispositivos/</Link>
        <span class="text-green-700">{{ form.id }}/</span>
        <span class="text-green-700">editar</span>
      </div>
    </div>
    <div>
      <div class="space-y-12 px-6">
        <div class="border-b border-gray-900/10">
          <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Codigo:</label
              >
              <div>
                <input
                  type="text"
                  v-model="form.codigo"
                  autocomplete="codigo"
                  placeholder="Escriba el codigo"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.codigo }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Fecha:</label
              >
              <div>
                <input
                  type="date"
                  v-model="form.fecha"
                  disabled
                  class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.fecha }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Nombre:</label
              >
              <div>
                <input
                  type="text"
                  v-model="form.nombre"
                  placeholder="Escriba el nombre del equipo"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.nombre }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Tamaño:</label
              >
              <div>
                <input
                  type="text"
                  v-model="form.tamano"
                  placeholder="Escriba el tamaño"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.marca }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Marca:</label
              >
              <div>
                <input
                  type="text"
                  v-model="form.marca"
                  placeholder="Escriba la marca del dispositivo"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.marca }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Modelo:</label
              >
              <div>
                <input
                  type="text"
                  v-model="form.modelo"
                  autocomplete="codigo"
                  placeholder="Escriba el modelo del dispositivo"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.modelo }}</li>
              </ul>
            </div>

            <div class="sm:col-span-6">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Descripición:</label
              >
              <div>
                <textarea
                  rows="3"
                  v-model="form.descripcion"
                  placeholder="Escriba una breve descripición"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
                </textarea>
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.descripcion }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <Link
          :href="route('dispositivos.index')"
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
    fecha: {
      type: String,
      required: true,
    },
    dispositivo: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      loading: false,
      error: [],
      form: this.dispositivo,      
    };
  },

  methods: {
    update() {
      this.loading = true;
      axios
        .put(route("dispositivo.update", this.dispositivo), this.form)
        .then((response) => {
          Swal.fire({
            position: "center",
            icon: "success",
            title: response.data,
            showConfirmButton: false,
            timer: 2000,
          });
          this.loading = false;
          this.$inertia.visit(route("dispositivos.index"));
        })
        .catch((error) => {
          this.error = error.response.data.errors;
          this.loading = false;
        });
    },    
  },
};
</script>
