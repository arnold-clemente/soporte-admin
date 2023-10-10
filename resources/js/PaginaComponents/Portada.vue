<template>
    <div class="portada">
        <div class="portada_text">
            <h1 class="animate_fadeInDown">Unidad de Sistemas</h1>
            <h2 class="animate_fadeInDown">G.A.D.L.P.</h2>
            <p class="animate_fadeInDown">Optimizando el  Desarrollo de Sistemas</p>
        </div>
        <div class="fondo_img">
            <img src="../images/fondo_esc_1.png" alt="fondo"/>
        </div>
    </div>
    
    <!-- <div style="height: 22vh; overflow: hidden;" class="wave_portada">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M0.28,83.39 C185.38,83.39 267.77,85.38 500.84,40.97 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;">
            </path>
        </svg>
    </div> -->
</template>
<script>
    export default {
        name: 'PortadaComponent',
        components: {    
        }
    }
</script>
<style scoped>
.portada {
    width: 100%;
    height: 90vh;
    display: flex;
    color: white;
    align-items: center;
    justify-content: flex-start;
    background: rgb(34,42,36);
    /* background: linear-gradient(105deg, rgba(98,20,23,1) 0%, rgba(127,31,34,1) 32%, rgba(237,3,13,1) 66%, rgba(237,3,13,1) 81%, rgba(232,0,10,1) 91%); */
    background-image:linear-gradient(240deg, rgba(34, 42, 36, 0.801) 0%, rgba(0,92,47,0.95) 32%, rgba(23,105,50,0.9) 59%, rgba(40, 113, 59, 0.199) 80%, rgba(77,135,58,0.5) 94%), url(../images/portada.png);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    transition: all 0.5s ease-in-out;
}
.fondo_img{
    height: 80vh;
    position: absolute;
    bottom: 0;
    right: 0;
    background-attachment: fixed;
    /* margin-right: 20px; */
}
.fondo_img img{
    height: 80vh;
}
.portada_text{
    width:100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    /* margin-top: 120px; */
    margin-left: 10%;
}
.portada_text h1{
    font-size: 50px;
    margin: 0;
    /* margin: 100px 0 0 0; */
    text-shadow: 0.1em 0.1em 0.05em #333;
    transition: all 0.5s ease-in-out;
    text-align: center;
}
.portada_text h2{
    font-size: 50px;
    /* margin: 0 0px 20px 0; */
    margin: 0;
    text-shadow: 0.1em 0.1em 0.05em #333;
    transition: all 0.5s ease-in-out;
    text-align: center;
}
.portada_text p{
    width: 100%;
    /* height: 100px; */
    display: flex;
    align-items: center;
    justify-content: flex-start;
    /* background-color: rgba(255, 255, 255, 0.411); */
    font-size: 30px;
    text-align: center;
    text-shadow: 0.1em 0.1em 0.05em #333;
    transition: all 0.5s ease-in-out;
}
.wave_portada{
    position: absolute;
    width: 100%;
    margin-top: -11vh;    
}
@media (min-width: 1330px) {
    .portada_text h1{
    font-size: 60px;
}
.portada_text h2{
    font-size: 60px;}
.portada_text p{
        font-size: 30px;
    }
    .fondo_img {
        height: 80vh;
    }
.fondo_img img{
    height: 80vh;
}
}
@media (max-width: 768px) {
    .portada_text p{
        font-size: 20px;
    }
}
@media (max-width: 710px) {
    .fondo_img {
        height: 70vh;
    }
.fondo_img img{
    height: 70vh;
}
}

@media (max-width: 650px) {
    .portada_text h1{
    font-size: 40px;
}
.portada_text h2{
    font-size: 40px;
}
.portada_text p{
        font-size: 16px;
    }
}
@media (max-width: 540px) {
    .portada_text h1{
    font-size: 30px;
}
.portada_text h2{
    font-size: 30px;}
.portada_text p{
        font-size: 14px;
    }
    .fondo_img {
        height: 60vh;
    }
.fondo_img img{
    height: 60vh;
}
}
@media (max-width: 400px) {
    .portada_text{
        margin-top: -120px;
    }
}
</style>