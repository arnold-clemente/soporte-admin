<template>
    <div class="contenedor">
        <div class="contenedor_principal">
            <h1>Analisis & Desarrollo </h1>
            <p>
                Optimizar el uso y el aprovechamiento a través del desarrollo de sistemas que sean útil para los usuarios
                finales.
            </p>
        </div>
        <div class="cardcontenedor">
            <div class="cardimage">
                <img src="@/images/web2.gif" alt="image" />
            </div>
            <div class="cardtext">
                <div class="cardtext_text">
                    <h2>Tenemos como Funcion </h2>
                    <p>
                        Desarrollar y actualizar programas informáticos que permiten la perfectibilidad de los sistemas de
                        información, procesamiento de datos, reportes estadísticos y otros de naturaleza similar
                    </p>
                </div>
            </div>

        </div>
        <div class="card_content">
            <div class="cardicon">
                <i class='bx bx-sort-up'></i>
                <h3>Publicar</h3>
                <p>
                    Publicar Leyes, Decretos y Resoluciones Administrativas en la Gaceta Departamenta del Gobierno
                    Autónomo Departamental de La Paz
                </p>
            </div>
            <div class="cardicon">
                <i class='bx bxs-dashboard'></i>
                <h3>Elaborar y Desarrollar</h3>
                <p>
                    Elaborar proyectos de reglamentos e instructivos dirigidos al correcto uso de sistemas
                    informáticos.
                </p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "SistemasComponent",
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
    width: 80%;
    align-items: flex-start;
    justify-content: space-evenly;
    flex-wrap: wrap;
    /* background-color: aqua; */
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