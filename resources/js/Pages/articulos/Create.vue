<template>
  <AppLayout>
    <Cristal v-show="loading" />
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        CREAR NUEVO ARTICULO
      </h1>
      <div
        class="flex items-center text-red-600 font-bold transition-all hover:text-red-800"
      >
        <Link :href="route('articulos.index')">articulos/</Link>
        <span class="text-green-700">crear</span>
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
                  v-model="articulo.codigo"
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
                  v-model="articulo.fecha"
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
                  v-model="articulo.nombre"
                  placeholder="Escriba el nombre del articulo"
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
                  v-model="articulo.tamano"
                  placeholder="Escriba el tamaño "
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.tamano }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Categoria del Dispositivo</label
              >
              <div>
                <select
                  id="small"
                  v-model="articulo.categoria_id"
                  required
                  class="block w-full h-12 -2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                  <option
                    v-for="categoria in categorias"
                    :key="categoria.id"
                    :value="categoria.id"
                  >
                    {{ categoria.nombre }}
                  </option>
                </select>
              </div>
              <p class="text-red-400">{{ error.categoria_id }}</p>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Cantidad:</label
              >
              <div>
                <input
                  type="number"
                  v-model="articulo.cantidad"
                  placeholder="Escriba la cantidad actual "
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.cantidad }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Marca:</label
              >
              <div>
                <input
                  type="text"
                  v-model="articulo.marca"
                  placeholder="Escriba la marca del articulo"
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
                  v-model="articulo.modelo"
                  autocomplete="codigo"
                  placeholder="Escriba el modelo del articulo"
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
                  v-model="articulo.descripcion"
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
          :href="route('articulos.index')"
          class="border-1 text-sm font-semibold rounded-md py-2 p-4 text-white bg-red-600"
          >Cancel</Link
        >
        <button
          @click.prevent="store"
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
    categorias: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      loading: false,
      error: [],   
      articulo: {
        codigo: "",
        nombre: "",
        fecha: this.fecha,        
        marca: "",
        modelo: "",
        tamano: "",
        cantidad: 0,
        descripcion: "",
        categoria_id: 2,
      },
    };
  },

  methods: {
    store() {
      this.loading = true;
      axios
        .post(route("articulo.store"), this.articulo)
        .then((response) => {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Creado con Exito",
            showConfirmButton: false,
            timer: 2000,
          });
          this.loading = false;
          this.$inertia.visit(route("articulos.index"));
        })
        .catch((error) => {
          this.error = error.response.data.errors;
          this.loading = false;
          console.log(error)
        });
    },
  },
};
</script>
