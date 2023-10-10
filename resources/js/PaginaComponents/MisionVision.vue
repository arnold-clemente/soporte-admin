<template>
    <div class="contenedor">
        <div class="contenedor_text">
            <h1>SOMOS UNIDAD DE INFORMACIÓN</h1>
        </div>
        <div class="conenedor_mv">
            <div class="mv_img">
                <img src="@/images/nosotros.jpeg" alt="nosotros">
            </div>
            <div class="mv">
                <div class="contenedor_card">
                    <div class="text_mv">
                        <i class='bx bx-bullseye rojo' ></i>
                        <h3 class="rojo" >Misión</h3>
                    </div>
                    <p>Desarrollar e implementar Sistemas informáticos robustos y eficientes que cumplan con las necesidades y requerimientos de la institución</p>
                </div>
                <div class="contenedor_card">
                    <div class="text_mv">
                        <i class='bx bx-check-circle verde'></i>
                        <h3 class="verde" >Visión</h3>
                    </div>
                    <p>Ser una Unidad reconocida y destacada a nivel institucional por nuestra calidad y el trabajo que coadyuve en el fortalecimiento de la misma empleando nuestros conocimientos en el área de la informática y su contribución al uso innovador de las Tecnologías de Información y Comunicación (TICs)</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
        name: 'MisionComponent',
        props: {
            title: String
        }
    }
</script>
<style scoped>
.contenedor{
    width: 100%;
    padding-top: 120px;
    /* background: rgba(2,30,0, 0.5); */
    font-family: '25_Helvetica', sans-serif;
    margin-bottom: 30px;
    /* background: linear-gradient(245deg, rgba(2,30,0,1) 1%, rgba(30,65,41,1) 26%, rgba(23,105,50,1) 68%, rgba(40,113,59,1) 87%, rgba(30,65,41,1) 99%); */
}
.contenedor_text{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.contenedor_text h1{    
    font-size: 20px;
    font-weight: 700;
    color: #565655;
    /* background-image: linear-gradient(currentColor, currentColor); */
    background: rgb(77,135,58);
    background: linear-gradient(94deg, rgba(77,135,58,1) 1%, rgba(44,73,170,1) 21%, rgba(102,48,98,1) 39%, rgba(237,3,13,1) 57%, rgba(208,118,35,1) 78%, rgba(242,219,54,1) 100%);
    background-position: 0% 100%;
    background-repeat: no-repeat;
    background-size: 100% 3px;
}
.mv_img{
    width: 40%;
    overflow: hidden; 
    transition: all 0.3s ease-in-out;
}
.mv_img img{
    width: 100%;
    border-radius: 10px;
    transform: scale(var(--escala, 1));
    transition: 0.5s ease-in-out;
}
.mv_img:hover img{
    --escala: 1.2;
    cursor:pointer;
    background-color: rgba(36, 124, 206, 0.541);
}
.mv{
    width: auto;
    margin-left: 20px;
}
.conenedor_mv{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    grid-template-rows: 100px repeat(4, 50px) 200px;;
    color: black;
    /* background-color: aliceblue; */
}
.contenedor_card{
    width: 500px;
    display: flex;
    flex-direction: column;
    align-items: center;
    color: black;
    border-radius: 20px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;

    /* background-color: aqua; */
    padding: 10px;
    margin: 20px 10px;
    transition: all 0.3s ease-in-out;
}
.text_mv{
    display: flex;
    align-items: center;
    justify-content: center;
}
.contenedor_card i{
    font-size: 30px;
    margin-right: 5px;
}
.contenedor_card h3{
    margin: 2px;    
}
.contenedor_card p{
    text-align: justify;
    padding: 0 5px;
    color: #585857;
}
@media (max-width: 1300px) {
    .mv_img{
        width: 50%;
    }
    .contenedor_card{
        width: 400px;
    }
}
@media (max-width: 1024px) {
    .mv_img{
        width: 45%;
    }
    .contenedor_card{
        width: 400px;
    }
}
@media (max-width: 840px) {
    .mv_img{
        width: 300px;
        margin-left: 5px;
    }
    .contenedor_card{
        width: 400px;
    }
}
@media (max-width: 520px) {
    .contenedor_card{
        width: 300px;
    }
}
</style>