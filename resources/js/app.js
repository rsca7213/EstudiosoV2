require('./bootstrap');
window.Vue = require('vue');

//Components of cursos.view.blade.php
Vue.component('delete-course', require('./components/cursos/deleteCourse.vue').default);
Vue.component('delete-course-lg', require('./components/cursos/deleteCourseLg.vue').default);

const app = new Vue({
    el: '#app',
});
