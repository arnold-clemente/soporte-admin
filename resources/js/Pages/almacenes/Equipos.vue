
<template>
  <button
    @click="openModal"
    class="py-1 px-2 text-white rounded-md bg-green-500 hover:bg-green-600 transition-all"
  >
    Equipos
  </button>
  <DialogModal :show="modalEquipo" @close="modalEquipo = false">
    <template #title>
      <div class="w-full flex items-center justify-center text-green-700">
        <span>Agregar Nuevo Equipo</span>
      </div>
    </template>
    <template #content>
      <div
        v-show="message"
        class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
        role="alert"
      >
        <span class="font-medium">Exitente!</span> Equipo ya agregado
      </div>
      <div class="space-y-12 px-6">
        <div class="border-b border-gray-900/10">
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6 content-start justify-self-start"
          >
            <div class="sm:col-span-3 flex flex-col">
              <div>
                <form @submit.prevent="setEquipo">
                  <div class="flex items-center">
                    <input
                      type="search"
                      v-model="buscar"
                      autocomplete="codigo"
                      placeholder="Buscar equipo..."
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
              </div>
              <!-- contenedor de busqueda -->
              <div class="relative w-full" v-show="selectEquipo">
                <div class="border-b">
                  <div class="">
                    <div
                      v-if="filterEquipos.length > 0"
                      class="sm:col-span-3 bg-white pr-2 overflow-y-auto max-h-56"
                    >
                      <div v-for="equipo in filterEquipos" :key="equipo.id">
                        <button
                          @click="selection(equipo)"
                          class="flex flex-col w-full text-sm rounded-md text-gray-700 hover:bg-green-200 transition-all border-b-2"
                        >
                          <p>
                            <span class="text-green-600 mr-1">Codigo:</span
                            >{{ equipo.codigo }}
                          </p>
                          <p>
                            <span class="text-green-600 mr-1">Cpu:</span
                            >{{ equipo.procesador }}
                          </p>
                        </button>
                      </div>
                    </div>
                    <div
                      v-else
                      class="sm:col-span-3 bg-white pr-2 overflow-y-auto max-h-56"
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
            </div>
            <div class="sm:col-span-3 flex flex-col">
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Equipo:</label
              >
              <div>
                <div class="sm:col-span-3">
                  <div>
                    <input
                      type="text"
                      disabled
                      v-model="codigo"
                      placeholder="codigo del equipo"
                      class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                  </div>
                </div>
              </div>
              <div class="mt-1">
                <div class="sm:col-span-3">
                  <div>
                    <input
                      type="text"
                      disabled
                      v-model="procesador"
                      placeholder="procesador"
                      class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                  </div>
                </div>
                <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                  <li>{{ error.equipo }}</li>
                </ul>
              </div>
              <label class="block text-sm font-medium leading-6 text-gray-900"
                >Descripción:</label
              >
              <div>
                <div class="sm:col-span-3">
                  <div>
                    <input
                      type="text"
                      v-model="descripcion"
                      autocomplete="codigo"
                      placeholder="Descripción del Equipo"
                      class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                  </div>
                  <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                    <li>{{ error.descripcion }}</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>

    <template #footer>
      <SecondaryButton @click="closeModal"> Cerrar </SecondaryButton>

      <DangerButton
        class="ml-2"
        @click="create"
        :class="{ 'pointer-events-none': procesoAgregar }"
        :disabled="procesoAgregar"
      >
        Agregar
      </DangerButton>
    </template>
  </DialogModal>
</template>
  
  <script>
import DialogModal from "@/Components/DialogModal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

export default {
  components: {
    DialogModal,
    SecondaryButton,
    DangerButton,
  },
  props: {
    equipos: {
      type: Object,
      required: true,
    },
    addeds: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      procesoAgregar: false,
      modalEquipo: false,
      message: false,
      showButton: true,
      selectEquipo: false,
      buscar: "",
      filterEquipos: [],
      equipo_id: null,
      codigo: "",
      procesador: "",
      descripcion: "",
      almacen_id: null,
      error: {
        equipo: "",
        descripcion: "",
      },
    };
  },
  emits: ["createEquipo"],
  methods: {
    setEquipo() {
      this.filterEquipos = [];
      this.selectEquipo = true;
      const search = this.buscar.toLowerCase();
      for (let equipo of this.equipos) {
        let codigo = equipo.codigo.toLowerCase();
        if (codigo.indexOf(search) !== -1) {
          this.filterEquipos.push(equipo);
        }
      }
    },
    selection($equipo) {
      this.selectEquipo = false;
      this.equipo_id = $equipo.id;
      this.codigo = $equipo.codigo;
      this.procesador = $equipo.procesador;
    },
    cerraBusqueda() {
      this.selectEquipo = false;
    },
    create() {
      if (this.descripcion === "") {
        this.error.descripcion = "El campo es requerido";
      }
      if (this.descripcion.length > 200) {
        this.error.descripcion = "El texto de demasiado largo";
      }
      if (this.equipo_id === null) {
        this.error.equipo = "Equipo no seleccionado";
      }

      this.procesoAgregar = true;
      if (
        this.equipo_id !== null &&
        this.descripcion !== "" &&
        this.descripcion.length < 200
      ) {
        if (this.addeds.length > 0) {
          var found = this.addeds.find((e) => e.equipo_id === this.equipo_id);
          if (found === undefined) {
            const equipo = {
              id: this.equipo_id,
              codigo: this.codigo,
              procesador: this.procesador,
              descripcion: this.descripcion,
              almacen_id: null,
              equipo_id: this.equipo_id,
              tipo: "equipo",
            };
            this.$emit("createEquipo", equipo);
            this.equipo_id = null;
            this.codigo = "";
            this.procesador = "";
            this.descripcion = "";
            this.almacen_id = null;
            this.buscar = "";
            this.modalEquipo = false;
          } else {
            this.message = true;
          }
        } else {
          const equipo = {
            id: this.equipo_id,
            codigo: this.codigo,
            procesador: this.procesador,
            descripcion: this.descripcion,
            almacen_id: null,
            equipo_id: this.equipo_id,
            tipo: "equipo",
          };
          this.$emit("createEquipo", equipo);
          this.equipo_id = null;
          this.codigo = "";
          this.procesador = "";
          this.descripcion = "";
          this.almacen_id = null;
          this.buscar = "";
          this.modalEquipo = false;
          this.modalEquipo = false;
          setTimeout(() => (this.add = false), 1000);
        }
        setTimeout(() => (this.message = false), 1000);
      }
      setTimeout(() => (this.error.equipo = ""), 2000);
      setTimeout(() => (this.error.descripcion = ""), 2000);
      this.procesoAgregar = false;
    },
    update() {},
    openModal() {
      this.modalEquipo = true;
    },
    closeModal() {
      this.modalEquipo = false;
    },
  },
  watch: {
    buscar() {
      this.selectEquipo = true;
      //   setTimeout(() => this.setEquipo(), 2000);
    },
  },
};
</script>
  <script setup>
</script>