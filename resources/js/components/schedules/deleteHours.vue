<template>
    <span class="deleteHours">
        <img :src="this.image" alt="borrar" style="width: 1.2rem; cursor: pointer" data-toggle="modal" :data-target="mTg">
        <div class="modal fade" tabindex="-1" role="dialog" :id="mId">
            <div class="modal-dialog modal-dialog-centered modal-sm pr-3" role="document">
                <div class="modal-content" style="background-color: whitesmoke">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <b>Borrar Horas</b>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form action="#" @submit.prevent="submit">
                        <div class="modal-body">
                            <div class="form-group"> 
                                <span class="h5"> ¿Está seguro que desea borrar <br> 
                                        las horas? <br> <br>
                                </span>
                                <span class="h5"> <b> Día: </b> {{ this.slot_day }}  </span> <br>
                                <span class="h5"> <b> Horas: </b> {{ this.slot_start }} a {{ this.slot_end }}</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
                            <input type="submit" class="btn btn-danger" value="Borrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
export default {
    props: ["image", "slot_id", "slot_day", "slot_start", "slot_end", "c_id"],

    data() {
        return {
            mId: "deleteModal"  + this.slot_id,
            mTg: "#deleteModal" + this.slot_id
        };
    },

    methods: {
        submit() {
            this.$emit('delete', this.slot_id);     
        }
    },

}
</script>

<style scoped>
    .deleteHours {
        color: #555555;
    }
</style