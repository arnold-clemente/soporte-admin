<template>
    <div class="contenedor">
        <div class="cards_contenedor">
            <div class="card_soporte">
                <div class="card_image">
                    <img src="@/images/preventivo.jpg" alt="image" />
                </div>
                <div class="card_text">
                    <h3>Mantenimiento preventivo</h3>
                    <p>
                        Mantenemos el funcionamiento óptimo de tus equipos a través de monitoreos preventivos y correctivos
                        con
                        el fin de detectar, solucionar y prevenir fallas a tiempo.
                    </p>
                </div>
            </div>
            <div class="card_soporte">
                <div class="card_image">
                    <img src="@/images/soporte.jpg" alt="image" />
                </div>
                <div class="card_text">
                    <h3>Mantenimiento Correctivo</h3>
                    <p>
                        Corregir un mal funcionamiento de equipos, maquinas y sistemas, restableciendo el buen estado de
                        funcionamiento y el nivel de rendimiento especificado de los activos de la institucion.
                    </p>
                </div>
            </div>
            <div class="card_soporte">
                <div class="card_image">
                    <img src="@/images/backup.jpg" alt="image" />
                </div>
                <div class="card_text">
                    <h3>Copias de seguridad</h3>
                    <p>
                        Las copias deben incluir datos personales de los usuarios propietarios de los dispositivos, deben
                        aplicarse las medidas necesarias para proteger la privacidad de estos datos.
                    </p>
                </div>
            </div>
            
        </div>

    </div>
</template>
<script>
export default {
    name: 'CardSoporteComponent',
    props: {
    }
}
</script>
<style scoped>
.contenedor {
    width: 100%;
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.cards_contenedor {
    width: 90%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    transition: all 0.3s ease-in-out;
}

.card_soporte {
    width: 250px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 25px;
    margin: 10px;
    border-radius: 20px;
    background-color: white;
    font-family: '25_Helvetica', sans-serif;
    box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
    transition: all 0.5s ease-in-out;
}

.card_image {
    width: 250px;
}

.card_image img {
    width: 100%;
    border-radius: 20px;
}

.card_text {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.card_text h3 {
    text-align: center;
    color: #ED030D;
    margin-bottom: 0px;
}

.card_text p {
    text-align: center;
    line-height: 25px;
    color: #585857;
}
</style>