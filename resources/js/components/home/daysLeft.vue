<template>
    <span>
        <span v-if="days <= 7" class="text-danger"> (en <span v-text="days"> </span> días) </span>
        <span v-else-if="days > 7 && days <= 14" style="color: #ff620d"> (en <span v-text="days"> </span> días) </span>
        <span v-else>  (en <span v-text="days"> </span> días)  </span>
    </span>
</template>

<script>
export default {
    props: ["daysleft"],
    data() {
        return {
            days: parseInt(this.daysleft)
        }
    }
}
</script>

<style>

</style>