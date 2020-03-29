<template>
    <span>
        <button
            class="btn btn-danger btn-lg mx-1"
            data-toggle="modal"
            :data-target="modalTarget">
            Borrar <slot> </slot>
        </button>
        <div class="modal fade" tabindex="-1" role="dialog" :id="modalId">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <b>Borrar Curso</b>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <span class="h5 text-center">
                                <b>¿Está seguro que desea borrar el curso?</b>
                                <br />
                            </span>
                            <span class="h5 mt-2">
                                <b>Curso:</b>
                                <span v-text="this.c_n"></span>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row d-flex text-right">
                            <button
                                class="btn btn-secondary mx-2 btn-lg"
                                data-dismiss="modal"
                            >Cancelar</button>
                            <form action="/courses/view/delete" method="POST">
                                <input type="hidden" name="_token" :value="this.csrf" />
                                <input type="hidden" name="_method" value="DELETE" />
                                <input type="hidden" name="id" :value="this.c_id" />
                                <input
                                    type="submit"
                                    class="btn btn-danger mx-2 btn-lg"
                                    value="Borrar"
                                />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
export default {
    props: ["c_id", "c_n", "csrf"],

    data() {
        return {
            modalTarget: "#deleteModalLg" + this.c_id,
            modalId: "deleteModalLg" + this.c_id
        };
    }
};
</script>

<style>
</style>