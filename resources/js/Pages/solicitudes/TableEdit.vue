<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg pb-6">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <th scope="col" class="px-6 py-3">
          <div class="flex items-center w-full justify-between">
            <div class="mr-2">DESCRIPCIÓN</div>
          </div>
        </th>
        <th scope="col" class="px-6 py-3">
          <div class="flex items-center w-full justify-between">
            <div class="mr-2">TIPO</div>
          </div>
        </th>
        <th scope="col" class="px-6 py-3">
          <div class="flex items-center w-full justify-between">
            <div class="mr-2">FALENCIA</div>
          </div>
        </th>
        <th scope="col" class="px-6 py-3">
          <div class="flex items-center w-full justify-between">
            <div class="mr-2">ACCIÓN</div>
          </div>
        </th>
      </thead>
      <tbody>
        <tr v-for="equipo in equipos" :key="equipo.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <td class="px-6 py-4 flex flex-col items-start">
            <span>{{ equipo.equipo.codigo }}</span>
          </td>
          <td class="px-6 py-4">
            <span>{{ equipo.equipo.procesador }}</span>
          </td>
          <td class="px-6 py-4 w-12">
            <span>{{ equipo.falencia }}</span>
          </td>
          <td class="px-6 py-4 text-white">
            <div class="flex items-center justify-center space-x-1">
              <button @click="setModalEquipo(equipo)"
                class="bg-green-600 text-white hover:bg-green-700 transition-all rounded-md p-1 text-xl felx items-center justify-center w-8">
                <span><i class="bx bxs-edit"></i></span>
              </button>
              <button @click="eliminarEquipo(equipo)"
                class="bg-red-600 text-white hover:bg-red-700 transition-all rounded-md p-1 text-xl felx items-center justify-center w-8">
                <span><i class="bx bx-x"></i></span>
              </button>
            </div>
          </td>
        </tr>
        <tr v-for="dispositivo in dispositivos" :key="dispositivo.id"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <td class="px-6 py-4 flex flex-col items-start">
            <span>{{ dispositivo.dispositivo.codigo }}</span>
          </td>
          <td class="px-6 py-4">
            <span>{{ dispositivo.dispositivo.nombre }}</span>
          </td>
          <td class="px-6 py-4 w-12">
            <span>{{ dispositivo.falencia }}</span>
          </td>
          <td class="px-6 py-4 text-white">
            <div class="flex items-center justify-center space-x-1">
              <button @click="setModalDispositivoo(dispositivo)"
                class="bg-green-600 text-white hover:bg-green-700 transition-all rounded-md p-1 text-xl felx items-center justify-center w-8">
                <span><i class="bx bxs-edit"></i></span>
              </button>
              <button @click="eliminarDispositivo(dispositivo)"
                class="bg-red-600 text-white hover:bg-red-700 transition-all rounded-md p-1 text-xl felx items-center justify-center w-8">
                <span><i class="bx bx-x"></i></span>
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- modal editar equipo  -->

  <DialogModal :show="modalEquipo" @close="modalEquipo = false">
    <template #title>
      <div class="w-full flex items-center justify-center text-green-700">
        <span>Actualizar Equipo</span>
      </div>
    </template>
    <template #content>
      <div class="space-y-12 px-6">
        <div class="border-b border-gray-900/10">
          <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6 content-start justify-self-start">
            <div class="sm:col-span-6 flex flex-col">
              <label class="block text-sm font-medium leading-6 text-gray-900">Equipo:</label>
              <div>
                <div class="sm:col-span-3">
                  <div>
                    <input type="text" disabled v-model="codigo" placeholder="codigo del equipo"
                      class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  </div>
                </div>
              </div>
              <div class="mt-1">
                <div class="sm:col-span-3">
                  <div>
                    <input type="text" disabled v-model="procesador" placeholder="procesador"
                      class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  </div>
                </div>
              </div>
              <label class="block text-sm font-medium leading-6 text-gray-900">Falencia:</label>
              <div>
                <div class="sm:col-span-3">
                  <div>
                    <input type="text" v-model="equipo.falencia" autocomplete="codigo" placeholder="Falencia del Equipo"
                      class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  </div>
                  <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                    <li>{{ error.falencia }}</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>

    <template #footer>
      <SecondaryButton @click="modalEquipo = false"> Cerrar </SecondaryButton>
      <DangerButton class="ml-2" @click="updateEquipo" :class="{ 'opacity-25': procesoAgregar }"
        :disabled="procesoAgregar">
        Actualizar
      </DangerButton>
    </template>
  </DialogModal>

  <!-- modal editar dispositivo  -->

  <DialogModal :show="modalDispositivo" @close="modalDispositivo = false">
    <template #title>
      <div class="w-full flex items-center justify-center text-green-700">
        <span>Actualizar Dispositivo</span>
      </div>
    </template>
    <template #content>
      <div class="space-y-12 px-6">
        <div class="border-b border-gray-900/10">
          <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6 content-start justify-self-start">
            <div class="sm:col-span-6 flex flex-col">
              <label class="block text-sm font-medium leading-6 text-gray-900">Dispositivo:</label>
              <div>
                <div class="sm:col-span-3">
                  <div>
                    <input type="text" disabled v-model="codigodisp" placeholder="codigo del equipo"
                      class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  </div>
                </div>
              </div>
              <div class="mt-1">
                <div class="sm:col-span-3">
                  <div>
                    <input type="text" disabled v-model="nombre" placeholder="procesador"
                      class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  </div>
                </div>
              </div>
              <label class="block text-sm font-medium leading-6 text-gray-900">Falencia:</label>
              <div>
                <div class="sm:col-span-3">
                  <div>
                    <input type="text" v-model="dispositivo.falencia" autocomplete="codigo" placeholder="Falencia del Equipo"
                      class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  </div>
                  <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                    <li>{{ error.falencia }}</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>

    <template #footer>
      <SecondaryButton @click="modalDispositivo = false"> Cerrar </SecondaryButton>
      <DangerButton class="ml-2" @click="updateDispositivo" :class="{ 'opacity-25': procesoAgregar }"
        :disabled="procesoAgregar">
        Actualizar
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
      type: Array,
      required: true,
    },
    dispositivos: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      modalEquipo: false,
      modalDispositivo: false,
      procesoAgregar: false,
      error: {
        falencia: "",
      },
      equipo: {
        id: null,
        falencia: "",
        solucion: null,
        estado: null,
        soporte_id: null,
        equipo_id: null,
      },
      procesador: "",
      codigo: "",
      dispositivo: {
        id: null,
        falencia: "",
        solucion: null,
        estado: null,
        soporte_id: null,
        dispositivo_id: null,
      },
      nombre: "",
      codigodisp: "",
    };
  },
  emits: ["updateEquipo", "eliminarEquipo", "updateDispositivo", "eliminarDispositivo"],
  methods: {
    setModalEquipo($equipo) {
      this.equipo.id = $equipo.id;
      this.equipo.falencia = $equipo.falencia;
      this.equipo.equipo_id = $equipo.equipo_id;
      this.equipo.soporte_id = $equipo.soporte_id;
      this.procesador = $equipo.equipo.procesador;
      this.codigo = $equipo.equipo.codigo;
      this.modalEquipo = true;
    },
    updateEquipo() {
      if (this.equipo.falencia === "") {
        this.error.falencia = "El campo es requerido";
      }
      if (this.equipo.falencia.length > 200) {
        this.error.falencia = "El texto de demasiado largo";
      }
      if (this.equipo.falencia !== "" && this.equipo.falencia.length < 200) {
        this.procesoAgregar = true;
        this.$emit("updateEquipo", this.equipo);
        this.modalEquipo = false;
        this.procesoAgregar = false;
      }
    },
    eliminarEquipo($equipo) {
      this.$emit("eliminarEquipo", $equipo);
    },

    // paar dispositivos 
    setModalDispositivoo($dispositivo) {
      this.dispositivo.id = $dispositivo.id;
      this.dispositivo.falencia = $dispositivo.falencia;
      this.dispositivo.dispositivo_id = $dispositivo.dispositivo_id;
      this.dispositivo.soporte_id = $dispositivo.soporte_id;
      this.nombre = $dispositivo.dispositivo.nombre;
      this.codigodisp = $dispositivo.dispositivo.codigo;
      this.modalDispositivo = true;
    },
    updateDispositivo() {
      if (this.dispositivo.falencia === "") {
        this.error.falencia = "El campo es requerido";
      }
      if (this.dispositivo.falencia.length > 200) {
        this.error.falencia = "El texto de demasiado largo";
      }
      if (this.dispositivo.falencia !== "" && this.dispositivo.falencia.length < 200) {
        this.procesoAgregar = true;
        this.$emit("updateDispositivo", this.dispositivo);
        this.modalDispositivo = false;
        this.procesoAgregar = false;
      }
    },
    eliminarDispositivo($dispositivo) {
      this.$emit("eliminarDispositivo", $dispositivo);
    },
  },
};
</script>
    