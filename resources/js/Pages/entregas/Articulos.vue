
<template>
    <button @click="openModal" class="py-1 px-2 text-white rounded-md bg-green-500 hover:bg-green-600 transition-all">
        Articulos
    </button>
    <DialogModal :show="modalArticulo" @close="modalArticulo = false">
        <template #title>
            <div class="w-full flex items-center justify-center text-green-700">
                <span>Agregar Articulo</span>
            </div>
        </template>

        <template #content>
            <div v-show="message"
                class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Exitente!</span> Articulo ya agregado
            </div>
            <div v-show="add"
                class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">Agregado!</span> Articulo agregado.
            </div>
            <div class="table-resposive">
                <table class="table table-hover table-bordered table-striped" id="sampleTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Articulo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="articulo in articulos" :key="articulo.id">
                            <td>{{ articulo.id }}</td>
                            <td>{{ articulo.codigo }}</td>
                            <td>{{ articulo.nombre }}</td>
                            <td>
                                <button @click="create(articulo)"
                                    class="bg-green-700 hover:bg-green-600 transition-all text-white rounded-md font-bold p-2 flex items-center space-x-1">
                                    <i class='bx bx-message-alt-add'></i>
                                    <span>Añadir</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </template>

        <template #footer>
            <SecondaryButton @click="modalArticulo = false">
                Cerrar
            </SecondaryButton>
        </template>
    </DialogModal>
</template>

<script>
import DialogModal from "@/Components/DialogModal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net-bs5';
import 'datatables.net-responsive';
import select from 'datatables.net-select';
import $ from 'jquery';

DataTable.use(DataTablesCore);
DataTable.use(select);


export default {
    components: {
        DialogModal,
        SecondaryButton,
        DangerButton,
        DataTable,
    },
    props: {
        articulos: {
            type: Object,
            required: true,
        },
        addedsArt: {
            type: Array,
            required: true,
        }
    },
    data() {
        return {
            modalArticulo: false,
            message: false,
            add: false,
        }
    },
    emits: ['createArticulo'],
    methods: {
        create($articulo) {
            if (this.addedsArt.length > 0) {
                var found = this.addedsArt.find(e => e.id === $articulo.id);                
                if (found === undefined) {
                    this.$emit('createArticulo', $articulo)
                    this.add = true
                } else {
                    this.message = true
                    console.log(found);
                }
            } else {
                this.$emit('createArticulo', $articulo)
                this.add = true
                setTimeout(() => this.add = false, 1000);
            }
            setTimeout(() => this.message = false, 1000);
            setTimeout(() => this.add = false, 1000);
        },
        openModal() {
            this.modalArticulo = true;
            this.$nextTick(() => {
                $('#sampleTable').DataTable({
                    "order": [[0, 'desc']],
                    pageLength: 5,
                    dom: 'Bfrtip',
                    responsive: true,
                    autoWidth: false,
                    language: {
                        search: 'Buscar',
                        info: 'Mostrando el _START_ a _END_ de _TOTAL_ registros',
                        infofiltered: '(filtrados de _MAX_ registros.)',
                        processing: 'Procesando... ',
                        lengthMenu: 'Mostrar _MENU_ registros',
                        zeroRecords: 'No se encontraron resultados',
                        emptyTable: 'Ningún dato disponible en esta tabla',
                        infoEmpty: 'Mostrando registros del 0 al 0 de un total de 0 registros',
                        infoFiltered: '(filtrado de un total de _MAX_ registros) ',
                        paginate: {
                            first: 'Primero',
                            previous: 'Anterior',
                            next: 'Siguiente',
                            last: 'Ultimo',
                            pagingType: { simple: 'bg-red-400', },
                        }
                    }
                }
                );
            });
        },

    },

}
</script>
<style>
@import "datatables.net-dt";
</style>