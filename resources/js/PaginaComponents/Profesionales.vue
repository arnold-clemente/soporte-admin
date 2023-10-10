<template>
  <div class="container">
    <div class="cards_contenedor">
      <div class="card_cont" v-bind:class="{ close: profile_1 }">
        <button class="card_image" v-on:click="setprofile_1">
          <div class="image">
            <img src="@/images/jesus.jpg" alt="image">
          </div>
          <div class="profile_text">
            <h2>Juan Jesus Machicado Rojas</h2>
            <h3>Responsable de Unidad</h3>
          </div>
        </button>
        <div class="profile_cv animate__animated animate__fadeInUp" v-bind:class="{ close: profile_1 }">
          <div class="cv_text">
            <p>
              Planear, organizar, Dirigir y Controlar, el funcionamiento del área de sistemas. Proponer, elaborar e
              implanta nuevos sistemas necesarios en la institución. Supervisar y revisar la elaboración de proyectos de
              organización, métodos y procedimientos, organigramas estructurales y funcionales
            </p>
          </div>
          <div class="cv_redes">
            <div class="cv_icon">
              <i class='bx bxl-facebook'></i>
            </div>
            <div class="cv_icon">
              <i class='bx bxl-whatsapp'></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">

    <div class="cards_contenedor">
      <div class="card_cont" v-bind:class="{ close: profile_2 }">
        <button class="card_image" v-on:click="setprofile_2">
          <div class="image">
            <img src="@/images/user.jpg" alt="image">
          </div>
          <div class="profile_text">
            <h2>Responsable de Redes</h2>
            <h3>Responsable de Redes</h3>
          </div>
        </button>
        <div class="profile_cv animate__animated animate__fadeInUp" v-bind:class="{ close: profile_2 }">
          <div class="cv_text">
            <p>
              Responsable de mantener el buen funcionamiento del software y hardware de redes. Estas redes de datos pueden
              ser redes de área local (LAN), redes de área amplia (WAN), intranets y/o extranets.
            </p>
          </div>
          <div class="cv_redes">
            <div class="cv_icon">
              <i class='bx bxl-facebook'></i>
            </div>
            <div class="cv_icon">
              <i class='bx bxl-whatsapp'></i>
            </div>
          </div>
        </div>
      </div>
      <div class="card_cont" v-bind:class="{ close: profile_3 }">
        <button class="card_image" v-on:click="setprofile_3">
          <div class="image">
            <img src="@/images/user.jpg" alt="image">
          </div>
          <div class="profile_text">
            <h2>Soporte Técnico</h2>
            <h3>Soporte Técnico</h3>
          </div>
        </button>
        <div class="profile_cv animate__animated animate__fadeInUp" v-bind:class="{ close: profile_3 }">
          <div class="cv_text">
            <p>
              Planificar, organizar, dirijir y controlar las actividades requeridas para la instalación y el mantenimiento
              de la infraestructura informática, de acuerdo a las políticas y prioridades fijadas por la Institución.
            </p>
          </div>
          <div class="cv_redes">
            <div class="cv_icon">
              <i class='bx bxl-facebook'></i>
            </div>
            <div class="cv_icon">
              <i class='bx bxl-whatsapp'></i>
            </div>
          </div>
        </div>
      </div>
      <div class="card_cont" v-bind:class="{ close: profile_4 }">
        <button class="card_image" v-on:click="setprofile_4">
          <div class="image">
            <img src="@/images/user.jpg" alt="image">
          </div>
          <div class="profile_text">
            <h2>Desarrollo de Sistemas</h2>
            <h3>Desarrollo de Sistemas</h3>
          </div>
        </button>
        <div class="profile_cv animate__animated animate__fadeInUp" v-bind:class="{ close: profile_4 }">
          <div class="cv_text">
            <p>
              Identificar las debilidades de los sistemas que la institucion emplea, para mejorar los mismos en materia de
              seguridad y agilidad, principalmente. Asi tambien diseñar los protocolos de seguridad para la institucion y
              garantizar que se pongan en marcha de manera efectiva.
            </p>
          </div>
          <div class="cv_redes">
            <div class="cv_icon">
              <i class='bx bxl-facebook'></i>
            </div>
            <div class="cv_icon">
              <i class='bx bxl-whatsapp'></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "ProfesionalesComponent",
  data() {
    return {
      profile_1: false,
      profile_2: false,
      profile_3: false,
      profile_4: false,
    };
  },
  methods: {
    setprofile_1() {
      this.profile_1 = !this.profile_1;
    },
    setprofile_2() {
      this.profile_2 = !this.profile_2;
    },
    setprofile_3() {
      this.profile_3 = !this.profile_3;
    },
    setprofile_4() {
      this.profile_4 = !this.profile_4;
    }
  },
};
</script>
<style scoped>
.container {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 20px 0px 40px 0;
}

.cards_contenedor {
  width: 90%;
  display: flex;
  align-items: flex-start;
  justify-content: center;
  flex-wrap: wrap;
  transition: all 0.3s ease;
}

.card_cont {
  width: 300px;
  display: flex;
  flex-direction: column;
  margin: 20px 10px;
  border-radius: 20px;
  box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
  /* transition: all 0.2s ease-in-out; */
}

.card_cont.close {
  width: 300px;
}

.card_cont:hover {
  box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}

.card_image {
  width: 300px;
  height: auto;
  background-color: white;
  padding: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border: none;
  border-radius: 20px 0px 0px 20px;
  cursor: pointer;
}

.image {
  width: 150px;
}

.image img {
  width: 100%;
  border-radius: 50%;
}

.profile_text {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  transition: all 0.5s ease-in-out;
}

.profile_text h2 {
  font-size: 16px;
  color: #ED030D;
  text-align: center;
  font-weight: 600;
  margin: 5px 0;
}

.profile_text h3 {
  font-size: 14px;
  font-weight: 500;
  color: #4D873A;
  margin: 0;
}

.profile_cv {
  width: 300px;
  display: none;
  flex-direction: column;
  align-items: center;
  transition: all 0.5s ease-in-out;
}

.profile_cv p {
  padding: 0 20px;
}

.profile_cv.close {
  display: flex;
}

.cv_text {
  font-size: 14px;
  text-align: center;
  color: #424242;
  line-height: 20px;
}

.cv_redes {
  display: flex;
  align-items: center;
  justify-content: center;
}

.cv_icon {
  margin: 5px;
  padding: 20px 0;
}

.cv_icon i {
  font-size: 20px;
  padding: 5px;
  background: #4D873A;
  color: white;
  border-radius: 50%;
  transition: all 0.3s ease-in-out;
}

.cv_icon:hover i {
  font-size: 20px;
  background-color: #ED030D;
}

@media (max-width: 650px) {
  .card_cont {
    flex-direction: column;
  }

  .card_cont.close {
    width: 300px;
  }

  .profile_cv p {
    margin: 0 10px;
  }
}</style>