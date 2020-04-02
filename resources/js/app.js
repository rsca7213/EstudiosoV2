require('./bootstrap');
window.Vue = require('vue');

//Components of cursos.view.blade.php
Vue.component('delete-course', require('./components/cursos/deleteCourse.vue').default);
Vue.component('delete-course-lg', require('./components/cursos/deleteCourseLg.vue').default);

//Components of evaluations.edit.blade.php
Vue.component('create-evaluation', require('./components/evaluations/createEvaluation.vue').default);
Vue.component('delete-evaluation', require('./components/evaluations/deleteEvaluation.vue').default);
Vue.component('edit-evaluation', require('./components/evaluations/editEvaluation.vue').default);

//Components of grades.edit.blade.php
Vue.component('create-grade', require('./components/grades/createGrade.vue').default);
Vue.component('edit-grade', require('./components/grades/editGrade.vue').default);
Vue.component('delete-grade', require('./components/grades/deleteGrade.vue').default);
Vue.component('course-info', require('./components/grades/courseInfo.vue').default);

//Components of home.blade.php
Vue.component('days-left', require('./components/home/daysLeft.vue').default);

//Components of profiles.edit.blade.php
Vue.component('delete-profile', require('./components/profiles/deleteProfile.vue').default);

//Components of schedules.edit.blade.php
Vue.component('edit-schedule', require('./components/schedules/editSchedule.vue').default);
Vue.component('delete-hours', require('./components/schedules/deleteHours.vue').default);
Vue.component('edit-hours', require('./components/schedules/editHours.vue').default);
Vue.component('add-hours', require('./components/schedules/addHours.vue').default);

const app = new Vue({
    el: '#app',
});
