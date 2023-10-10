<template>
  <AppLayout>
    <Cristal v-show="loading" />
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        CREAR NUEVO EQUIPO
      </h1>
      <div
        class="flex items-center text-red-600 font-bold transition-all hover:text-red-800"
      >
        <Link :href="route('equipos.index')">equipos/</Link>
        <span class="text-green-700">crear</span>
      </div>
    </div>
    <div class="px-6 w-full mb-8">
      <div
        class="w-full h-8 flex flex-col sm:flex-row items-center justify-center space-x-1 sm:space-y-0 space-y-1"
      >
        <button
          @click="setentrada('equipo')"
          class="text-gray-200 h-8 hover:text-white transition-all flex items-center justify-center sm:w-1/2 w-full px-1 hover:bg-blue-700 bg-blue-600 rounded-md"
        >
          <span>EQUIPOS</span>
        </button>
        <button
          @click="setentrada('componentes')"
          class="text-gray-200 h-8 hover:text-white transition-all flex items-center justify-center sm:w-1/2 w-full px-1 hover:bg-blue-700 bg-blue-600 rounded-md"
        >
          <span>COMPONENTES</span>
        </button>
      </div>
    </div>
    <div>
      <!-- *****************  equipo ********************** -->
      <div class="space-y-12 px-6" v-if="entrada === 'equipo'">
        <div class="border-b border-gray-900/10">
          <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Codigo:</label
              >
              <div>
                <input
                  type="text"
                  v-model="equipo.codigo"
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
                  v-model="equipo.fecha"
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
                >Procesador:</label
              >
              <div>
                <input
                  type="text"
                  v-model="equipo.procesador"
                  placeholder="Escriba el tipo de procesador"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.procesador }}</li>
              </ul>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Placa Madre:</label
              >
              <div>
                <input
                  type="text"
                  v-model="equipo.placa"
                  placeholder="Escriba el tipo de placa madre"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.placa }}</li>
              </ul>
            </div>

            <div class="sm:col-span-6">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Descripición:</label
              >
              <div>
                <textarea
                  rows="3"
                  v-model="equipo.descripcion"
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

      <!-- *****************  componentes ********************** -->
      <div v-if="entrada === 'componentes'" class="w-full">
        <div class="w-full px-6 pb-6 flex items-center justify-end">
          <button
            @click="openModalComponente"
            class="bg-green-600 hover:bg-green-700 transition-all rounded-md p-2 text-white"
          >
            <span>Nuevo</span>
          </button>
        </div>

        <!-- *****************  componentes  tabla ********************** -->
        <div
          v-if="componentes.length === 0"
          class="relative overflow-x-auto shadow-md sm:rounded-lg px-6 pb-6"
        >
          <span
            class="text-red-500 h-12 w-full flex items-center justify-center bg-white"
          >
            Ningun Componente Agregado
          </span>
        </div>
        <div
          v-else
          class="relative overflow-x-auto shadow-md sm:rounded-lg px-6 pb-6"
        >
          <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
          >
            <thead
              class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
              <th scope="col" class="px-6 py-3">
                <div class="flex items-center">COMPONENTE</div>
              </th>
              <th scope="col" class="px-6 py-3">
                <div class="flex items-center">CARACTERISTICA</div>
              </th>
              <th scope="col" class="px-6 py-3">
                <div class="flex items-center">TIPO</div>
              </th>
              <th scope="col" class="px-6 py-3">
                <div class="flex items-center">ACCIÓN</div>
              </th>
            </thead>
            <tbody>
              <tr
                v-for="componente in componentes"
                :key="componente.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  <div class="flex flex-col items-start justify-center text-md">
                    <span class="text-gray-950">{{ componente.nombre }}</span>
                    <span class="text-gray-950">{{ componente.tamano }}</span>
                  </div>
                </th>
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  <div class="flex flex-col items-start justify-center text-md">
                    <span class="text-gray-950">{{ componente.marca }}</span>
                    <span class="text-gray-950">{{ componente.modelo }}</span>
                  </div>
                </th>
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  <div class="flex flex-col items-start justify-center text-md">
                    <span class="text-gray-950">{{ componente.tipo }}</span>
                  </div>
                </th>
                <td class="px-6 py-4 text-white">
                  <div class="flex items-center justify-center space-x-1">
                    <button
                      @click="editComponente(componente.id)"
                      class="bg-green-600 text-white hover:bg-green-700 transition-all rounded-md p-1 text-xl felx items-center justify-center w-8"
                    >
                      <span><i class="bx bxs-edit"></i></span>
                    </button>
                    <button
                      @click="eliminarComponente(componente.id)"
                      class="bg-red-600 text-white hover:bg-red-700 transition-all rounded-md p-1 text-xl felx items-center justify-center w-8"
                    >
                      <span><i class="bx bx-x"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- modal para agreagar nuevos coponentes -->

        <DialogModal :show="ModalComponente">
          <template #title>
            <div class="w-full flex items-center justify-center text-green-700">
              <span>Agregar Nuevo</span>
            </div>
          </template>

          <template #content>
            <div class="border-b border-gray-900/10">
              <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Nombre</label
                  >
                  <div>
                    <input
                      type="text"
                      v-model="componente.nombre"
                      placeholder="Escriba el Nombre del componente"
                      class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                  </div>
                  <p class="text-red-400">{{ errorComponentes[0] }}</p>
                </div>
                <div class="sm:col-span-3">
                  <label
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Tamaño</label
                  >
                  <div>
                    <input
                      type="text"
                      v-model="componente.tamano"
                      placeholder="Escriba el tamañoe"
                      class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                  </div>
                  <p class="text-red-400">{{ errorComponentes[1] }}</p>
                </div>
                <div class="sm:col-span-3">
                  <label
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Marca:</label
                  >
                  <div>
                    <input
                      type="text"
                      v-model="componente.marca"
                      placeholder="Escrtiba la marca del componente"
                      class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                  </div>
                  <p class="text-red-400">{{ errorComponentes[2] }}</p>
                </div>
                <div class="sm:col-span-3">
                  <label
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Modelo:</label
                  >
                  <div>
                    <input
                      type="text"
                      v-model="componente.modelo"
                      placeholder="Escriba el modelo del componente"
                      class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                  </div>
                  <p class="text-red-400">{{ errorComponentes[3] }}</p>
                </div>
                <div class="sm:col-span-3">
                  <label
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Tipo de Componente</label
                  >
                  <div>
                    <select
                      id="small"
                      v-model="componente.tipo"
                      required
                      class="block w-full h-12 -2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                      <option
                        v-for="categoria in categorias"
                        :key="categoria.id"
                        :value="categoria.nombre"
                      >
                        {{ categoria.nombre }}
                      </option>
                    </select>
                  </div>
                  <p class="text-red-400">{{ errorComponentes[4] }}</p>
                </div>
                <div class="sm:col-span-3">
                  <label
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Fecha:</label
                  >
                  <div>
                    <input
                      type="date"
                      v-model="componente.fecha"
                      disabled
                      class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                  </div>
                </div>
              </div>
            </div>
          </template>

          <template #footer>
            <SecondaryButton
              v-if="showButton === 'agregarComponente'"
              @click="ModalComponente = false"
            >
              Cancelar
            </SecondaryButton>

            <DangerButton
              v-if="showButton === 'agregarComponente'"
              class="ml-2"
              @click="agregarComponente"
              :class="{ 'opacity-25': procesoAgregar }"
              :disabled="procesoAgregar"
            >
              Agregar
            </DangerButton>
            <DangerButton
              v-else
              class="ml-2"
              @click="updateComponente"
              :class="{ 'opacity-25': procesoAgregar }"
              :disabled="procesoAgregar"
            >
              Actualizar
            </DangerButton>
          </template>
        </DialogModal>
      </div>

      <!-- *****************  botones ********************** -->
      <div
        v-if="componentes.length > 0"
        class="mt-6 flex items-center justify-end gap-x-6"
      >
        <Link
          :href="route('funcionarios.index')"
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
import ValidationErrors from "@/Components/ValidationErrors.vue";
import DialogModal from "@/Components/DialogModal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import Cristal from "@/Components/Cristal.vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  components: {
    AppLayout,
    Link,
    ValidationErrors,
    DialogModal,
    DangerButton,
    SecondaryButton,
    Cristal,
  },
  props: {
    fecha: {
      type: String,
      required: true,
    },
    categorias: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      equipo_id: 0,
      entrada: "equipo",
      conteo: 0,
      loading: false,
      error: [],
      ModalComponente: false,
      procesoAgregar: false,
      showButton: "agregarComponente",
      componentId: 0,
      errorComponentes: [],
      componentes: [],
      validarComponente: false,      
      equipo: {
        codigo: "",
        fecha: this.fecha,
        procesador: "",
        placa: "",
        descripcion: "",
        estado: "nuevo",
      },
      componente: {
        id: this.conteo,
        nombre: "",
        tamano: "",
        fecha: this.fecha,
        marca: "",
        modelo: "",
        tipo: "Disco Duro HDD",
        equipo_id: 0,
      },
    };
  },

  methods: {
    setentrada($tipo) {
      this.entrada = $tipo;
    },

    agregarComponente() {
      this.errorComponentes = [];
      // validacion nombre
      if (this.componente.nombre === "") {
        this.errorComponentes.push({ nombre: "El campo es requrido" });
      }
      if (this.componente.nombre.length > 200) {
        this.errorComponentes.push({ nombre: "El texto de demasiado largo" });
      }
      // validacion tamaño
      if (this.componente.tamano === "") {
        this.errorComponentes.push({ tamano: "El campo es requrido" });
      }
      if (this.componente.tamano.length > 200) {
        this.errorComponentes.push({ tamano: "El texto de demasiado largo" });
      }
      // validacion marca
      if (this.componente.marca === "") {
        this.errorComponentes.push({ marca: "El campo es requrido" });
      }
      if (this.componente.marca.length > 200) {
        this.errorComponentes.push({ marca: "El texto de demasiado largo" });
      }
      // validacion modelo
      if (this.componente.modelo === "") {
        this.errorComponentes.push({ modelo: "El campo es requrido" });
      }
      if (this.componente.modelo.length > 200) {
        this.errorComponentes.push({ modelo: "El texto de demasiado largo" });
      }
      // validacion tipo
      if (this.componente.tipo === "") {
        this.errorComponentes.push({ tipo: "El campo es requrido" });
      }

      if (this.errorComponentes.length > 0) {
        this.validarComponente = true;
      }
      if (this.validarComponente === false) {
        this.procesoAgregar = true;
        this.componentes.push(this.componente);
        this.conteo++;
        this.componente = {};
        this.ModalComponente = false;
        this.procesoAgregar = false;
      }
      this.validarComponente = false;
    },

    openModalComponente() {
      this.showButton = "agregarComponente";
      this.componente = {
        id: this.conteo,
        nombre: "",
        fecha: this.fecha,
        marca: "",
        modelo: "",
        tamano: "",
        tipo: "Disco Duro HDD",
        equipo_id: 0,
      };
      this.errorComponentes = [];
      this.ModalComponente = true;
    },

    editComponent($id) {
      this.showButton = "updateComponente";
      this.componente = {
        id: this.conteo,
        nombre: "",
        fecha: this.fecha,
        marca: "",
        modelo: "",
        tamano: "",
        tipo: "",
      };
      this.errorComponentes = [];
      for (let i = 0; i < this.componentes.length; i++) {
        const element = this.componentes[i];
        if (element.id === $id) {
          this.componente = element;
          this.componentId = i;
        }
      }
      this.ModalComponente = true;
    },

    updateComponente() {
      this.errorComponentes = [];
      // validacion nombre
      if (this.componente.nombre === "") {
        this.errorComponentes.push({ nombre: "El campo es requrido" });
      }
      if (this.componente.nombre.length > 200) {
        this.errorComponentes.push({ nombre: "El texto de demasiado largo" });
      }
      // validacion tamaño
      if (this.componente.tamano === "") {
        this.errorComponentes.push({ tamano: "El campo es requrido" });
      }
      if (this.componente.tamano.length > 200) {
        this.errorComponentes.push({ tamano: "El texto de demasiado largo" });
      }
      // validacion marca
      if (this.componente.marca === "") {
        this.errorComponentes.push({ marca: "El campo es requrido" });
      }
      if (this.componente.marca.length > 200) {
        this.errorComponentes.push({ marca: "El texto de demasiado largo" });
      }
      // validacion modelo
      if (this.componente.modelo === "") {
        this.errorComponentes.push({ modelo: "El campo es requrido" });
      }
      if (this.componente.modelo.length > 200) {
        this.errorComponentes.push({ modelo: "El texto de demasiado largo" });
      }
      // validacion tipo
      if (this.componente.tipo === "") {
        this.errorComponentes.push({ tipo: "El campo es requrido" });
      }

      if (this.errorComponentes.length > 0) {
        this.validarComponente = true;
      }
      if (this.validarComponente === false) {
        this.procesoAgregar = true;
        let update = this.componente;
        this.componentes[this.componentId] = {
          ...this.componentes[this.componentId],
          update,
        };
        console.log(update);
        this.ModalComponente = false;
        this.procesoAgregar = false;
      }
      this.validarComponente = false;
    },

    eliminarComponente($id) {
      for (let i = 0; i < this.componentes.length; i++) {
        const element = this.componentes[i];
        if (element.id === $id) {
          this.componentes.splice(i, 1);
          this.componentId = i;
        }
      }
    },

    store() {
      this.loading = true;
      axios
        .post(route("equipo.store"), this.equipo)
        .then((response) => {
          this.equipo_id = response.data;
          console.log(this.equipo_id);
          for (let i = 0; i < this.componentes.length; i++) {
            this.componentes[i] = {
              ...this.componentes[i],
              equipo_id: this.equipo_id,
            };
            const componente = this.componentes[i];
            console.log(componente);
            axios
              .post(route("componente.store"), componente)
              .then((response) => {
                console.log(response);
              })
              .catch((error) => {
                this.error = error.response.data.errors;
                this.loading = false;
                console.log(error);
              });
          }
          Swal.fire({
            position: "center",
            icon: "success",
            title: "creado con exito",
            showConfirmButton: false,
            timer: 2000,
          });
          this.loading = false;
          this.$inertia.visit(route("equipos.index"));
        })
        .catch((error) => {
          this.error = error.response.data.errors;
          this.loading = false;
          console.log(error);
          this.entrada = "equipo";
        });
    },
  },
};
</script>


<style></style>
