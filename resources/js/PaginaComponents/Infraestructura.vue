<template>
  <div class="contenedor">
    <div class="infraestructura">
      <div class="infra_text">
        <h1>Infraestructura</h1>
        <h2>
          En informática, como redes se designa un conjunto de equipos o dispositivos conectados entre sí para el
          intercambio de recursos (como hardware o software) y de información.
        </h2>
      </div>
      <div class="cards">
        <div class="card_image">
          <img src="@/images/redes.jpg" alt="image" />
        </div>
        <div class="card_text">
          <div class="card_text_red">
            <h3>Asesorar y Resolver</h3>
            <p>
              Los problemas que se presenten durante el uso y funcionamiento de los
              equipos
            </p>
          </div>
          <div class="card_text_red">
            <h3>Administrar y controlar la red Informática</h3>
            <p>
              Realizando seguimiento exhaustivo sobre los diferentes sistemas de
              uso de la entidad, basando la implantación de nuevas tecnologías
              acorde a su avance en el ámbito mundial y local.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "InfraestructuraComponent",
  props: {},
};
</script>
<style scoped>
.contenedor {
  display: flex;
  flex-direction: column;
  padding-top: 100px;
  width: 100%;
  align-items: center;
  justify-content: center;
  font-family: "87_Helvetica", sans-serif;
}

.infraestructura {
  width: 90%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.infra_text {
  width: 80%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.infra_text h1 {
  font-size: 25px;
  color: #7f1f22;
  text-align: center;
  font-weight: 700;
  text-align: center;
}

.infra_text h2 {
  font-size: 18px;
  width: 80%;
  color: #005c2f;
  text-align: center;
}

.cards {
  width: 90%;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-start;
  justify-content: center;
}

.card_image {
  width: 400px;
  margin-right: 20px;
  overflow: hidden;
  transition: all 0.3s ease-in-out;
}

.card_image img {
  width: 100%;
  border-radius: 10px;
  transform: scale(var(--escala, 1));
  transition: 0.5s ease-in-out;
}

.card_image:hover img {
  --escala: 1.2;
  cursor: pointer;
  background-color: rgba(36, 124, 206, 0.541);
}

.card_text {
  width: 600px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  ;
  transition: all 0.5s ease-in-out;
}

.card_text_red {
  margin: 10px;
  padding: 10px;
  border-radius: 20px;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}

.card_text h3 {
  font-size: 18px;
  margin: 5px 0 0 0;
  text-align: center;
  transition: all 0.5s ease-in-out;
}

.card_text p {
  font-size: 14px;
  text-align: justify;
  line-height: 18px;
  color: #585857;
  text-align: center;
  transition: all 0.5s ease-in-out;
}

@media (max-width: 1260px) {
  .card_text {
    width: 500px;
  }
}

@media (max-width: 1135px) {
  .card_text {
    width: 400px;
  }

  .card_text h3 {
    font-size: 18px;
  }

  .card_text p {
    font-size: 14px;
    line-height: 16px;
  }
}

@media (max-width: 620px) {
  .infra_text h2 {
    font-size: 16px;
    width: 100%;
  }

  .card_text {
    width: 300px;
  }

  .card_text h3 {
    font-size: 18px;
  }

  .card_text p {
    font-size: 14px;
    line-height: 18px;
  }

  .card_image {
    width: 300px;
  }

  .infra_text h2 {
    font-size: 20px;
    margin-top: 0;
  }
}</style>