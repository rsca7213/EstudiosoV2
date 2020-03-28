<template>
    <span>
        <img :src="this.image" alt="borrar" style="width: 1.4rem" v-if="this.type === 'desktop'">
        <button class="btn btn-danger" v-if="this.type === 'mobile'"> Borrar </button>
    </span>
</template>

<script>
export default {
    props: ["image", "type"],
}
</script>

<style>

</style>