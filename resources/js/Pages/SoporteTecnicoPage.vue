<template>
    <PaginaLayout>
        <SoporteTecnico />
        <Title title="TIPOS DE SOPORTE" />
        <CardSoporte />
        <Footer />
    </PaginaLayout>
</template>

<script>
import PaginaLayout from '@/Layouts/PaginaLayout.vue';
import { defineAsyncComponent } from 'vue';

export default {
    components: {
        PaginaLayout,
        SoporteTecnico: defineAsyncComponent(() =>
            import(
        /*webpackChunkName: "SoporteTecnicoComponent" */ "@/PaginaComponents/SoporteTecnico.vue"
            )
        ),
        CardSoporte: defineAsyncComponent(() =>
            import(
        /*webpackChunkName: "CardSoporteComponent" */ "@/PaginaComponents/CardSoporte.vue"
            )
        ),
        Title: defineAsyncComponent(() =>
            import(
        /*webpackChunkName: "TitleComponent" */ "@/PaginaComponents/Title.vue"
            )
        ),
        Footer: defineAsyncComponent(() =>
            import(
        /*webpackChunkName: "FooterComponent" */ "@/PaginaComponents/Footer.vue"
            )
        ),
    },
}
</script>

<style></style>