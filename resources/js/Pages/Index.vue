<template>
    <PaginaLayout>
        <Portada />
        <Title title="NUESTRO TRABAJO" />
        <CardHover v-bind:cardHover="cardHover" />
        <Title title="NUESTRAS CARACTERISTICAS" />
        <Carateristicas v-bind:carateristicas="this.caracteristicas" v-bind:lapaz="lapaz" />
        <Title title="NUESTRA ESTRUCTURA" />
        <Estructura />
        <Footer /> 

    </PaginaLayout>
</template>
<script>
import PaginaLayout from '@/Layouts/PaginaLayout.vue';
import { defineAsyncComponent } from 'vue';
import { cardcaracter } from '@/data/cardcaracteristica.js';
import { caracterimg } from '@/data/cardcaracteristica.js';
import { cardHover } from '@/data/cardhover.js';

export default {
    components: {
        PaginaLayout,
        Portada: defineAsyncComponent(() => import(/*webpackChunkName: "PortadaComponent" */ '@/PaginaComponents/Portada.vue')),
        Title: defineAsyncComponent(() => import(/*webpackChunkName: "TitleComponent" */ '@/PaginaComponents/Title.vue')),
        Carateristicas: defineAsyncComponent(() => import(/*webpackChunkName: "CaracteristicasComponent" */ '@/PaginaComponents/Carateristicas.vue')),
        CardHover: defineAsyncComponent(() => import(/*webpackChunkName: "CardHoverComponent" */ '@/PaginaComponents/CardHover.vue')),
        Estructura: defineAsyncComponent(() => import (/*webpackChunkName: "EstrucucturaComponent" */ '@/PaginaComponents/EstructuraGob.vue' )),
        Footer: defineAsyncComponent(() => import (/*webpackChunkName: "FooterComponent" */ '@/PaginaComponents/Footer.vue' )),
    },
    data() {
        return {
            caracteristicas: cardcaracter,
            lapaz: caracterimg,
            cardHover: cardHover,
        };
    },

}
</script>
<style scoped></style>
