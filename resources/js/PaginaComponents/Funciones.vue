<template>
    <div class="contenedor">
        <div class="funciones">
            <h1>{{ title }}</h1>
            <div v-for="content in contents" :key="content.id">
                <p>{{ content.content }}</p>
            </div>
        </div>
        <button @click="closeFuncion" class="button_cerrar">
            <i class="bx bx-alt-down">Cerrar</i>
        </button>
    </div>
</template>
<script>
export default {
    name: 'FuncionesComponent',
    props: {
        contents: {
            type: Object,
            required: true,
        },
        title: {
            type: String,
            required: true
        }
    },

    emits: ["closeFuncion"],
    methods: {
        closeFuncion() {
            this.$emit("closeFuncion");
        },
    }

}
</script>
<style scoped>
.contenedor {
    widows: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px 0;
}

.funciones {
    width: 90%;
}

.funciones h1 {
    color: white;
    background-color: #ED030D;
    font-size: 20px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 0 0 0px;
}

.funciones p {
    color: #585857;
    display: flex;
    text-align: justify;
    align-items: flex-start;
    justify-content: flex-start;
    padding: 0 40px;
    transition: all 0.3s ease-in-out;
}

.funciones p:hover {
    transform: translate(20px);
    color: #005C2F;
}

.funciones p:before {
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
</style>