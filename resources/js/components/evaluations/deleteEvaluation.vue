<template>
    <span class="deleteEvaluation">
        <img :src="this.image" alt="borrar" style="width: 1.4rem; cursor: pointer" v-if="this.type === 'desktop'"  data-toggle="modal" :data-target="deleteM_tg">
        <button class="btn btn-danger" v-if="this.type === 'mobile'"  data-toggle="modal" :data-target="deleteM_tg"> Borrar </button>
        <div class="modal fade" tabindex="-1" role="dialog" :id="deleteM_id">
            <div class="modal-dialog modal-dialog-centered" role="document" :class="this.pr">
                <div class="modal-content" :class="submitError" style="background-color: whitesmoke">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <b>Borrar Evaluación</b>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" @click="resetInputs">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form action="#" @submit.prevent="submit"> 
                        <div class="modal-body text-center">
                            <span class="h5 text-center"> ¿Está seguro que desea borrar la siguiente evaluación? <br> </span>
                            <span class="h5 text-center"> <b> Evaluación: </b> {{ this.ev_name }} <br> </span>
                            <span class="h5 text-center text-danger"> <b v-text="submitErrorText"> </b> </span>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal" @click="resetInputs"> Cancelar </button>
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
    props: ["image", "type", "ev_id", "ev_name", "c_id", "pr"],

    methods: {
        resetInputs() {
            this.submitError = "";
            this.submitErrorText = "";
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
                if(errors.response.status == 401) {
                    location.replace('/login');
                }
                else {
                    this.submitErrorText = "¡Ha ocurrido un error! Por favor intentelo más tarde.";
                    this.submitError = "submitError";
                }
            });
            
        }
    },

    data() {
        return {
            actionLink: "/evaluations/modify/" + this.c_id + "/delete/" + this.ev_id,
            deleteM_id: "deleteModal" + this.type + this.ev_id,
            deleteM_tg: "#deleteModal" + this.type + this.ev_id,
            submitError: "",
            submitErrorText: ""
        }
    }
}
</script>

<style scoped>
    .deleteEvaluation {
        color: #555555;
    }

    .submitError {
        border: 1px red solid;
    }
</style>