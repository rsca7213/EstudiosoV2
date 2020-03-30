<template>
    <span class="deleteGrade"> 
        <img :src="this.image" alt="editar" style="width: 1.2rem; cursor: pointer" data-toggle="modal" :data-target="mTg">
        <div class="modal fade" tabindex="-1" role="dialog" :id="mId">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document" :class="this.pr">
                <div class="modal-content" :class="submitError" style="background-color: whitesmoke">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <b>Borrar Calificación</b>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" @click="resetInputs">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form action="#" @submit.prevent="submit">
                        <div class="modal-body">
                            <div class="form-group"> 
                                <span class="h5"> ¿Está seguro que desea borrar <br> 
                                        la calificación de la evaluación? <br> <br>
                                </span>
                                <span class="h5"> <b> Evaluación: </b> {{ this.ev_name }} </span>
                                <span class="form-text text-danger text-left" style="font-size: 0.8rem;"> <b v-text="gradeErrorText"> </b> </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetInputs"> Cancelar </button>
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
    props: ["image", "type", "pr", "ev_id", "ev_name", "c_id"],

    data() {
        return {
            mId: "deleteModal" + this.type + this.ev_id,
            mTg: "#deleteModal" + this.type + this.ev_id,
            gradeErrorText: null,
            submitError: "",
            actionLink: "/grades/" + this.c_id + "/delete/" + this.ev_id
        };
    },

    methods: {
        resetInputs() {
            this.submitError = "";
            console.log("%cInputs have been reset!", "color: lightblue");
        },

        submit() {
            console.log("%cAxios: Making Delete request!", "color: lightblue");
            axios.delete(this.actionLink)
            .then(response => {
                console.log("%c Code: " + response.status + " -- Value: " + response.data, "color: lightgreen");
                console.log("%cAxios: Delete request succesful!", "color: lightgreen");
                if(response.status == 200) location.reload();
            })
            .catch(errors => {
                console.log("%cAxios: Error in Delete request!", "color: #FFCCCB");
                if(errors.response.status == 401) location.replace("/login");
                else {
                    this.submitError = "submitError";
                    this.gradeErrorText = "¡Ha ocurrido un error! Por favor intentelo más tarde.";
                }
            });
            
        }
    },

}
</script>

<style scoped>
    .deleteGrade {
        color: #555555;
    }
    .submitError {
        border: 1px red solid;
    }
</style>