<template>
  <div class="directorio">
    <div class="directorio_contenedor">
      <h1>NUESTRO DIRECTORIO</h1>
      <div class="dependencia">
        <h1>RELACIÓN DE DEPENDENCIA:</h1>
        <div class="depende">
          <div class="depende_text">
            <h2>Depende de :</h2>
            <p>Dirección de Recursos Humanos</p>
          </div>
          <div class="depende_text">
            <h2>Dependientes:</h2>
            <p>Ninguno</p>
          </div>
        </div>
      </div>
      <img src="@/images/organigrama.png" alt="">
      <button @click="closeOrganigrama" class="button_cerrar">
        <i class="bx bx-alt-down">Cerrar</i>
      </button>
    </div>
  </div>
</template>
<script>
export default {
  name: 'OrganigramaComponent',
  props: {
  },
  emits: ["closeOrganigrama"],
  methods: {
    closeOrganigrama() {
      this.$emit("closeOrganigrama");
    },
  }
}
</script>
<style scoped>
.directorio {
  width: 100%;
  display: flex;
  margin: 15px 0;
  align-items: center;
  justify-content: center;
  font-family: '25_Helvetica', sans-serif;
}

.directorio_contenedor {
  width: 90%;
}

.directorio_contenedor h1 {
  width: 100%;
  padding: 15px 0;
  font-size: 20px;
  background-color: #ED030D;
  color: white;
  text-align: center;
}

.dependencia {
  width: 100%;
  color: #585857;
  border: 1px solid #000;
  border-radius: 20px;
  margin-bottom: 10px;
}

.dependencia h1 {
  text-align: center;
  background-color: white;
  color: #585857;
  border-bottom: 1px solid #000;
}

.depende {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: flex-start;
}

.depende_text {
  width: 50%;
  display: flex;
  flex-direction: column;
  /* align-items: center; */
  justify-content: flex-end;
  margin-left: 50px;
  margin-bottom: 10px;
}

.depende_text h2 {
  margin: 0;
}

.depende_text p {
  margin: 0;
}

.depende_text p:before {
  content: '>';
  margin-right: 10px;
  font-size: 20px;
  font-weight: 600;
}

.directorio_contenedor img {
  width: 90%;
}

.button_cerrar {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  border: none;
  cursor: pointer;
  background-color: #e72933;
  color: rgb(182, 180, 178);
  padding: 10px 0;
  transition: all 0.3s ease-in-out;
}

.button_cerrar:hover {
  color: white;
  background-color: #ED030D;
}

@media (max-width: 740px) {
  .depende {
    flex-direction: column;
    align-items: flex-start;
  }

  .depende h1 {
    font-size: 14px;
  }

  .depende h2,
  p,
  p:before {
    font-size: 14px;
  }
}</style>