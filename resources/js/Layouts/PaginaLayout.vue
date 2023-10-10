<template>
  <nav>
    <div class="nabvar">
      <div>
        <Link :href="route('pagina.index')" class="logo_navbar">
        <img src="@/images/logo_blanco.png" alt="logo" class="image_logo" />
        <!-- <div class="image_letra">
                <h1>GOBIERNO AUTÓNOMO</h1>
                <h2>DEPARTAMENTAL DE</h2>
                <span>LA PAZ</span>
              </div> -->
        </Link>
      </div>
      <button v-on:click="setmenubar" v-bind:class="{ close: menubar }" class="navbar_menu">
        <i class='bx bx-menu'></i>
      </button>
      <div class="nabvar-list" v-bind:class="{ close: menubar }">
        <Link :href="route('pagina.nosotros')" class="navbar-links">
        <span>Nosotros</span>
        </Link>
        <Link :href="route('pagina.soporte.tecnico')" class="navbar-links">
        <span>Soporte Técnico</span>
        </Link>
        <Link :href="route('pagina.infraestructura')" class="navbar-links">
        <span>Infraestructura</span>
        </Link>
        <Link :href="route('pagina.desarrollo')" class="navbar-links">
        <span>Desarrollo</span>
        </Link>
        <Link :href="route('login')" class="navbar-links">
        <i class='bx bx-log-in-circle mx-1'></i>
        <span>Ingresar</span>
        </Link>
      </div>
    </div>
  </nav>
  <div class="bg-gray-100">
    <main>
      <slot />
    </main>
  </div>
</template>
  
<script>
import { Link } from "@inertiajs/vue3";

export default {
  name: 'NabvarComponent',
  components: {
    Link,
  },
  data() {
    return {
      menubar: true,
      dialog: true,
    };
  },

}
</script>
  
<style scoped>
.card_title {
  width: 100%;
  text-align: center;
}
</style>