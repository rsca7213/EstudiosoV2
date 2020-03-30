<template>
    <span class="createGrade"> 
        <span class="add"> Agregar... </span>
        <img :src="this.image" alt="agregar" style="width: 1.35rem; cursor: pointer" data-toggle="modal" :data-target="mTg">
        <div class="modal fade" tabindex="-1" role="dialog" :id="mId">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document" :class="this.pr">
                <div class="modal-content" :class="submitError" style="background-color: whitesmoke">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <b>Agregar Calificación</b>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" @click="resetInputs">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form action="#" @submit.prevent="submit">
                        <div class="modal-body">
                            <div class="form-group row mx-2"> 
                                <span> <b> Evaluación: </b> {{ this.ev_name }} </span>
                            </div>
                            <div class="form-group row mx-2">
                                <label for="grade" class="col-12 text-left mx-0 px-0"> <b> Calificación </b> (0 a 20)</label>
                                <input type="number" class="col-6 col-lg-6 form-control" id="grade" name="grade" required autocomplete="grade" v-model.number="gradeInput" :class="gradeError">
                                <span class="form-text text-danger text-left" style="font-size: 0.8rem;"> <b v-text="gradeErrorText"> </b> </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetInputs"> Cancelar </button>
                            <input type="submit" class="btn btn-primary" :disabled="btnDisabled" :class="btnError" value="Agregar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
export default {
    props: ["image", "type", "pr", "ev_id", "ev_name", "c_id"],

    data() {
        return {
            mId: "createModal" + this.type + this.ev_id,
            mTg: "#createModal" + this.type + this.ev_id,
            gradeInput: null,
            gradeErrorText: null,
            btnError: "",
            submitError: "",
            actionLink: "/grades/" + this.c_id + "/store/" + this.ev_id
        };
    },

    methods: {
        resetInputs() {
            this.gradeInput = null;
            this.submitError = "";
            console.log("%cInputs have been reset!", "color: lightblue");
        },

        submit() {
            console.log("%cAxios: Making Post request!", "color: lightblue");
            axios.post(this.actionLink,{
                'grade': this.gradeInput
            })
            .then(response => {
                console.log("%c Code: " + response.status + " -- Value: " + response.data, "color: lightgreen");
                console.log("%cAxios: Post request succesful!", "color: lightgreen");
                if(response.status == 200) location.reload();
            })
            .catch(errors => {
                console.log("%cAxios: Error in Post request!", "color: #FFCCCB");
                if(errors.response.status == 401) location.replace("/login");
                else if(errors.response.status == 422) {
                    this.submitError = "submitError";
                    this.gradeErrorText = "La calificación introducida debe estar en un rango de 0 a 20.";
                }
                else {
                    this.submitError = "submitError";
                    this.gradeErrorText = "¡Ha ocurrido un error! Por favor intentelo más tarde.";
                }
            });
            
        }
    },

    computed: {
        gradeError() {
            if (this.gradeInput > 20 && this.gradeInput != null) {
                this.gradeErrorText = "La calificación introducida no puede ser mayor a 20 puntos.";
                return "is-invalid";
            }
            else if (this.gradeInput < 0 && this.gradeInput != null) {
                this.gradeErrorText = "La calificación introducida no puede ser menor a 0 puntos.";
                return "is-invalid";
            }
            else {
                this.gradeErrorText = null;
                return "";
            }
        },

        btnDisabled() {
            if(this.gradeError != "") {
                this.btnError = "btn-danger";
                return true;
            }
            else {
                this.btnError = "";
                return false;
            }
        }
    }
}
</script>

<style scoped>
    .createGrade {
        color: #555555;
    }
    .submitError {
        border: 1px red solid;
    }
    .add {
        color: #212529;
    }
</style>