<template>
    <span class="courseInfo"> 
        <button class="btn btn-primary btn-lg mx-1" data-toggle="modal" :data-target="modalTg" @click="submit" v-if="this.type == 'lg'"> Información del Curso </button>
        <button class="btn btn-primary mx-1" data-toggle="modal" :data-target="modalTg" @click="submit" v-if="this.type == 'sm'"> Información del Curso </button>
        <div class="modal fade" tabindex="-1" role="dialog" :id="modalId">
            <div class="modal-dialog modal-dialog-centered" role="document" :class="this.pr">
                <div class="modal-content" :class="submitError" style="background-color: whitesmoke">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <b>Información del Curso</b>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" @click="resetInputs">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center" v-if="this.type == 'lg'">
                        <div class="row d-flex justify-content-center">
                            <span class="h5"> <b v-text="this.c_name"> </b> </span>
                        </div>
                        <div class="row d-flex">
                            <div class="col mx-4">
                                <table class="table table-striped border border-dark shadow-lg">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="text-left"> Total </th>
                                            <th scope="col"> Porcentaje </th>
                                            <th scope="col"> Puntos </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-left"> Total Evaluado </th>
                                            <td> <span v-text="totEv"></span> % </td>
                                            <td> <span v-text="totEvPts"> </span> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left"> Total Sin Evaluar </th>
                                            <td> <span v-text="totSE"></span> % </td>
                                            <td> <span v-text="totSEPts"> </span> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left"> Total Obtenido </th>
                                            <td> <span v-text="totOb"></span> % </td>
                                            <td> <span v-text="totObPts"> </span> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left"> Total Perdido </th>
                                            <td> <span v-text="totPe"></span> % </td>
                                            <td> <span v-text="totPePts"> </span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <span class="text-danger" style="font-size: 1rem"> <b v-text="errorText"> </b> </span>
                        </div>
                    </div>
                    <div class="modal-body text-center" v-else>
                        <div class="row d-flex justify-content-center">
                            <span class="h5"> <b v-text="this.c_name"> </b> </span>
                        </div>
                        <hr style="background-color: #a0a0a0; height: 0.01rem">
                        <div class="text-left my-2" style="font-size: 1rem"> <b> Total Evaluado: </b> <span v-text="totEv"> </span> % (<span v-text="totEvPts"> </span> de 20) </div>
                        <div class="text-left my-2" style="font-size: 1rem"> <b> Total Sin Evaluar: </b> <span v-text="totSE"> </span> % (<span v-text="totSEPts"> </span> de 20) </div>
                        <div class="text-left my-2" style="font-size: 1rem"> <b> Total Obtenido: </b> <span v-text="totOb"> </span> % (<span v-text="totObPts"> </span> de 20) </div>
                        <div class="text-left my-2" style="font-size: 1rem"> <b> Total Perdido: </b> <span v-text="totPe"> </span> % (<span v-text="totPePts"> </span> de 20) </div>
                        <hr style="background-color: #a0a0a0; height: 0.01rem">
                        <div class="row d-flex justify-content-center">
                            <span class="text-danger" style="font-size: 1rem"> <b v-text="errorText"> </b> </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal" @click="resetInputs"> Cerrar </button>
                    </div>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
export default {
    props: ["type", "pr", "c_id", "c_name"],

    data() {
        return {
            actionLink: "/grades/" + this.c_id + "/info",
            modalId: "infoModal" + this.type,
            modalTg: "#infoModal" + this.type,
            submitError: "",
            errorText: "",
            totEv: null,
            totEvPts: null,
            totSE: null,
            totSEPts: null,
            totOb: null,
            totObPts: null,
            totPe: null,
            totPePts: null  
        }
    },

    methods: {
        resetInputs() {
            this.submitError = "";
            this.errorText = "";
            console.log("%cInputs have been reset!", "color: lightblue");
        },

        submit() {
            console.log("%cAxios: Making Get request!", "color: lightblue");
            axios.get(this.actionLink)
            .then(response => {
                console.log("%c Code: " + response.status + " -- Data: " + response.data, "color: lightgreen");
                console.log("%cAxios: Get request succesful!", "color: lightgreen");
                this.totEv = response.data['totEv'];
                this.totSE = response.data['totSE'];
                this.totOb = response.data['totOb'];
                this.totPe = response.data['totPe'];
                this.totEvPts = response.data['totEv']*20/100;
                this.totSEPts = response.data['totSE']*20/100;
                this.totObPts = response.data['totOb']*20/100;
                this.totPePts = response.data['totPe']*20/100;
            })
            .catch(errors => {
            console.log("%cAxios: Error in Get request!", "color: #FFCCCB");
            if(errors.response.status == 401) location.replace("/login");
            else {
                this.submitError = "submitError";
                this.errorText = "¡Ha ocurrido un error! Por favor intentalo más tarde.";
            }
        });
    },
    }
}
</script>

<style scoped>
     .courseInfo {
        color: #555555;
    }
    .submitError {
        border: 1px red solid;
    }
</style>