<template>
  <div class="container">
    <div class="card_contenedor">
      <div v-for="card in cardHover" :key="card.id" class="contenedor">
        <Link :href="route(card.ruta)">
          <figure>
            <img :src="card.image" />
            <div class="capa">
              <h3>{{ card.title }}</h3>
              <p>
                {{ card.text1 }}
              </p>
              <p>
                {{ card.text2 }}
              </p>
              <p>
                {{ card.text3 }}
              </p>
            </div>
          </figure>
        </Link>
      </div>
    </div>
  </div>
</template>
<script>
import { Link } from "@inertiajs/vue3";

export default {
  name: "TitleComponent",
  components: {
    Link,
  },
  props: {
    cardHover: {
      type: Array,
      required: true,
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
}

.card_contenedor {
  width: 90%;
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  flex-wrap: wrap;
}

.contenedor {
  margin: 10px 0px;
  width: 300px;
  display: flex;
  justify-content: center;
  align-items: center;
  height: auto;
}

.contenedor a {
  margin: 0;
  padding: 0;
}

.contenedor figure {
  position: relative;
  height: 250px;
  cursor: pointer;
  width: 300px;
  overflow: hidden;
  border-radius: 6px;
  box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.5);
}

.contenedor figure img {
  width: 100%;
  height: 100%;
  transition: all 400ms ease-out;
  will-change: transform;
}

.contenedor figure .capa {
  position: absolute;
  top: 0;
  width: 100%;
  height: 100%;
  background: #005c3077;
  transition: all 400ms ease-out;
  opacity: 0;
  visibility: hidden;
  text-align: center;
}

.contenedor figure:hover>.capa {
  opacity: 1;
  visibility: visible;
}

.contenedor figure:hover>.capa h3 {
  margin-top: 70px;
  margin-bottom: 15px;
}

.contenedor figure:hover>img {
  transform: scale(1.3);
}

.contenedor figure .capa h3 {
  color: #fff;
  font-weight: 400;
  margin-bottom: 120px;
  transition: all 400ms ease-out;
  margin-top: 30px;
}

.contenedor figure .capa p {
  color: #fff;
  font-size: 15px;
  line-height: 1.5;
  width: 100%;
  max-width: 220px;
  margin: auto;
}

@media (max-width: 750px) {
  .contenedor figure {
    width: 270px;
  }
}</style>