<template>
    <div class="form-group row">
        <label for="color" class="text-md-right ml-4 mr-2 mt-1" style="font-size: 14px; font-weight: bold">  Color del Curso </label>
        <input id="color" type="hidden" name="color" required :value="color">
        <button class="btn" style="width: 60px" type="button" :style="computedColor" data-toggle="modal" data-target="#colorModal"> </button>
        <div class="modal fade pr-3" tabindex="-1" role="dialog" id="colorModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background-color: whitesmoke">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <b>Seleccionar Color</b>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mx-4 p-0 d-flex justify-content-center">
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #1a53ff" @click="changeColor('#1a53ff')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #3366ff" @click="changeColor('#3366ff')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #4d79ff" @click="changeColor('#4d79ff')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #3399ff" @click="changeColor('#3399ff')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #4da6ff" @click="changeColor('#4da6ff')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #66b3ff" @click="changeColor('#66b3ff')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #666633" @click="changeColor('#666633')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #77773c" @click="changeColor('#77773c')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #888844" @click="changeColor('#888844')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #339966" @click="changeColor('#339966')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #39ac73" @click="changeColor('#39ac73')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #40bf80" @click="changeColor('#40bf80')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #bf4040" @click="changeColor('#bf4040')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #c65353" @click="changeColor('#c65353')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #cc6666" @click="changeColor('#cc6666')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #ff3333" @click="changeColor('#ff3333')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #ff4d4d" @click="changeColor('#ff4d4d')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #ff6666" @click="changeColor('#ff6666')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #d24dff" @click="changeColor('#d24dff')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #d966ff" @click="changeColor('#d966ff')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #df80ff" @click="changeColor('#df80ff')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #ff4da6" @click="changeColor('#ff4da6')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #ff66b3" @click="changeColor('#ff66b3')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #ff80bf" @click="changeColor('#ff80bf')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #ff8533" @click="changeColor('#ff8533')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #ff944d" @click="changeColor('#ff944d')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #ffa366" @click="changeColor('#ffa366')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #ffb31a" @click="changeColor('#ffb31a')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #ffbb33" @click="changeColor('#ffbb33')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #ffc34d" @click="changeColor('#ffc34d')"> </button> </div> 
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #404040" @click="changeColor('#404040')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #4d4d4d" @click="changeColor('#4d4d4d')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #595959" @click="changeColor('#595959')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #bf8040" @click="changeColor('#bf8040')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #c68c53" @click="changeColor('#c68c53')"> </button> </div>
                            <div class="col-2 mx-2 mx-sm-0 col-sm-2 my-2"> <button class="btn p-3" type="button" style="background-color: #cc9966" @click="changeColor('#cc9966')"> </button> </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row d-flex text-right">
                            <button class="btn btn-secondary mx-2" data-dismiss="modal" id="cancel"> Cancelar </button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            color: "#000000"
        }
    },

    methods: {
        changeColor(color) {
            document.getElementById('cancel').click();
            this.color = color;
        }
    },

    computed: {
        computedColor() {
            return "background-color: " + this.color + ";";
        }
    }
}
</script>

<style>

</style>