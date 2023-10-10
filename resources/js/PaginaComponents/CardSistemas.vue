<template>
    <div class="contenedor">
      <div class="rotador">
        <div class="container_rotador">
          <div class="card_rotador box">
            <div class="front-face">
              <div class="icon-rotador">
                <img src="@/images/icon-backup.png" width="100%;" />
              </div>
              <span>Innovación</span>
            </div>
            <div class="back-face">
              <span>Innovación</span>
              <p>
                Generar respaldos de seguridad (Backups) de la información de importancia institucional, a requerimiento de
                las diferentes Unidades Organizacionales.
              </p>
            </div>
          </div>
          <div class="card_rotador box">
            <div class="front-face">
              <div class="icon-rotador">
                <img src="@/images/icon-proyectos-negro.png" width="100%;" />
              </div>
              <span>Preventivo</span>
            </div>
            <div class="back-face">
              <span>Mantenimiento Preventivo</span>
              <p>
                Reemplazos, adaptaciones, restauraciones, inspecciones, evaluaciones. Hechas en períodos de tiempos por
                calendario o uso de los equipos
              </p>
            </div>
          </div>
          <div class="card_rotador box">
            <div class="front-face">
              <div class="icon-rotador">
                <img src="@/images/icon-medida.png" width="100%;" />
              </div>
              <span>Correctivo</span>
            </div>
            <div class="back-face">
              <span>Mantenimiento Correctivo</span>
              <p>
                Recuperar la estructura dañada para ponerlo en servicio. 
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  <script>
  export default {
    name: "CardSistemasComponent",
    props: {},
  };
  </script>
  <style scoped>
  .contenedor {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
  }
  
  .rotador {
    width: 90%;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .container_rotador {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    transition: all 0.5s ease-in-out;
  }
  
  .card_rotador {
    width: 300px;
  }
  
  .texto-ofrecer {
    width: 100%;
  }
  
  .texto-ofrecer h1 {
    width: 100%;
    text-align: center;
    margin-bottom: 15px;
    color: dodgerblue;
    font-weight: 800;
  }
  
  .caja-rotador {
    padding: 0;
    margin-top: 50px;
    margin-bottom: 50px;
    margin: 6%;
  }
  
  .icon-rotador {
    width: 50%;
    margin: 5% 25%;
  }
  
  .box {
    perspective: 1000px;
    padding: 0;
  }
  
  .front-face {
    background: #fff;
    height: 200px;
    width: 90%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    box-shadow: 0px 5px 5px 0px rgba(0, 81, 250, 0.1);
    transition: all 0.5s ease;
    margin: 20px 0;
  }
  
  .box .front-face span,
  .box .back-face span {
    font-size: 20px;
    font-weight: 600;
    text-transform: uppercase;
    text-align: center;
  }
  
  .box .back-face {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    height: 200px;
    box-sizing: border-box;
    width: 90%;
    overflow: hidden;
    padding: 15px;
    color: #fff;
    opacity: 0;
    transform-style: preserve-3d;
    backface-visibility: hidden;
    background: linear-gradient(-135deg, #20211f, #20211f);
    transform: translateY(110px) rotateX(-90deg);
    box-shadow: 0px 5px 20px 0px rgba(0, 81, 250, 0.1);
    transition: all 0.5s ease;
    margin-top: 20px;
    margin-bottom: 20px;
  }
  
  .box .back-face p {
    margin-top: 10px;
    text-align: justify;
  }
  
  .box:hover .back-face {
    opacity: 1;
    transform: rotateX(0deg);
  }
  
  .box:hover .front-face {
    opacity: 0;
    transform: translateY(-110px) rotateX(90deg);
  }
  </style>