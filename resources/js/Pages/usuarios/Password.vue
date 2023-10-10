<template>
  <button
    @click.prevent="openmodal"
    class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
  >
    <i class="bx bx-key"></i>
  </button>
  <!-- modal para cambiar contraseña  -->
  <DialogModal :show="modal" @close="modal = false">
    <template #title>
      <div class="w-full flex items-center justify-center text-green-700">
        <span>Agregar Nuevo</span>
      </div>
    </template>

    <template #content>
      <div class="border-b border-gray-900/10">
        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
          <div class="sm:col-span-6">
            <label class="block text-sm font-medium leading-6 text-gray-900"
              >Contraseña</label
            >
            <div>
              <input
                type="text"
                v-model="password"
                placeholder="Escriba la nueva contraseña"
                class="block h-12 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              />
            </div>
            <p class="text-red-400">{{ errorpassword }}</p>
          </div>
        </div>
      </div>
    </template>

    <template #footer>
      <SecondaryButton @click="modal = false"> Cancelar </SecondaryButton>

      <DangerButton
        class="ml-2"
        @click="updatepassword"
        :class="{ 'opacity-25': procesoAgregar }"
        :disabled="procesoAgregar"
      >
        Actualizar
      </DangerButton>
    </template>
  </DialogModal>
</template>

<script>
import DialogModal from "@/Components/DialogModal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  components: {
    DialogModal,
    SecondaryButton,
    DangerButton,
  },
  props: {
    user: {
        type: Object,
        required: true,
    }
  },
  data() {
    return {
      password: "",
      errorpassword: "",
      modal: false,
      procesoAgregar: false,
    };
  },
  methods: {
    openmodal() {
      this.errorpassword = "";
      this.modal = true;
    },
    updatepassword() {
      this.procesoAgregar = true;
      axios
        .post(route("usuario.password", this.user), {
          password: this.password,
        })
        .then((response) => {
          Swal.fire({
            position: "center",
            icon: "success",
            title: response.data,
            showConfirmButton: false,
            timer: 2000,
          });
          this.$inertia.reload({ only: ["users"] });
          this.procesoAgregar = false;
          this.modal = false;
        })
        .catch((error) => {
          this.errorpassword = error.response.data.errors.password;
          this.procesoAgregar = false;
        });
    },
  },
};
</script>

<style>
</style>