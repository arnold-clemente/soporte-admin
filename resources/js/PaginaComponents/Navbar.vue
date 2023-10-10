<template>
  <nav>
    <div class="nabvar">
      <div>
        <router-link :to="{name: 'home-page'}" class="logo_navbar">
          <img src="../images/logo_blanco.png" alt="logo" class="image_logo" />
          <!-- <div class="image_letra">
                <h1>GOBIERNO AUTÓNOMO</h1>
                <h2>DEPARTAMENTAL DE</h2>
                <span>LA PAZ</span>
              </div> -->
        </router-link>
      </div>
      <button v-on:click="setmenubar" v-bind:class="{ close: menubar }" class="navbar_menu">
        <i class='bx bx-menu'></i>
      </button>
      <div class="nabvar-list" v-bind:class="{ close: menubar }">
        <button @click="dialog = true" class="navbar-links ">
          <span>Solicitud</span>
        </button>
        <router-link :to="{name: 'nosotros-page'}" class="navbar-links">
          <span>Nosotros</span>
        </router-link>
        <router-link :to="{name: 'soporte-page'}" class="navbar-links">
          <span>Soporte Técnico</span>
        </router-link>
        <router-link :to="{name: 'infraestructura-page'}" class="navbar-links">
          <span>Infraestructura</span>
        </router-link>
        <router-link :to="{name: 'desarrollo-page'}" class="navbar-links">
          <span>Desarrollo</span>
        </router-link>
      </div>
    </div>
  </nav>


  <!-- modal de solicitar -->
  <v-dialog v-model="dialog" width="600">
    <v-card>
      <v-card-title class="card_title">
        <span class="text-h5 text-center">SOLICITUD DE SOPORTE</span>
      </v-card-title>
      <v-card-text margin="0">
        <v-container class="ma-0 pa-0">
          <v-col class="ma-0 pa-0">
            <v-text-field variant="solo" type="text" label="Nombre(s) y Apellidos" placeholder="Ejemplo: Juan Jaime Mamani Perez"
              required></v-text-field>
       
            <v-row class="ma-0 pa-0">
              <v-col cols="12" md="6" class="a-0 pa-0">
                <v-text-field variant="solo" type="number" label="Nroº Cedula de Identidad" required
                  placeholder="EJEMPLO: 9254876"></v-text-field>
              </v-col>
              <v-col cols="12" md="6" class="ma-0 pa-0">
                <v-text-field variant="solo" type="number" label="Número de Celular" placeholder="Ejemplo: 65646568"
                  required></v-text-field>
              </v-col>
            </v-row>

            <v-row class="ma-0 pa-0">
              <v-col cols="12" md="4" class="ma-0 pa-0">
                <v-text-field variant="solo" type="text" label="Cargo:" required></v-text-field>
              </v-col>
              <v-col cols="12" md="8" class="ma-0 pa-0">
                <v-text-field variant="solo" type="text" label="Unidad:" required></v-text-field>
              </v-col>
            </v-row>

            <v-row class="ma-0 a-0">
              <v-col cols="12" md="5" class="ma-0 pa-0">
                <v-text-field variant="solo" type="number" label="Codigo de Equipo:" placeholder="Ejemplo: 150010654-12"
                  required></v-text-field>
              </v-col>
              <v-col cols="12" md="7" class="ma-0 pa-0">
                <v-select label="Tipo de Equipo:" :items="['Equipo de Escritorio', 'Laptop', 'Impresora', 'Otro',]"
                  variant="solo"></v-select>
              </v-col>
            </v-row>
            
            <v-textarea rows="2" placeholder="Breve descripción de la Falencia" label="Descripción" variant="solo"></v-textarea>

          </v-col>
        </v-container>
        <small class="rojo">*Este campo es requerido</small>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="blue-darken-1" variant="text" @click="dialog = false">
          CERRAR
        </v-btn>
        <v-btn color="blue-darken-1" variant="text" @click="dialog = false">
          ENVIAR
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>
  
<script>
import { mapState } from 'vuex';

export default {
  name: 'NabvarComponent',
  data() {
    return {
      menubar: true,
      dialog: true,
    };
  },
  computed: {
    ...mapState('pagina', [
      'setsolicitar',
    ]),
  },
  methods: {
    setmenubar() {
      this.menubar = !this.menubar;
    },
    setSolictar() {
      this.$store.commit('pagina/setSolictar')
    },

  },

}
</script>
  
<style scoped>
.card_title {
  width: 100%;
  text-align: center;
}
</style>