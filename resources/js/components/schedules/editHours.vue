<template>
    <span class="editHours">
        <img :src="this.image" alt="editar" style="width: 1.2rem; cursor: pointer" data-toggle="modal" :data-target="mTg">
        <div class="modal fade" tabindex="-1" role="dialog" :id="mId">
            <div class="modal-dialog modal-dialog-centered modal-sm pr-3" role="document">
                <div class="modal-content" :class="submitError" style="background-color: whitesmoke">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <b>Editar Horas</b>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" @click="resetInputs">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form action="#" @submit.prevent="submit">
                        <div class="modal-body">
                            <div class="form-group row mx-1">
                                <label for="day" class="col-12 text-left mx-0 px-0"> <b> Día </b> </label>
                                <select class="col-12 form-control" id="day" name="day" v-model="dayInput"> 
                                    <option value="MO">Lunes</option>
                                    <option value="TU">Martes</option>
                                    <option value="WE">Miercoles</option>
                                    <option value="TH">Jueves</option>
                                    <option value="FR">Viernes</option>
                                    <option value="SA">Sabado</option>
                                    <option value="SU">Domingo</option>
                                </select>
                            </div>
                            <div class="form-group row mx-1">
                                <label for="start" class="col-12 text-left mx-0 px-0"> <b> Hora Inicial </b> </label>
                                <select class="col-12 form-control" id="start" name="start" v-model="startInput"> 
                                    <option value="7"> 7 am </option>
                                    <option value="8"> 8 am </option>
                                    <option value="9"> 9 am </option>
                                    <option value="10"> 10 am </option>
                                    <option value="11"> 11 am </option>
                                    <option value="12"> 12 pm </option>
                                    <option value="13"> 1 pm </option>
                                    <option value="14"> 2 pm </option>
                                    <option value="15"> 3 pm </option>
                                    <option value="16"> 4 pm </option>
                                    <option value="17"> 5 pm </option>
                                    <option value="18"> 6 pm </option>
                                    <option value="19"> 7 pm </option>
                                    <option value="20"> 8 pm </option>
                                    <option value="21"> 9 pm </option>
                                </select>
                            </div>
                            <div class="form-group row mx-1">
                                <label for="end" class="col-12 text-left mx-0 px-0"> <b> Hora Final </b> </label>
                                <select class="col-12 form-control" id="end" name="end" v-model="endInput"> 
                                    <option value="7"> 7 am </option>
                                    <option value="8"> 8 am </option>
                                    <option value="9"> 9 am </option>
                                    <option value="10"> 10 am </option>
                                    <option value="11"> 11 am </option>
                                    <option value="12"> 12 pm </option>
                                    <option value="13"> 1 pm </option>
                                    <option value="14"> 2 pm </option>
                                    <option value="15"> 3 pm </option>
                                    <option value="16"> 4 pm </option>
                                    <option value="17"> 5 pm </option>
                                    <option value="18"> 6 pm </option>
                                    <option value="19"> 7 pm </option>
                                    <option value="20"> 8 pm </option>
                                    <option value="21"> 9 pm </option>
                                </select>
                            </div>
                        </div>
                        <span class="text-danger" v-if="computedBtn === 'btn-danger'"> <b> La hora final debe ser mayor a la hora inicial. </b> </span>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetInputs"> Cancelar </button>
                            <input type="submit" class="btn btn-primary" value="Editar"  :class="computedBtn" :disabled="computedBtn === 'btn-danger' ? 'disabled' : null">
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
            mId: "editModal"  + this.slot_id,
            mTg: "#editModal" + this.slot_id,
            dayInput: this.slot_day,
            startInput: this.slot_start,
            endInput: this.slot_end,
            submitError: ""
        };
    },

    methods: {
        resetInputs() {
            this.dayInput = this.slot_day;
            this.startInput = this.slot_start;
            this.endInput = this.slot_end;
            this.submitError = "";
        },

        submit() {
            const data = {
                day: this.dayInput,
                start: this.startInput,
                end: this.endInput,
                slot_id: this.slot_id
            }
            this.$emit('edit', data);     
        },

    },

    computed: {
        computedBtn() {
            if(parseInt(this.endInput) <= parseInt(this.startInput)) {
                this.submitError = "submitError";
                return "btn-danger";
            }
        }
    }

}
</script>

<style scoped>
    .editHours {
        color: #555555;
    }
    .submitError {
        border: 1px red solid;
    }
</style