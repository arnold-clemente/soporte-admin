<template>
    <div class="contenedor">
        <h1>RELACIONES DE COORDINACIÓN:</h1>
        <div class="coordinacion">
            <div class="coordinacion_text">
                <h3>Relaciones Intrainstitucionales:</h3>
                <p> Despacho del Gobernador </p>
                <p> Nivel de asesoramiento </p>
                <p> Nivel de Apoyo y Control </p>
                <p> Nivel de Coordinación Superior </p>
                <p> Nivel Ejecutivo </p>
                <p> Nivel Operativo </p>
                <p> Nivel Desconcentrado </p>
                <p> Nivel Descentralizado </p>
            </div>
            <div class="coordinacion_text_controlaria ">
                <h3>Contraloría General del Estado</h3>
                <p> Despacho del Gobernador </p>
                <p> Ministerio de Economía y Finanzas Públicas</p>
                <p> Agencia de gobierno electrónico y tecnologías de la información y comunicación </p>
                <p> Otras Instituciones </p>
            </div>
        </div>
        <button @click="closeCoordinacion" class="button_cerrar">
            <i class="bx bx-alt-down">Cerrar</i>
        </button>
    </div>
</template>
<script>
export default {
    name: 'CoordinacionComponent',
    props: {
    },
    emits: ["closeCoordinacion"],
    methods: {
        closeCoordinacion() {
            this.$emit("closeCoordinacion");
        },
    },
}
</script>
<style scoped>
.contenedor {
    width: 100%;
    display: flex;
    flex-direction: column;
    color: #585857;
    margin: 20px 0;
}

.contenedor h1 {
    width: 90%;
    font-size: 20px;
    padding: 15px 0;
    font-size: 20px;
    background-color: #ED030D;
    color: white;
    text-align: center;
}

.coordinacion {
    width: 90%;
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    border: 1px solid #000;
    margin-bottom: 20px;
}

.coordinacion_text {
    width: 50%;
    border-right: 1px solid #000;
}

.coordinacion_text_controlaria {
    width: 50%;
}

.coordinacion h3 {
    width: 100%;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-bottom: 1px solid #000;
    padding: 0 0 0 0px;
    color: #ED030D;
}

.coordinacion p {
    display: flex;
    text-align: justify;
    align-items: flex-start;
    justify-content: flex-start;
    padding: 0 40px;
    transition: all 0.3s ease-in-out;

}

.coordinacion p:hover {
    transform: translate(20px);
    color: #005C2F;
}

.coordinacion p:before {
    content: '>';
    font-weight: 800;
    margin-right: 20px;
}

.button_cerrar {
    width: 90%;
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
    .coordinacion {
        flex-direction: column;
        align-items: flex-start;
    }

    .coordinacion_text {
        width: 100%;
    }

    .coordinacion_text_controlaria {
        width: 100%;
    }

    .coordinacion h3 {
        font-size: 16px
    }

    .coordinacion p {
        font-size: 14px
    }
}
</style>