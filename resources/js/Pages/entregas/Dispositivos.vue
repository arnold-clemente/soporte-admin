
<template>
    <button @click="openModal" class="py-1 px-2 text-white rounded-md bg-green-500 hover:bg-green-600 transition-all">
        Dispositivos
    </button>
    <DialogModal :show="modalDispositivo" @close="modalDispositivo = false">
        <template #title>
            <div class="w-full flex items-center justify-center text-green-700">
                <span>Agregar Nuevo Dispositivos</span>
            </div>
        </template>

        <template #content>
            <div v-show="message"
                class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Exitente!</span> Dispositivo ya agregado
            </div>
            <div v-show="add"
                class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">Agregado!</span> Dispositivo agregado.
            </div>
            <div class="table-resposive">
                <table class="table table-hover table-bordered table-striped" id="sampleTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Dispositivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="dispositivo in dispositivos" :key="dispositivo.id">
                            <td>{{ dispositivo.id }}</td>
                            <td>{{ dispositivo.codigo }}</td>
                            <td>{{ dispositivo.nombre }}</td>
                            <td>
                                <button @click="create(dispositivo)"
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
            <SecondaryButton @click="modalDispositivo = false">
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
        dispositivos: {
            type: Object,
            required: true,
        },
        addedsDisp: {
            type: Array,
            required: true,
        }
    },
    data() {
        return {
            modalDispositivo: false,
            message: false,
            add: false,
        }
    },
    emits: ['createDispositivo'],
    methods: {
        create($dispositivo) {
            if (this.addedsDisp.length > 0) {
                var found = this.addedsDisp.find(e => e.id === $dispositivo.id);                
                if (found === undefined) {
                    this.$emit('createDispositivo', $dispositivo)
                    this.add = true
                } else {
                    this.message = true
                    console.log(found);
                }
            } else {
                this.$emit('createDispositivo', $dispositivo)
                this.add = true
                setTimeout(() => this.add = false, 1000);
            }
            setTimeout(() => this.message = false, 1000);
            setTimeout(() => this.add = false, 1000);
        },
        openModal() {
            this.modalDispositivo = true;
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