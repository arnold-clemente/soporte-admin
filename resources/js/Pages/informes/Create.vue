<template>
    <AppLayout>
        <Cristal v-show="loading" />
        <div class="p-6 w-full">
            <h1 class="text-green-700 font-bold text-2xl w-full text-center">
                CREAR NUEVO CITE INFORME
            </h1>
            <div class="flex items-center text-red-600 font-bold transition-all hover:text-red-800">
                <Link :href="route('informes.index')">informes/</Link>
                <span class="text-green-700">crear</span>
            </div>
        </div>
        <div>
            <div class="space-y-12 px-6">
                <div class="border-b border-gray-900/10">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Referencia:</label>
                            <div>
                                <input type="text" v-model="form.referencia" placeholder="Escriba la referencia del Cite"
                                    class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                            <div class="mt-3 list-dick list-inside text-sm text-red-600">
                                <p>{{ error.referencia }}</p>
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Fecha:</label>
                            <div>
                                <input type="date" v-model="form.fecha" autocomplete="fecha" disabled
                                    class="block h-12 w-full rounded-md bg-gray-200 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Componente</label>
                            <div>
                                <select id="small" v-model="form.unidad_id" required
                                    class="block w-full h-12 -2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option v-for="unidad in unidads" :key="unidad.id" :value="unidad.id">{{ unidad.nombre
                                    }}
                                    </option>
                                </select>
                            </div>
                            <p class="text-red-400">{{ error.unidad_id }}</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <Link :href="route('informes.index')"
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
    props: {
        fecha: {
            type: String,
            required: true,
        },
        unidads: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            error: [],
            loading: false,
            form: {
                referencia: "",
                fecha: this.fecha,
                unidad_id: 1,
                user_id: this.$page.props.auth.user.id,
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
                .post(route("informe.store"), this.form)
                .then((response) => {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Creado",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    console.log(response.data)
                    this.loading = false;
                    this.$inertia.visit(route("informes.index"));
                })
                .catch((error) => {
                    this.error = error.response.data.errors;
                    this.loading = false;
                });

        },
    },
};
</script>
  
  