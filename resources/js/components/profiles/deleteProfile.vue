<template>
    <span class="deleteProfile">
        <button type="button" class="btn btn-danger btn-lg mr-4" v-if="this.type == 'lg'" data-toggle="modal" :data-target="mTg"> Borrar Perfil </button>
        <button type="button" class="btn btn-danger mr-1" v-else data-toggle="modal" :data-target="mTg"> Borrar Perfil </button>
        <div class="modal fade" tabindex="-1" role="dialog" :id="mId">
            <div class="modal-dialog modal-dialog-centered" role="document" :class="this.pr">
                <div class="modal-content" :class="submitError" style="background-color: whitesmoke">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <b>Borrar Perfil</b>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" @click="resetInputs">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <span class="h5 text-center">
                                <b>¿Está seguro que desea borrar su perfil? <br> Perderá todos sus cursos. <br> </b>
                                <b class="text-danger" style="font-size: 1rem" v-text="errorText"> </b>
                            </span>
                            <div class="form-group row mx-2">
                                <label for="password" class="col-form-label text-md-right" style="font-size: 14px; font-weight: bold"> Contraseña </label>
                                <input type="password" class="form-control" v-model="pass" :class="passError">
                                <span class="form-text text-danger text-left" style="font-size: 0.9rem;"> <b v-text="passErrorText"> </b> </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row d-flex text-right">
                            <button class="btn btn-secondary mx-2 btn-lg" type="button" data-dismiss="modal" @click="resetInputs"> Cancelar </button>
                            <button class="btn btn-danger mx-2 btn-lg" type="button" @click="submit"> Borrar Perfil </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
export default {
    props: ["type", "pr"],

    data() {
        return {
            mId: "deleteModal" + this.type,
            mTg: "#deleteModal" + this.type,
            errorText: "",
            submitError: "",
            passErrorText: "",
            passError: "",
            pass: ""
        }
    },

    methods: {
        resetInputs() {
            this.errorText = "";
            this.submitError = "";
            this.passErrorText = "";
            this.passError = "";
            this.pass = "";
            console.log("%cInputs have been reset!", "color: lightblue");
        },

        submit() {
            console.log("%cAxios: Making Delete request!", "color: lightblue");
            axios.post('/profile/delete', {
                'password': this.pass
            })
            .then(response => {
                console.log("%c Code: " + response.status + " -- Value: " + response.data, "color: lightgreen");
                console.log("%cAxios: Delete request succesful!", "color: lightgreen");
                if(response.status == 200) {
                    location.replace('/');
                }
            })
            .catch(errors => {
                console.log("%cAxios: Error in Delete request!", "color: #FFCCCB");
                if(errors.response.status == 401) {
                    location.replace('/login');
                }
                else if(errors.response.status == 422) {
                    this.passError = "is-invalid";
                    this.passErrorText = "La contraseña es incorrecta.";
                    this.submitError = "submitError";
                }
                else {
                    this.submitError = "submitError";
                    this.errorText = "¡Ha ocurrido un error! Por favor intentalo más tarde.";
                }
            });
        }
    }
}
</script>

<style scoped>
    .deleteProfile {
        color: #555555;
    }
    .submitError {
        border: 1px red solid;
    }
</style>