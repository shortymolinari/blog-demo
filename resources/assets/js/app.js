
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import router from './routes';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//require('vue2-animate/dist/vue2-animate.min.css');

Vue.component('post-header', require('./components/PostHeader.vue'));
Vue.component('nav-bar', require('./components/NavBar.vue'));
Vue.component('posts-list', require('./components/PostsList.vue'));
Vue.component('posts-list-item', require('./components/PostsListItem.vue'));
Vue.component('category-link', require('./components/CategoryLink.vue'));
Vue.component('tag-link', require('./components/TagLink.vue'));
Vue.component('category-link', require('./components/CategoryLink.vue'));
Vue.component('post-link', require('./components/PostLink.vue'));
Vue.component('disqus-comments', require('./components/DisqusComments.vue'));
Vue.component('pagination-links', require('./components/PaginationLinks.vue'));
Vue.component('paginator', require('./components/Paginator.vue'));
Vue.component('social-links', require('./components/SocialLinks.vue'));
Vue.component('contact-form', require('./components/ContactForm.vue'));

const app = new Vue({
    el: '#app',
    //router: router //si los nombres de la llave y el valor son iguales se puede simplificar
    router
});
