<template>
    <PaginaLayout>
        <MisionVisionVue />
        <Title title="ESTRUCTURA DE LA UNIDAD" />
        <Profesional />
        <Footer />
    </PaginaLayout>
</template>

<script>
import PaginaLayout from '@/Layouts/PaginaLayout.vue';
import { defineAsyncComponent } from 'vue';

export default {
    components: {
        PaginaLayout,
        MisionVisionVue: defineAsyncComponent(() => import(/*webpackChunkName: "MVComponent" */ '@/PaginaComponents/MisionVision.vue')),
        Title: defineAsyncComponent(() => import(/*webpackChunkName: "TitleComponent" */ '@/PaginaComponents/Title.vue')),
        Profesional: defineAsyncComponent(() => import(/*webpackChunkName: "ProfesionalComponent" */ '@/PaginaComponents/Profesionales.vue')),
        Footer: defineAsyncComponent(() => import(/*webpackChunkName: "FooterComponent" */ '@/PaginaComponents/Footer.vue')),
    },
}
</script>

<style></style>