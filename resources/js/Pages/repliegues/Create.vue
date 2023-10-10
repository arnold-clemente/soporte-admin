<template>
  <AppLayout>
    <Cristal v-show="loading" />
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        CREAR INFORME DE REPLIEGUE
      </h1>
      <div class="flex items-center text-red-600 font-bold transition-all hover:text-red-800">
        <Link :href="route('repliegues.index')">repliegues/</Link>
        <span class="text-green-700">crear</span>
      </div>
    </div>
    <div>
      <!-- para repliegue forlmulario  -->
      <div class="space-y-12 px-6">
        <div class="border-b border-gray-900/10">
          <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900">Referencia:</label>
              <div>
                <input type="text" v-model="repliegue.referencia" autocomplete="codigo" placeholder="Escriba el codigo"
                  class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
              </div>
              <ul class="mt-3 list-dick list-inside text-sm text-red-600">
                <li>{{ error.referencia }}</li>
              </ul>
            </div>
            <div class="sm:col-span-3">
              <label class="block text-sm font-medium leading-6 text-gray-900">Fecha:</label>
              <div>
                <input type="date" v-model="repliegue.fecha" disabled
                  class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold w-full text-left">
        LISTADO DE AGREGADOS
      </h1>
      <div v-show="message"
        class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
        role="alert">
        <span class="font-medium">Advertencia!</span>
        Agregue algunas cosas e intente enviar de nuevo.
      </div>
      <div class="flex items-center py-2 space-x-2">
        <div>
          <EquiposComponent v-bind:addeds="tableEquipos" v-bind:equipos="equipos" @createEquipo="createEquipo" />
        </div>
        <div>
          <DispositivoComponent v-bind:addeds="tableDispositivos" v-bind:dispositivos="dispositivos"
            @createDispositivo="createDispositivo" />
        </div>
        <div>
          <ComponentesComponent v-bind:addeds="tableComponentes" v-bind:componentes="componentes"
            @createComponente="createComponente" />
        </div>
      </div>
      <Table v-bind:componentes="tableComponentes" v-bind:equipos="tableEquipos" v-bind:dispositivos="tableDispositivos"
        @eliminarEquipo="eliminarEquipo" @eliminarDispositivo="eliminarDispositivo"
        @eliminarComponente="eliminarComponente" />
    </div>
    <!-- *****************  botones ********************** -->
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <Link :href="route('repliegues.index')"
        class="border-1 text-sm font-semibold rounded-md py-2 p-4 text-white bg-red-600">Cancel</Link>
      <button @click.prevent="store"
        class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
        Guardar
      </button>
    </div>
  </AppLayout>
</template>
  
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import Cristal from "@/Components/Cristal.vue";
import axios from "axios";
import Swal from "sweetalert2";
import Table from "./Table.vue";
import EquiposComponent from "./Equipos.vue";
import DispositivoComponent from "./Dispositivos.vue";
import ComponentesComponent from "./Componentes.vue";

export default {
  components: {
    AppLayout,
    Link,
    Cristal,
    Table,
    EquiposComponent,
    DispositivoComponent,
    ComponentesComponent,
  },
  props: {
    equipos: {
      type: Object,
      required: true,
    },
    dispositivos: {
      type: Object,
      required: true,
    },
    fecha: {
      type: String,
      required: true,
    },
    componentes: {
      type: Object,
      required: true,
    },
    tecnico: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      loading: false,
      error: [],
      repliegue: {
        fecha: this.fecha,
        referencia: "",
        user_id: this.tecnico.user_id,
        tecnico_id: this.tecnico.id,
        unidad_id: this.tecnico.unidad_id,
        informe_id: 0,
      },
      informe_id: 0,
      repliegue_id: 0,
      user_id: this.tecnico.user_id,
      message: false,
      tableEquipos: [],
      tableDispositivos: [],
      tableComponentes: [],
    };
  },
  methods: {
    createEquipo($equipo) {
      this.tableEquipos.push($equipo);
    },
    eliminarEquipo($equipo) {
      for (let i = 0; i < this.tableEquipos.length; i++) {
        const element = this.tableEquipos[i];
        if (element.id === $equipo.id) {
          this.tableEquipos.splice(i, 1);
        }
      }
    },
    createDispositivo($dispositivo) {
      this.tableDispositivos.push($dispositivo);
    },
    eliminarDispositivo($dispositivo) {
      for (let i = 0; i < this.tableDispositivos.length; i++) {
        const element = this.tableDispositivos[i];
        if (element.id === $dispositivo.id) {
          this.tableDispositivos.splice(i, 1);
        }
      }
    },
    createComponente($componente) {
      this.tableComponentes.push($componente);
    },
    eliminarComponente($componente) {
      for (let i = 0; i < this.tableComponentes.length; i++) {
        const element = this.tableComponentes[i];
        if (element.id === $componente.id) {
          this.tableComponentes.splice(i, 1);
        }
      }
    },
    store() {
      if (
        this.tableEquipos.length > 0 ||
        this.tableDispositivos.length > 0 ||
        this.tableComponentes.length > 0
      ) {
        this.loading = true;

        // crear la informe del cite
        axios
          .post(route("informe.store"), this.repliegue)
          .then((response) => {
            this.repliegue.informe_id = response.data;
            //CREAR INFORME DE REPLIEGUE
            axios
              .post(route("repliegue.store"), this.repliegue)
              .then((response) => {
                this.repliegue_id = response.data;
                //CREAR EQUIPOS
                if (this.tableEquipos.length > 0) {
                  for (let i = 0; i < this.tableEquipos.length; i++) {
                    const equipo = this.tableEquipos[i];
                    equipo.repliegue_id = this.repliegue_id;
                    axios
                      .post(route("repliegue.equipo.store"), equipo)
                      .then((response) => {
                        console.log(response.data);
                      })
                      .catch((error) => {
                        this.error = error.response.data.errors;
                        this.loading = false;
                      });
                  }
                }
                //FIN EQUIPOS
                //CREAR DISPOSITIVOS
                if (this.tableDispositivos.length > 0) {
                  for (let i = 0; i < this.tableDispositivos.length; i++) {
                    const dispositivo = this.tableDispositivos[i];
                    dispositivo.repliegue_id = this.repliegue_id;
                    axios
                      .post(route("repliegue.dispositivo.store"), dispositivo)
                      .then((response) => {
                        console.log(response.data);
                      })
                      .catch((error) => {
                        this.error = error.response.data.errors;
                        this.loading = false;
                      });
                  }
                }
                //FIN DISPOSITIVOS
                //CREAR COMPONENTE tableComponentes
                if (this.tableComponentes.length > 0) {
                  for (let i = 0; i < this.tableComponentes.length; i++) {
                    const componente = this.tableComponentes[i];
                    componente.repliegue_id = this.repliegue_id;
                    axios
                      .post(route("repliegue.componente.store"), componente)
                      .then((response) => {
                        console.log(response.data);
                      })
                      .catch((error) => {
                        this.error = error.response.data.errors;
                        this.loading = false;
                      });
                  }
                }
                //FIN COMPONENTE
                // alerta
                this.loading = false;
                Swal.fire({
                  position: "center",
                  icon: "success",
                  title: "creado con exito",
                  showConfirmButton: false,
                  timer: 2000,
                });
                this.$inertia.visit(route("repliegues.index"));
              })
              .catch((error) => {
                this.error = error.response.data.errors;
                this.loading = false;
              });
          })
          .catch((error) => {
            this.error = error.response.data.errors;
            this.loading = false;
          });
      } else {
        this.message = true;
        setTimeout(() => (this.message = false), 2000);
      }
    },
  },
};
</script>
  
<style></style>
  