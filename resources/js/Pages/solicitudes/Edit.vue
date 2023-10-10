<template>
  <AppLayout>
    <Cristal v-show="loading" />
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        RECEPCIONAR SOLICITUD
      </h1>
      <div class="flex items-center text-red-600 font-bold transition-all hover:text-red-800">
        <Link :href="route('solicitudes.index')">solicitudes/</Link>
        <span class="text-green-700">recepcionar</span>
      </div>
    </div>
    <!-- fubromulari  -->
    <div class="space-y-12 px-6">
      <div class="border-b border-gray-900/10">
        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Referencia:</label>
            <div>
              <input type="text" v-model="soporte.referencia" autocomplete="codigo" placeholder="Escriba el codigo"
                class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
            <ul class="mt-3 list-dick list-inside text-sm text-red-600">
              <li>{{ error.referencia }}</li>
            </ul>
          </div>
          <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Fecha:</label>
            <div>
              <input type="date" v-model="soporte.fecha" disabled
                class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
          </div>
          <div class="sm:col-span-3">
            <div class="sm:col-span-3">
              <div>
                <input type="text" disabled v-model="funcionarioNombres" autocomplete="codigo"
                  placeholder="Nombre Completo"
                  class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
              </div>
            </div>
          </div>
          <div class="sm:col-span-3">
            <div>
              <input type="text" disabled v-model="funcioanrioCi" autocomplete="codigo" placeholder="Numero de C.I."
                class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
          </div>
          <div class="sm:col-span-3">
            <div>
              <input type="text" disabled v-model="funcionarioUnidad" autocomplete="codigo" placeholder="Dependecia"
                class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
          </div>
          <div class="sm:col-span-3">
            <div>
              <input type="text" disabled v-model="funcionarioDependencia" autocomplete="codigo" placeholder="Unidad"
                class="block h-12 w-full bg-gray-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
          </div>
        </div>
        <!-- para el listad  -->
        <div class="p-6 w-full">
          <h1 class="text-green-700 font-bold w-full text-left">
            LISTADO DE AGREGADOS
          </h1>
        </div>
        <!-- modal para agregar  -->
        <div class="flex items-center space-x-2">
          <EquiposComponent v-bind:addeds="equiposAdds" v-bind:equipos="equipos" @createEquipo="createEquipo" />
          <DispositivosComponent v-bind:addeds="dispositivosAdds" v-bind:dispositivos="dispositivos"
            @createDispositivo="createDispositivo" />
        </div>
        <!-- tabla de agregados  -->
        <Table v-bind:equipos="equiposAdds" @updateEquipo="updateEquipo" @eliminarEquipo="eliminarEquipo"
          v-bind:dispositivos="dispositivosAdds" @updateDispositivo="updateDispositivo"
          @eliminarDispositivo="eliminarDispositivo" />
      </div>
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <Link :href="route('solicitudes.index')"
          class="border-1 text-sm font-semibold rounded-md py-2 p-4 text-white bg-red-600">Cancel</Link>
        <button @click.prevent="update"
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
import Table from "./TableEdit.vue";
import EquiposComponent from "./Equipos.vue";
import DispositivosComponent from "./Dispositivos.vue";

export default {
  components: {
    AppLayout,
    Link,
    Cristal,
    Table,
    EquiposComponent,
    DispositivosComponent,
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
    equiposAdds: {
      type: Object,
      required: true,
    },
    dispositivosAdds: {
      type: Object,
      required: true,
    },
    fecha: {
      type: String,
      required: true,
    },
    solicitud: {
      type: Object,
      required: true,
    },
    funcionario: {
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
      error: [],
      loading: false,
      funcionarioNombres:
        this.funcionario.nombres + " " + this.funcionario.apellidos,
      funcioanrioCi: this.funcionario.ci,
      funcionarioUnidad: this.funcionario.unidad.nombre,
      funcionarioDependencia: this.funcionario.unidad.dependencia,
      soporte: {
        referencia: "",
        fecha: this.fecha,
        user_id: this.$page.props.auth.user.id,
        tecnico_id: this.tecnico.id,
        unidad_id: this.tecnico.unidad_id,
      },
    };
  },
  methods: {
    createEquipo($equipo) {
      const equipo = $equipo;
      equipo.soporte_id = this.solicitud.id;
      axios
        .post(route("solicitud.equipo.store"), equipo)
        .then((response) => {
          console.log(response);
          Swal.fire({
            position: "center",
            icon: "success",
            title: "creado con exito",
            showConfirmButton: false,
            timer: 2000,
          });
          this.$inertia.reload({ only: ["equiposAdds"] });
        })
        .catch((error) => {
          this.error = error.response.data.errors;
          this.loading = false;
          console.log(error);
        });
    },
    updateEquipo($equipo) {
      axios
        .put(route("solicitud.equipo.update"), $equipo)
        .then((response) => {
          console.log(response.data);
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Actualizado con exito",
            showConfirmButton: false,
            timer: 2000,
          });
          this.$inertia.reload({ only: ["equiposAdds"] });
        })
        .catch((error) => {
          this.error = error.response.data.errors;
          this.loading = false;
          console.log(error);
        });
    },
    eliminarEquipo($equipo) {
      Swal.fire({
        title: "¿Estas seguro",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Sí, bórralo!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .delete(route("solicitud.equipo.destroy", $equipo))
            .then((response) => {
              Swal.fire({
                position: "center",
                icon: "success",
                title: response.data,
                showConfirmButton: false,
                timer: 2000,
              });
              this.loading = false;
              this.$inertia.reload({ only: ["equiposAdds"] });
            })
            .catch((error) => {
              this.error = error.response.data.errors;
            });
        }
      });
    },
    createDispositivo($dispositivo) {
      const dispositivo = $dispositivo;
      dispositivo.soporte_id = this.solicitud.id;
      axios
        .post(route("solicitud.dispositivo.store"), dispositivo)
        .then((response) => {
          console.log(response);
          Swal.fire({
            position: "center",
            icon: "success",
            title: "creado con exito",
            showConfirmButton: false,
            timer: 2000,
          });
          this.$inertia.reload({ only: ["dispositivosAdds"] });
        })
        .catch((error) => {
          this.error = error.response.data.errors;
          this.loading = false;
          console.log(error);
        });
    },
    updateDispositivo($dispositivo) {
      axios
        .put(route("solicitud.dispositivo.update"), $dispositivo)
        .then((response) => {
          console.log(response.data);
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Actualizado con exito",
            showConfirmButton: false,
            timer: 2000,
          });
          this.$inertia.reload({ only: ["dispositivosAdds"] });
        })
        .catch((error) => {
          this.error = error.response.data.errors;
          this.loading = false;
          console.log(error);
        });
    },
    eliminarDispositivo($dispositivo) {
      Swal.fire({
        title: "¿Estas seguro",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Sí, bórralo!",
      }).then((result) => {
        if (result.isConfirmed) {
          const soporteDispositivo = {
            id: $dispositivo.id,
            falencia: $dispositivo.falencia,
            solucion: null,
            estado: null,
            soporte_id: $dispositivo.soporte_id,
            dispositivo_id: $dispositivo.dispositivo_id,
          };
          axios
            .delete(route("solicitud.dispositivo.destroy", soporteDispositivo))
            .then((response) => {
              console.log(response);
              Swal.fire({
                position: "center",
                icon: "success",
                title: response.data,
                showConfirmButton: false,
                timer: 2000,
              });
              this.loading = false;
              this.$inertia.reload({ only: ["dispositivosAdds"] });
            })
            .catch((error) => {
              this.error = error.response.data.errors;
            });
        }
      });
    },
    update() {
      this.loading = true;
      axios
        .post(route("nota.store"), this.soporte)
        .then((response) => {
          const nota_id = response.data;
          const soporte = {
            id: this.solicitud.id,
            numero: this.solicitud.numero,
            codigo: this.solicitud.codigo,
            fechasol: this.solicitud.fechasol,
            solicitud: this.solicitud.solicitud,
            fecharep: this.soporte.fecha,
            recepcion: 1,
            fechasop: null,
            soporte: null,
            tecnico_id: this.tecnico.id,
            funcionario_id: this.solicitud.funcionario_id,
            nota_id: nota_id,
            informe_id: null,
          };
          axios
            .put(route("solicitud.update"), soporte)
            .then((response) => {
              console.log(response.data)
            })
            .catch((error) => {
              this.error = error.response.data.errors;
            });
          //EDITAR EQUIPOS
          if (this.equiposAdds.length > 0) {
            for (let i = 0; i < this.equiposAdds.length; i++) {
              const equipo = {
                id: this.equiposAdds[i].equipo.id,
                entrega: 1,
                reparacion: 1,
                prestamo: 0,
                devolucion: 0,
                repliegue: 0,
                estado: "2",
              }
              axios
                .post(route("equipo.soporte"), equipo)
                .then((response) => {
                  console.log(response.data)
                })
                .catch((error) => {
                  this.error = error.response.data.errors;
                  this.loading = false;
                });
            }
          }
          //FIN EQUIPOS 
          //EDITAR DISPOSITIVOS
          if (this.dispositivosAdds.length > 0) {
            for (let i = 0; i < this.dispositivosAdds.length; i++) {
              const dispositivo = {
                id: this.dispositivosAdds[i].dispositivo.id,
                entrega: 1,
                reparacion: 1,
                prestamo: 0,
                devolucion: 0,
                repliegue: 0,
                estado: "2",
              }
              axios
                .post(route("dispositivo.soporte"), dispositivo)
                .then((response) => {
                  console.log(response.data)
                })
                .catch((error) => {
                  this.error = error.response.data.errors;
                  this.loading = false;
                });
            }
          }
          //FIN DISPOSITIVOS
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Agregado con Exito",
            showConfirmButton: false,
            timer: 2000,
          });
          this.loading = false;
          this.$inertia.visit(route("solicitudes.index"));
        })
        .catch((error) => {
          this.error = error.response.data.errors;
        });
      this.loading = false;
    }
  },
};
</script>
      