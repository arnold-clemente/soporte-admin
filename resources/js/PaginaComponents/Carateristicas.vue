<template>
    <div class="contenedor">
        <div class="imagen_cont">
            <img :src="lapaz" class="float" alt="image" />
        </div>
        <div class="contenedor_card_flex">
            <div class="contenedor_cards" v-for="carateristica in carateristicas" :key="carateristica.id">
                <div class="icon_card">
                    <i v-bind:class="carateristica.icon"></i>
                </div>
                <div class="icon_text">
                    <h1 v-bind:class="carateristica.color">{{ carateristica.title }}</h1>
                    <p>{{ carateristica.text }}</p><!--  -->
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    name: 'CaracteristicaComponent',
    props: {
        carateristicas: {
            type: Object,
            required: true,
        },
        lapaz:{
            type: String,
            required: true,
        }
    },
    data() {
        return {
        };
    },
}
</script>
<style scoped>
.contenedor {
    width: 100%;
    display: flex;
    margin: 10px 0;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}

.imagen_cont {
    width: 280px;
    margin-left: 20px;
}

.imagen_cont img {
    width: 280px;
}

.contenedor_card_flex {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    width: calc(100% - 300px);
    transition: all 0.5s ease-in-out;
}

.contenedor_cards {
    width: 280px;
    padding: 10px;
    display: flex;
    align-items: flex-start;
    /* background-color: rgba(255, 0, 0, 0.322); */
    border-radius: 10px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    margin: 10px;
    transition: all 0.4s ease-in-out;
}

.contenedor_cards:hover {
    box-shadow: none;
}

.icon_card {
    margin: 5px;
}

.icon_card i {
    font-size: 25px;
    color: white;
    padding: 5px;
    border-radius: 50%;
}

.icon_text h1 {
    margin: 5px 0;
    /* color: #D07623; */
    font-family: '87_Helvetica', sans-serif;
    font-weight: 600;
    font-size: 20px;
}

.icon_text p {
    margin: 2px 0;
    color: #585857;
    font-size: 14px;
    text-align: justify;
}

@media (max-width: 640px) {
    .contenedor {
        flex-direction: column;
    }

    .contenedor_card_flex {
        width: 100%;
    }
}
</style>