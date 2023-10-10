<template>
  <div class="contenedor" id="">
    <div class="contenedor_img">
      <img src="@/images/estructura.jpg" alt="image" />
    </div>
    <div class="formulario_bottom animate__animated animate__fadeInTopLeft">
      <h1>Comprometidos con el bienestar y desarrollo del equipo </h1>
      <a href="#organigrama" @click="setOrganigrama" class="btn">
        <span>Nuestro Directorio<em></em></span>
      </a>
      <a href="#coordinacion" @click="setCoordinacion" class="btn">
        <span>Coordinación<em></em></span>
      </a>
      <a href="#funcion" @click="setFuncion" class="btn">
        <span>FUNCIONES<em></em></span>
      </a>
      <a href="#marco" @click="setMarco" class="btn">
        <span>MARCO LEGAL<em></em></span>
      </a>
    </div>
  </div>

  <Organigrama id="organigrama" v-show="Organigrama" @closeOrganigrama="closeOrganigrama" />
  <Coordnacion id="coordinacion" v-show="Coordinacion" @closeCoordinacion="closeCoordinacion" />
  <Funciones id="funcion" v-show="Funcion" v-bind:contents="this.funciones" title="FUNCIONES:" @closeFuncion="closeFuncion" />
  <MarcoLegal id="marco" v-show="Marco" v-bind:contents="this.marco" title="MARCO LEGAL:" @closeMarco="closeMarco"/>
</template>
<script>
import funciones from '@/data/funciones.js';
import marcolegal from '@/data/marcolegal.js';
import { defineAsyncComponent } from 'vue';

export default {
  name: 'EstructuraComponent',
  components: {
    Organigrama: defineAsyncComponent(() => import(/*webpackChunkName: "OrganigramaComponent" */ '@/PaginaComponents/Organigrama.vue')),
    Coordnacion: defineAsyncComponent(() => import(/*webpackChunkName: "CoordinacionComponent" */ '@/PaginaComponents/Coordinacion.vue')),
    Funciones: defineAsyncComponent(() => import(/*webpackChunkName: "FuncionesComponent" */ '@/PaginaComponents/Funciones.vue')),
    MarcoLegal: defineAsyncComponent(() => import(/*webpackChunkName: "MarcoLegalComponent" */ '@/PaginaComponents/MarcoLegal.vue')),
  },
  data() {
    return {
      Organigrama: false,
      Coordinacion: false,
      Funcion: false,
      Marco: false,
      funciones: funciones,
      marco: marcolegal
    };
  },
  methods: {
    setOrganigrama() {
      this.Organigrama = true;
    },
    setCoordinacion() {
      this.Coordinacion = true;
    },
    setFuncion() {
      this.Funcion = true;
    },
    setMarco() {
      this.Marco = true;
    },
    closeOrganigrama() {
      this.Organigrama = false;
    },
    closeCoordinacion() {
      this.Coordinacion = false;
    },
    closeFuncion() {
      this.Funcion = false;
    },
    closeMarco() {
      this.Marco = false;
    },
  }
}
</script>
<style scoped>
.contenedor {
  width: 100%;
  margin-top: 20px;
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  justify-content: center;
  font-family: '87_Helvtica', sans-serif;
}

.contenedor_img {
  width: 400px;
  margin-right: 10px;
  transition: all 0.3s ease-in-out;
}

.contenedor_img img {
  width: 100%;
}

.formulario_bottom {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.formulario_bottom h1 {
  font-size: 20px;
  color: #565655;
  padding: 5px 10px;
  text-align: center;
}

.btn {
  cursor: pointer;
  background-color: #000;
  width: 80%;
  height: 50px;
  margin: 5px 0;
  line-height: 64px;
  display: flex;
  justify-content: center;
  align-items: center;
  transform: translate(0%, 0%);
  z-index: 0;
  text-decoration: none;
  box-shadow: 0px 0px 17px 1px rgba(0, 0, 0, 0.34);
}

.btn span {
  color: #fff;
  display: block;
  text-align: center;
  padding-left: 35px;
  text-transform: uppercase;
  font: bold 18px/66px Arial;
  transform: scaleX(0.6);
  letter-spacing: 3px;
  transition: color 0.3s ease;
  position: relative;
  z-index: 1;
}

.btn:before,
.btn:after {
  content: '';
  background: #fff;
  height: 50%;
  width: 0;
  position: absolute;
  transition: .3s cubic-bezier(.785, .135, .15, .86);
}

.btn:before {
  top: 0;
  left: 0;
  right: auto;
}

.btn:after {
  bottom: 0;
  right: 0;
  left: auto;
}

.btn:hover:before {
  width: 100%;
  right: 0;
  left: auto;
}

.btn:hover:after {
  width: 100%;
  right: 0;
  right: auto;
}

.btn:hover span {
  color: #000;
}

@media (max-width: 970px) {
  .contenedor_img {
    width: 300px;
  }

  .formulario_bottom h1 {
    font-size: 16px;
  }
}

@media (max-width: 424px) {
  .btn {
    width: 90%;
  }

  .btn span {
    font-size: 16px;
  }
}

/* organigrama */
.transition_translate {
  transform: translate();
}
</style>