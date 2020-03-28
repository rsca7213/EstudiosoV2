<template>
    <span>
        <img :src="this.image" alt="editar" style="width: 1.4rem" v-if="this.type === 'desktop'">
        <button class="btn btn-secondary" v-if="this.type === 'mobile'"> Editar </button>
    </span>
</template>

<script>
export default {
    props: ["image", "type"],
}
</script>

<style>

</style>