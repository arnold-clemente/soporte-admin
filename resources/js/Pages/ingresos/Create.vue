<template>
  <AppLayout>
    <Cristal v-show="loading" />
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        CREAR NUEVO INGRESO DE ARTICULOS
      </h1>
      <div
        class="flex items-center text-red-600 font-bold transition-all hover:text-red-800"
      >
        <Link :href="route('ingresos.index')">articulos/</Link>
        <span class="text-green-700">crear</span>
      </div>
    </div>
    <div class="space-y-12 px-6">
      <div class="border-b border-gray-900/10">
        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
          <div class="sm:col-span-3 flex items-center">
            <form @submit.prevent="setFuncionario">
              <div class="flex items-center">
                <input
                  type="search"
                  v-model="buscar"
                  autocomplete="codigo"
                  placeholder="Buscar funcionario..."
                  class="block h-10 w-11/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />

                <button
                  type="submit"
                  class="bg-green-700 hover:bg-green-600 transition-all text-white rounded-md font-bold p-2 flex items-center space-x-1"
                >
                  <i class="bx bx-search-alt"></i>
                  <span>Buscar</span>
                </button>
              </div>
            </form>
            <div v-show="selectfuncionario">
              <button
                @click="cerraBusqueda"
                class="bg-red-700 h-10 hover:bg-red-600 transition-all text-white rounded-md font-bold p-2 flex items-center space-x-1"
              >
                <i class="bx bx-x"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- contenedor de busqueda -->
    <div class="px-6 relative w-full" v-show="selectfuncionario">
      <div class="border-b border-gray-900/10">
        <div class="grid grid-cols-1 sm:grid-cols-6">
          <div
            v-if="filterFuncionarios.length > 0"
            class="sm:col-span-3 bg-white pr-2 overflow-y-auto max-h-56"
          >
            <div
              v-for="funcionario in filterFuncionarios"
              :key="funcionario.id"
            >
              <button
                @click="selection(funcionario)"
                class="flex flex-col w-full text-sm rounded-md text-gray-700 border-b-2"
              >
                <p>
                  <span class="text-green-600 mr-1">Nombre:</span
                  >{{ funcionario.nombres }}
                </p>
                <p>
                  <span class="text-green-600 mr-1">Apellidos:</span
                  >{{ funcionario.apellidos }}
                </p>
                <p>
                  <span class="text-green-600 mr-1">ci:</span
                  >{{ funcionario.ci }}
                </p>
              </button>
            </div>
          </div>
          <div
            v-else
            class="sm:col-span-3 bg-gray-100 pr-2 overflow-y-auto max-h-56"
          >
            <button
              @click="cerraBusqueda"
              class="bg-red-500 text-white rounded-md py-2 w-11/12"
            >
              <span class="ml-2">No encontrado</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="space-y-12 px-6">
      <div class="border-b border-gray-900/10">
        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900"
              >Funcionario:</label
            >
            <div class="sm:col-span-3">
              <div>
                <input
                  type="text"
                  disabled
                  v-model="funcionarioNombres"
                  autocomplete="codigo"
                  placeholder="Nombre Completo"
                  class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
            </div>
            <ul class="mt-3 list-dick list-inside text-sm text-red-600">
              <li>{{ error.funcionario_id }}</li>
            </ul>
          </div>
          <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900"
              >Fecha:</label
            >
            <div>
              <input
                type="date"
                v-model="ingreso.fecha"
                disabled
                class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              />
            </div>
          </div>
          <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900"
              >Documento:</label
            >
            <div>
              <input
                type="text"
                v-model="ingreso.documento"
                placeholder="Escriba el documento"
                class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              />
            </div>
            <ul class="mt-3 list-dick list-inside text-sm text-red-600">
              <li>{{ error.documento }}</li>
            </ul>
          </div>
          <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900"
              >Codigo:</label
            >
            <div>
              <input
                type="text"
                v-model="ingreso.codigo"
                autocomplete="codigo"
                placeholder="Escriba el codigo del documento"
                class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              />
            </div>
            <ul class="mt-3 list-dick list-inside text-sm text-red-600">
              <li>{{ error.codigo }}</li>
            </ul>
          </div>

          <div class="sm:col-span-3">
            <div>
              <input
                type="text"
                disabled
                v-model="funcioanrioCi"
                autocomplete="codigo"
                placeholder="Numero de C.I."
                class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              />
            </div>
          </div>
          <div class="sm:col-span-3">
            <div>
              <input
                type="text"
                disabled
                v-model="funcionarioUnidad"
                autocomplete="codigo"
                placeholder="Unidad"
                class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              />
            </div>
          </div>
        </div>
        <!-- para el listad  -->
        <div class="p-6 w-full">
          <h1 class="text-green-700 font-bold w-full text-left">
            LISTADO DE AGREGADOS
          </h1>
        </div>
        <!-- alertas   -->
        <div
          v-show="message_funcionario"
          class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
          role="alert"
        >
          <span class="font-medium">Funcionario: </span> No se encontro
          funcionario seleccionado.
        </div>
        <div
          v-show="message"
          class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
          role="alert"
        >
          <span class="font-medium">Advertencia!</span>
          Agregue algunas cosas e intente enviar de nuevo.
        </div>
        <!-- modal para agregar  -->
        <ArticuloComponent
          v-bind:addedsArt="tableArticulos"
          v-bind:articulos="articulos"
          @createArticulo="createArticulo"
        />

        <!-- tabla de agregados  -->
        <Table
          v-bind:articulos="tableArticulos"
          @eliminarArticulo="eliminarArticulo"
          @sumarCantidad="sumarCantidad"
          @restarCantidad="restarCantidad"
        />
      </div>
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <Link
          :href="route('entregas.index')"
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
import pickBy from "lodash/pickBy";
import Table from "./Table.vue";
import ArticuloComponent from "./Articulos.vue";

export default {
  components: {
    AppLayout,
    Link,
    Cristal,
    Table,
    ArticuloComponent,
  },
  props: {
    fecha: {
      type: String,
      required: true,
    },
    funcionarios: {
      type: Object,
      required: true,
    },
    articulos: {
      type: Object,
      required: true,
    },
    tecnico: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      error: [],
      loading: false,
      funcionario: 0,
      buscar: "",
      selectfuncionario: false,
      funcionarioNombres: "",
      funcioanrioCi: null,
      funcionarioUnidad: "",
      funcionarioDependencia: "",
      funcionario_id: 0,
      message: false,
      message_funcionario: false,
      ingreso: {
        documento: "",
        codigo: "",
        fecha: this.fecha,
        tecnico_id: this.tecnico.id,
        user_id: this.tecnico.user_id,
        unidad_id: this.tecnico.unidad_id,
        funcionario_id: 0,
      },
      ingreso_id: null,
      filterFuncionarios: [],
      tableArticulos: [],
    };
  },
  methods: {
    setFuncionario() {
      this.filterFuncionarios = [];
      this.selectfuncionario = true;
      const search = this.buscar.toLowerCase();
      for (let funcionario of this.funcionarios) {
        let nombres = funcionario.nombres.toLowerCase();
        let apellidos = funcionario.apellidos.toLowerCase();
        let ci = funcionario.ci.toString();
        if (
          nombres.indexOf(search) !== -1 ||
          apellidos.indexOf(search) !== -1 ||
          ci.indexOf(search) !== -1
        ) {
          this.filterFuncionarios.push(funcionario);
        }
      }
    },
    selection($funcionario) {
      this.selectfuncionario = false;
      this.funcionarioNombres =
        $funcionario.nombres + " " + $funcionario.apellidos;
      this.funcioanrioCi = $funcionario.ci;
      this.funcionarioUnidad = $funcionario.unidad.nombre;
      this.funcionarioDependencia = $funcionario.unidad.dependencia;
      this.funcionario_id = $funcionario.id;
    },
    cerraBusqueda() {
      this.selectfuncionario = false;
    },
    createArticulo($articulo) {
      const articulo = {
        id: $articulo.id,
        codigo: $articulo.codigo,
        nombre: $articulo.nombre,
        tipo: $articulo.categoria.nombre,
        ingreso_id: 0,
        fecha: this.fecha,
        cantidad: 1,
        validation: "",
      };
      this.tableArticulos.push(articulo);
    },
    eliminarArticulo($articulo) {
      for (let i = 0; i < this.tableArticulos.length; i++) {
        const element = this.tableArticulos[i];
        if (element.id === $articulo.id) {
          this.tableArticulos.splice(i, 1);
        }
      }
    },
    restarCantidad($articulo) {
      if ($articulo.cantidad > 1) {
        $articulo.cantidad = $articulo.cantidad - 1;
      } else {
        $articulo.validation = "No puede ser menor a 1";
      }
      setTimeout(() => ($articulo.validation = ""), 2000);
    },
    sumarCantidad($articulo) {
      $articulo.cantidad = $articulo.cantidad + 1;
    },

    store() {
      if (this.tableArticulos.length > 0) {
        if (this.funcionario_id === 0) {
          this.message_funcionario = true;
          setTimeout(() => (this.message_funcionario = false), 2000);
        } else {
          this.loading = true;
          this.ingreso.funcionario_id = this.funcionario_id;
          axios
            .post(route("ingreso.store"), this.ingreso)
            .then((response) => {
              this.ingreso_id = response.data;
              //CREAR ARTICULO
              if (this.tableArticulos.length > 0) {
                for (let i = 0; i < this.tableArticulos.length; i++) {
                  const articulo = this.tableArticulos[i];
                  articulo.ingreso_id = this.ingreso_id;
                  console.log(articulo);
                  axios
                    .post(route("ingreso.articulo.store"), articulo)
                    .then((response) => {
                      console.log(response);
                    })
                    .catch((error) => {
                      this.error = error.response.data.errors;
                      this.loading = false;
                      console.log(error);
                    });
                }
              }
              //FIN ARTICULO
              this.loading = false;
              Swal.fire({
                position: "center",
                icon: "success",
                title: "creado con exito",
                showConfirmButton: false,
                timer: 2000,
              });
              this.$inertia.visit(route("ingresos.index"));
            })
            .catch((error) => {
              this.error = error.response.data.errors;
              this.loading = false;
              console.log(error);
            });
        }
      } else {
        this.message = true;
        setTimeout(() => (this.message = false), 2000);
      }
    },
  },
  watch: {
    buscar() {
      this.selectfuncionario = true;
    //   setTimeout(() => this.setFuncionario(), 2000);
      // this.setFuncionario();
    },
  },
};
</script>

<style></style>