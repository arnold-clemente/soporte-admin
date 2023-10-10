<template>
    <footer>
        <div class="footer">
            <div class="footer_info">
                <div class="footer_logo">
                    <img src="../images/logo_blanco.png" alt="escudo" />
                    <div class="footer_logo_texto">
                        <h2>GOBIERNO AUTÓNOMO </h2>
                        <h3>DEPARATAMENTAL DE</h3>
                        <h1>LA PAZ</h1>
                    </div>
                </div>
                <h1 class="footer_h1">INFORMACIÓN DE CONTACTO</h1>
                <a href="https://www.facebook.com/gobernaciondelapaz/?locale=es_LA" target="_blank" class="icon_footer">
                    <i class='bx bxl-facebook-circle'></i>
                    <span>G.A.D.L.P.</span>
                </a>
                <a href="https://twitter.com/gobernacionlp" target="_blank" class="icon_footer">
                    <i class='bx bxl-twitter'></i>
                    <span>@gobernacionlp</span>
                </a>
                <a class="icon_footer footer_events_none">
                    <i class='bx bx-phone-call'></i>
                    <span>2 204127 - 2 204340</span>
                </a>
                <a class="icon_footer footer_events_none">
                    <i class='bx bx-envelope'></i>
                    <span>info@gobernacionlapaz.gob.bo</span>
                </a>
            </div>
            <div class="footer_map">
                <!-- <h1 class="footer_h1">INFORMACIÓN DE CONTACTO</h1> -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3825.598481666531!2d-68.13483699832997!3d-16.495856533104035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f20722666653f%3A0xb627d3d2af7437aa!2sGobernaci%C3%B3n%20del%20Departamento%20de%20La%20Paz!5e0!3m2!1ses!2sbo!4v1682523952218!5m2!1ses!2sbo"
                    width="280" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <span>Calle Comercio Esq. Ayacucho N° 1200</span>
            </div>
            <div class="footer_links">
                <h1 class="footer_h1">NUESTROS SERVICIOS</h1>
                <Link :href="route('pagina.nosotros')" class="icon_footer">
                <span>Nosotros</span>
                </Link>
                <Link :href="route('pagina.soporte.tecnico')" class="icon_footer">
                <span>Soporte Técnico</span>
                </Link>
                <Link :href="route('pagina.infraestructura')" class="icon_footer">
                <span>Infraestructura</span>
                </Link>
                <Link :href="route('pagina.desarrollo')" class="icon_footer">
                <span>Sistemas</span>
                </Link>
                <Link :href="route('login')" class="icon_footer">
                <span>Acceder</span>
                </Link>
                <h1 class="footer_h1">HORARIOS DE ATENCIÓN</h1>
                <p>De: Lunes a Viernes</p>
                <p>De: 8:30 a 12:00</p>
                <p>De: 14:30 a 18:30</p>

            </div>
        </div>
    </footer>
    <div class="footer_copy">
        <span>@Copyright, Derechos reservados</span>
        <span>Gobernación de La Paz | {{ this.year }}</span>
    </div>
    <div class="footer_color"></div>
</template>
<script>
import { Link } from "@inertiajs/vue3";

export default {
    name: 'FooterComponent',
    props: {
        title: String
    },
    components: {
        Link,
    },
    data() {
        return {
            year: new Date().getFullYear(),
        };
    },
}
</script>
<style scoped></style>