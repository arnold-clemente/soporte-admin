
<template>
    <button @click="openModal" class="py-1 px-2 text-white rounded-md bg-green-500 hover:bg-green-600 transition-all">
        Componentes
    </button>
    <DialogModal :show="modalComponente" @close="modalComponente = false">
        <template #title>
            <div class="w-full flex items-center justify-center text-green-700">
                <span>Agregar Nuevo Componente</span>
            </div>
        </template>

        <template #content>
            <div v-show="message"
                class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Exitente!</span> Componente ya agregado
            </div>
            <div v-show="add"
                class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">Agregado!</span> Componente agregado.
            </div>
            <div class="table-resposive">
                <table class="table table-hover table-bordered table-striped" id="sampleTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Componente</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="componente in componentes" :key="componente.id">
                            <td>{{ componente.id }}</td>
                            <td>{{ componente.codigo }}</td>
                            <td>{{ componente.nombre }}</td>
                            <td>
                                <button @click="create(componente)"
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
            <SecondaryButton @click="modalComponente = false">
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
        componentes: {
            type: Object,
            required: true,
        },
        addedsComp: {
            type: Array,
            required: true,
        }
    },
    data() {
        return {
            modalComponente: false,
            message: false,
            add: false,
        }
    },
    emits: ['createComponente'],
    methods: {
        create($componente) {
            if (this.addedsComp.length > 0) {
                var found = this.addedsComp.find(e => e.id === $componente.id);                
                if (found === undefined) {
                    this.$emit('createComponente', $componente)
                    this.add = true
                } else {
                    this.message = true
                    console.log(found);
                }
            } else {
                this.$emit('createComponente', $componente)
                this.add = true
                setTimeout(() => this.add = false, 1000);
            }
            setTimeout(() => this.message = false, 1000);
            setTimeout(() => this.add = false, 1000);
        },
        openModal() {
            this.modalComponente = true;
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