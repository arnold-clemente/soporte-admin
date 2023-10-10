<template>
    <PaginaLayout>
        <Redes />
        <Title title="PRINCIPALES FUNCIONES" />
        <CardSistemas />
        <Footer />
    </PaginaLayout>
</template>

<script>
import PaginaLayout from '@/Layouts/PaginaLayout.vue';
import { defineAsyncComponent } from 'vue';

export default {
    components: {
        PaginaLayout,
        Redes: defineAsyncComponent(() => import(/*webpackChunkName: "RedesComponent" */ '@/PaginaComponents/Infraestructura.vue')),
        Title: defineAsyncComponent(() => import(/*webpackChunkName: "TitleComponent" */ '@/PaginaComponents/Title.vue')),
        CardSistemas: defineAsyncComponent(() => import(/*webpackChunkName: "CardSistemasComponent" */ '@/PaginaComponents/CardSistemas.vue')),
        Footer: defineAsyncComponent(() => import(/*webpackChunkName: "FooterComponent" */ '@/PaginaComponents/Footer.vue')),
    },
}
</script>

<style></style>