<template>
    <PaginaLayout>
        <Sistemas />
        <Title title="PRINCIPALES FUNCIONES" />
        <CardV />
        <Footer />
    </PaginaLayout>
</template>

<script>
import PaginaLayout from '@/Layouts/PaginaLayout.vue';
import { defineAsyncComponent } from 'vue';

export default {
    components: {
        PaginaLayout,
        Sistemas: defineAsyncComponent(() => import (/*webpackChunkName: "SistemasComponent" */ '@/PaginaComponents/Sistemas.vue' )),
        Title: defineAsyncComponent(() => import (/*webpackChunkName: "TitleComponent" */ '@/PaginaComponents/Title.vue' )),
        CardV: defineAsyncComponent(() => import (/*webpackChunkName: "CardVComponent" */ '@/PaginaComponents/CardV.vue' )),
        Footer: defineAsyncComponent(() => import (/*webpackChunkName: "FooterComponent" */ '@/PaginaComponents/Footer.vue' )),
    },
}
</script>

<style></style>