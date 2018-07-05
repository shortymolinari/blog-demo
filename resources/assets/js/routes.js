window.Vue = require('vue');
import Router from 'vue-router';

Vue.use(Router);

/**
 *RUTAS
 */
//let router = new Router({
export default new Router({
	routes: [
		{
			path: '/',
			name: 'home',
			component: require('./views/Home')
		},
		{
			path: '/nosotros',
			name: 'about',
			component: require('./views/About')
		},
		{
			path: '/archivo',
			name: 'archive',
			component: require('./views/Archive')
		},
		{
			path: '/contacto',
			name: 'contact',
			component: require('./views/Contact')
		},
		{
			path: '/blog/:url',
			name: 'post_show',
			component: require('./views/PostShow'),
			props: true 
		},
		{
			path: '/categorias/:category',
			name: 'category_posts',
			component: require('./views/CategoryPosts'),
			props: true 
		},
		{
			path: '/etiquetas/:tag',
			name: 'tags_posts',
			component: require('./views/TagsPosts'),
			props: true 
			//todos los parametros de url seran pasados al componente en forma de propiedades
		},
		{
			path: '*',
			component: require('./views/404')
		}
	],
	linkExactActiveClass: 'active',
	//linkActiveClass: 'active-route',
	//mode: 'history', //para quitar el hash
	scrollBehavior(){
		return {x: 0, y: 0};
	}
});