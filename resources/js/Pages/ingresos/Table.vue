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
                <tr v-for="articulo in articulosnews" :key="articulo.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 flex flex-col items-start">
                        <span>{{ articulo.codigo }}</span>
                        <span>{{ articulo.nombre }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span>{{ articulo.tipo }}</span>
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
            </tbody>
        </table>
    </div>
</template>
  
<script>
export default {
    props: {
        articulos: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            articulosnews: this.articulos,
        };
    },
    emits: ['eliminarArticulo', 'sumarCantidad', 'restarCantidad'],
    methods: {
        eliminarArticulo($articulo) {
            this.$emit('eliminarArticulo', $articulo)
        },
        sumarCantidad($articulo) {
            this.$emit('sumarCantidad', $articulo)
        },
        restarCantidad($articulo) {
            this.$emit('restarCantidad', $articulo)
        },
    },

};
</script>
  