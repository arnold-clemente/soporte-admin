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
            <div class="mr-2">CANTIDAD</div>
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
            <span>{{ equipo.codigo }}</span>
            <span>{{ equipo.procesador }}</span>
          </td>
          <td class="px-6 py-4">
            <span>{{ equipo.tipo }}</span>
          </td>
          <td class="px-6 py-4">
            <span>1</span>
          </td>
          <td class="px-6 py-4 text-white">
            <div class="flex items-center justify-center space-x-1">
              <button @click="eliminar(equipo)"
                class="bg-red-600 text-white hover:bg-red-700 transition-all rounded-md p-1 text-xl felx items-center justify-center w-8">
                <span><i class="bx bx-x"></i></span>
              </button>
            </div>
          </td>
        </tr>
        <tr v-for="dispositivo in dispositivos" :key="dispositivo.id"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <td class="px-6 py-4 flex flex-col items-start">
            <span>{{ dispositivo.codigo }}</span>
          </td>
          <td class="px-6 py-4">
            <span>{{ dispositivo.nombre }}</span>
          </td>
          <td class="px-6 py-4">
            <span>1</span>
          </td>
          <td class="px-6 py-4 text-white">
            <div class="flex items-center justify-center space-x-1">
              <button @click="eliminarDispositivo(dispositivo)"
                class="bg-red-600 text-white hover:bg-red-700 transition-all rounded-md p-1 text-xl felx items-center justify-center w-8">
                <span><i class="bx bx-x"></i></span>
              </button>
            </div>
          </td>
        </tr>
        <tr v-for="articulo in articulosnews" :key="articulo.id"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <td class="px-6 py-4 flex flex-col items-start">
            <span>{{ articulo.codigo }}</span>
            <span>{{ articulo.nombre }}</span>
          </td>
          <td class="px-6 py-4">
            <select id="small" v-model="articulo.equipo" required
              class="block w-full h-12 -2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option v-for="codigo in codigoEquipos" :key="codigo.id" :value="codigo.id">
                {{ codigo.codigo }}
              </option>
            </select>
          </td>
          <td class="px-6 py-4">
            <div class="space-x-1">
              <button @click="restarCantidad(articulo)"
                class="text-white text-xl px-2 py-1 bg-green-600 rounded-md">-</button>
              <span class="px-2">{{ articulo.cantidad }}</span>
              <button @click="sumarCantidad(articulo)"
                class="text-white text-xl px-2 py-1 bg-green-600 rounded-md">+</button>
            </div>
            <p class="text-red-600 text-xs">{{ articulo.validation }}</p>
          </td>
          <td class="px-6 py-4 text-white">
            <div class="flex items-center justify-center space-x-1">
              <button @click="eliminarArticulo(articulo)"
                class="bg-red-600 text-white hover:bg-red-700 transition-all rounded-md p-1 text-xl felx items-center justify-center w-8">
                <span><i class="bx bx-x"></i></span>
              </button>
            </div>
          </td>
        </tr>
        <tr v-for="componente in componentes" :key="componente.id"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <td class="px-6 py-4 flex flex-col items-start">
            <span>{{ componente.codigo }}</span>
            <span>{{ componente.nombre }}</span>
          </td>
          <td class="px-6 py-4">
            <select id="small" v-model="componente.equipo" required
              class="block w-full h-12 -2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option v-for="codigo in codigoEquipos" :key="codigo.id" :value="codigo.id">
                {{ codigo.codigo }}
              </option>
            </select>
          </td>
          <td class="px-6 py-4">           
            {{ componente.cantidad }}
          </td>
          <td class="px-6 py-4 text-white">
            <div class="flex items-center justify-center space-x-1">
              <button @click="eliminarComponente(componente)"
                class="bg-red-600 text-white hover:bg-red-700 transition-all rounded-md p-1 text-xl felx items-center justify-center w-8">
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
    articulos: {
      type: Array,
      required: true,
    },
    componentes: {
      type: Array,
      required: true,
    },
    codigoEquipos: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      articulosnews: this.articulos,
    };
  },
  emits: ['eliminarEquipo', 'eliminarDispositivo', 'eliminarArticulo', 'sumarCantidad', 'restarCantidad', 'eliminarComponente'],
  methods: {
    eliminar($equipo) {
      this.$emit('eliminarEquipo', $equipo)
    },
    eliminarDispositivo($dispositivo) {
      this.$emit('eliminarDispositivo', $dispositivo)
    },
    eliminarArticulo($articulo) {
      this.$emit('eliminarArticulo', $articulo)
    },
    sumarCantidad($articulo) {
      this.$emit('sumarCantidad', $articulo)
    },
    restarCantidad($articulo) {
      this.$emit('restarCantidad', $articulo)
    },
    eliminarComponente($componente) {
      this.$emit('eliminarComponente', $componente)
    }
  },

};
</script>
