<template>
    <AppLayout>
        <Cristal v-show="loading" />
        <div class="p-6 w-full">
            <h1 class="text-green-700 font-bold text-2xl w-full text-center">
                CREAR NUEVA UNIDAD
            </h1>
            <div class="flex items-center text-red-600 font-bold transition-all hover:text-red-800">
                <Link :href="route('unidades.index')">unidades/</Link>
                <span class="text-green-700">crear</span>
            </div>
        </div>
        <div>
            <div class="space-y-12 px-6">
                <div class="border-b border-gray-900/10">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Unidad:</label>
                            <div>
                                <input type="text" v-model="unidad.nombre"
                                    placeholder="Escriba el nombre de la unidad"
                                    class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                            <div class="mt-3 list-dick list-inside text-sm text-red-600">
                                <p>{{ error.nombre }}</p>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Dependecia:</label>
                            <div>
                                <input type="text" v-model="unidad.dependencia" 
                                    placeholder="Escriba la dependenciua de la unidad"
                                    class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                            <div class="mt-3 list-dick list-inside text-sm text-red-600">
                                <p>{{ error.dependencia }}</p>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Nomenclatura:</label>
                            <div>
                                <input type="text" v-model="unidad.nomenclatura"
                                    placeholder="Escriba la nomenclatura de la unidad"
                                    class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                            <div class="mt-3 list-dick list-inside text-sm text-red-600">
                                <p>{{ error.nomenclatura }}</p>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Número de Informe:</label>
                            <div>
                                <input type="number" v-model="unidad.informes" placeholder="Escriba un numero de inicio"
                                    class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                            <div class="mt-3 list-dick list-inside text-sm text-red-600">
                                <p>{{ error.informes }}</p>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Número de Nota:</label>
                            <div>
                                <input type="number" v-model="unidad.notas" placeholder="Escriba un numero de inicio"
                                    class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                            <div class="mt-3 list-dick list-inside text-sm text-red-600">
                                <p>{{ error.notas }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <Link :href="route('unidades.index')"
                    class="border-1 text-sm font-semibold rounded-md py-2 p-4 text-white bg-red-600">Cancel</Link>
                <button @click="store"
                    class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
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
    data() {
        return {
            error: [],
            loading: false,
            unidad: {
                nombre: "",
                dependencia: "",
                nomenclatura: "",
                informes: 0,
                notas: 0,
            },
        };
    },
    components: {
        AppLayout,
        Link,
        Cristal,
    },
    methods: {
        store() {
            this.loading = true;
            axios
                .post(route("unidad.store"), this.unidad)
                .then((response) => {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: response.data,
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    this.loading = false;
                    this.$inertia.visit(route("unidades.index"));
                })
                .catch((error) => {
                    this.error = error.response.data.errors;
                    this.loading = false;
                });

        },
    },
};
</script>
  
  