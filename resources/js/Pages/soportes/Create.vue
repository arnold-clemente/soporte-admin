<template>
  <AppLayout>
    <Cristal v-show="loading" />
    <div class="p-6 w-full">
      <h1 class="text-green-700 font-bold text-2xl w-full text-center">
        REALIZAR REPARACION DE SOPORTE
      </h1>
      <div class="flex items-center text-red-600 font-bold transition-all hover:text-red-800">
        <Link :href="route('soportes.index')">soportes/</Link>
        <span class="text-green-700">reparar</span>
      </div>
    </div>
    <!-- fubromulari  -->
    <div class="space-y-12 px-6">
      <div class="border-b border-gray-900/10">
        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Referencia:</label>
            <div>
              <input type="text" v-model="form.referencia" autocomplete="codigo" placeholder="Escriba el codigo"
                class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
            <ul class="mt-3 list-dick list-inside text-sm text-red-600">
              <li>{{ error.referencia }}</li>
            </ul>
          </div>
          <div class="sm:col-span-3">
            <label class="block text-sm font-medium leading-6 text-gray-900">Fecha:</label>
            <div>
              <input type="date" v-model="form.fecha" disabled
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
        <!-- alerta  -->
        <div v-show="message" class="bg-red-100 border mt-2 border-red-400 text-red-700 px-4 py-3 rounded relative"
          role="alert">
          <strong class="font-bold">Advertencia!</strong>
          <span class="block sm:inline ml-1">Llenar todos los campos e intente enviar de Nuevo.</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20">
              <title>Close</title>
              <path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
          </span>
        </div>
        <!-- para el listad  -->
        <div class="p-6 w-full">
          <h1 class="text-green-700 font-bold w-full text-left">
            LISTADO DE AGREGADOS
          </h1>
        </div>
        <!-- tabla de agregados  -->
        <Table v-bind:equipos="equipos" @updateEquipo="updateEquipo" v-bind:dispositivos="dispositivos"
          @updateDispositivo="updateDispositivo" />
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
import Table from "./Table.vue";

export default {
  components: {
    AppLayout,
    Link,
    Cristal,
    Table,
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
    soporte: {
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
      message: false,
      funcionarioNombres: this.funcionario.nombres + " " + this.funcionario.apellidos,
      funcioanrioCi: this.funcionario.ci,
      funcionarioUnidad: this.funcionario.unidad.nombre,
      funcionarioDependencia: this.funcionario.unidad.dependencia,
      validation_equipos: false,
      validation_dispositivos: false,
      form: {
        referencia: "",
        fecha: this.fecha,
        user_id: this.tecnico.user_id,
        tecnico_id: this.tecnico.id,
        unidad_id: this.tecnico.unidad_id,
      },
    };
  },
  methods: {
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
          this.$inertia.reload({ only: ["equipos"] });
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
          this.$inertia.reload({ only: ["dispositivos"] });
        })
        .catch((error) => {
          this.error = error.response.data.errors;
          this.loading = false;
          console.log(error);
        });
    },
    update() {
      let lengthEquipos = 0;
      let lengthDispositivos = 0;
      for (let i = 0; i < this.equipos.length; i++) {
        if (this.equipos[i].solucion !== "" &&
          this.equipos[i].estado !== "" &&
          this.equipos[i].solucion !== null &&
          this.equipos[i].estado !== null) {
          lengthEquipos++
        }
        if (lengthEquipos === this.equipos.length) {
          this.validation_equipos = true
        }
      }
      for (let i = 0; i < this.dispositivos.length; i++) {
        if (this.dispositivos[i].solucion !== "" &&
          this.dispositivos[i].estado !== "" &&
          this.dispositivos[i].solucion !== null &&
          this.dispositivos[i].estado !== null) {
          lengthDispositivos++
        }
        if (lengthDispositivos === this.dispositivos.length) {
          this.validation_dispositivos = true
        }
      }
      if (this.validation_dispositivos === true && this.validation_equipos === true) {
        this.loading = true;
        axios
          .post(route("informe.store"), this.form)
          .then((response) => {
            const informe_id = response.data;
            const soporte = {
              id: this.soporte.id,
              numero: this.soporte.numero,
              codigo: this.soporte.codigo,
              fechasol: this.soporte.fechasol,
              solicitud: this.soporte.solicitud,
              fecharep: this.soporte.fecharep,
              recepcion: this.soporte.recepcion,
              fechasop: this.fecha,
              soporte: 1,
              tecnico_id: this.soporte.tecnico_id,
              funcionario_id: this.soporte.funcionario_id,
              nota_id: this.soporte.nota_id,
              informe_id: informe_id,
            };
            axios
              .put(route("soporte.update"), soporte)
              .then((response) => {
                // console.log(response.data)
              })
              .catch((error) => {
                this.error = error.response.data.errors;
              });
            //EDITAR EQUIPOS
            if (this.equipos.length > 0) {
              for (let i = 0; i < this.equipos.length; i++) {
                const equipo = {
                  id: this.equipos[i].equipo.id,
                  entrega: 1,
                  reparacion: 0,
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
                    console.log(error.data);
                  });
              }
            }
            //FIN EQUIPOS 
            //EDITAR DISPOSITIVOS
            if (this.dispositivos.length > 0) {
              for (let i = 0; i < this.dispositivos.length; i++) {
                const dispositivo = {
                  id: this.dispositivos[i].dispositivo.id,
                  entrega: 1,
                  reparacion: 0,
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
                    console.log(error.data);
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
            this.$inertia.visit(route("soportes.index"));
          })
          .catch((error) => {
            this.error = error.response.data.errors;
            console.log(error.data)
          });
        this.loading = false;
      } else {
        this.message = true;
        setTimeout(() => (this.message = false), 2000);
      }
    }
  },
};
</script>
      