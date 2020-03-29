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

const app = new Vue({
    el: '#app',
});
