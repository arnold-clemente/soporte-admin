<template>
    <div class="service_cards">
        <a href="#" class="card bacground_1">
            <img class="card_image_fond" src="../images/redes.jpg" alt="card" />
            <div class="card_hover">
                <img class="card_image" src="../images/icon_redes.png" alt="card" />
                <h2>Redes</h2>
            </div>
            <div class="card_leyenda">
                <h2>Redes</h2>
                <p>Filtros de Seguridad</p>
            </div>
        </a>
        <a href="#" class="card bacground_1">
            <img class="card_image_fond" src="../images/soporte.jpg" alt="card" />
            <div class="card_hover">
                <img class="card_image" src="../images/icon_soporte.png" alt="card" />
                <h2>Soporte Técnico</h2>
            </div>
            <div class="card_leyenda">
                <h2>Soporte Técnico</h2>
                <p>Mantenimiento Preventivo y Correctivo</p>
            </div>
        </a>
        <a href="#" class="card bacground_1">
            <img class="card_image_fond" src="../images/sistemas.jpg" alt="card" />
            <div class="card_hover">
                <img class="card_image" src="../images/icon_sistemas.png" alt="card" />
                <h2>Desarrollo</h2>
            </div>
            <div class="card_leyenda">
                <h2>Desarrollo</h2>
                <p>Análisis y Diseño de Sistemas</p>
            </div>
        </a>
        
    </div>
</template>
<script>
export default {
        name: 'CardServiceComponent',
        props: {
            cards: Object,
        }
    }
</script>
<style scoped>
.service_cards{
    width: 100%;
    margin: 20px 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center; 
    flex-wrap: wrap;   
}
.card{
    width: 300px;
    height: 250px;
    margin: 10px 10px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;  
    flex-direction: column;  
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    border: 1px solid #f09696;
    transition: all 0.5s ease-in-out;
}
.card_hover{
    display: none;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: absolute;
    width: 300px;
    height: 200px;
    margin-top: -50px;
    border-radius: 10px 10px 0px 0px;
    background-color: rgba(0, 0, 0, 0.767);
    transform: scale(-50% -50%);
    transition: all 1s ease-in-out;
}
.card:hover .card_hover{
    display: flex;
    transform: scale(0% 0%);
    transition: all 1s ease-in-out;
}
.card_image_fond{
    width: 300px;
    border-radius: 10px 10px 0px 0px;
    margin-top: -50px;
}
/* .bacground_1{
    background-image:linear-gradient(rgba(252, 78, 78, 0.233),rgba(19, 18, 18, 0.719)), url(../images/soporte.jpg);
} */
.card h2{
    font-size: 20px;
    font-family: '87_Helvetica', sans-serif;
    color: white;
    margin: 0;
}
.card_image{
    width: 100px;
    margin-top: -50px
}
.card_leyenda{
    position: absolute;
    display: flex;
    text-decoration: none;
    flex-direction: column;
    justify-content: center;
    margin-top: 180px;
    width: 300px;
    height: 70px;
    border-radius: 0px 0px 10px 10px;
    background-color: white;
    color: black;
}
.card_leyenda h2{
    margin: 0px;
    color: black;
    font-size: 20px;
    font-family: '87_Helvetica', sans-serif;
    padding-left: 10px;
}
.card_leyenda p{
    margin: 1px;
    font-size: 15px;
    font-family: '25_Helvetica', sans-serif;
    padding-left: 10px;
}
</style>