require('./bootstrap');
window.Vue = require('vue');

//Components of cursos.view.blade.php
Vue.component('delete-course', require('./components/cursos/deleteCourse.vue').default);
Vue.component('delete-course-lg', require('./components/cursos/deleteCourseLg.vue').default);

//Components of evaluations.edit.blade.php
Vue.component('create-evaluation', require('./components/evaluations/createEvaluation.vue').default);

const app = new Vue({
    el: '#app',
});
