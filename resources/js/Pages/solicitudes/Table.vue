<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg pb-6">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead
        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
      >
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
        <tr
          v-for="equipo in equipos"
          :key="equipo.id"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
        >
          <td class="px-6 py-4 flex flex-col items-start">
            <span>{{ equipo.codigo }}</span>
          </td>
          <td class="px-6 py-4">
            <span>{{ equipo.procesador }}</span>
          </td>
          <td class="px-6 py-4 w-12">
            <span>{{ equipo.falencia }}</span>
          </td>
          <td class="px-6 py-4 text-white">
            <div class="flex items-center justify-center space-x-1">
              <button
                @click="eliminarEquipo(equipo)"
                class="bg-red-600 text-white hover:bg-red-700 transition-all rounded-md p-1 text-xl felx items-center justify-center w-8"
              >
                <span><i class="bx bx-x"></i></span>
              </button>
            </div>
          </td>
        </tr>
        <tr
          v-for="dispositivo in dispositivos"
          :key="dispositivo.id"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
        >
          <td class="px-6 py-4 flex flex-col items-start">
            <span>{{ dispositivo.codigo }}</span>
          </td>
          <td class="px-6 py-4">
            <span>{{ dispositivo.nombre }}</span>
          </td>
          <td class="px-6 py-4 w-12">
            <span>{{ dispositivo.falencia }}</span>
          </td>
          <td class="px-6 py-4 text-white">
            <div class="flex items-center justify-center space-x-1">
              <button
                @click="eliminarDispositivo(dispositivo)"
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
</template>
  
<script>
export default {
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
      articulosnews: this.articulos,
    };
  },
  emits: ["eliminarEquipo", "eliminarDispositivo"],
  methods: {
    eliminarEquipo($equipo) {
      this.$emit("eliminarEquipo", $equipo);
    },
    eliminarDispositivo($dispositivo) {
      this.$emit("eliminarDispositivo", $dispositivo);
    },
  },
};
</script>
  