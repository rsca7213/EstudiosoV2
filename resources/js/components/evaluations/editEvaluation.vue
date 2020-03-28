<template>
    <span class="editEvaluation">
        <img :src="this.image" alt="editar" style="width: 1.4rem; cursor: pointer" v-if="this.type === 'desktop'" data-toggle="modal" :data-target="editM_tg">
        <button class="btn btn-secondary" v-if="this.type === 'mobile'" data-toggle="modal" :data-target="editM_tg"> Editar </button>
        <div class="modal fade" tabindex="-1" role="dialog" :id="editM_id">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" :class="submitError" style="background-color: whitesmoke">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <b>Editar Evaluación</b>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" @click="resetInputs">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form :action="actionLink" @submit.prevent="submit"> 
                        <div class="modal-body">
                            <div class="form-group row mx-2">
                                <label for="name"> <b> Nombre de la Evaluación </b> </label>
                                <input type="text" class="form-control" id="name" name="name" required autocomplete="evaluation" v-model="nameInput" :class="nameError">
                                <span class="form-text text-danger text-left" style="font-size: 0.8rem;"> <b v-text="nameErrorText"> </b> </span>
                            </div>
                            <div class="form-group row mx-2">
                                <label for="date" class="col-12 text-left mx-0 px-0"> <b> Fecha </b> </label>
                                <input type="date" class="col-8 col-lg-5 form-control" id="date" name="date" required v-model="dateInput">
                            </div>
                            <div class="form-group row mx-2">
                                <label for="value" class="col-12 text-left mx-0 px-0"> <b> Porcentaje </b> </label>
                                <input type="number" class="col-5 col-lg-3 form-control" id="value" name="value" required autocomplete="value" v-model.number="valueInput" :class="valueError">
                                <span class="h5 ml-1 mt-2"> <b> % </b> </span>
                                <span class="form-text text-danger text-left" style="font-size: 0.8rem;"> <b v-text="valueErrorText"> </b> </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal" @click="resetInputs"> Cancelar </button>
                            <input type="submit" class="btn btn-primary" value="Agregar" :disabled="btnDisabled" :class="btnError">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
export default {
    props: ["image", "type", "ev_id", "ev_name", "ev_date", "ev_value", "valuesum", "c_id"],

    methods: {
        resetInputs() {
            this.nameInput = this.ev_name;
            this.dateInput = this.ev_date;
            this.valueInput = parseInt(this.ev_value);
            this.submitError = "";
            console.log("%cInputs have been reset!", "color: lightblue");
        },

        submit() {
            console.log("%cAxios: Making Patch request!", "color: lightblue")
            axios.patch(this.actionLink,{
                name: this.nameInput,
                date: this.dateInput,
                value: this.valueInput
            })
            .then(response => {
                console.log("%c Code: " + response.status + " -- Value: " + response.data, "color: lightgreen");
                console.log("%cAxios: Patch request succesful!", "color: lightgreen");
                if (response.status == 200) {
                    location.reload();
                }
            })
            .catch(errors => {
                console.log("%cAxios: Error in Patch request!", "color: #FFCCCB");
                if(errors.response.status == 401) {
                    location.replace('/login');
                }
                else if(errors.response.status == 400) {
                    this.submitError = "submitError";
                    this.nameErrorText = "El nombre de la evaluación no puede ser igual a otras evaluaciones del curso.";
                }
                else if(errors.response.status == 422) {
                    this.submitError = "submitError";
                    this.valueErrorText = "Por favor verifique que el porcentaje acumulado de las evaluaciones no supere el 100%.";
                }
                else {
                    this.submitError = "submitError";
                    this.nameErrorText = "Ha ocurrido un error, por favor intentelo más tarde."; 
                }
            });
            
        }
    },

    data() {
        return {
            editM_id: "editModal" + this.type + this.ev_id,
            editM_tg: "#editModal" + this.type + this.ev_id,
            actionLink: "/evaluations/modify/" + this.c_id + "/update/" + this.ev_id,
            nameInput: this.ev_name,
            nameErrorText: null,
            dateInput: this.ev_date,
            valueInput: parseInt(this.ev_value),
            valueErrorText: null,
            btnError: "",
            submitError: ""
        }
    },

    computed: {

        nameError() {
            if (this.nameInput != null) {
                if (this.nameInput[0] === ' ') {
                    this.nameErrorText = "El nombre no puede empezar con un espacio.";
                    return "is-invalid";
                }
                else if (this.nameInput[this.nameInput.length - 1] === ' ') {
                    this.nameErrorText = "El nombre no puede terminar con un espacio.";
                    return "is-invalid";
                }
                else {
                    for (let i=0; i<this.nameInput.length; i++) {
                        if(this.nameInput[i] === ' ' && this.nameInput[i+1] === ' ') {
                            this.nameErrorText = "El nombre no puede tener dos espacios seguidos.";
                            return "is-invalid";
                        }
                    }
                    this.nameErrorText = null;
                    return "";
            }
            }
            else {
                this.nameErrorText = null;
                return "";
            }
        },

        valueError() {
            let valor = parseInt(this.valuesum) + this.valueInput;
            if (valor > 100) {
                this.valueErrorText = "El porcentaje acumulativo de las evaluaciones no debe sumar más de 100%.";
                return "is-invalid";
            }
            else if (this.valueInput < 1 && this.valueInput != null) {
                this.valueErrorText = "El porcentaje de la evaluación no puede ser menor a 1%.";
                return "is-invalid";
            }
            else {
                this.valueErrorText = null;
                return "";
            }
            
        },

        btnDisabled() {
            if(this.valueError != "" || this.nameError != "") {
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
    .editEvaluation {
        color: #555555;
    }

    .submitError {
        border: 1px red solid;
    }
</style>