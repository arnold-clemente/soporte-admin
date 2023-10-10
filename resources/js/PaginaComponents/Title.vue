<template>
    <div class="title">
        <h1>{{ title }}</h1>
    </div>
</template>
<script>
export default {
        name: 'TitleComponent',
        props: {
            title: String
        }
    }
</script>
<style scoped>
.title{
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    width: 100%;
    margin-top: 50px;
    font-family: '87_Helvetica', sans-serif;
}
.title h1{
    font-size: 20px;
    font-weight: 700;
    text-align: center;
    color: #565655;
    /* background-image: linear-gradient(currentColor, currentColor); */
    background: rgb(77,135,58);
    background: linear-gradient(94deg, rgba(77,135,58,1) 1%, rgba(44,73,170,1) 21%, rgba(102,48,98,1) 39%, rgba(237,3,13,1) 57%, rgba(208,118,35,1) 78%, rgba(242,219,54,1) 100%);
    background-position: 10% 100%;
    background-repeat: no-repeat;
    background-size: 100% 3px;
}
@media (max-width: 350px) {
    .title h1{
        font-size: 16px;
    }
}
</style>