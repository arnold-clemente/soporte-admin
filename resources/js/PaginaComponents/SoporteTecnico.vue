<template>
  <div class="contenedor">
    <div class="contenedor_principal">
      <h1>¡Somos unidad de Soporte! </h1>
      <p>
        Asesorando y resolviendo los problemas que se presenten durante el uso y funcionamiento de los equipos.
      </p>
    </div>
    <div class="cardcontenedor">
      <div class="cardimage">
        <img src="@/images/soprte_sistemas.jpg" alt="image" />
      </div>
      <div class="cardtext">
        <div class="cardtext_text">
          <h2>Tenemos como Funcion </h2>
          <p>
            Elaborar proyectos de reglamentos e instructivos dirigidos al correcto uso de los equipos de computación y
            sistemas informáticos.
          </p>
        </div>
        <div class="card_content">
          <div class="cardicon">
            <i class='bx bxs-data'></i>
            <h3>Generar Backups</h3>
            <p>
              Generar respaldos de seguridad (Backups) de la información de importancia institucional, a requerimiento de
              las diferentes Unidades Organizacionales.
            </p>
          </div>
          <div class="cardicon">
            <i class='bx bx-refresh' ></i>
            <h3>Desarrollar y Actualizar</h3>
            <p>
              Desarrollar y actualizar programas informáticos que permiten la perfectibilidad de los sistemas de
              información, procesamiento de datos, reportes estadísticos y otros de naturaleza similar
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "SoporteTecnicoComponent",
  props: {},
};
</script>
<style scoped>
.contenedor {
  padding-top: 100px;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease-in-out;
  font-family: '87_helvetica', sans-serif;
}

.contenedor_principal {
  width: 80%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
}

.contenedor_principal h1 {
  font-size: 25px;
  color: #7F1F22;
  text-align: center;
}

.contenedor_principal p {
  font-size: 20px;
  font-weight: 200;
  text-align: center;
}

.cardcontenedor {
  width: 90%;
  display: flex;
  align-items: flex-start;
  justify-content: space-evenly;
}

.cardimage {
  width: 300px;
  margin-right: 20px;
}

.cardimage img {
  width: 100%;
  border-radius: 20px;
}

.cardtext {
  width: 600px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.cardtext_text {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 20px;
}

.cardtext_text h2 {
  font-size: 20px;
  font-weight: 500;
}

.cardtext_text p {
  font-size: 16px;
  color: #585857;
}

.card_content {
  display: flex;
  align-items: flex-start;
  justify-content: space-evenly;
  flex-wrap: wrap;
}

.cardicon {
  width: 250px;
  display: flex;
  padding: 20px;
  margin: 0 5px;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
  transition: all 0.5s ease-in-out;

}

.cardicon:hover {
  box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
}

.cardicon i {
  font-size: 40px;
  background-color: #005C2F;
  color: white;
  border-radius: 50%;
  padding: 10px;
  transition: all 0.5s ease-in-out;
}

.cardicon:hover i {
  background-color: #7F1F22;
}

.cardicon h3 {
  font-size: 18px;
}

.cardicon p {
  text-align: justify;
  color: #585857;
}

@media (max-width: 1023px) {
  .cardcontenedor {
    flex-direction: column;
    align-items: center;
  }

}

@media (max-width: 665px) {
  .cardtext {
    width: 80%;
  }

  .cardimage {
    width: 80%;
  }
}
</style>