<template>
    <span>
        <hr>
        <div class="form-group row col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
            <label for="course" class="col-form-label text-md-right" style="font-size: 16px; font-weight: bold"> Curso <span v-text="loadingText" class="text-muted"></span> </label>
            <select id="course" class="form-control" name="course" :class="courseListError" :disabled="courseListDisabled" @change="selectCourse" v-model="selectedCourse"> 
                <option :value="null" selected="selected"> Seleccionar Curso... </option>  
                <option v-for="course in courses" :key="course['id']" @click="selectCourse" :value="course['id']"> {{ course['name'] }} </option>
            </select>       
            <span class="form-text text-danger text-left" style="font-size: 0.8rem;"> 
                <b v-text="courseListErrorText"> </b> 
                <button class="btn btn-outline-danger btn-sm px-1 py-0 mx-1 my-1" v-if="courseListErrorText != ''" @click="fillCourseList"> Reintentar </button>
            </span>
        </div>
        <hr>
        <span v-if="selectedCourse == null">
            <h5> Selecciona un curso para continuar. </h5>
        </span>
        <span v-else> 
            <span class="text-primary text-center my-4"> <b v-text="actionText" :class="actionTextClass"> </b> </span>
            <table class="table border border-info table-striped shadow-lg col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 my-4"> 
                <thead class="bg-primary text-light h5">
                    <tr>
                        <th colspan="3" v-text="selectedCourseName"> </th>
                    </tr>
                </thead>
                <thead class="bg-info text-light">
                    <tr>
                        <th scope="col" class="text-center"> Día </th>
                        <th scope="col" class="text-center"> Horas </th>
                        <th scope="col" class="text-center"> Acción </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="selectedCourseHours == null">
                        <td colspan="3" class="h5"> El curso no tiene horario. </td>
                    </tr>
                    <tr v-for="slot in selectedCourseHours" :key="slot.id">
                        <td>
                            <span class="d-none d-md-block"> {{ slot.completeDay }} </span>
                            <span class="d-block d-md-none"> {{ slot.completeDay[0] + slot.completeDay[1] + slot.completeDay[2] }} </span>
                        </td>
                        <td v-text="slot.formatStart + ' a ' + slot.formatEnd"></td>
                        <td>
                            <edit-hours :image="imageedit" :slot_id="slot.id" :slot_day="slot.day" :slot_start="slot.start" :slot_end="slot.end" :c_id="selectedCourse" @edit="editHours"> </edit-hours>
                            <delete-hours :image="imagedelete" :slot_id="slot.id" :slot_day="slot.completeDay" :slot_start="slot.formatStart" :slot_end="slot.formatEnd" :c_id="selectedCourse" @delete="deleteHours"> </delete-hours>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 px-3"> <add-hours @add="addHours"></add-hours> </div>
        </span>
        <hr>
    </span>
</template>

<script>
export default {
    props: ["editimg", "deleteimg"],
    created() {
        this.fillCourseList();
    },

    methods: {
        fillCourseList() {
            this.resetErrors();
            this.loadingText = " (Cargando)";
            console.log("%cAxios: Making GET request for SELECT LIST", "color: lightblue");
            axios.get('/schedule/edit/courses')
            .then(response => {
                console.log("%cAxios: GET request succesful for SELECT LIST", "color: lightgreen");
                console.log("%cData Returned: ", "color: lightgreen");
                console.log(response.data);
                this.courses = response.data;
                this.loadingText = "";
            })
            .catch(errors => {
                console.log("%cAxios: Error in GET request for SELECT LIST", "color: #FFCCCB");
                if(errors.response.status == 401) location.replace("/login");
                else {
                    this.courseListError = "border border-danger disabled";
                    this.courseListErrorText = "¡Ha ocurrido un error! Por favor intentalo más tarde.";
                    this.courseListDisabled = true;
                    this.loadingText = "";
                }
            });
        },
        resetErrors() {
            this.courseListError = "";
            this.courseListErrorText = "";
            this.courseListDisabled = null;
            this.actionText = "";
            this.actionTextClass = "";
        },
        selectCourse() {
            this.resetErrors();
            if(this.selectedCourse === null) return;
            let course;
            for (let i=0; i < this.courses.length; i++) {
                if(this.courses[i].id == this.selectedCourse) {
                    course=this.courses[i];
                    break;
                }
            }
            this.selectedCourseName = course.name;
            if(course.hours != null) { /* MUST BE DIFFERENT */
                let hoursString = course.hours;
                let hours = [];
                let id = 1;
                for (let i=0; i < hoursString.length; i++) {
                    const obj = {id:0,day:"",start:"",end:"",completeDay:"", formatStart:"", formatEnd:""};
                    obj.id = id;
                    id++;
                    obj.day = hoursString[i] + hoursString[i+1];
                    i += 2;
                    obj.start = hoursString[i];
                    i++;
                    if(hoursString[i] != '-') {
                        obj.start = obj.start + hoursString[i];
                        i+=2;
                    } 
                    else i++;
                    obj.end = hoursString[i];
                    i++;
                    if(hoursString[i] != ',') {
                        obj.end = obj.end + hoursString[i];
                        i++;
                    }
                    switch(obj.day) {
                        case "MO": obj.completeDay = "Lunes"; break;
                        case "TU": obj.completeDay = "Martes"; break;
                        case "WE": obj.completeDay = "Miercoles"; break;
                        case "TH": obj.completeDay = "Jueves"; break;
                        case "FR": obj.completeDay = "Viernes"; break;
                        case "SA": obj.completeDay = "Sabado"; break;
                        case "SU": obj.completeDay = "Domingo"; break;
                    }
                    if(parseInt(obj.start) < 12) obj.formatStart = obj.start + "am";
                    if(parseInt(obj.end) < 12) obj.formatEnd = obj.end + "am";
                    if(parseInt(obj.start) === 12) obj.formatStart = "12pm";
                    if(parseInt(obj.end) === 12) obj.formatEnd = "12pm";
                    if(parseInt(obj.start) > 12) obj.formatStart = parseInt(obj.start)-12 + "pm";
                    if(parseInt(obj.end) > 12) obj.formatEnd = parseInt(obj.end)-12 + "pm";
                    hours.push(obj);
                }
                this.selectedCourseHours = hours;
            }
            else this.selectedCourseHours = null;
        },

        deleteHours(slot_id) {
            this.actionText = "Borrando horas, por favor espere...";
            this.actionTextClass = "";
            console.log('%cParent: delete request received, slot: ' + slot_id, "color: orange");
            console.log(this.selectedCourse, this.selectedCourseName);
            console.log("%cParent: Processing Schedule string...", "color: orange");
            let newString = [];
            let arrHours = this.selectedCourseHours;
            for (let i=0; i<arrHours.length; i++) {
                if(slot_id != arrHours[i].id) {
                    if(newString != "") newString += ",";
                    newString += arrHours[i].day + arrHours[i].start + "-" + arrHours[i].end;
                }
            }
            newString += ",";
            console.log("%cParent: String has been processed, calling Axios.\nString: " + newString, "color: orange");
            axios.patch('/schedule/edit/courses/delete/' + this.selectedCourse, {
                'hours': newString
            })
            .then(response => {
                console.log("%cAxios: Request succesful.", "color: lightgreen");
                if(response.status = 200) {
                    location.replace('/schedule/edit/index/1');
                }
            })
            .catch(errors => {
                console.log("%cAxios: Request failed.", "color: #FCCCBB");
                if(errors.response.status === 401) {
                    location.replace('/login');
                }
                else {
                    this.actionTextClass = "text-danger";
                    this.actionText = "¡Ha ocurrido un error! Por favor intentalo más tarde.";
                }
            });
        },

        editHours(data) {
            this.actionText = "Editando horas, por favor espere...";
            this.actionTextClass = "";
            console.log('%cParent: edit request received, data:', "color: orange");
            console.log(data);
            console.log(this.selectedCourse, this.selectedCourseName);
            let exists = false;
            let newString = [];
            let arrHours = this.selectedCourseHours;
            for (let i=0; i<arrHours.length; i++) {
                if(data.slot_id != arrHours[i].id) {
                    if(newString != "") newString += ",";
                    newString += arrHours[i].day + arrHours[i].start + "-" + arrHours[i].end;
                    exists = true;
                }
            }
            if(exists) newString += ",";
            console.log("%cParent: String has been processed, calling Axios.\nString: " + newString + "\nnewValue: " + data.day + data.start + "-" + data.end + ",", "color: orange");
            axios.patch('/schedule/edit/courses/edit/' + this.selectedCourse, {
                'hours': newString,
                'newValue': data.day + data.start + "-" + data.end + ","
            })
            .then(response => {
                console.log("%cAxios: Request succesful.", "color: lightgreen");
                if(response.status = 200) {
                    location.replace('/schedule/edit/index/1');
                }
            })
            .catch(errors => {
                console.log("%cAxios: Request failed.", "color: #FCCCBB");
                if(errors.response.status === 401) {
                    location.replace('/login');
                }
                else if(errors.response.data === "self: error") {
                    this.actionTextClass = "text-danger";
                    this.actionText = "¡Error! Hay un conflicto de horas en este curso con las horas introducidas.";
                }
                else if(errors.response.data === "notself: error") {
                    this.actionTextClass = "text-danger";
                    this.actionText = "¡Error! Hay un conflicto de horas en otro curso con las horas introducidas.";
                }
                else {
                    this.actionTextClass = "text-danger";
                    this.actionText = "¡Ha ocurrido un error! Por favor intentalo más tarde.";
                }
            });
        },
        
        addHours(data) {
            this.actionText = "Creando horas, por favor espere...";
            this.actionTextClass = "";
            console.log('%cParent: add request received, data:', "color: orange");
            console.log(data);
            console.log(this.selectedCourse, this.selectedCourseName);
            console.log("%cParent: Processing Schedule string...", "color: orange");
            let newString = data.day + data.start + "-" + data.end + ",";
            console.log("%cParent: String has been processed, calling Axios.\nString: " + newString, "color: orange");
            axios.patch('/schedule/edit/courses/create/' + this.selectedCourse, {
                'hours': newString
            })
            .then(response => {
                console.log("%cAxios: Request succesful.", "color: lightgreen");
                if(response.status = 200) {
                    location.replace('/schedule/edit/index/1');
                }
            })
            .catch(errors => {
                console.log("%cAxios: Request failed.", "color: #FCCCBB");
                if(errors.response.status === 401) {
                    location.replace('/login');
                }
                else if(errors.response.data === "self: error") {
                    this.actionTextClass = "text-danger";
                    this.actionText = "¡Error! Hay un conflicto de horas en este curso con las horas introducidas.";
                }
                else if(errors.response.data === "notself: error") {
                    this.actionTextClass = "text-danger";
                    this.actionText = "¡Error! Hay un conflicto de horas en otro curso con las horas introducidas.";
                }
                else {
                    this.actionTextClass = "text-danger";
                    this.actionText = "¡Ha ocurrido un error! Por favor intentalo más tarde.";
                }
            });
        }
    },

    data() {
        return {
            imagedelete: this.deleteimg,
            imageedit: this.editimg,
            courses: null,
            courseListError: "",
            courseListErrorText: "",
            selectedCourse: null,
            courseListDisabled: null,
            loadingText: " (Cargando)",
            selectedCourseName: "",
            selectedCourseHours: [],
            actionText: "",
            actionTextClass: ""
        }
    }
}
</script>

<style scoped>
    table.table-bordered > tbody > tr > td{
        border:1px solid #A0A0A0;
    }
</style>