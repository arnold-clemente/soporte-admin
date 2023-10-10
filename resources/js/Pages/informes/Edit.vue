<template>
    <AppLayout>
        <Cristal v-show="loading" />
        <div class="p-6 w-full">
            <h1 class="text-green-700 font-bold text-2xl w-full text-center">
                ACTUALIZAR CITE INFORME
            </h1>
            <div class="flex items-center text-red-600 font-bold transition-all hover:text-red-800">
                <Link :href="route('informes.index')">informes/</Link>
                <span class="text-green-700">{{ informe.id }}/</span>
                <span class="text-green-700">editar</span>
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
                            <div class="col-span-full">
                                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Subir
                                    Archivo</label>
                                <FilePond allowMultiple="true" label-idle="Suelte archivos aquí..."
                                    accepted-file-types="image/jpeg, image/png" v-on:init="handleFilePondInit"
                                    v-on:addfile="prueba" v-bind:files="myFiles" allowFileSizeValidation="true"
                                    labelMaxFileSize="El tamaño máximo de archivo es {filesize}"
                                    labelMaxFileSizeExceeded="El archivo es demasiado largo" maxFileSize="2MB" />



                                <!-- <div v-bind="getRootProps()"
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <input v-bind="getInputProps()" />
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                            <label for="file-upload"
                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <button @click="open">Subir Archivo</button>
                                                <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">o arrastrar y soltar</p>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF hasta 10 MB</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <Link :href="route('informes.index')"
                    class="border-1 text-sm font-semibold rounded-md py-2 p-4 text-white bg-red-600">Cancel</Link>
                <button @click="update"
                    class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                    Actualizar
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
import { ref } from "vue";
import vueFilePond from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
// Import image preview plugin styles
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import FilePondPluginImagePreview from "filepond-plugin-image-preview";

export default {
    components: {
        AppLayout,
        Link,
        Cristal,
        FilePond: vueFilePond(FilePondPluginImagePreview, FilePondPluginFileValidateType, FilePondPluginFileValidateSize),
    },
    props: {
        informe: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            error: [],
            loading: false,
            myFiles: [],
            form: this.informe            
        };
    },


    methods: {
        update() {
            this.loading = true;
            axios
                .put(route("informe.update", this.informe), this.form)
                .then((response) => {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "actualizado",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    this.loading = false;
                    this.$inertia.visit(route("informes.index"));
                })
                .catch((error) => {
                    this.error = error.response.data.errors;
                    this.loading = false;
                });

        },
        handleFilePondInit: function () {
            console.log('this.$refs.pond');

            // FilePond instance methods are available on `this.$refs.pond`
        },
        prueba: function () {
            console.log(this.myFiles)
        }
    },

};
</script>  
<style>
.file-info {
    margin-top: 32px;
}
</style>